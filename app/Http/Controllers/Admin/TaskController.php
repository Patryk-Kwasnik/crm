<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TaskRequest;
use App\Repositories\TaskCommentRepository;
use App\Repositories\TaskRepository;
use App\Repositories\UserRepository;
use App\Enums\TaskStatusEnum;
use App\Enums\TaskPriorityEnum;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TaskController extends Controller
{
    function __construct(
        protected TaskRepository $taskRepository,
        protected UserRepository $userRepository,
        protected TaskCommentRepository $taskCommentRepository)
    {
        $this->middleware('permission:tasks-list|tasks-create|tasks-edit|tasks-delete', ['only' => ['index','show']]);
        $this->middleware('permission:tasks-create', ['only' => ['create','store']]);
        $this->middleware('permission:tasks-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:tasks-delete', ['only' => ['destroy']]);
    }

    public function index(): View
    {
        $data = $this->taskRepository->getAll();
        return view('admin.tasks.index', compact('data'));
    }

    public function create(): View
    {
        $users = $this->userRepository->getUsersArray();
        $statusList = TaskStatusEnum::getList();
        $priorityList = TaskPriorityEnum::getList();

        return view('admin.tasks.create', compact('users', 'statusList', 'priorityList'));
    }

    public function store(TaskRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['id_author'] = auth()->id();

        $this->taskRepository->create($data);

        return redirect()->route('admin.tasks.index')->with('success', __('system.saved_success'));
    }

    public function show(int $id): View
    {
        $task = $this->taskRepository->findById($id);
        $comments = $this->taskCommentRepository->getByTaskId($id);

        return view('admin.tasks.show', compact('task', 'comments'));
    }

    public function edit(int $id): View
    {
        $task = $this->taskRepository->findById($id);
        $users = $this->userRepository->getUsersArray();
        $statusList = TaskStatusEnum::getList();
        $priorityList = TaskPriorityEnum::getList();
        $comments = $this->taskCommentRepository->getByTaskId($id);

        return view('admin.tasks.edit', compact(
            'task',
            'users',
            'statusList',
            'priorityList',
            'comments')
        );
    }

    public function update(TaskRequest $request, int $id): RedirectResponse
    {
        $this->taskRepository->update($id, $request->validated());
        return redirect()->route('admin.tasks.index')->with('success', __('system.updated_success'));
    }

    public function destroy(int $id): RedirectResponse
    {
        $this->taskRepository->delete($id);
        return redirect()->route('admin.tasks.index')->with('success', __('system.deleted_success'));
    }
}
