@extends('layouts.admin.admin')
@section('content')
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{ __('offers_templates.offers_templates') }} </h3>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary mx-4 my-2" href="{{ route('admin.offers_templates.create') }}"> {{ __('offers_templates.create') }}</a>
                        </div>
                        <div class="box-body">
                           {{-- komunikaty --}}
                           <x-alert-success />
                           {{-- tabela danych --}}
                           <x-admin-table :config="[
                               ['name' => 'id', 'label' =>  __('system.id')],
                               ['name' => 'name', 'label' =>  __('offers_templates.name')],
                               ['name' => 'description', 'label' =>  __('offers_templates.description')],
                               ['name' => 'status_label', 'label' =>  __('offers_templates.status')],
                               ['name' => 'options', 'label' =>  __('system.options')]
                           ]" :data="$data" optionsView="admin.offer_templates.options" />

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
