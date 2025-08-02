<?php

namespace App\Repositories;

use App\Models\OfferTemplate;
use App\Repositories\OfferTemplateRepositoryInterface;
use Illuminate\Support\Collection;
class OfferTemplateRepository implements OfferTemplateRepositoryInterface
{
    public function all(): Collection
    {
        return OfferTemplate::orderByDesc('created_at')->get();
    }

    public function find(int $id): ?OfferTemplate
    {
        return OfferTemplate::find($id);
    }

    public function create(array $data): OfferTemplate
    {
        return OfferTemplate::create($data);
    }

    public function update(int $id, array $data): bool
    {
        $template = $this->find($id);
        return $template ? $template->update($data) : false;
    }

    public function delete(int $id): bool
    {
        $template = $this->find($id);
        return $template ? $template->delete() : false;
    }

    public function getActive(): Collection
    {
        return OfferTemplate::where('status', true)->get();
    }
}
