<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\ArticleSection;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ArticleSection>
 */
class ArticleSectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraphs(3, true),
            'article_id' => Article::factory(),
        ];
    }

    public function configure():static
    {
        return $this->afterCreating(function (ArticleSection $articleSection) {
            $articleSection->addMediaFromUrl(config('app.url').'/img.jpg')
                ->toMediaCollection('covers');
        });
    }
}
