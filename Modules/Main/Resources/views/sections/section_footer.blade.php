@extends('dashboard/master/master')
@section('title', 'نهاية الرئيسية')

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
                            <form class="form form-vertical" action="{{route('sections.section_update',$model->id)}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                    <div class="form-body">
                                    <div class="row">

                                        <div class="col-6">
                                            <label  style="margin-bottom: 20px;">صورة القسم </label> <span
                                            class="text-danger">*</span>
                                            <input type="file" name="image"
                                                accept="image/*" onchange="loadAvatar(event)"
                                                style="display: none;">
                                                <img src="{{ isset($model) && $model->image != null ? asset('uploads/main/'.$model->image) : asset('bg.jpg')}}"
                                                style="display: block;width: 100%;height: 200px;cursor: pointer;"
                                                onclick="ChooseAvatar()" id="avatar">
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="address" style="margin-bottom: 20px;">الوصف</label>
                                                <textarea name="description" id="address" rows="8" class="form-control">{{ old('description', $model?->description) }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
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
    function ChooseAvatar(){$("input[name='image']").click()}
	var loadAvatar = function(event) {
		var output = document.getElementById('avatar');
		output.src = URL.createObjectURL(event.target.files[0]);
	};


</script>
@endsection
