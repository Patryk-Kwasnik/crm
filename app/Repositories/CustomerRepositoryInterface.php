<?php

namespace App\Repositories;

use Illuminate\Support\Collection;
use App\Models\Customer;
interface CustomerRepositoryInterface
{
    public function all(): Collection;
    public function find(int $id): ?Customer;
    public function create(array $data): Customer;
    public function update(int $id, array $data): bool;
    public function delete(int $id): bool;
}
