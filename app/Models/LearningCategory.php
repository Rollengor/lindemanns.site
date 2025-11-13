<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class LearningCategory extends Model
{
    protected $fillable = [
        'slug',
        'title',
        'description',

        'seo_title',
        'seo_description',
        'seo_keywords',

        'sort',
        'active',
    ];

    protected function casts(): array
    {
        return [
            'active' => 'boolean',
        ];
    }

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->active = !!request()->active;

            if (empty($model->getOriginal('slug')) && is_null($model->slug)) {
                $model->slug = Str::of($model->title)->slug('-');
            }
        });
    }

    public function articles(): HasMany
    {
        return $this->hasMany(LearningArticle::class);
    }
}
