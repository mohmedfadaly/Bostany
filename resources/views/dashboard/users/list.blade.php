@extends('dashboard/master/master')
@section('title', 'المديرين')

@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/colors/palette-gradient.css')}}">
@endsection
@section('content')
<section id="basic-datatable">

    <div class="card card-primary card-outline">
        <div class="card-header">
        <h3 class="m-0" style="display: inline;">قائمة المديرين</h3>
        </div>

        <div class="card-body">
            <div class="table-responsive ">

                <table class="table zero-configuration table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الصوره</th>
                            <th>الإسم</th>
                            <th>الجوال</th>
                            <th>الصلاحية</th>
                            <th>التاريخ</th>
                            <th>الإجراءات</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $key => $value)
                        <tr>
                            <td>
                                {{$key + 1}}
                            </td>
                            <td><img alt="Avatar" class="table-avatar" src="{{asset('uploads/users/'.$value->avatar)}}" style="border-radius: 50px;width:50px;"></td>
                            <td>{{$value->name}}</td>
                            <td>{{$value->phone}}</td>
                            <td style="width: 9%">{{$value->Role->name}}</td>
                            <td class="project-state">
                                <span class="badge badge-success">{{Date::parse($value->created_at)->diffForHumans()}}</span>
                            </td>

                            <td class="project-actions text-right">
                                <a href="{{route('users.edit',$value->id)}}" class="btn btn-primary btn-sm " type="submit"> <i class="fa fa-edit"></i></a>
                                <a href="{{route('users.delete',$value->id)}}" class="btn btn-danger btn-sm _delete" type="submit">  <i class="fa fa-trash"></i></a>
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
