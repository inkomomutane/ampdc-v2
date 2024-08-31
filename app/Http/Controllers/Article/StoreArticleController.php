<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\concerns\AuthorizeWriters;
use App\Models\Article;
use App\Models\ArticleSection;
use DB;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class StoreArticleController
{

    use AuthorizeWriters;

    private function rules():array
    {
        return [
            'sections' => ['nullable', 'array'],
            'sections.*.title' => ['required', 'string'],
            'sections.*.content' => ['required', 'string'],
        ];
    }

    /**
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function __invoke(Request $request)
    {
        $this->authorizeAction();

        $data = $request->validate($this->rules());
        try {
            DB::beginTransaction();
            $article = $this->createArticle($request);

        if (isset($data['sections'])) {
           foreach($request['sections'] as $sectionData) {
               $section = ArticleSection::create([
                     'title' => $sectionData['title'],
                     'content' => $sectionData['content'],
                        'article_id' => $article->id,
               ]);
               $section->refresh();


               if(isset($sectionData['cover'])){
                   foreach($sectionData['cover'] as $image){
                       $section->addMedia($image)->toMediaCollection('covers');
                   }
               }

               $section->article()->associate($article);
               $section->save();
           }
        }
        DB::commit();
        flash()->addSuccess('Post criado com sucesso');
        } catch (\Exception $e) {
            DB::rollBack();
            flash()->addError('Erro ao criar post');
            throw $e;
        }
        return to_route('article.list');
    }


    /**
     * @throws FileIsTooBig
     * @throws FileDoesNotExist
     */
    private function createArticle(Request $request): Article
    {
      $validatedData =   $request->validate([
            'title' => ['required', 'string'],
            'short_description' => ['required', 'string'],
            'content' => ['required', 'string'],
            'location' => ['required', 'string'],
            'cover' => ['array','nullable'],
            'cover.*' => ['file']
        ]);

    $article =   Article::create([
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

        return $article;
    }
}
