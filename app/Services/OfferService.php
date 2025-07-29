<?php

namespace App\Services;

use App\Models\Offer;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\OfferRepositoryInterface;
use App\Services\OfferServiceInterface;

class OfferService implements OfferServiceInterface
{
    public function __construct(
        protected OfferRepositoryInterface $offerRepository
    ) {}

    public function all(): Collection
    {
        return $this->offerRepository->all();
    }

    public function find(int $id): Offer
    {
        return $this->offerRepository->find($id);
    }
}
