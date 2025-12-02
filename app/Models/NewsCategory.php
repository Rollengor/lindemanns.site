<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;

class NewsCategory extends Model
{
    use HasFactory, HasTranslations, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',

        'seo_title',
        'seo_description',
        'seo_keywords',

        'active',
        'sort',
    ];

    public array $translatable = [
        'name',
        'description',

        'seo_title',
        'seo_description',
        'seo_keywords',
    ];

    protected function casts(): array
    {
        return [
            'name' => 'json',
            'description' => 'json',
            'seo_title' => 'json',
            'seo_description' => 'json',
            'seo_keywords' => 'json',
            'active' => 'boolean',
        ];
    }

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->active = !!request()->active;

            if (empty($model->getOriginal('slug')) && is_null($model->slug)) {
                $name = $model->getTranslation('name', 'en');
                $model->slug = Str::of($name)->slug('-');
            }
        });
    }

    public function articles(): BelongsToMany {
        return $this->belongsToMany(NewsArticle::class, 'news_article_news_category');
    }
}
