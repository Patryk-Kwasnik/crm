<?php

namespace App\Repositories;
use App\Models\NewsCategory;
use Illuminate\Database\Eloquent\Collection;

interface NewsCategoryRepositoryInterface
{
    public function getAll(): Collection;
    public function getParentCategories(int $excludeId = null): Collection;
    public function findById(int $id):NewsCategory;
    public function create(array $data):NewsCategory;
    public function update(int $id, array $data):NewsCategory;
    public function delete(int $id):int;
}
