<?php

namespace App\Repositories;

use App\Models\TaskComment;
use Illuminate\Database\Eloquent\Collection;
interface TaskCommentRepositoryInterface
{
    public function create(array $data): TaskComment;
    public function getByTaskId(int $taskId): Collection;
}
