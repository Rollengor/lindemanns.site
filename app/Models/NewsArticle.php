<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Translatable\HasTranslations;

class NewsArticle extends Model implements HasMedia
{
    use HasFactory, HasTranslations, SoftDeletes, InteractsWithMedia;

    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'description',

        'seo_title',
        'seo_description',
        'seo_keywords',

        'active',
        'sort',
    ];

    public array $translatable = [
        'title',
        'short_description',
        'description',

        'seo_title',
        'seo_description',
        'seo_keywords',
    ];

    protected function casts(): array
    {
        return [
            'title' => 'json',
            'short_description' => 'json',
            'description' => 'json',
            'seo_title' => 'json',
            'seo_description' => 'json',
            'seo_keywords' => 'json',
            'active' => 'boolean',
        ];
    }

    public string $mediaCollection = 'news-articles';

    public array $mediaSizes = [
        'xl' => 3840,
        'hd' => 2560,
        'lg' => 1920,
        'md' => 900,
        'sm' => 450,
    ];

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->active = app()->runningInConsole() ? 1 : !!request()->active;

            if (empty($model->getOriginal('slug')) && is_null($model->slug)) {
                $title = $model->getTranslation('title', 'en');
                $model->slug = Str::of($title)->slug('-');
            }

            if ($model->isDirty('description')) {
                $oldJson = $model->getRawOriginal('description');
                $newJson = $model->getAttributes()['description'];

                $oldStandardizedJson = json_decode($oldJson, true);
                $newStandardizedJson = json_decode($newJson, true);

                if ($oldStandardizedJson && $oldStandardizedJson !== $newStandardizedJson) {
                    $oldUrls = [];
                    $newUrls = [];

                    foreach (supported_languages_keys() as $lang) {
                        $oldDescription = $oldStandardizedJson[$lang] ?? '';
                        $newDescription = $newStandardizedJson[$lang] ?? '';

                        preg_match_all('/<img[^>]+src=["\'](\/media\/[^"\']+)["\'][^>]*>/i', $oldDescription, $oldImages);
                        preg_match_all('/<img[^>]+src=["\'](\/media\/[^"\']+)["\'][^>]*>/i', $newDescription, $newImages);

                        $oldUrls = array_merge($oldUrls, $oldImages[1] ?? []);
                        $newUrls = array_merge($newUrls, $newImages[1] ?? []);
                    }

                    $deletedUrls = array_diff(array_unique($oldUrls), array_unique($newUrls));

                    foreach ($deletedUrls as $url) {
                        if (preg_match('/\/media\/(\d+)\//', $url, $matches)) {
                            $mediaId = $matches[1];

                            $media = Media::find($mediaId);

                            if ($media) {
                                $media->delete();
                            }
                        }
                    }
                }
            }
        });
    }

    public function categories(): BelongsToMany {
        return $this->belongsToMany(NewsCategory::class, 'news_article_news_category');
    }

    public function getFirstCategoryAttribute(): ?NewsCategory {
        return $this->categories?->first();
    }

    public function registerMediaConversions(Media $media = null): void
    {
        if ($media && $media->extension === 'svg') {
            return;
        }

        $collectionName = $media->collection_name;

        foreach ($this->mediaSizes as $size => $value) {
            $this
                ->addMediaConversion($size.'-webp')
                ->format('webp')
                ->width($value)
                ->nonQueued()
                ->performOnCollections($collectionName);
        }
    }

    public function processImagesInDescription(string $content): string
    {
        $pattern = '/<img([^>]+)src=["\'](\/storage\/temp\/[^"\']+)["\']([^>]*)>/i';

        return preg_replace_callback($pattern, function ($matches) {
            $attributesBeforeSrc = $matches[1];
            $tempUrl = $matches[2];
            $attributesAfterSrc = $matches[3];

            $diskPath = str_replace('/storage/', '', $tempUrl);
            $diskName = 'public';

            if (!Storage::disk($diskName)->exists($diskPath)) {
                return $matches[0];
            }

            try {
                $media = $this
                    ->addMediaFromDisk($diskPath, $diskName)
                    ->toMediaCollection($this->mediaCollection);

                Storage::disk($diskName)->delete($diskPath);

            } catch (\Exception $exception) {
                Log::error(__('errors.upload_image_failed'), ['exception' => $exception]);

                return $matches[0];
            }

            $smUrl = $media->getUrl('sm-webp');
            $mdUrl = $media->getUrl('md-webp');
            $lgUrl = $media->getUrl('lg-webp');

            $smUrl = $this->getRelativeUrl($smUrl);
            $mdUrl = $this->getRelativeUrl($mdUrl);
            $lgUrl = $this->getRelativeUrl($lgUrl);

            return sprintf(
                '<img %s src="%s" srcset="%s 450w, %s 900w, %s 1800w" %s>',
                trim($attributesBeforeSrc),
                $mdUrl,
                $smUrl,
                $mdUrl,
                $lgUrl,
                trim($attributesAfterSrc)
            );
        }, $content) ?: $content;
    }

    private function getRelativeUrl(string $url): string
    {
        $parsedUrl = parse_url($url);

        if (isset($parsedUrl['scheme']) && isset($parsedUrl['host'])) {
            $url = preg_replace('/^(http|https):\/\/[^\/]+/', '', $url);
        }

        return $url;
    }
}
