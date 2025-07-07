@extends('layouts.admin.admin')
@section('content')
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{ __('users.all_users') }} </h3>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary mx-4 my-2" href="{{ route('admin.users.create') }}"> {{ __('users.create') }}</a>
                        </div>
                        <div class="box-body">
                            <x-alert-success />
                                <x-admin-table 
                                :config="[
                                    ['name' => 'name', 'label' => __('users.user')],
                                    ['name' => 'email', 'label' => __('users.email')],
                                    ['name' => 'roles', 'label' => __('users.roles')],
                                    ['name' => 'options', 'label' => __('system.options'), 'isHtml'=> true]
                                ]" 
                                :data="$data"
                                optionsView="admin.users.options"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    {!! $data->render() !!}
@endsection
