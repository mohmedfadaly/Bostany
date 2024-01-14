@extends('dashboard/master/master')
@section('title', 'مقدمة  المقالات')

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
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="name"  style="margin-bottom: 20px;">العنوان  </label>

                                                <input type="text" id="name" value="{{old('title', $model?->title) }}" class="form-control" placeholder=" العنوان" name="title">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="sub_title"  style="margin-bottom: 20px;">العنوان الجانبي  </label>

                                                <input type="text" id="sub_title" value="{{ old('sub_title', $model?->sub_title) }}" class="form-control" placeholder=" العنوان الجانبي" name="sub_title">
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
