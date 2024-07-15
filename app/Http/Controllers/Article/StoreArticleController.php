<?php

namespace App\Http\Controllers\Article;

use App\Models\Article;
use App\Models\ArticleSection;
use DB;
use Request;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class StoreArticleController
{
    private function rules():array
    {
        return [
            'title' => ['required', 'string'],
            'short_description' => ['required', 'string'],
            'content' => ['required', 'string'],
            'location' => ['required', 'string'],
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
        $data = $request->validate($this->rules());
        try {
            DB::beginTransaction();
        $article = Article::create([
            'title' => $data['title'],
            'short_description' => $data['short_description'],
            'content' => $data['content'],
            'location' => $data['location'],
            'posted_at' => now(),
        ]);

        if (isset($data['sections'])) {
           foreach($data['sections'] as $sectionData) {
               $section = ArticleSection::create([
                     'title' => $sectionData['title'],
                     'content' => $sectionData['content'],
               ]);
               $section->refresh();

               if (isset($sectionData['cover'])) {
                   $section->addMedia($sectionData['cover'])->toMediaCollection('covers');
               }

               $section->article()->associate($article);
               $section->save();
           }
        }
        DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
        return response()->json($article);
    }
}
