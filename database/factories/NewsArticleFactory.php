<?php

namespace Database\Factories;

use App\Models\NewsArticle;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NewsArticle>
 */
class NewsArticleFactory extends Factory
{
    protected $model = NewsArticle::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(6, true);
        $slug = Str::slug($title, '-');
        $shortDescription = $this->faker->text(150);
        $seo_description = $this->faker->sentence(15);
        $seo_keywords = implode(', ', $this->faker->words(rand(5, 10)));

        $rawParagraphs = $this->faker->paragraphs(rand(5, 15));
        $text = array_map(function ($paragraph) {
            return '<p>' . $paragraph . '</p>';
        }, $rawParagraphs);

        $h2Count = rand(1, 2);
        $h2Headings = [];
        for ($i = 0; $i < $h2Count; $i++) {
            $h2Headings[] = '<h2><strong>' . $this->faker->sentence(rand(3, 6)) . '</strong></h2>';
        }
        $mainH2 = array_shift($h2Headings);

        $imageUrl = $this->faker->imageUrl(800, 480, false, false, false, 'jpg');
        $sourceUrl = $this->faker->url();
        $figcaption = $this->faker->sentence(4);
        $imageAuthor = $this->faker->userName();
        $imageHtml = <<<HTML
            <figure>
                <picture>
                    <img src="{$imageUrl}" alt="{$title}" data-rotate="" data-proportion="true" data-rotatex="" data-rotatey="" width="800" height="480" data-size="800px,480px" data-align="center" data-index="0">
                </picture>
                <figcaption><div>{$figcaption} (Source: <a href="{$sourceUrl}" target="_blank">{$imageAuthor}</a>)</div></figcaption>
            </figure>
        HTML;

        $quoteText = $this->faker->sentence(rand(20, 40));
        $quote = "<blockquote>{$quoteText}</blockquote>";

        $listItems = $this->faker->randomElements([
            $this->faker->sentence(8),
            $this->faker->sentence(12),
            $this->faker->sentence(10),
            $this->faker->sentence(16),
            $this->faker->sentence(8),
            $this->faker->sentence(14),
        ], rand(3, 6));
        $listHtml = '<ul><li>' . implode('</li><li>', $listItems) . '</li></ul>';

        array_splice($text, 0, 0, $mainH2);

        foreach ($h2Headings as $h2) {
            $maxPosition = floor(count($text) * 0.7);
            $position = rand(2, $maxPosition > 2 ? $maxPosition : 2);

            array_splice($text, $position, 0, $h2);
        }

        $otherElements = [$imageHtml, $quote, $listHtml];
        shuffle($otherElements);

        foreach ($otherElements as $element) {
            $maxPosition = count($text);
            $position = rand(3, $maxPosition > 3 ? $maxPosition : 3);

            array_splice($text, $position, 0, $element);
        }

        $description = implode("\n", $text);

        $data = [
            'title' => [],
            'slug' => $slug,
            'short_description' => [],
            'description' => [],
            'seo_title' => [],
            'seo_description' => [],
            'seo_keywords' => [],
            'sort' => 10000,
            'active' => '1',
        ];

        foreach (supported_languages_keys() as $lang) {
            $data['title'][$lang] = $title;
            $data['short_description'][$lang] = $shortDescription;
            $data['description'][$lang] = $description;
            $data['seo_title'][$lang] = $title . ' | ' . config('app.name');
            $data['seo_description'][$lang] = $seo_description;
            $data['seo_keywords'][$lang] = $seo_keywords;
        }

        return $data;
    }
}
