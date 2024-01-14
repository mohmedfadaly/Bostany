    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/vendors-rtl.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/themes/semi-dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/extensions/sweetalert2.min.css')}}">

    <!-- BEGIN: Page CSS-->
    @yield('page-style')
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/custom-rtl.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style-rtl.css')}}">
    <!-- END: Custom CSS-->
    <style>
        @font-face {
            font-family: "Cairo-Light-Ar";
            src: url({{asset('app-assets/fonts/Cairo-Regular.ttf')}});
        }
        body{
            font-family: Cairo-Light-Ar;
        }
        .navigation {
            font-family: Cairo-Light-Ar;
        }
        .breadcrumb {
            font-family: Cairo-Light-Ar;
        }
    </style>
