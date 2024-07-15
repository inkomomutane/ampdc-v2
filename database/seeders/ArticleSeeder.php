<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;
use Random\RandomException;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @throws RandomException
     */
    public function run(): void
    {
        try {
            \DB::beginTransaction();
            Article::factory()
                ->count(12)
                ->hasSections(random_int(4, 9),
                    fn (array $attributes, Article $article) => ['article_id' => $article->id]
                )
                ->create();
            \DB::commit();
        } catch (RandomException $e) {
            \DB::rollBack();
            throw $e;
        }
    }
}
