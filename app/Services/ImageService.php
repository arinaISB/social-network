<?php

namespace App\Services;

use App\Models\Image;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ImageService
{
    public function uploadAvatar($file, $userId): void
    {
        $filename = $file->hasName();
        $extension = $file->extension();

        $userId = $userId ?? Auth::id();

        try {
            $path = Storage::disk('public')->putFileAs('images', $file, $filename);

            Image::create([
                'user_id' => $userId,
                'name' => $filename,
                'type' => $extension,
                'path' => $path,
            ]);

            $user = User::findOrFail($userId);
            if (!$user) {
                throw new \Exception("User {$userId} not found");
            }
            $user->avatar_url = '/storage/' . $path;
            $user->save();
        } catch (\Throwable $exception) {
            Storage::disk('public')->delete($path);
            Log::error("Failed to upload avatar for user {$userId}: {$exception->getMessage()}");
        }
    }
}
