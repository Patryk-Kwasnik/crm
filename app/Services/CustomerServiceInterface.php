<?php

namespace App\Services;

use Illuminate\Support\Collection;

interface CustomerServiceInterface
{
    public function getSelectList(): array;
    public function getCustomerTickets(int $customerId): Collection;
    public function getCustomerWithOpenOffers(int $customerId): array;
    public function getCustomerFinancialSummary(int $customerId): array;
}
