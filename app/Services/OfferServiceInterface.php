<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Offer;

interface OfferServiceInterface
{
    public function all(): Collection;

    public function find(int $id): Offer;

}

