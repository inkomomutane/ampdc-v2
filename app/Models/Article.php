<?php

namespace App\Models;

use App\Data\ArticleData;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\LaravelData\WithData;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
class Article extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use HasSlug;
    use HasUlids;
    use WithData;

    protected $fillable = [
        'title',
        'short_description',
        'content',
        'location',
        'posted_at',
        'status',
    ];


    public static function boot():void {
        parent::boot();
        static::deleting(function (Article $model) {
            foreach($model->sections ?: [] as $section) {
                $section->delete();
            }
        });
}

    protected $with = ['media','sections'];

    public  string $dataClass = ArticleData::class;

    protected $appends = ['cover'];

    protected $casts = [
        'posted_at' => 'date',
    ];

    public function sections(): HasMany
    {
        return $this->hasMany(ArticleSection::class);
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

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
