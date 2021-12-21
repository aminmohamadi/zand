<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
          content="Poco admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
          content="admin template, Poco admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{route('/')}}/assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="{{route('/')}}/assets/images/favicon.png" type="image/x-icon">
    <title>دانشگاه زند - @yield('title')</title>
    @include('layouts.css')
    @yield('style')

</head>

<body class="sidebar-dark" main-theme-layout="rtl">
<!-- Loader ends-->
<!-- page-wrapper Start-->
<div class="page-wrapper">
    <div class="page-wrapper">
        <div class="container-fluid p-0">
            <!-- login page start-->
        @include('sweetalert::alert')

        @yield('content')
        <!-- login page end-->
        </div>
    </div>
</div>
@include('layouts.script')
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

</body>
</html>
