<?php

namespace App\Repositories;
use App\Models\News;
use Illuminate\Database\Eloquent\Collection;

interface NewsRepositoryInterface
{
    public function getAll(): Collection;
    public function findById(int $id):News;
    public function create(array $data):News;
    public function update(int $id, array $data):News;
    public function delete(int $id):int;
    public function getLatest(int $limit = 3):Collection;
}
