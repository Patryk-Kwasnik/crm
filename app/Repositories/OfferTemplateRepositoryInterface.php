<?php

namespace App\Repositories;

use App\Models\OfferTemplate;
use Illuminate\Support\Collection;
interface OfferTemplateRepositoryInterface
{
    public function all(): Collection;

    public function find(int $id): ?OfferTemplate;

    public function create(array $data): OfferTemplate;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;

    public function getActive(): Collection;
}
