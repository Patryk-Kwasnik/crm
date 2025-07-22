<?php

namespace App\Repositories;

use App\Models\Document;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;

interface DocumentRepositoryInterface
{
    public function all(): Collection;
    public function find(int $id): ?Document;
    public function store(UploadedFile $file, ?int $categoryId = null): void;
    public function delete(int $id): void;
}
