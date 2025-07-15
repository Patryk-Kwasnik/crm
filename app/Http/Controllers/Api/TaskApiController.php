<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\TaskRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Enums\TaskPriorityEnum;
use App\Enums\TaskStatusEnum;
use App\Models\User;
class TaskApiController extends Controller
{
    private TaskRepository $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function calendar(): JsonResponse
    {
        $tasks = $this->taskRepository->getForCalendar();

        return response()->json($tasks);
    }

    public function events(Request $request): JsonResponse
    {
        $userId = null;
        if(!auth('admin')) {
            $userId = $request->get('user_id') ?? auth()->id();
            $user = User::findOrFail($userId);
            $this->authorize('viewForUser', $user);
        }
        $events = $this->taskRepository->getForCalendarToday($userId);

        return response()->json($events);
    }

}
