@extends('layouts.admin.admin')

@section('content')
    <div class="box-content p-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>{{ __('tasks.show') }}</h2>
            <a class="btn btn-primary" href="{{ route('admin.tasks.index') }}">{{ __('system.back') }}</a>
        </div>

        <div class="row">
            <div class="col-md-6">
                <strong>{{ __('tasks.nr') }}:</strong>
                <p>{{ $task->nr }}</p>
            </div>
            <div class="col-md-6">
                <strong>{{ __('tasks.name') }}:</strong>
                <p>{{ $task->name }}</p>
            </div>
            <div class="col-md-12">
                <strong>{{ __('tasks.text') }}:</strong>
                <p>{{ $task->text }}</p>
            </div>
            <div class="col-md-6">
                <strong>{{ __('tasks.status') }}:</strong>
                <p>{{ \App\Enums\TaskStatusEnum::getList($task->status) }}</p>
            </div>
            <div class="col-md-6">
                <strong>{{ __('tasks.priority') }}:</strong>
                <p>{{ \App\Enums\TaskPriorityEnum::getList($task->priority) }}</p>
            </div>
            <div class="col-md-6">
                <strong>{{ __('tasks.start_date') }}:</strong>
                <p>{{ $task->start_date }}</p>
            </div>
            <div class="col-md-6">
                <strong>{{ __('tasks.end_date') }}:</strong>
                <p>{{ $task->end_date }}</p>
            </div>
            <div class="col-md-6">
                <strong>{{ __('tasks.execution_time') }}:</strong>
                <p>{{ $task->execution_time }} h</p>
            </div>
            <div class="col-md-6">
                <strong>{{ __('tasks.assigned') }}:</strong>
                <p>{{ $task->assignedUser->name ?? '-' }}</p>
            </div>
            <div class="col-md-6">
                <strong>{{ __('tasks.author') }}:</strong>
                <p>{{ $task->author->name ?? '-' }}</p>
            </div>
        </div>
    </div>
    @include('admin.tasks.tasks_comments')
@endsection
