<?php

namespace App\Services;

use App\Repositories\CustomerRepositoryInterface;
use Illuminate\Support\Collection;
class CustomerService implements CustomerServiceInterface
{
    public function __construct(
        private readonly CustomerRepositoryInterface $repository
    ) {}

    public function getSelectList(): array
    {
        return $this->repository->all()
            ->mapWithKeys(function ($customer) {
                $label = $customer->company_name;

                if ($customer->name || $customer->surname) {
                    $label .= ' (' . trim("{$customer->name} {$customer->surname}") . ')';
                }

                return [$customer->id => $label];
            })
            ->toArray();
    }
    public function getCustomerTickets(int $customerId): Collection
    {
        $customer = $this->repository->findWithTickets($customerId);
        return $customer ? $customer->tickets : collect();
    }

    public function getCustomerWithOpenOffers(int $customerId): array
    {
        $customer = $this->repository->find($customerId);
        return $customer
            ? $customer->offers()->where('status', 'open')->get()->toArray()
            : [];
    }

    public function getCustomerFinancialSummary(int $customerId): array
    {
        $customer = $this->repository->find($customerId);

        if (! $customer) return [];

        return [
            'total_paid' => $customer->payments()->sum('amount'),
            'last_invoice_date' => $customer->invoices()->latest()->first()?->created_at,
            'open_balance' => $customer->invoices()->where('status', 'unpaid')->sum('amount')
        ];
    }
}
