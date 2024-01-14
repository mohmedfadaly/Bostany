@extends('dashboard/master/master')
@section('title', 'الحجزات')

@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/colors/palette-gradient.css')}}">
@endsection
@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
            <div class="content-wrapper">

                @include('dashboard.parts.breadcrumbs')

                <div class="content-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <section id="basic-datatable">

                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                    <h3 class="m-0" style="display: inline;">قائمة الحجزات</h3>
                                    </div>

                                    <div class="card-body">
                                        <div class="table-responsive">

                                            <table class="table zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>الإسم</th>
                                                        <th>الجوال</th>
                                                        <th>الجنس</th>
                                                        <th>التاريخ</th>
                                                        <th>النوع</th>

                                                        <th>الإجراءات</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($data as $key => $value)
                                                    <tr>
                                                        <td>
                                                            {{$key + 1}}
                                                        </td>
                                                        <td>{{$value->Patient->patient_name}}</td>
                                                        <td>{{$value->Patient->patient_phone}}</td>
                                                        <td style="width: 9%">@if($value->Patient->gender == 1)<span class=" badge badge-success">ذكر</span>@else<span class=" badge badge-danger">أنثي</span>@endif</td>
                                                        <td style="width: 9%">@if($value->type == 1)<span class=" badge badge-success">كشف</span>@else<span class=" badge badge-danger">إعادة</span>@endif</td>
                                                        <td class="project-state">
                                                            <span class="badge badge-success">{{Date::parse($value->created_at)->diffForHumans()}}</span>
                                                        </td>

                                                        <td class="project-actions text-right">
                                                            @if(in_array('clinic.addstatements',json_decode(auth()->user()->Role->routes)))

                                                            <a href="{{route('clinic.addstatements',$value->id)}}" class="btn btn-primary btn-sm " type="submit">  كشف <i class="fa fa-edit"></i></a>

                                                            @endif

                                                            <form action="{{route('clinic.deletechecks')}}" method="post" style="display: inline-block;">
                                                                {{csrf_field()}}
                                                                <input type="hidden" name="id" value="{{$value->id}}">
                                                                <button class="btn btn-danger btn-sm delete" type="submit">  حذف <i class="fa fa-trash"></i></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
