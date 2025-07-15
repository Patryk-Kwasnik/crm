<?php

namespace App\Repositories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as IlluminateCollection;

interface TaskRepositoryInterface
{
    public function getAll(): Collection;
    public function findById(int $id):Task;
    public function create(array $data):Task;
    public function update(int $id, array $data):Task;
    public function delete(int $id):int;
    public function countTasks(): int;
    public function getByAssignedUser(int $userId): Collection;
    public function getByStatus(int $status): Collection;
    public function getForCalendar(): array;
    public function getForCalendarToday(): IlluminateCollection;
}
