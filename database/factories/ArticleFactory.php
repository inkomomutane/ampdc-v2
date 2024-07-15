<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
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
            'short_description' => $this->faker->sentence,
            'location' => $this->faker->city,
            'posted_at' => $this->faker->date(),
            'status' => 'published',
        ];
    }

    public function configure():static
    {
        return $this->afterCreating(function (Article $article) {
            $article->addMediaFromUrl(config('app.url').'/img.jpg')
                ->toMediaCollection('covers');
        });
    }
}
