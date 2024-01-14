@extends('dashboard/master/master')
@section('title', 'تعديل متستخدم')

@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/colors/palette-gradient.css')}}">
@endsection
@section('content')
<section id="page-account-settings">
    <div class="row">
        <!-- left menu section -->
        <div class="col-md-3 mb-2 mb-md-0">
            <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                <li class="nav-item">
                    <a class="nav-link d-flex py-75 active" id="account-pill-general" data-toggle="pill" href="#account-vertical-general" aria-expanded="true">
                        <i class="fa fa-info-circle mr-50 font-medium-3"></i>
                        المعلومات الأساسية
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link d-flex py-75" id="account-pill-social" data-toggle="pill" href="#account-vertical-social" aria-expanded="false">
                        <i class="fa fa-car mr-50 font-medium-3"></i>
                        السيارات
                    </a>
                </li>

                {{-- <li class="nav-item">
                    <a class="nav-link d-flex py-75" id="account-pill-password" data-toggle="pill" href="#account-vertical-password" aria-expanded="false">
                        <i class="feather icon-lock mr-50 font-medium-3"></i>
                        تغير كلمة المرور
                    </a>
                </li>
              
                <li class="nav-item">
                    <a class="nav-link d-flex py-75" id="account-pill-info" data-toggle="pill" href="#account-vertical-info" aria-expanded="false">
                        <i class="feather icon-info mr-50 font-medium-3"></i>
                        بيانات العيادة
                    </a>
                </li> --}}
         


            </ul>
        </div>
        <!-- right content section -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="tab-content">

                            <div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">

                                <form  action="{{route('customers.update',$row->id)}}" method="post" enctype="multipart/form-data" >
                                    {{csrf_field()}}

                                    <div class="media">
                                        <a href="javascript: void(0);">
                                            <img src="{{asset('uploads/customers/avatar/'.$row->avatar)}}" onclick="ChooseAvatar()" class="rounded mr-75" alt="profile image" id="avatar" height="64" width="64">
                                        </a>
                                        <div class="media-body mt-75">
                                            <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                <label class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer"  onclick="ChooseAvatar()">رفع صورة جديدة  </label>
                                                <input type="file" id="account-upload" name="avatar"  onchange="loadAvatar(event)" hidden>
                                            </div>
                                            <p class="text-muted ml-75 mt-50"><small>Allowed JPG, GIF or PNG. Max size of 800kB</small></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="name">الإسم</label>
                                                <input type="text" id="name" value="{{$row->name}}" name="name" class="form-control">
                                            </div>
                                        </div>
                                      
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="phone">الجوال</label>
                                                <input type="text" id="phone" name="phone" value="{{$row->phone}}" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="email">الإيميل</label>
                                                <input type="email" id="email" name="email" value="{{$row->email}}" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="city_id">المدينة</label>
                                                <select name="city_id" id="city_id" class="form-control">
                                                    <option disabled selected>إختيار مدينة</option>
                                                    @foreach($cities as $city)
                                                        <option value="{{$city->id}}" {{$city->id === $row->city_id ? 'selected' : ''}}>{{$city->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                            <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">
                                                حفظ التعديلات</button>
                                            <button type="reset" class="btn btn-outline-warning">إعادة</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane fade" id="account-vertical-social" role="tabpanel" aria-labelledby="account-pill-social" aria-expanded="false">

                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>الإسم </th>
                                                <th>الماركة</th>
                                                <th>الموديل</th>
                                                {{-- <th>التاريخ</th> --}}
                                                <th>التحكم </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($row->cars as $key => $car)
                                            <tr>
                                                <td>{{$key + 1}}</td>
                                                <td class="product-name">{{ $car->display_name }}</td>
                                                <td class="product-name">{{ $car->maker_name }}</td>
                                                <td class="product-name">{{ $car->model_name }}</td>
                                                {{-- <td>
                                                    <div class="chip chip-primary">
                                                        <div class="chip-body">
                                                            <div class="chip-text">{{ $car->date }}</div>
                                                        </div>
                                                    </div>
                                                </td> --}}
                                                {{-- <td class="product-price">$69.99</td> --}}
                                                <td class="product-action text-center">
                                                    <div class="content-header-right">
                                                        <div class="form-group breadcrum-right">
                                                            <div class="dropdown">
                                                                <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-eye"></i></button>
                                                                <div class="dropdown-menu dropdown-menu-right" style="border: 1px solid rgb(204, 204, 204);">
                                                                    <a class="dropdown-item" href="{{route('customers_cars.diagnosis',$car->id)}}">التشخيص</a>
                                                                    <a class="dropdown-item" href="{{route('customers_cars.maintenance',$car->id)}}" target="_blank">الصيانة</a>
                                                                    <a class="dropdown-item" href="{{route('customers_cars.consumptions',$car->id)}}">الإستهلاك</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- <a href="" target="_blank" class="action-edit" data-row="{{$row}}"><i class="feather icon-eye" style="font-size: 18px"></i></a> --}}
                                                    {{-- <a href="{{ route('cities.delete',$row->id) }}" class="action-delete _delete"><i class="feather icon-trash"></i></a> --}}
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('page-script')
<script type="text/javascript">
    function ChooseAvatar(){$("input[name='avatar']").click()}
	var loadAvatar = function(event) {
		var output = document.getElementById('avatar');
		output.src = URL.createObjectURL(event.target.files[0]);
	};
</script>
@endsection
