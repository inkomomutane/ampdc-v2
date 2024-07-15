<?php

namespace App\Data;

use App\Models\Article;
use App\Models\ArticleSection;
use Spatie\LaravelData\Data;
/** @typescript */
class ArticleData extends Data
{
    public function __construct(
        public ?string $id,
        public ?string $title,
        public ?string $content,
        public ?MediaData $cover,
        public ?array $sections,
    ) {}

    public static function fromModel(?Article $article = null): ?ArticleData
    {
        if (is_null($article)) {
            return null;
        }

        return new self(
            id: $article->id,
            title: $article->title,
            content: $article->content,
            cover: MediaData::fromModel($article->cover),
            sections: $article->sections->map(fn (ArticleSection $section) => ArticleSectionData::fromModel($section))->toArray(),
        );
    }
}
