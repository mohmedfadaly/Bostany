@extends('dashboard/master/master')
@section('title', 'المقالات')

@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/colors/palette-gradient.css')}}">
@endsection
@section('content')

    <section id="basic-datatable">

        <div class="card card-primary card-outline">


            <div class="card-body">
                <div class="table-responsive ">

                    <table class="table zero-configuration table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>الصورة</th>
                                <th>العنوان </th>
                                <th> التاريخ</th>
                                <th>الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($news as $key => $value)
                            <tr>
                                <td>
                                    {{$key + 1}}
                                </td>
                                <td> <img src="{{asset('uploads/news/'.$value->image)}}" alt="" style="width: 80px"> </td>
                                <td>{{$value->title}}</td>
                                <td>
                                    <div class="chip chip-primary">
                                        <div class="chip-body">
                                            <div class="chip-text">{{ Date::parse($value->created_at)->diffForHumans() }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="project-actions text-right">
                                    <a href="{{route('news.edit',$value->id)}}" class="btn btn-primary btn-sm " type="submit">  تعديل <i class="fa fa-edit"></i></a>
                                    <a href="{{route('news.delete',$value->id)}}" class="btn btn-danger btn-sm _delete" type="submit">  حذف <i class="fa fa-trash"></i></a>
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
