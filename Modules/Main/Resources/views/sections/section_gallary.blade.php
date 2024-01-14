@extends('dashboard/master/master')
@section('title', 'مقدمة  المعرض')

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
                                            <div class="form-group">
                                                <label for="description" style="margin-bottom: 20px;">الوصف الاول</label>
                                                <textarea name="description" id="description" rows="8" class="form-control">{{ old('description', $model?->description) }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="sub_description" style="margin-bottom: 20px;">الوصف الثاني</label>
                                                <textarea name="sub_description" id="sub_description" rows="8" class="form-control">{{ old('sub_description', $model?->sub_description) }}</textarea>
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
