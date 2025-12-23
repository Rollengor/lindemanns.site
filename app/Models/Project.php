<?php

namespace App\Models;

use App\Traits\HasImageProcessing;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Translatable\HasTranslations;

class Project extends Model implements HasMedia
{
    use HasFactory, HasTranslations, SoftDeletes, InteractsWithMedia, HasImageProcessing;

    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'description',

        'seo_title',
        'seo_description',
        'seo_keywords',

        'location',
        'tags',
        'info',

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

        'location',
        'tags',
        'info',
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
            'location' => 'json',
            'tags' => 'json',
            'info' => 'json',
            'active' => 'boolean',
        ];
    }

    public string $mediaHero = 'hero';
    public string $mediaDescription = 'description';
    public string $mediaFiles = 'files';

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
}
