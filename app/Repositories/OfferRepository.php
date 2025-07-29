<?php

namespace App\Repositories;

use App\Models\Offer;
use App\Repositories\OfferRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class OfferRepository implements OfferRepositoryInterface
{
    public function all(): Collection
    {
        return Offer::with('customer')->orderByDesc('created_at')->get();
    }

    public function find(int $id): ?Offer
    {
        return Offer::with('customer')->find($id);
    }

    public function create(array $data): Offer
    {
        return Offer::create($data);
    }

    public function update(int $id_offer, array $data): bool
    {
        $offer = $this->find($id_offer);
        return $offer->update($data);
    }

    public function delete(Offer $offer): bool
    {
        return $offer->delete();
    }
}
