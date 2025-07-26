@extends('layouts.admin.admin')
@section('content')
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{ __('customers.customers') }} </h3>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary mx-4 my-2" href="{{ route('admin.customers.create') }}"> {{ __('customers.create') }}</a>
                        </div>
                        <div class="box-body">
                           {{-- komunikaty --}}
                           <x-alert-success />
                           {{-- tabela danych --}}
                           <x-admin-table :config="[
                               ['name' => 'id', 'label' =>  __('system.id')],
                               ['name' => 'last_name', 'label' =>  __('customers.last_name')],
                               ['name' => 'company_name', 'label' =>  __('customers.company_name')],
                               ['name' => 'tax_number', 'label' =>  __('customers.tax_number')],
                               ['name' => 'phone', 'label' =>  __('customers.phone')],
                               ['name' => 'email', 'label' =>  __('customers.email')],
                               ['name' => 'status', 'label' =>  __('customers.status')],
                               ['name' => 'options', 'label' =>  __('system.options')]
                           ]" :data="$data" optionsView="admin.customers.options" />

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
