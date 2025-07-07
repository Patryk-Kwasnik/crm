@extends('layouts.admin.admin')
@section('content')
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{ __('products.all_products') }} </h3>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary mx-4 my-2" href="{{ route('admin.products.create') }}"> {{ __('products.create') }}</a>
                        </div>
                        <div class="box-body">
                            <x-alert-success />
                                <x-admin-table
                                :config="[
                                    ['name' => 'name', 'label' => __('products.name')],
                                    ['name' => 'sku', 'label' => __('products.sku')],
                                    ['name' => 'ean', 'label' => __('products.ean')],
                                    ['name' => 'status', 'label' => __('products.status')],
                                    ['name' => 'category_name', 'label' => __('products.category')],
                                    ['name' => 'options', 'label' => __('system.options'), 'isHtml'=> true]
                                ]"
                                :data="$data"
                                optionsView="admin.products.options"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
