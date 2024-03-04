<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ImageUploadController extends Controller
{
    public function upload(Request $request)
    {
        Log::info($request->all());
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->hashName();
            $extension = $file->extension();
            Log::info('1');

            $path = Storage::disk('public')->putFileAs('images', $file, $filename);

            Log::info($path);
            $image = Image::create([
                'user_id' => auth()->user()->id,
                'name'    => $filename,
                'type'    => $extension,
                'path'    => $path,
            ]);

            $user = auth()->user();
            $user->avatar_url = '/storage/' . $path;
            $user->save();

            return back()->with('success', 'Image uploaded successfully');
        }

        return back()->with('error', 'Failed to upload image');
    }
}
