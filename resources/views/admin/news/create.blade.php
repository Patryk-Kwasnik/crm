@extends('layouts.admin.admin')
@section('content')
    <div class="box-content p-4">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>{{ __('news.create') }}</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('admin.news.index') }}"> {{ __('system.back') }}</a>
                </div>
            </div>
        </div>
        <x-alert-error :errors="$errors" />
        <form method="POST" action="{{ route('admin.news.store') }}">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-5">
                    <div class="form-group">
                        <strong>{{ __('news.name') }}:</strong>
                        <input type="text" name="title" placeholder="{{ __('news.name') }}" class="form-control" value="{{ old('title') }}">
                        <x-input-error field="title" />
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-5">
                    <div class="form-group">
                        <strong>{{ __('news.slug') }}:</strong>
                        <input type="text" name="slug" placeholder="slug" class="form-control"  value="{{ old('slug') }}" >
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-5">
                    <div class="form-group">
                        <strong>{{ __('news.category') }}:</strong>
                        <select name="category_id" class="form-control">
                            <option value="">{{ __('system.select') }}</option>
                            @foreach($news_categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error field="category_id" />
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-5">
                    <strong>{{ __('news.status') }}:</strong>
                    <select name="status" id="status" class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}">
                        @foreach(\App\Enums\ActiveStatusEnum::getList() as $value => $label)
                            <option value="{{$value}}">{{$label}}</option>
                        @endforeach
                    </select>
                    <x-input-error field="status" />
                </div>
                <div class="col-xs-12 col-sm-12 col-md-5">
                    <strong>{{ __('news.text') }}:</strong>
                    <textarea class="form-control"  name="text" id="text"></textarea>
                    <x-input-error field="text" />
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 pull-left mt-4">
                    <button type="submit" class="btn btn-primary">{{ __('system.save') }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection
