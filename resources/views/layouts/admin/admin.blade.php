<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href=" {{asset('admin/images/favicon.ico')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{env('APP_NAME')}}</title>
{{--    @vite(['resources/js/app.js'])--}}

    <!-- Vendors Style-->
    <link rel="stylesheet" href=" {{asset('admin/css/vendors_css.css')}}">
    <!-- Style-->
    <link rel="stylesheet" href=" {{asset('admin/css/style.css')}}">
    <link rel="stylesheet" href=" {{asset('admin/css/skin_color.css')}}">

    <link rel="stylesheet" href=" {{asset('admin/css/style.css')}}">
    <link rel="stylesheet" href=" {{asset('admin/css/skin_color.css')}}">
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">

<div class="wrapper">
    <!-- header -->
    @include('layouts.admin.header')

    <!-- Left side column. contains the logo and sidebar -->
    @include('layouts.admin.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
    <!-- footer -->
    @include('layouts.admin.sidebar')
    <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->

    <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->
<!-- Vendor JS -->

<script src="{{asset('admin/js/vendors.min.js')}}"></script>
<script src="{{asset('assets/icons/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('assets/vendor_components/easypiechart/dist/jquery.easypiechart.js')}}"></script>
<script src="{{asset('assets/vendor_components/apexcharts-bundle/irregular-data-series.js')}}"></script>
{{--<script src="{{asset('assets/vendor_components/apexcharts-bundle/dist/apexcharts.js')}}"></script>--}}
<script src="{{ asset('assets/vendor_components/datatable/datatables.min.js') }}"></script>
<script src="{{ asset('admin/js/pages/data-table.js') }}"></script>

{{--<!-- Sunny Admin App -->--}}
<script src="{{asset('admin/js/template.js')}}"></script>
<script src="{{asset('admin/js/pages/dashboard.js')}}"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script type="text/javascript">
    $(function () {
        $(document).on('click', '.delete_row', function (e) {
            e.preventDefault();
            var formId = $(this).data('id');
            Swal.fire({
                title: 'Jesteś pewny?',
                text: "Czy na pewno chcesz usunąć wybrany element",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Tak, usuń',
                cancelButtonText: 'Anuluj',
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Usunięto!',
                        'Wpis został usunięty.',
                        'success'
                    )
                    console.log($("#"+formId));
                    setTimeout(function(){ $("#"+formId).submit(); }, 800);
                }
            });
        });

    });
</script>


</body>
</html>
