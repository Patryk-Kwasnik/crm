<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Collection;

class UserRepository implements UserRepositoryInterface
{
    public function getAll(): Collection
    {
        return User::all();
    }

    /**
     * Zwraca tablicę użytkowników w formacie [id => name], np. do selecta.
     */
    public function getUsersArray(): array
    {
        return User::orderBy('name')->pluck('name', 'id')->toArray();
    }

    public function findById(int $id): User
    {
        return User::findOrFail($id);
    }
}
