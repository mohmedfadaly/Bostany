@extends('dashboard/master/master')
@section('title', 'عن الشركة')

@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/colors/palette-gradient.css')}}">
@endsection

@section('content')
<div class="content-body">
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">

                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" action="{{route('about_us.section_update',$model->id)}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                    <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="name"  style="margin-bottom: 20px;">العنوان عادي </label>

                                                <input type="text" id="name" class="form-control" value="{{ old('title', $model?->title) }}" placeholder=" العنوان" name="title">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="sub_title"  style="margin-bottom: 20px;">العنوان الجانبي  </label>

                                                <input type="text" id="sub_title" value="{{ old('sub_title', $model?->sub_title) }}"  class="form-control" placeholder=" العنوان الجانبي" name="sub_title">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="address" style="margin-bottom: 20px;">الوصف</label>
                                                <textarea name="description" id="address" rows="8" class="form-control"> {{ old('description', $model?->description) }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="sub_description" style="margin-bottom: 20px;">الوصف الثاني</label>
                                                <textarea name="sub_description" id="sub_description" rows="8" class="form-control">{{ old('sub_description', $model?->sub_description) }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label  style="margin-bottom: 20px;">1صور القسم </label> <span
                                            class="text-danger">*</span>
                                            <input type="file" name="image1"
                                                accept="image/*" onchange="loadAvatar(event)"
                                                style="display: none;">
                                            <img src="{{ isset($model) && $model->image1 != null ? asset('uploads/about1/'.$model->image1) : asset('bg.jpg')}}"
                                                style="display: block;width: 100%;height: 200px;cursor: pointer;"
                                                onclick="ChooseAvatar()" id="avatar">


                                        </div>
                                        <div class="col-4">
                                            <label  style="margin-bottom: 20px;">2صور القسم </label> <span
                                            class="text-danger">*</span>


                                            <input type="file" name="image2"
                                                accept="image/*" onchange="loadAvatar2(event)"
                                                style="display: none;">
                                            <img src="{{ isset($model) && $model->image2 != null ? asset('uploads/about2/'.$model->image2) : asset('bg.jpg')}}"
                                                style="display: block;width: 100%;height: 200px;cursor: pointer;"
                                                onclick="ChooseAvatar2()" id="avatar2">


                                        </div>
                                        <div class="col-4">
                                            <label  style="margin-bottom: 20px;">3صور القسم </label> <span
                                            class="text-danger">*</span>


                                            <input type="file" name="image3"
                                                accept="image/*" onchange="loadAvatar3(event)"
                                                style="display: none;">
                                            <img src="{{ isset($model) && $model->image3 != null ? asset('uploads/about3/'.$model->image3) : asset('bg.jpg')}}"
                                                style="display: block;width: 100%;height: 200px;cursor: pointer;"
                                                onclick="ChooseAvatar3()" id="avatar3">
                                        </div>

                                        <div class="col-12" style="margin-top: 20px">
                                            <button type="submit" class="btn btn-primary" style="float: inline-end;">حفظ</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('page-script')
<script type="text/javascript">
    function ChooseAvatar(){$("input[name='image1']").click()}
	var loadAvatar = function(event) {
		var output = document.getElementById('avatar');
		output.src = URL.createObjectURL(event.target.files[0]);
	};
    function ChooseAvatar2(){$("input[name='image2']").click()}
	var loadAvatar2 = function(event) {
		var output = document.getElementById('avatar2');
		output.src = URL.createObjectURL(event.target.files[0]);
	};
    function ChooseAvatar3(){$("input[name='image3']").click()}
	var loadAvatar3 = function(event) {
		var output = document.getElementById('avatar3');
		output.src = URL.createObjectURL(event.target.files[0]);
	};


</script>
@endsection
