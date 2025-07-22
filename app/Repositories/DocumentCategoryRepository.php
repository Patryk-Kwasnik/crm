<?php

namespace App\Repositories;

use App\Models\DocumentCategory;
use App\Enums\ActiveStatusEnum;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DocumentCategoryRepository implements DocumentCategoryRepositoryInterface
{
    public function getAll():Collection
    {
        return DocumentCategory::all()->map(function ($news) {
            $news->status_label = ActiveStatusEnum::getList($news->status);
            return $news;
        });
    }

    public function getParentCategories(int $excludeId = null): Collection
    {
        $query = DocumentCategory::whereNull('parent_id');

        if ($excludeId) {
            $query->where('id', '!=', $excludeId);
        }

        return $query->orderBy('name')->get();
    }

    public function findById(int $id):DocumentCategory
    {
        return DocumentCategory::findOrFail($id);
    }

    public function create(array $data): DocumentCategory
    {
        $data['depth'] = $this->calculateDepth($data['parent_id'] ?? null);
        return DocumentCategory::create($data);
    }

    public function update(int $id, array $data): DocumentCategory
    {
        $category = $this->findById($id);

        if (isset($data['parent_id'])) {
            $data['depth'] = $this->calculateDepth($data['parent_id']);
        }

        $category->update($data);
        return $category;
    }

    public function delete(int $id): int
    {
        return DocumentCategory::destroy($id);
    }

    private function calculateDepth(?int $parentId): int
    {
        if (!$parentId) {
            return 0;
        }
        $parent = DocumentCategory::find($parentId);
        return $parent ? $parent->depth + 1 : 0;
    }

    public function getCategoriesArray(): array
    {
        return DocumentCategory::pluck('name', 'id')->toArray();
    }
}
