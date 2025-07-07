@extends('layouts.admin.admin')
@section('content')
    <div class="box-content p-4">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>{{ __('system.edit') }}</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('admin.roles.index') }}"> {{ __('system.back') }}</a>
                </div>
            </div>
        </div>
        <x-alert-error :errors="$errors" />
        <form method="POST" action="{{ route('admin.roles.update', $role->id) }}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>{{ __('roles.name') }}:</strong>
                        <input type="text" name="name" placeholder="Name" class="form-control" value="{{ old('name', $role->name) }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>{{ __('roles.permission') }}:</strong>
                        <br/>
                        @foreach($permission as $value)
                            <fieldset>
                                <input type="checkbox" id="permission_{{$value->id}}" class="name" name="permission[]" 
                                    value="{{$value->name}}" {{in_array($value->id, $rolePermissions) ? "checked" : false}} >
                                <label for="permission_{{$value->id}}">  {{ __("permissions.$value->name") }}</label>
                            </fieldset>
                        @endforeach
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 pull-left">
                    <button type="submit" class="btn btn-primary">{{ __('system.save') }}</button>
                </div>
            </div>
        </form>
@endsection
