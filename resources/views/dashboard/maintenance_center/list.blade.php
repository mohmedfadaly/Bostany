@extends('dashboard/master/master')
@section('title', 'مراكز الصيانة')

@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/colors/palette-gradient.css')}}">
@endsection
@section('content')

    <section id="basic-datatable">

        <div class="card card-primary card-outline">
            {{-- <div class="card-header">
            <h3 class="m-0" style="display: inline;">مراكز الصيانة</h3>
            </div> --}}

            <div class="card-body">
                <div class="table-responsive ">

                    <table class="table zero-configuration table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>الشعار</th>
                                <th>الإسم</th>
                                <th>المدينة</th>
                                <th>العنوان</th>
                                <th>الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $key => $value)
                            <tr>
                                <td>
                                    {{$key + 1}}
                                </td>
                                <td><img src="{{asset('uploads/maintenance_centers/'.$value->logo)}}" style="width:80px" alt=""></td>
                                <td>{{$value->name_ar}}</td>
                                <td>{{$value->City->title}}</td>
                                <td>{{str()->limit($value->address,20)}}</td>
                                <td class="project-actions text-right">
                                    <a href="{{route('maintenance_center.edit',$value->id)}}" class="btn btn-primary btn-sm " type="submit">  تعديل <i class="fa fa-edit"></i></a>
                                    <a href="{{route('maintenance_center.delete',$value->id)}}" class="btn btn-danger btn-sm _delete" type="submit">  حذف <i class="fa fa-trash"></i></a>
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
