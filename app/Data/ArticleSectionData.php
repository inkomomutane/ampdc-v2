<?php

namespace App\Data;

use App\Models\ArticleSection;
use Spatie\LaravelData\Data;

/** @typescript  */
class ArticleSectionData extends Data
{
    public function __construct(
        public ?string $id,
        public ?string $title,
        public ?string $content,
        public ?MediaData $cover,
    )
    {
    }

    public static function fromModel(?ArticleSection $articleSection = null): ?ArticleSectionData
    {
        if (is_null($articleSection)) {
            return null;
        }

        return new self(
            id: $articleSection->id,
            title: $articleSection->title,
            content: $articleSection->content,
            cover: MediaData::fromModel($articleSection->cover),
        );
    }
}
