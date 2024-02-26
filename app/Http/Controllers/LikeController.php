<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function likePost($postId)
    {
        $user = Auth::user();
        $post = Post::findOrFail($postId);

        if ($post->likes()->where('user_id', $user->id)->exists())
        {
            $post->likes()->where('user_id', $user->id)->delete();
        } else {
            $post->likes()->create([
                'user_id' => $user->id
            ]);
        }

        return back();
    }
}
