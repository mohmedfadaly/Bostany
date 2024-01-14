@extends('dashboard/master/master')
@section('title', 'الإعدادات')

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
                        <i class="fa fa-cogs mr-50 font-medium-3"></i>
                         الإعدادات
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link d-flex py-75" id="account-pill-social" data-toggle="pill" href="#account-vertical-social" aria-expanded="false">
                        <i class="fa fa-comments mr-50 font-medium-3"></i>
                                مواقع التواصل
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link d-flex py-75" id="account-pill-password" data-toggle="pill" href="#account-vertical-password" aria-expanded="false">
                        <i class="fa fa-file-image-o mr-50 font-medium-3"></i>
                        بنر واجهة التطبيق 
                    </a>
                </li>
              
                    {{-- <li class="nav-item">
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

                                <form  action="{{route('setting.update')}}" method="post" enctype="multipart/form-data" >
                                    {{csrf_field()}}

                                    {{-- <div class="media">
                                        <a href="javascript: void(0);">
                                            <img src="{{asset('uploads/users/avatar/'.auth()->user()->avatar)}}" onclick="ChooseAvatar()" class="rounded mr-75" alt="profile image" id="avatar" height="64" width="64">
                                        </a>
                                        <div class="media-body mt-75">
                                            <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                <label class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer"  onclick="ChooseAvatar()">رفع صورة جديدة  </label>
                                                <input type="file" id="account-upload" name="avatar"  onchange="loadAvatar(event)" hidden>
                                            </div>
                                            <p class="text-muted ml-75 mt-50"><small>Allowed JPG, GIF or PNG. Max
                                                    size of
                                                    800kB</small></p>
                                        </div>
                                    </div> --}}
                                    <hr>
                                    <div class="row">
                                        @foreach ($rows as $row)
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="{{$row->key}}">
                                                        {{$row->title}}
                                                    </label>
                                                    <input type="text" class="form-control" {{ $row->attr}} value="{{$row->value}}" id="{{$row->key}}" name="{{$row->key}}">
                                                </div>
                                            </div>
                                        @endforeach
                                        @if(count($rows) > 0)
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">
                                                    حفظ التعديلات</button>
                                                <button type="reset" class="btn btn-outline-warning">إعادة</button>
                                            </div>
                                        @endif
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane fade" id="account-vertical-social" role="tabpanel" aria-labelledby="account-pill-social" aria-expanded="false">

                                <div class="row">

                                    <div class="col-12 d-flex ">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-social" style="float: left;">
                                            إضافة موقع
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                    <div class="col-12 d-flex ">
                                        <div class="card-body" style="padding:0">
                                            <table class="table zero-configuration">
                                                <thead>
                                                    <tr>
                                                    <th>#</th>
                                                    <th>الصورة</th>
                                                    <th>الإسم</th>
                                                    <th>التحكم</th>
                                                    </tr>
                                                </thead>
                                            <tbody>
                                                @foreach($social as $key => $value)
                                                    <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td><img src="{{asset('uploads/socials/'.$value->icon)}}" style="width:50px"></td>
                                                    <td>{{$value->name}}</td>
                                                    <td>
                                                        <a href=""
                                                        class="btn btn-info btn-sm edit_media"
                                                        data-toggle="modal"
                                                        data-target="#modal-media"
                                                        data-id    = "{{$value->id}}"
                                                        data-name  = "{{$value->name}}"
                                                        data-link  = "{{$value->link}}"
                                                        >  <i class="fa fa-edit"></i></a>
                                                        <a href="{{ route('socials.delete',$value->id) }}" class="btn btn-danger btn-sm _delete"> <i class="fa fa-trash"></i></a>
                                                    </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        </div>                                                               
                                    </div>

                                </div>
                            </div>

                            <div class="tab-pane fade " id="account-vertical-password" role="tabpanel" aria-labelledby="account-pill-password" aria-expanded="false">
                                <form novalidate action="{{route('setting.update_banner')}}" method="post" enctype="multipart/form-data" >
                                    {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="controls">
                                                    {{-- <label for="account-old-password"> البنر </label> --}}
                                                   <img src="{{asset('uploads/banner/'.$banner->value)}}" style="width: 100%" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="banner"> إختيار بنر جديد </label>
                                                    <input type="file" name="{{$banner->key}}"  {{ $row->attr}} id="banner" class="form-control" data-validation-required-message="The password field is required" minlength="6">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                            <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">
                                                حفظ التغيرات</button>
                                            <button type="reset" class="btn btn-outline-warning">إعادة</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            {{-- <div class="tab-pane fade" id="account-vertical-info" role="tabpanel" aria-labelledby="account-pill-info" aria-expanded="false">
                                <form novalidate action="" method="post" enctype="multipart/form-data" >
                                    {{csrf_field()}}
                                    <input type="hidden" name="clinic_id" value="">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="proposalTitle3">
                                                   لوجو العيادة
                                                </label>
                                                <input type="file" name="logo" accept="image/*" onchange="loadAvatar1(event)" style="display: none;">
                                                <img src="" style="display: block;width: 100%;height: 260px;cursor: pointer;" onclick="ChooseAvatar1()" id="avatar1">
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="clinic_name">
                                                    أسم العيادة
                                                </label>
                                                <input type="text" class="form-control required" id="clinic_name" value="" name="clinic_name">
                                            </div>
                                            <div class="form-group">
                                                <label for="jobTitle5">
                                                    هاتف العيادة
                                                </label>
                                                <input type="number" class="form-control required" id="clinic_phone" value="" name="clinic_phone">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="desc">الوصف</label>
                                                    <textarea name="desc" id="desc" rows="4"  value="" class="form-control"></textarea>
                                                </div>
                                        </div>
                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                            <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">
                                                حفظ التعديلات</button>
                                            <button type="reset" class="btn btn-outline-warning">إعادة</button>
                                        </div>
                                    </div>
                                </form>
                            </div> --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    {{-- add social modal --}}
    <div class="modal fade" id="modal-social">
        <div class="modal-dialog">
            <div class="modal-content bg-primary">
                <div class="modal-header">
                    <h4 class="modal-title">إضافة موقع  جديد</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('socials.store') }}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <label>الصوره </label> <span class="text-danger">*</span>
                        <input type="file" name="icon" accept="image/*" required class="form-control"  style="margin-bottom: 10px">
                        <label>إسم الموقع</label> <span class="text-danger">*</span>
                        <input type="text" name="name" class="form-control" placeholder="إسم الموقع " required="" style="margin-bottom: 10px">
                        <label>رابط الصفحة </label> <span class="text-danger">*</span>
                        <input type="text" name="link" class="form-control" placeholder="url" required="" style="margin-bottom: 10px">

                        <button type="submit" id="submit1" style="display: none;"></button>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light social">حفظ</button>
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">إغلاق</button>
                </div>
            </div>
        </div>
    </div>

    {{-- edit social modal --}}
    <div class="modal fade" id="modal-media">
        <div class="modal-dialog">
            <div class="modal-content bg-info">
                <div class="modal-header">
                    <h4 class="modal-title">تعديل الموقع : <span class="item_name1"></span></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('socials.update') }}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" name="edit_social_id" value="">
                        <label>الصوره </label> <span class="text-primary">*</span>
                        <input type="file" name="edit_icon" accept="image/*" class="form-control"  style="margin-bottom: 10px">
                        <label>إسم الموقع</label> <span class="text-danger">*</span>
                        <input type="text" name="edit_name" class="form-control" required="" style="margin-bottom: 10px">
                        <label>رابط الصفحة </label> <span class="text-danger">*</span>
                        <input type="text" name="edit_link" required class="form-control" style="margin-bottom: 10px">

                        <button type="submit" id="update1" style="display: none;"></button>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light media">تحديث</button>
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">إغلاق</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-script')
<script type="text/javascript">
    function ChooseAvatar(){$("input[name='avatar']").click()}
	var loadAvatar = function(event) {
		var output = document.getElementById('avatar');
		output.src = URL.createObjectURL(event.target.files[0]);
	};

    function ChooseAvatar1(){$("input[name='logo']").click()}
	var loadAvatar1 = function(event) {
		var output = document.getElementById('avatar1');
		output.src = URL.createObjectURL(event.target.files[0]);
	};

    //edit social
    $('.edit_media').on('click',function(){
        var id         = $(this).data('id')
        var name       = $(this).data('name')
        var link       = $(this).data('link')

        $('.item_name1').text(name)
        $("input[name='edit_social_id']").val(id)
        $("input[name='edit_name']").val(name)
        $("input[name='edit_link']").val(link)

    })

    // update social
    $('.media').on('click',function(){
        $('#update1').click();
    })

    // add social
    $('.social').on('click',function(){
        $('#submit1').click();
    })

</script>
@endsection
