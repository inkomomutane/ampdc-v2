<?php

namespace App\Models;

use App\Data\ArticleData;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;
use RalphJSmit\Laravel\SEO\Schema\BreadcrumbListSchema;
use RalphJSmit\Laravel\SEO\SchemaCollection;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use RalphJSmit\Laravel\SEO\Support\ImageMeta;
use RalphJSmit\Laravel\SEO\Support\SEOData;
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
    use HasSEO;
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


    public function getDynamicSEOData(): SEOData {
        return new SEOData(
            title: $this->title,
            description: $this->short_description,
            author: 'AMPDC',
            image: $this->hasMedia('covers') ? $this->getFirstMedia('covers')?->getUrl('social-media') :null,
            url: route('news.page', ['article' => $this->slug]),
            imageMeta: $this->hasMedia('covers') ? new ImageMeta($this->getFirstMedia('covers')?->getUrl('social-media')) :null,
            published_time: $this->posted_at,
            modified_time: $this->updated_at,
            articleBody: $this->content,
            section: 'post',
            tags: ['post','news','article'],
            schema: SchemaCollection::initialize()->addArticle()->addBreadcrumbs(
                fn (BreadcrumbListSchema $breadcrumbs): BreadcrumbListSchema => $breadcrumbs->prependBreadcrumbs([
                    'Welcome' => route('welcome'),
                ])
            ),
            type: 'article',
            site_name: 'Observatorio do feminicídio',
            favicon: asset('favicon.ico'),
            locale: 'pt',
            canonical_url: route('news.page', ['article' => $this->slug]),
            openGraphTitle: $this->title,
        );
    }
}
