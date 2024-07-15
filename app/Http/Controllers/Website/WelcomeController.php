<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('Website.Pages.welcome',[
            'articles' => Article::orderByDesc('posted_at')->limit(6)->get(),
        ]);
    }
}
