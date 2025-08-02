<?php

namespace App\Services;

use App\Models\OfferTemplate;
use App\Repositories\OfferTemplateRepositoryInterface;
use App\Services\OfferTemplateServiceInterface;
use Illuminate\Database\Eloquent\Collection;

class OfferTemplateService implements OfferTemplateServiceInterface
{
    public function __construct(
        protected OfferTemplateRepositoryInterface $repository
    ) {}

    public function all(): Collection
    {
        return $this->repository->all();
    }

    public function find(int $id): OfferTemplate
    {
        return $this->repository->find($id);
    }

    public function create(array $data): OfferTemplate
    {
        $data['created_by'] = auth('admin')->id();
        return $this->repository->create($data);
    }

    public function update(OfferTemplate $template, array $data): OfferTemplate
    {
        return $this->repository->update($template->id, $data);
    }

    public function delete(int $template): bool
    {
        return $this->repository->delete($template);
    }
}
