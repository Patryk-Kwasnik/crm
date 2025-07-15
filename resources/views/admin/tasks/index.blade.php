@extends('layouts.admin.admin')
@section('content')
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{ __('tasks.tasks') }} </h3>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary mx-4 my-2" href="{{ route('admin.tasks.create') }}"> {{ __('system.create') }}</a>
                        </div>
                        <div class="box-body">
                            {{-- komunikaty --}}
                            <x-alert-success />
                            {{-- tabela danych --}}
                            <x-admin-table :config="[
                               ['name' => 'id', 'label' =>  __('system.id')],
                               ['name' => 'nr', 'label' =>  __('tasks.nr')],
                               ['name' => 'name', 'label' =>  __('tasks.name')],
                               ['name' => 'status_label', 'label' =>  __('tasks.status')],
                               ['name' => 'priority_label', 'label' =>  __('tasks.priority')],
                               ['name' => 'assigned', 'label' =>  __('tasks.assigned')],
                               ['name' => 'options', 'label' =>  __('system.options')]
                           ]" :data="$data" optionsView="admin.tasks.options" />

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
