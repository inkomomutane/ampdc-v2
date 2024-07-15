<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\ArticleSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                ->count(10)
                ->hasSections(random_int(1, 5),
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
