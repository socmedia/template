<?php

namespace App\Http\Controllers;

use App\Services\ImageService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MediaController extends Controller
{
    public function resize(Request $request)
    {
        $service = new ImageService();
        return $service->convertWhileFetch($request->src, [
            'w' => $request->w,
            'h' => $request->h,
        ]);
    }

    public function uploadImage(Request $request)
    {
        $service = new ImageService();

        try {
            $uploaded = $service->storeImage($request->file('image'));
            return response()->json([
                'status' => 200,
                'message' => 'Image uploaded successfully.',
                'data' => [
                    'filepath' => $uploaded,
                ],
            ], 200);
        } catch (Exception $exception) {
            Log::error($exception->getMessage());

            return response()->json([
                'status' => 500,
                'message' => $exception->getMessage(),
            ], 500);
        }
    }

    public function destroyImage(Request $request)
    {
        $service = new ImageService();

        try {
            $path = explode('/', $request->image);
            $shortPath = implode('/', array_slice($path, -2, 2));
            $service->removeImage('images', $shortPath);

            return response()->json([
                'status' => 200,
                'message' => 'Image removed successfully.',
            ], 200);
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            return response()->json([
                'status' => 500,
                'message' => $exception->getMessage(),
            ], 500);
        }
    }
}