@extends('layouts.admin.admin')
@section('content')
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{ __('offers.offers') }} </h3>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary mx-4 my-2" href="{{ route('admin.offers.create') }}"> {{ __('offers.create') }}</a>
                        </div>
                        <div class="box-body">
                           {{-- komunikaty --}}
                           <x-alert-success />
                           {{-- tabela danych --}}
                           <x-admin-table :config="[
                               ['name' => 'id', 'label' =>  __('system.id')],
                               ['name' => 'title', 'label' =>  __('offers.title')],
                               ['name' => 'customer_email', 'label' =>  __('offers.customer_email')],
                               ['name' => 'customer_phone', 'label' =>  __('offers.customer_phone')],
                               ['name' => 'total_amount', 'label' =>  __('offers.total_amount')],
                               ['name' => 'valid_until', 'label' =>  __('offers.valid_until')],
                               ['name' => 'status_label', 'label' =>  __('offers.status')],
                               ['name' => 'options', 'label' =>  __('system.options')]
                           ]" :data="$data" optionsView="admin.offers.options" />

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
