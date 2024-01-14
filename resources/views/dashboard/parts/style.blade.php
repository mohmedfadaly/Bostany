    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/vendors-rtl.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/charts/apexcharts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/extensions/tether-theme-arrows.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/extensions/tether.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/extensions/shepherd-theme-default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/extensions/sweetalert2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/extensions/toastr.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/menu/menu-types/horizontal-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/plugins/forms/wizard.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/select/select2.min.css')}}">

    @yield('vendor-style')
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/themes/semi-dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/pickers/pickadate/pickadate.css')}}">

    <!-- BEGIN: Page CSS-->

    @yield('page-style')
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/custom-rtl.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style-rtl.css')}}">
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
        .header-navbar .navbar-container ul.nav li.dropdown-user .dropdown-menu-right .dropdown-item{
            font-family: Cairo-Light-Ar;

        }
        .header-navbar .navbar-container ul.nav li a.dropdown-user-link .user-status{
            font-family: Cairo-Light-Ar;

        }

        .loading{
            width: 200px;
            height: 120px;
            margin: 10% auto;
            background: rgb(15 22 58);
            display: block;
            text-align: center;
            padding-top: 10px;
            padding-top: 15px;
            border-radius: 20px;
        }

        .select2-container--classic .select2-selection--multiple .select2-selection__choice, .select2-container--default .select2-selection--multiple .select2-selection__choice
        {
            padding: 0
        }

        .add_new{
            float: right;
            margin-left:5px
        }
    </style>
    <!-- END: Custom CSS-->
