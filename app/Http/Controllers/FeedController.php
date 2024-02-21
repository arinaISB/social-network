<?php

namespace App\Http\Controllers;

use App\Models\Post;

class FeedController extends Controller
{
    public function show()
    {
        $posts = Post::with('user')->orderby('created_at', 'desc')->get();

        return view('feed', ['posts' => $posts]);
    }
}
