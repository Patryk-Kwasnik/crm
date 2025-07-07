@extends('layouts.admin.admin')
@section('content')
    <div class="box-content p-4">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>{{ __('system.edit') }}</h2>
                </div>
                <div class="pull-right p-4">
                    <a class="btn btn-primary" href="{{ route('admin.users.index') }}"> {{ __('system.back') }}</a>
                </div>
            </div>
        </div>
        <x-alert-error :errors="$errors" />
        <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-5">
                    <div class="form-group">
                        <strong>{{ __('users.name') }}:</strong>
                        <input type="text" name="name" placeholder="{{ __('users.name') }}" class="form-control" value="{{ old('name', $user->name) }}">
                        <x-input-error field="name" />
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-5">
                    <div class="form-group">
                        <strong>{{ __('users.email') }}:</strong>
                        <input type="email" name="email" placeholder="Email" class="form-control" value="{{ old('email', $user->email) }}">
                        <x-input-error field="email" />
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-5">
                    <div class="form-group">
                        <strong>{{ __('users.password') }}:</strong>
                        <input type="password" name="password" placeholder="Password" class="form-control">
                        <x-input-error field="password" />
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-5">
                    <div class="form-group">
                        <strong>{{ __('users.confirm_password') }}:</strong>
                        <input type="password" name="confirm-password" placeholder="Confirm Password" class="form-control">
                        <x-input-error field="confirm-password" />
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-5">
                    <div class="form-group">
                        <strong>{{ __('users.roles') }}:</strong>
                        <select name="roles[]" class="form-control" multiple="multiple">
                            @foreach ($roles as $value => $label)
                                <option value="{{ $value }}" {{ in_array($value, old('roles', [])) || isset($userRole[$value]) ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                             @endforeach
                        </select>
                        <x-input-error field="roles" />
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 pull-left">
                    <button type="submit" class="btn btn-primary">{{ __('system.save') }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection
