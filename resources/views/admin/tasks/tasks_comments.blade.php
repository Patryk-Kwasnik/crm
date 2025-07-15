<div class="box-content my-4">
    <div class="col-xs-12 col-sm-12 col-md-10">
        <h4>{{ __('tasks.comments') }}</h4>
        @foreach($comments as $comment)
            <div class="box p-2 rounded mb-2">
                <p><strong>{{ $comment->user->name }}</strong> <small>{{ $comment->created_at->diffForHumans() }}</small></p>
                <p class="mb-0">{{ $comment->text }}</p>
            </div>
        @endforeach

        <form method="POST" class="mt-4" action="{{ route('admin.tasks.comments.store', $task->id) }}">
            @csrf
            <div class="form-group">
                <textarea name="text" class="form-control" rows="3" placeholder="{{ __('tasks.add_comment') }}"></textarea>
                <x-input-error field="text" />
            </div>
            <button type="submit" class="btn btn-primary mt-2">{{ __('system.add') }}</button>
        </form>
    </div>
</div>
