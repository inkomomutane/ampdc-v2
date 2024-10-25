<?php

namespace App\Jobs;

use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use JoelButcher\Facebook\Facebook;

class PostArticleToFacebook implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public Article $article){}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $fb = new Facebook([
            'app_id' => config('facebook.app_id'),
            'app_secret' => config('facebook.app_secret'),
            'default_graph_version' => 'v2.10',
        ]);


        try {
            // Returns a `Facebook\Response` object
            $response = $fb->post('/me/feed', [
                'message' => strip_tags(\Str::words($this->article->content)),
                'url' => $this->article->getFirstMediaUrl('',''),
                'published' => true,
            ], config('facebook.access_token'));
        } catch(Facebook\Exception\ResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(Facebook\Exception\SDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

    }
}
