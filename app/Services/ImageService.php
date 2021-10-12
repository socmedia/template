<?php

namespace App\Services;

use App\Utillities\Generate;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImageService
{
    public function convertWhileFetch($resource, $data = [])
    {
        $h = 600;
        $w = 600;

        $image = Image::make($resource);

        if ($data['h'] && $data['w']) {
            $image->resize($data['w'], $data['h']);
        } elseif ($data['w'] && !$data['h']) {
            $image->resize($data['w'], null, function ($constraint) {
                $constraint->aspectRatio();
            });
        } elseif ($data['h'] && !$data['w']) {
            $image->resize(null, $data['h'], function ($constraint) {
                $constraint->aspectRatio();
            });
        } elseif (array_key_exists('h', $data) && array_key_exists('w', $data)) {
            $image->height() > $image->width() ? $w = null : $h = null;
            $image->resize($w, $h, function ($constraint) {
                $constraint->aspectRatio();
            });
        }

        return $image->response('jpg');
    }

    /**
     * Handle thumbnail upload
     *
     * @param  Illuminate\Http\Request $request
     * @return string Image Url
     */
    public function storeImage($request): string
    {
        $tmp = $request->file('thumbnail');
        $file = [
            'path' => 'app/public/images/' . now()->toDateString(),
            'name' => Generate::ID() . '.' . $tmp->extension(),
        ];

        $path = storage_path($file['path'] . '/' . $file['name']);

        if (!Storage::exists('public/images/' . now()->toDateString())) {
            Storage::disk('images')->makeDirectory(now()->toDateString());
        }

        $thumbnail = Image::make($tmp->getRealPath());
        $thumbnail->resize(600, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        $thumbnail->save($path, 90);
        return '/storage/images/' . now()->toDateString() . '/' . $file['name'];
    }

    public function findImage($disk, $shortPath)
    {
        $path = storage_path('app/public/' . $disk . '/' . $shortPath);

        if (!File::exists($path)) {
            return false;
        }

        return File::get($path);
    }
}