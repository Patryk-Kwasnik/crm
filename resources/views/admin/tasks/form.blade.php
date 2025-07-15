@php
    $editing = isset($task);
@endphp

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-5">
        <div class="form-group">
            <label><strong>{{ __('tasks.name') }}</strong></label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $task->name ?? '') }}">
            <x-input-error field="name" />
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-10">
        <div class="form-group">
            <label><strong>{{ __('tasks.text') }}</strong></label>
            <textarea name="text" class="form-control">{{ old('text', $task->text ?? '') }}</textarea>
            <x-input-error field="text" />
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-5">
        <div class="form-group">
            <label><strong>{{ __('tasks.status') }}</strong></label>
            <select name="status" class="form-control">
                @foreach(\App\Enums\TaskStatusEnum::getList() as $value => $label)
                    <option value="{{ $value }}" {{ old('status', $task->status ?? '') == $value ? 'selected' : '' }}>{{ $label }}</option>
                @endforeach
            </select>
            <x-input-error field="status" />
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-5">
        <div class="form-group">
            <label><strong>{{ __('tasks.priority') }}</strong></label>
            <select name="priority" class="form-control">
                @foreach(\App\Enums\TaskPriorityEnum::getList() as $value => $label)
                    <option value="{{ $value }}" {{ old('priority', $task->priority ?? '') == $value ? 'selected' : '' }}>{{ $label }}</option>
                @endforeach
            </select>
            <x-input-error field="priority" />
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-5">
        <div class="form-group">
            <label><strong>{{ __('tasks.start_date') }}</strong></label>
            <input type="datetime-local" name="start_date" class="form-control" value="{{ old('start_date', isset($task) ? \Carbon\Carbon::parse($task->start_date)->format('Y-m-d\TH:i') : '') }}">
            <x-input-error field="start_date" />
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-5">
        <div class="form-group">
            <label><strong>{{ __('tasks.end_date') }}</strong></label>
            <input type="datetime-local" name="end_date" class="form-control" value="{{ old('end_date', isset($task) ? \Carbon\Carbon::parse($task->end_date)->format('Y-m-d\TH:i') : '') }}">
            <x-input-error field="end_date" />
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-5">
        <div class="form-group">
            <label><strong>{{ __('tasks.execution_time') }} (h)</strong></label>
            <input type="number" step="0.1" name="execution_time" class="form-control" value="{{ old('execution_time', $task->execution_time ?? '') }}">
            <x-input-error field="execution_time" />
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-5">
        <div class="form-group">
            <label><strong>{{ __('tasks.assigned') }}</strong></label>
            <select name="id_user_assigned" class="form-control">
                <option value="">{{ __('system.select') }}</option>
                @foreach($users as $id => $user)
                    <option value="{{ $id }}" {{ old('id_user_assigned', $task->id_user_assigned ?? '') == $id ? 'selected' : '' }}>
                        {{ $user }}
                    </option>
                @endforeach
            </select>
            <x-input-error field="id_user_assigned" />
        </div>
    </div>
</div>
