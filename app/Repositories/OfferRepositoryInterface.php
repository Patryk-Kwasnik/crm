<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Offer;
interface OfferRepositoryInterface
{
    public function all(): Collection;
    public function find(int $id): ?Offer;
    public function create(array $data): Offer;
    public function update(int $id_offer, array $data): bool;
    public function delete(Offer $offer): bool;
}
