<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function create(PostRequest $request)
    {
        $validated = $request->validated();

        $post = Post::create([
            'author_id' => Auth::id(),
            'content' => $request->content,
        ]);
    }
}
