<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\concerns\AuthorizeWriters;
use App\Models\Article;
use App\Models\ArticleSection;
use DB;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class UpdateArticleController
{
    use AuthorizeWriters;

    public function __invoke(Request $request,Article $article)
    {
        $this->authorizeAction();

        $validatedSections = $request->validate([
            'sections' => ['nullable', 'array'],
            'sections.*.title' => ['required', 'string'],
            'sections.*.content' => ['required', 'string'],
            'sections.*.id' => ['required','exists:article_sections,id'],
            'sections.*.cover' => ['array','nullable'],
            'section.*.cover.*' => ['file']
        ]);
        try {
            DB::beginTransaction();
            $article = $this->updateArticle(request: $request,article: $article);

            if (isset($validatedSections['sections'])) {
                foreach($validatedSections['sections'] as $sectionData) {
                    $section = ArticleSection::updateOrCreate([
                        'id' => $sectionData['id'],
                    ],[
                        'title' => $sectionData['title'],
                        'content' => $sectionData['content'],
                        'article_id' => $article->id,
                    ]);
                    $section->refresh();
                    if(isset($sectionData['cover'])){
                        foreach($sectionData['cover'] as $image){
                            $section->media()->delete();
                            $section->addMedia($image)->toMediaCollection('covers');
                        }
                    }
                    $section->save();
                }
            }
            DB::commit();
            flash()->addSuccess('Post actualizado com sucesso');
        } catch (\Exception $e) {
            DB::rollBack();
            flash()->addError('Erro ao actualizar post');
            throw $e;
        }
        return to_route('article.list');
    }






    /**
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    private function updateArticle(Request $request, Article $article): Article
    {
        $validatedData =   $request->validate([
            'title' => ['required', 'string'],
            'short_description' => ['required', 'string'],
            'content' => ['required', 'string'],
            'location' => ['required', 'string'],
            'cover' => ['array','nullable'],
            'cover.*' => ['file']
        ]);

        $article->update([
            'title' => $validatedData['title'],
            'short_description' => $validatedData['short_description'],
            'content' => $validatedData['content'],
            'location' => $validatedData['location'],
            'posted_at' => now(),
        ]);

        if($request['cover']){
            foreach($request['cover'] as $image){
                $article->addMedia($image)->toMediaCollection('covers');
            }
        }

        $article->refresh();

        return $article;
    }
}
