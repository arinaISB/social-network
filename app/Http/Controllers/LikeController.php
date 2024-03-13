<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LikeController extends Controller
{
    public function like($postId)
    {
        $user = Auth::user();
        $post = Post::findOrFail($postId);

        $isLiked = $post->likes()->where('user_id', $user->id)->exists();

        if ($isLiked) {
            $post->likes()->where('user_id', $user->id)->delete();
            $liked = false;
        } else {
            $post->likes()->create([
                'user_id' => $user->id
            ]);

            $liked = true;
        }

        $post->likes_count = $post->likes()->count();
        $post->save();

        return response()->json(['liked' => $liked]);
    }
}
