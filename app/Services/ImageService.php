<?php

namespace App\Services;

use App\Models\Image;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ImageService
{
    public function uploadAvatar($file, $userId): void
    {
        $userId = $userId ?? Auth::id();

        $filename = $file->hashName();
        $extension = $file->extension();

        $path = Storage::disk('public')->putFileAs('images', $file, $filename);
//согласованность данных, удалить загруженный файл из диска unlink. try catch
        Image::create([
            'user_id' => $userId,
            'name' => $filename,
            'type' => $extension,
            'path' => $path,
        ]);

        $user = User::find($userId);
        $user->avatar_url = '/storage/' . $path;
        $user->save();
    }
}
