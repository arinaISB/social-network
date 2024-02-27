<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function create(CommentRequest $request, $postId)
    {
        $validated = $request->validated();

        Comment::create([
            'user_id' => Auth::id(),
            'content' => $validated['content'],
            'post_id' => $postId,
        ]);

        return redirect()->back()->withSuccess('Comment created successfully!');
    }
}
