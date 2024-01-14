@extends('dashboard/master/master')
@section('title', 'الرئيسية')

@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/colors/palette-gradient.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/pages/dashboard-analytics.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/pages/card-analytics.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/plugins/tour/tour.css')}}">
@endsection

@section('content')

    <section id="dashboard-analytics">

    </section>
    <section id="statistics-card">

        <div class="row">

            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card bg-analytics text-white">
                    <div class="card-content">
                        <div class="card-body text-center">
                            <img src="{{asset('app-assets/images/elements/decore-left.png')}}" class="img-left" alt="card-img-left">
                            <img src="{{asset('app-assets/images/elements/decore-right.png')}}" class="img-right" alt="card-img-right">
                            <div class="avatar avatar-xl bg-primary shadow mt-0">
                                <div class="avatar-content">
                                    <i class="feather icon-award white font-large-1"></i>
                                </div>
                            </div>
                            <div class="text-center">
                                <h1 class="mb-2 text-white">مرحبا {{auth()->user()->name}}</h1>
                                <p class="m-auto w-75">Your IP Address <strong class="text-info">{{request()->ip()}}</strong></p>
                                {{-- <p class="m-auto w-75"> تاريخ أخر زيارة لك <strong class="text-info">{{Date::parse(auth()->user()->created_at)->format('h:m / Y-m-d')}}</strong></p> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-md-6 col-sm-12">
                <div class="card" >
                    <div class="card-content">
                        <div class="card-body">
                            {{-- <h4 class="card-title">List Group</h4> --}}
                            {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                the card's content.</p> --}}
                        </div>
                        <ul class="list-group list-group-flush">
                            {{-- <li class="list-group-item">
                                <span class="badge badge-pill bg-primary float-right">{{\App\Models\Customer::count()}}</span>
                                المستخدمين
                            </li> --}}
                            <li class="list-group-item">
                                <span class="badge badge-pill bg-info float-right">{{\App\Models\User::count()}}</span>
                                المديرين
                            </li>
                            <li class="list-group-item">
                                <span class="badge badge-pill bg-success float-right">{{\App\Models\Role::count()}}</span>
                               الصلاحيات
                            </li>
                            <li class="list-group-item">
                                <span class="badge badge-pill bg-danger float-right">{{\Modules\Media\Entities\News::count()}}</span>
                                المقالات
                            </li>
                        </ul>
                        {{-- <div class="card-body">
                            <a href="#" class="card-link">Card link</a>
                            <a href="#" class="card-link">Another link</a>
                        </div> --}}
                    </div>
                </div>
            </div>

        </div>

        <div class="row">


            <div class="col-xl-6 col-md-4 col-sm-6">
                <div class="card text-center">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="avatar bg-rgba-info p-50 m-0 mb-1">
                                <div class="avatar-content">
                                    {{-- <i class="feather icon-user text-info font-medium-5"></i> --}}
                                    <i class="fa fa-plane  text-info font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700">{{\Modules\About\Entities\OurService::count()}}</h2>
                            <p class="mb-0 line-ellipsis">خدمتنا</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-md-4 col-sm-6">
                <div class="card text-center">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="avatar bg-rgba-info p-50 m-0 mb-1">
                                <div class="avatar-content">
                                    {{-- <i class="feather icon-user text-info font-medium-5"></i> --}}
                                    <i class="fa fa-birthday-cake text-warning font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700">{{\Modules\Media\Entities\Gallary::count()}}</h2>
                            <p class="mb-0 line-ellipsis">الاعمال</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
@endsection

@section('vendor-script')
<script src="{{asset('app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/extensions/tether.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/extensions/shepherd.min.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('app-assets/js/scripts/pages/dashboard-analytics.js')}}"></script>
@endsection
