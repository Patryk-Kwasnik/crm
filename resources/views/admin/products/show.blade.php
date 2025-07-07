@extends('layouts.admin.admin')
@section('content')
    <div class="box-content p-4">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2> {{ __('products.product_preview') }}</h2>
                </div>
                <div class="pull-right p-4">
                    <a class="btn btn-primary" href="{{ route('admin.products.index') }}"> {{ __('system.back') }}</a>
                </div>
            </div>
        </div>
        <div class="box p-4">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-5">
                    <div class="form-group">
                        <strong>{{ __('products.name') }}:</strong>
                        {{ $product->name }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-5">
                    <div class="form-group">
                        <strong>{{ __('products.slug') }}:</strong>
                        {{ $product->slug }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-5">
                    <div class="form-group">
                        <strong>{{ __('products.sku') }}:</strong>
                        {{ $product->sku }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-5">
                    <div class="form-group">
                        <strong>{{ __('products.ean') }}:</strong>
                        {{ $product->ean }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-5">
                    <div class="form-group">
                        <strong>{{ __('products.category') }}:</strong>
                        {{ $product->category->name ?? __('system.not_assigned') }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-5">
                    <div class="form-group">
                        <strong>{{ __('products.status') }}:</strong>
                        {{ \App\Enums\ActiveStatusEnum::getList($product->status) }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>{{ __('products.description') }}:</strong>
                        {{ $product->description }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection