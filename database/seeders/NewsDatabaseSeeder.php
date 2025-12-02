<?php

namespace Database\Seeders;

use App\Models\NewsArticle;
use App\Models\NewsCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NewsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryNames = ['blog', 'news', 'event'];
        $categories = [];

        foreach ($categoryNames as $name) {
            $slug = Str::slug($name, '-');

            $categoryData = [
                'name' => [],
            ];

            foreach (supported_languages_keys() as $lang) {
                $categoryData['name'][$lang] = ucfirst($name);
            }

            $categories[] = NewsCategory::firstOrCreate(
                ['slug' => $slug], $categoryData
            );
        }

        $categoryIds = collect($categories)->pluck('id');

        NewsArticle::factory()
            ->count(50)
            ->create()
            ->each(function (NewsArticle $article) use ($categoryIds) {
                $randomCategories = $categoryIds->random();
                $article->categories()->attach($randomCategories);
            });
    }
}
