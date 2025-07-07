@extends('layouts.admin.admin')
@section('content')
    <div class="box-content p-4">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>{{ __('categories.create') }}</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('admin.categories.index') }}"> {{ __('system.back') }}</a>
                </div>
            </div>
        </div>
        <x-alert-error :errors="$errors" />
        <form method="POST" action="{{ route('admin.categories.store') }}">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-5">
                    <div class="form-group">
                        <strong>{{ __('categories.name') }}:</strong>
                        <input type="text" name="name" placeholder="Category Name" class="form-control" value="{{ old('name') }}">
                        <x-input-error field="name" />
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-5">
                    <div class="form-group">
                        <strong>{{ __('categories.slug') }}:</strong>
                        <input type="text" name="slug" placeholder="slug" class="form-control"  value="{{ old('slug') }}" >
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-5">
                    <div class="form-group">
                        <strong>{{ __('categories.parent') }}:</strong>
                        <select name="parent_id" class="form-control">
                            <option value="">{{ __('categories.no_parent') }}</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error field="parent_id" />
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-5">
                    <strong>{{ __('categories.status') }}:</strong>
                    <select name="status" id="status" class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}">
                        @foreach(\App\Enums\ActiveStatusEnum::getList() as $value => $label)
                            <option value="{{$value}}">{{$label}}</option>
                        @endforeach
                    </select>
                    <x-input-error field="status" />
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 pull-left">
                    <button type="submit" class="btn btn-primary">{{ __('system.save') }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection
