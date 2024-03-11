<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('home', [
            'featuredPosts' => Post::published()->featured()->latest('published_at')->get()->random(3),
            'newestPosts' => Post::published()->featured()->latest('published_at')->get()
        ]);
    }
}