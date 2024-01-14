<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>@yield('title') - لوحة التحكم</title>
    <link rel="apple-touch-icon" href="{{asset('logo.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('logo.png')}}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
    @include('dashboard.parts.style')
    
</head>
<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern dark-layout 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="dark-layout">

    <!-- BEGIN: Header-->
    @include('dashboard.parts.header')
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    @include('dashboard.parts.menu')
    <!-- END: Main Menu-->



    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-wrapper">
        @include('dashboard.parts.breadcrumbs')

      {{-- loading --}}
      <div class="loading">
        <i class="fa fa-spinner fa-pulse text-primary" style="font-size: 60px"></i>
        <h4>جاري تحميل البيانات</h4>
      </div>

        <div class="content-body real_content" style="display: none">
          @yield('content')
        </div>
      </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    @include('dashboard.parts.footer')
    <!-- END: Footer-->

    @include('dashboard.parts.script')
</body>
<!-- END: Body-->
</html>

