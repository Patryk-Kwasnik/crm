<?php

namespace App\Repositories;

use App\Enums\TaskPriorityEnum;
use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as IlluminateCollection;
use App\Enums\TaskStatusEnum;
use Carbon\Carbon;
class TaskRepository implements TaskRepositoryInterface
{
    public function getAll():Collection
    {
        return Task::all()->map(function ($tasks) {
            $tasks->status_label = TaskStatusEnum::getList($tasks->status);
            $tasks->priority_label = TaskPriorityEnum::getList($tasks->priority);
            return $tasks;
        });
    }

    public function findById(int $id):Task
    {
        return Task::with(['assignedUser', 'author'])->findOrFail($id);
    }
    public function create(array $data):Task
    {
        return Task::create($data);
    }
    public function update(int $id, array $data):Task
    {
        $task = $this->findById($id);
        $task->update($data);
        return $task;
    }
    public function delete(int $id):int
    {
        return Task::destroy($id);
    }
    public function getByAssignedUser(int $userId): Collection
    {
        return Task::where('id_user_assigned', $userId)->get();
    }

    public function getByStatus(int $status): Collection
    {
        return Task::where('status', $status)->get();
    }

    public function countTasks(): int
    {
        // TODO: Implement countTasks() method.
    }

    public function getForCalendar(): array
    {
        return Task::select('id', 'name', 'start_date', 'end_date')
            ->get()
            ->map(function ($task) {
                return [
                    'id' => $task->id,
                    'title' => $task->name,
                    'start' => $task->start_date->toIso8601String(),
                    'end' => $task->end_date->toIso8601String(),
                    'url' => route('admin.tasks.show', $task->id),
                ];
            })
            ->toArray();
    }

    public function getForCalendarToday(?int $userId = null): IlluminateCollection
    {
        $query = Task::with('assignedUser')
            ->whereDate('start_date', Carbon::today());

        if ($userId) {
            $query->where('id_user_assigned', $userId);
        }

        return $query->get()
            ->map(function (Task $task) {
                return [
                    'id' => $task->id,
                    'title' => $task->name,
                    'start' => $task->start_date->toIso8601String(),
                    'end' => $task->end_date->toIso8601String(),
                    'backgroundColor' => $this->getColorByStatus($task->status),
                    'borderColor' => '#ccc',
                    'extendedProps' => [
                        'priority' => $task->priority,
                        'assigned' => $task->assignedUser->name ?? '',
                    ],
                ];
            });
    }
    protected function getColorByStatus(string $status): string
    {
        return match ($status) {
            TaskStatusEnum::NEW => '#17a2b8', // niebieski
            TaskStatusEnum::IN_PROGRESS => '#ffc107', // żółty
            TaskStatusEnum::CLOSED => '#28a745', // zielony
            TaskStatusEnum::CANCELED => '#dc3545', // czerwony
            default => '#6c757d', // szary
        };
    }

}
