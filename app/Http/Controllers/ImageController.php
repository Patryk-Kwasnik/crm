<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\ImageService;
use App\Repositories\ImageRepository;
use App\Http\Requests\Image\ImageRequest;
use Illuminate\Http\Request;
use App\Http\Requests\Image\SortImageRequest;
use App\Http\Requests\Image\CropImageRequest;
use Illuminate\Http\JsonResponse;
class ImageController extends Controller
{
    public function __construct(protected ImageService $imageService, protected ImageRepository $imageRepository)
    {
    }

    public function index(Request $request) :JsonResponse
    {
        $images = $this->imageRepository->getByModel(
            $request->input('model_id'),
            $request->input('model_type')
        );

        $formatted = $images->map(function ($image) {
            return [
                'id' => $image->id,
                'url' => $image->fullUrl(),
                'alt' => $image->alt,
            ];
        });

        return response()->json(['images' => $formatted]);
    }
    public function store(ImageRequest $request) :JsonResponse
    {
        try {
            $image = $this->imageService->upload(
                $request->file('image'),
                $request->input('model_type'),
                $request->input('model_id'),
                $request->input('type'),
                $request->input('alt')
            );

            return response()->json([
                'success' => true,
                'image' => [
                    'id' => $image->id,
                    'url' => $image->fullUrl(),
                    'thumbs' => $image->thumbnails->map(fn($t) => $t->fullUrl()),
                ],
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function sort(SortImageRequest  $request): JsonResponse
    {
        $this->imageService->sort($request->input('ids'));
        return response()->json(['message' => 'Sorted']);
    }

    public function rotate(int $id): JsonResponse
    {
        try {
            $this->imageService->rotate($id);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function crop(CropImageRequest  $request, int $id): JsonResponse
    {
        try {
            $this->imageService->crop(
                $id,
                (int) $request->input('x'),
                (int) $request->input('y'),
                (int) $request->input('width'),
                (int) $request->input('height'),
            );

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function delete(int $id): JsonResponse
    {
        try {
            $this->imageService->delete(
                $id
            );
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
