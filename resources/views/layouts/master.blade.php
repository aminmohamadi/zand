<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
          content="Poco admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
          content="admin template, Poco admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="AminMohamadi">
    <link rel="icon" href="{{route('/')}}/assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="{{route('/')}}/assets/images/favicon.png" type="image/x-icon">
    <title>دانشگاه زند - @yield('title')</title>
    @include('layouts.css')
    @yield('style')

</head>
<body class="sidebar-dark" main-theme-layout="rtl">
@include('sweetalert::alert')

<!-- Loader ends-->
<!-- page-wrapper Start-->
<div class="page-wrapper">
    <!-- Page Header Start-->
@include('layouts.header')
<!-- Page Header Ends                              -->
    <!-- Page Body Start-->
    <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        @include('layouts.sidebar')

        <div class="page-body">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6 main-header">
                            @yield('breadcrumb-title')
                            <h6 class="mb-0">پنل مدیریت</h6>
                        </div>
                        <div class="col-lg-6 breadcrumb-right">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="../ltr/index.html"><i class="pe-7s-home"></i></a>
                                </li>
                                @yield('breadcrumb-items')
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid starts-->
        @yield('content')
        <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
        @include('layouts.footer')
    </div>
</div>
@include('layouts.script')
@include('sweetalert::alert', [public_path('/js/vendor/sweetalert/sweetalert.all.js')])
<script>
    $(document).ready(function () {
        $(".logout").on("click", function () {
            $('#logout').submit();
        });
        $('.simple-ajax-modal').magnificPopup({
            type: 'ajax'
        });
        $('#deleteItem').on('show.bs.modal', function (event) {

            let button = $(event.relatedTarget)
            let target = $(event.delegateTarget)
            let action = button.data('action')
            let method = button.data('method')
            $('#deleteItem').on('click', '#modal-confirm', function (e) {
                $.ajax({
                    type: method,
                    url: action,
                    data: {
                        "_token": $('#csrf-token')[0].content  //pass the CSRF_TOKEN()
                    },
                    success: function(response) {
                        target.modal('hide');
                        window.location.href = response;
                    }
                })
            });


        })
    });
</script>
</body>
</html>
