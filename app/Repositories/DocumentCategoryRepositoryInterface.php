<?php

namespace App\Repositories;
use App\Models\DocumentCategory;
use Illuminate\Database\Eloquent\Collection;

interface DocumentCategoryRepositoryInterface
{
    public function getAll(): Collection;
    public function getParentCategories(int $excludeId = null): Collection;
    public function findById(int $id):DocumentCategory;
    public function create(array $data):DocumentCategory;
    public function update(int $id, array $data):DocumentCategory;
    public function delete(int $id):int;
}
