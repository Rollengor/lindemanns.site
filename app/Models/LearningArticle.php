<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class LearningArticle extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    public string $mediaCollection = 'learning-articles';

    public array $mediaSizes = [
        'xl' => 3840,
        'hd' => 2560,
        'lg' => 1920,
        'md' => 900,
        'sm' => 450,
    ];

    protected $fillable = [
        'learning_category_id',

        'slug',
        'title',
        'description',

        'seo_title',
        'seo_description',
        'seo_keywords',

        'sort',
        'active',
        'accent',
    ];

    protected function casts(): array
    {
        return [
            'active' => 'boolean',
            'accent' => 'boolean',
        ];
    }

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->active = !!request()->active;
            $model->accent = !!request()->accent;

            if (empty($model->getOriginal('slug')) && is_null($model->slug)) {
                $model->slug = Str::of($model->title)->slug('-');
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
