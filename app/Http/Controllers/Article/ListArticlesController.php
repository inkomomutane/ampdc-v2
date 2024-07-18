<?php

namespace App\Http\Controllers\Article;

use App\Data\ArticleData;
use App\Models\Article;
use Illuminate\Database\Eloquent\Builder;
use Inertia\Inertia;

class ListArticlesController
{
    public function __invoke(){
        return Inertia::render('Website/ListArticles',[
            'articles' => static::handle(request()->search),
            'search' => request()->search
        ]);
    }


    public static function handle(?string $term){
        return ArticleData::collection(
            Article::query()
             ->when($term, function (Builder $query)  use ($term) {
                 $query->whereAny(['location','content','title'],'Like',"%$term%")
                     ->orwhereRelation('sections','title','Like',"%$term%")
                     ->orWhereRelation('sections','content','Like',"%$term%");
             })->orderByDesc('updated_at')->paginate(6)->withQueryString());
    }
}
