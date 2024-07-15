<?php

namespace App\Models;

use App\Data\ArticleSectionData;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\LaravelData\WithData;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ArticleSection extends Model implements  HasMedia
{
    use HasFactory;
    use HasUlids;
    use InteractsWithMedia;
    use WithData;

    protected $fillable = [
        'article_id',
        'title',
        'content',
    ];

    protected $with = ['media'];
    public string $dataClass = ArticleSectionData::class;

    protected $appends = ['cover'];

    public function article() :BelongsTo
    {
        return $this->belongsTo(Article::class);
    }

    public function registerMediaConversions(Media|null $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width('200')
            ->nonQueued();

        $this->addMediaConversion('social-media')
            ->width('720')
            ->nonQueued();
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('covers')->withResponsiveImages()->singleFile();
    }

    public function getCoverAttribute(): ?Media
    {
        return $this->getFirstMedia('covers');
    }
}
