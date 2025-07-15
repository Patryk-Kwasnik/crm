<?php

namespace App\Repositories;

use App\Models\TaskComment;
use Illuminate\Database\Eloquent\Collection;

class TaskCommentRepository implements TaskCommentRepositoryInterface
{
    public function create(array $data): TaskComment
    {
        return TaskComment::create($data);
    }

    public function getByTaskId(int $taskId): Collection
    {
        return TaskComment::where('task_id', $taskId)->with('user')->latest()->get();
    }
}
