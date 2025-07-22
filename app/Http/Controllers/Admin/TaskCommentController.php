<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TaskCommentRequest;
use App\Models\Task;
use App\Repositories\TaskCommentRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class TaskCommentController extends Controller
{

    public function __construct(protected TaskCommentRepositoryInterface $taskCommentRepository)
    {
    }

    public function store(TaskCommentRequest $request, Task $task)
    {
        $this->taskCommentRepository->create([
            'task_id' => $task->id,
            'user_id' => Auth::id(),
            'text' => $request->input('text'),
        ]);

        return redirect()
            ->route('admin.tasks.show', $task->id)
            ->with('success', __('tasks.comment_added'));
    }
}
