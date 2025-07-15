<?php

namespace App\Repositories;

use App\Models\NewsCategory;
use App\Enums\ActiveStatusEnum;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class NewsCategoryRepository implements NewsCategoryRepositoryInterface
{
    public function getAll():Collection
    {
        return NewsCategory::all()->map(function ($news) {
            $news->status_label = ActiveStatusEnum::getList($news->status);
            return $news;
        });
    }

    public function getParentCategories(int $excludeId = null): Collection
    {
        $query = NewsCategory::whereNull('parent_id');

        if ($excludeId) {
            $query->where('id', '!=', $excludeId);
        }

        return $query->orderBy('name')->get();
    }

    public function findById(int $id):NewsCategory
    {
        return NewsCategory::findOrFail($id);
    }

    public function create(array $data): NewsCategory
    {
        $data['depth'] = $this->calculateDepth($data['parent_id'] ?? null);
        return NewsCategory::create($data);
    }

    public function update(int $id, array $data): NewsCategory
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
        return NewsCategory::destroy($id);
    }

    private function calculateDepth(?int $parentId): int
    {
        if (!$parentId) {
            return 0;
        }
        $parent = NewsCategory::find($parentId);
        return $parent ? $parent->depth + 1 : 0;
    }

    public function getCategoriesArray(): array
    {
        return NewsCategory::pluck('name', 'id')->toArray();
    }
}
