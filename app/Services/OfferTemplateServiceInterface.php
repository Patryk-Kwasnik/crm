<?php

namespace App\Services;

use App\Models\OfferTemplate;
use Illuminate\Database\Eloquent\Collection;

interface OfferTemplateServiceInterface
{
    public function all(): Collection;
    public function find(int $id): OfferTemplate;
    public function create(array $data): OfferTemplate;
    public function update(OfferTemplate $template, array $data): OfferTemplate;
    public function delete(int $template): bool;
}
