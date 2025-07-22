@extends('layouts.admin.admin')
@section('content')
    <div class="box-content p-4">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>{{ __('documents.create') }}</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('admin.documents.index') }}"> {{ __('system.back') }}</a>
                </div>
            </div>
        </div>
        <x-alert-error :errors="$errors" />
        <form id="document-upload-form" action="{{ route('admin.documents.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">{{ __('documents.name') }}</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">{{ __('documents.category') }}</label>
                <select name="category_id" id="category_id" class="form-select" required>
                    <option value="">-- wybierz --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ str_repeat('— ', $category->depth) . $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="files" class="form-label">{{ __('documents.files') }}</label>
                <input type="file" name="files[]" id="files" class="form-control" multiple required>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="status" name="status" value="1" checked>
                <label class="form-check-label" for="status">{{ __('system.active') }}</label>
            </div>

            <div id="progress-wrapper" class="progress mt-3 d-none">
                <div id="upload-progress" class="progress-bar" role="progressbar" style="width: 0%">0%</div>
            </div>

            <button type="submit" class="btn btn-primary">{{ __('system.save') }}</button>
        </form>
    </div>
    @vite(['resources/js/admin/documents.js'])
@endsection
