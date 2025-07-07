<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductCategoryRepository
{
    public function getAll()
    {
        return ProductCategory::get();
    }

    public function getParentCategories($excludeId = null)
    {
        $query = ProductCategory::whereNull('parent_id');

        if ($excludeId) {
            $query->where('id', '!=', $excludeId);
        }

        return $query->orderBy('name')->get();
    }

    public function findById($id)
    {
        return ProductCategory::findOrFail($id);
    }

    public function create(array $data)
    {
        $data['depth'] = $this->calculateDepth($data['parent_id'] ?? null);
        return ProductCategory::create($data);
    }

    public function update($id, array $data)
    {
        $category = $this->findById($id);

        if (isset($data['parent_id'])) {
            $data['depth'] = $this->calculateDepth($data['parent_id']);
        }

        $category->update($data);
        return $category;
    }

    public function delete($id)
    {
        return ProductCategory::destroy($id);
    }

    private function calculateDepth($parentId)
    {
        if (!$parentId) {
            return 0;
        }
        $parent = ProductCategory::find($parentId);
        return $parent ? $parent->depth + 1 : 0;
    }

    public function getCategoriesArray():Array
    {
        return ProductCategory::pluck('name', 'id')->toArray();
    }
}
