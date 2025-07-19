<?php

namespace App\Repositories;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use \App\Models\Image;

interface ImageRepositoryInterface
{
    public function find(int $id): ?Image;
    public function storeImage(UploadedFile $file, string $modelType, int $modelId, ?string $type = null, ?string $alt = null):Image;
    public function deleteImage(int $id): bool;
    public function getByModel(int $modelId, string $modelType): Collection;
    public function sort(array $items): void;
    public function getUrlsByModel(int $modelId, string $modelType): array;
}
