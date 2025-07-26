@extends('layouts.admin.admin')

@section('content')
    <div class="box-content p-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>{{ __('customers.create') }}</h2>
            <a class="btn btn-primary" href="{{ route('admin.customers.index') }}">{{ __('system.back') }}</a>
        </div>

        <x-alert-error :errors="$errors" />

        <form method="POST" action="{{ route('admin.customers.store') }}">
            @csrf
            @include('admin.customers.form')
            <button type="submit" class="btn btn-primary mt-4">{{ __('system.save') }}</button>
        </form>
    </div>
@endsection
