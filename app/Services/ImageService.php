<?php

namespace App\Services;

use App\Utillities\Generate;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImageService
{
    /**
     * Converting image by get request
     * Return new converted image
     *
     * @param  url $resource (url without origin)
     * @param  \Illuminate\Http\Request $data ($request->w || $request->h in array)
     * @return void
     */
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
     * Upload image to storage
     *
     * @param  Illuminate\Http\Request $fileInput ($request->file('input_name'))
     * @return string Image Url
     */
    public function storeImage($fileInput): string
    {
        $file = [
            'path' => 'app/public/images/' . now()->toDateString(),
            'name' => Generate::ID() . '.' . $fileInput->extension(),
        ];

        $path = storage_path($file['path'] . '/' . $file['name']);

        if (!Storage::exists('public/images/' . now()->toDateString())) {
            Storage::disk('images')->makeDirectory(now()->toDateString());
        }

        $image = Image::make($fileInput->getRealPath());
        $image->resize(600, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        $image->save($path, 90);
        return '/storage/images/' . now()->toDateString() . '/' . $file['name'];
    }

    /**
     * Find exsisting image at storage
     *
     * @param  string $disk
     * @param  string $shortPath
     * @return void
     */
    public function findImage($disk, $shortPath)
    {
        $path = storage_path('app/public/' . $disk . '/' . $shortPath);

        if (!File::exists($path)) {
            return false;
        }

        return File::get($path);
    }

    /**
     * Remove image from storage
     *
     * @param  string $disk
     * @param  string $shortPath (date/filename.jpg)
     * @return void
     */
    public function removeImage($disk, $shortPath)
    {
        $path = storage_path('app/public/' . $disk . '/' . $shortPath);

        if (!File::exists($path)) {
            return false;
        }

        return File::delete($path);
    }
}