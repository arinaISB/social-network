<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function create(CommentRequest $request, $postId)
    {
        $validated = $request->validated();

        $comment = Comment::create([
            'user_id' => Auth::id(),
            'content' => $validated['content'],
            'post_id' => $postId,
        ]);

        $post = Post::findOrfail($postId);
        $post->comments_count = $post->comments()->count();
        $post->save();

        return response()->json($comment);
    }

    public function getAll()
    {
        $comments = Comment::with('user')->get();
        return response()->json($comments);
    }
}
