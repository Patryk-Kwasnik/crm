<?php

namespace App\Repositories;

interface ProductCategoryRepositoryInterface
{
    public function getAll();
    public function getParentCategories($excludeId = null);
    public function findById($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}
