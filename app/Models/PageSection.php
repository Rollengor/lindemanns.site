<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class PageSection extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    public string $mediaCollection = 'section';

    public array $mediaSizes = [
        'xl' => 3840,
        'hd' => 2560,
        'lg' => 1920,
        'md' => 900,
        'sm' => 450,
    ];

    protected $fillable = [
        'page_id',

        'title',
        'subtitle',
        'description',

        'content_data',

        'sort',
        'active',
    ];

    protected function casts(): array
    {
        return [
            'content_data' => 'json',
            'active' => 'boolean',
        ];
    }

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->active = !!request()->active;
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
