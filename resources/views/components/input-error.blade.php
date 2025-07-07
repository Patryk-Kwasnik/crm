@if ($errors->has($field))
    <div class="text-danger">
        @foreach ($errors->get($field) as $message)
            <p>{{ $message }}</p>
        @endforeach
    </div>
@endif
