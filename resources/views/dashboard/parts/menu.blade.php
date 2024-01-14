<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">

            <li class="nav-item mr-auto" style="margin-right: 35px;margin-top: 6px;">
                {{-- <a class="navbar-brand" href="../../../html/rtl/vertical-menu-template-dark/index.html">
                    <div class="brand-logo"></div>
                    <h2 class="brand-text mb-0">Vuexy</h2>
                </a> --}}
                <img src="{{asset('logo.png')}}" alt="" style="width: 115px">

            </li>

            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            {{menu()}}


        </ul>
    </div>
</div>

{{-- {!!menu()!!} --}}
