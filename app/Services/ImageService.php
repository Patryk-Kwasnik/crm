<?php

namespace App\Services;

use App\Repositories\ImageRepository;
use Illuminate\Http\UploadedFile;
use App\Models\Image as ModelImage;
use Intervention\Image\Interfaces\ImageManagerInterface;
use Intervention\Image\Interfaces\ImageInterface;
class ImageService
{
    public function __construct(
        protected ImageRepository $imageRepository,
        protected ImageManagerInterface $imageManager
    ){}
    public function upload(UploadedFile $file, string $modelType, int $modelId, ?string $type = null, ?string $alt = null): ModelImage
    {
        return $this->imageRepository->storeImage($file, $modelType, $modelId, $type, $alt);
    }

    public function delete(int $imageId) : bool
    {
        return $this->imageRepository->deleteImage($imageId);
    }

    public function sort(array $ids) : void
    {
        $this->imageRepository->sort($ids);
    }
    public function rotate(int $id): void
    {
        $imageModel = $this->imageRepository->find($id);
        $path = storage_path('app/public/' . $imageModel->path);

        $image = $this->imageManager->read($path);
        $image
            ->rotate(-90)
            ->save($path);
    }

    public function crop(int $id, int $x, int $y, int $width, int $height): void
    {
        $image = $this->imageRepository->find($id);
        $path = storage_path('app/public/' . $image->path);
        if (!file_exists($path)) {
            throw new \RuntimeException('Plik nie istnieje.');
        }
        $image = $this->imageManager->read($path);
        if (!$image) {
            throw new \RuntimeException('Nie udało się wczytać obrazu.');
        }
        $image
            ->crop($width, $height, $x, $y)
            ->save($path);
    }
}
