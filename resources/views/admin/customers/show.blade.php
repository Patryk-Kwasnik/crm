@extends('layouts.admin.admin')

@section('content')
    <div class="box-content p-4">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-between align-items-center mb-4">
                <h2>{{ __('news.preview') }}</h2>
                <a class="btn btn-primary" href="{{ route('admin.news.index') }}"> {{ __('system.back') }}</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <strong>{{ __('news.name') }}:</strong>
                <div class="form-control-plaintext">{{ $news->title }}</div>
            </div>

            <div class="col-md-6 mb-3">
                <strong>{{ __('news.slug') }}:</strong>
                <div class="form-control-plaintext">{{ $news->slug }}</div>
            </div>

            <div class="col-md-6 mb-3">
                <strong>{{ __('news.parent') }}:</strong>
                <div class="form-control-plaintext">
                    {{ optional($news->category)->name ?? __('news.no_parent') }}
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <strong>{{ __('news.status') }}:</strong>
                <div class="form-control-plaintext">
                    {{ \App\Enums\ActiveStatusEnum::getList($news->status) }}
                </div>
            </div>

            <div class="col-md-12 mb-3">
                <strong>{{ __('news.text') }}:</strong>
                <div class="form-control-plaintext">{!! nl2br(e($news->text)) !!}</div>
            </div>
        </div>
    </div>
@endsection
