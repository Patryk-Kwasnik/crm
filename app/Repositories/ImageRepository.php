<?php

namespace App\Repositories;

use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Collection;
use Intervention\Image\Interfaces\ImageManagerInterface;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
class ImageRepository implements ImageRepositoryInterface
{
    public function __construct(protected ImageManagerInterface $imageManager, protected Image $model) {}

    public function find(int $id): ?Image
    {
        return Image::findOrFail($id);
    }
    public function getByModel(int $modelId, string $modelType): Collection
    {
        return $this->model
            ->where('model_id', $modelId)
            ->where('model_type', $modelType)
            ->whereNull('parent_id')
            ->orderBy('sort')
            ->get();
    }

    public function storeImage(UploadedFile $file, string $modelType, int $modelId, ?string $type = null, ?string $alt = null): Image
    {
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs("uploads/{$modelType}", $filename, 'public');

        $webpPath = "uploads/{$modelType}/" . Str::replaceLast('.' . $file->getClientOriginalExtension(), '.webp', $filename);
        $this->convertToWebp($file, $webpPath);

        $image = Image::create([
            'model_type' => $modelType,
            'model_id'   => $modelId,
            'path'       => $path,
            'alt'        => $alt,
            'type'       => $type,
            'sort' => 0,
        ]);

        $this->generateThumbnails($file, $image);
        $image->load('thumbnails');
        return $image;
    }

    public function deleteImage(int $id): bool
    {
        $image = Image::findOrFail($id);

        Storage::disk('public')->delete($image->path);
        Image::where('parent_id', $image->id)->delete();
        foreach ($image->thumbnails as $thumb) {
            Storage::disk('public')->delete($thumb->path);
            $thumb->delete();
        }

        return $image->delete();
    }

    public function sort(array $items): void
    {
        foreach ($items as $index => $id) {
            Image::where('id', $id)->update(['sort' => $index]);
        }
    }
    protected function convertToWebp(UploadedFile $file, string $webpPath): void
    {
        $image = $this->imageManager->read($file)->toWebp(90);
        $image->save(storage_path('app/public/' . $webpPath));
    }

    protected function generateThumbnails(UploadedFile $file, Image $originalImage): void
    {
        $sizes = config('images.thumbnails');

        foreach ($sizes as $prefix => [$width, $height]) {
            $thumbName = $prefix . basename($originalImage->path);
            $thumbPath = dirname($originalImage->path) . '/' . $thumbName;

            $thumbImage = $this->imageManager->read($file)
                ->cover($width, $height)
                ->toWebp(80);

            Storage::disk('public')->put($thumbPath, $thumbImage);

            Image::create([
                'model_type' => $originalImage->model_type,
                'model_id'   => $originalImage->model_id,
                'path'       => $thumbPath,
                'alt'        => $originalImage->alt,
                'type'       => 'thumb',
                'parent_id'  => $originalImage->id,
                'sort'       => 0,
            ]);
        }
    }
    public function getUrlsByModel(int $modelId, string $modelType): array
    {
        return $this->getByModel($modelId, $modelType)->map(fn ($img) => $img->fullUrl())->toArray();
    }

}
