<?php

namespace App\Repositories;

use App\Enums\ActiveStatusEnum;
use App\Models\Customer;
use Illuminate\Support\Collection;
class CustomerRepository implements CustomerRepositoryInterface
{
    public function all(): Collection
    {
        return Customer::all()->map(function ($customer) {
            $customer->status_label = ActiveStatusEnum::getList($customer->status);
            return $customer;
        });
    }

    public function find(int $id): ?Customer
    {
        return Customer::find($id);
    }

    public function create(array $data): Customer
    {
        return Customer::create($data);
    }

    public function update(int $id, array $data): bool
    {
        $customer = $this->find($id);
        return $customer ? $customer->update($data) : false;
    }

    public function delete(int $id): bool
    {
        $customer = $this->find($id);
        return $customer ? $customer->delete() : false;
    }
}
