@extends('dashboard/master/master')
@section('title', 'السيارات')

@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/colors/palette-gradient.css')}}">
@endsection
@section('content')

    <section id="basic-datatable">

        <div class="card card-primary card-outline">
            {{-- <div class="card-header">
            <h3 class="m-0" style="display: inline;">قائمة السيارات</h3>
            </div> --}}

            <div class="card-body">
                <div class="table-responsive ">

                    <table class="table zero-configuration table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>اللوجو</th>
                                <th>إسم الصانع</th>
                                <th>كود الصانع</th>
                                <th>عدد الموديلات</th>
                                <th>الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $key => $value)
                            <tr>
                                <td>
                                    {{$key + 1}}
                                </td>
                                <td> <img src="{{asset('uploads/cars/logo/'.$value->logo)}}" alt="" style="width: 80px"> </td>
                                <td>{{$value->maker_name}}</td>
                                <td>{{$value->maker_code}}</td>
                                <td>{{$value->Models->count()}}</td>
                                <td class="project-actions text-right">
                                    <a href="{{route('cars.edit',$value->maker_code)}}" class="btn btn-primary btn-sm " type="submit">  تعديل <i class="fa fa-edit"></i></a>
                                    <a href="{{route('cars.delete',$value->maker_code)}}" class="btn btn-danger btn-sm _delete" type="submit">  حذف <i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

@endsection
