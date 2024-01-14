@extends('dashboard/auth/master/master')
@section('title', 'تسجيل دخول')

@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/colors/palette-gradient.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/pages/authentication.css')}}">
@endsection

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="row flexbox-container">
                <div class="col-xl-8 col-11 d-flex justify-content-center">
                    <div class="card bg-authentication rounded-0 mb-0">
                        <div class="row m-0">
                            <div class="col-lg-6 col-12 p-0 card rounded-0 mb-0 px-2" >
                                <img src="{{asset('logo.png')}}" style="margin-top:auto;margin-bottom:auto" alt="branding logo">
                            </div>
                            <div class="col-lg-6 col-12 p-0">
                                <div class="card rounded-0 mb-0 px-2" style="width: 100%;eight: 100%;padding: 29px">
                                    <div class="card-header pb-1">
                                        <div class="card-title">
                                            <h4 class="mb-0">قُم بتسجيل الدخول</h4>
                                        </div>
                                    </div>
                                    <p class="px-2">تسجيل الدخول </p>
                                    <div class="card-content">
                                        <div class="card-body pt-1">
                                            <form action="{{route('check_auth')}}" method="POST">
                                                @csrf
                                                <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="user-name" placeholder="Username" required>
                                                    <div class="form-control-position">
                                                        <i class="feather icon-user"></i>
                                                    </div>
                                                    <label for="user-name">البريد الإلكتروني</label>
                                                </fieldset>

                                                <fieldset class="form-label-group position-relative has-icon-left">
                                                    <input type="password" name="password" class="form-control" id="user-password" placeholder="Password" required>
                                                    <div class="form-control-position">
                                                        <i class="feather icon-lock"></i>
                                                    </div>
                                                    <label for="user-password">كلمة المرور</label>
                                                </fieldset>
                                                <div class="form-group d-flex justify-content-between align-items-center">
                                                    <div class="text-left">
                                                        <fieldset class="checkbox">
                                                            <div class="vs-checkbox-con vs-checkbox-primary">
                                                                <input type="checkbox">
                                                                <span class="vs-checkbox">
                                                                    <span class="vs-checkbox--check">
                                                                        <i class="vs-icon feather icon-check"></i>
                                                                    </span>
                                                                </span>
                                                                <span class="">تذكرني</span>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>

                                                <button type="submit" class="btn btn-primary float-right btn-inline">دخول</button>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>

@section('page-script')
@endsection
