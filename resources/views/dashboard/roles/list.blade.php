@extends('dashboard/master/master')
@section('title', 'الصلاحيات')

@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/colors/palette-gradient.css')}}">
@endsection
@section('content')
<section id="basic-datatable">

    <div class="card card-primary card-outline">
        <div class="card-header">
        <h3 class="m-0" style="display: inline;">قائمة الصلاحيات</h3>
        </div>

        <div class="card-body">
            <div class="table-responsive">

                <table class="table zero-configuration">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th >إسم الصلاحية</th>
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
                            <td>
                                <a>
                                    {{$value->name}}
                                </a>
                            </td>

                            <td class="project-state">
                                <span class="badge badge-success">{{Date::parse($value->created_at)->diffForHumans()}}</span>
                            </td>

                            <td class="project-actions text-right">
                                <a href="{{route('roles.edit',$value->id)}}" class="btn btn-primary btn-sm " type="submit">  تعديل <i class="fa fa-edit"></i></a>
                                <form action="{{route('roles.delete')}}" method="post" style="display: inline-block;">
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
@endsection
