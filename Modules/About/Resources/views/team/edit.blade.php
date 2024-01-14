@extends('dashboard/master/master')
@section('title', 'تعديل عضو')

@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/colors/palette-gradient.css')}}">
<style type="text/css">
    .selectize-input{
        min-height: 38px !important
    }
	.img img{
		width:150px;
		height:100px;
		margin-right:20px;
		margin-top:20px;
	}

	#gallery-photo-add {
    display: inline-block;
    position: absolute;
    z-index: 1;
    width: 100%;
    height: 50px;
    top: 0;
    left: 0;
    opacity: 0;
    cursor: pointer;
	}
</style>
@endsection

@section('content')
<div class="card">
    {{-- <div class="card-header">
        <h4 class="card-title">Vertical Form</h4>
    </div> --}}
    <div class="card-content">
        <div class="card-body">
            <form class="form form-vertical" action="{{route('team.update',$data->id)}}" method="POST" enctype="multipart/form-data">
                <div class="form-body">
                    <div class="row">
                        @csrf
                        <div class="col-sm-12 data-field-col">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>الصوره </label> <span
                                    class="text-danger">*</span>
                                    <input type="file" name="image"
                                        accept="image/*" onchange="loadAvatar5(event)"
                                        style="display: none;">
                                    <img src="{{asset('uploads/team/'.$data->image)}}"
                                        style="display: block;width: 100%;height: 300px;cursor: pointer;"
                                        onclick="ChooseAvatar5()" id="avatar5">
                                </div>
                                <div class="col-sm-8">
                                    <div class="row">
                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-title_ar">الاسم بالعربية</label>
                                            <input type="text" class="form-control" value="{{$data->getTranslation('title', 'ar')}}" name="title[ar]" id="data-title_ar" maxlength="190" required>
                                        </div>
                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-title_en">الاسم بالإنجليزية</label>
                                            <input type="text" class="form-control" value="{{$data->getTranslation('title', 'en')}}" name="title[en]" id="data-title_en" maxlength="190" required>
                                        </div>
                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-title_ar">التخصص بالعربية</label>
                                            <input type="text" class="form-control" value="{{$data->getTranslation('specialty', 'ar')}}" name="specialty[ar]" id="data-title_ar" maxlength="190" required>
                                        </div>
                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-title_en">التخصص بالإنجليزية</label>
                                            <input type="text" class="form-control" value="{{$data->getTranslation('specialty', 'en')}}" name="specialty[en]" id="data-title_en" maxlength="190" required>
                                        </div>
                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-link"> رابط فيسبوك</label>
                                            <input type="text" class="form-control" value="{{$data->link_facebook}}" name="link_facebook" id="data-link">
                                        </div>
                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-link"> رابط تويتر</label>
                                            <input type="text" class="form-control" value="{{$data->link_twitter}}" name="link_twitter" id="data-link">
                                        </div>
                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-link"> رابط لينكدان</label>
                                            <input type="text" class="form-control" value="{{$data->link_linkedin}}" name="link_linkedin" id="data-link">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 data-field-col">
                                    <label for="data-content_ar">المحتوي بالعربية</label>
                                    <textarea name="content[ar]" class="form-control" id="data-content_ar" cols="45" rows="10" required>
                                        {{$data->getTranslation('content', 'ar')}}
                                    </textarea>
                                </div>

                                <div class="col-sm-6 data-field-col">
                                    <label for="data-content_en">المحتوي بالإنجليزية</label>
                                    <textarea name="content[en]" class="form-control" id="data-content_en" cols="45" rows="10" required>
                                        {{$data->getTranslation('content', 'en')}}
                                    </textarea>
                                </div>

                                <button class="btn btn-primary store" type="submit" style="margin-right: 20px;margin-top:30px">تعديل عضو
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('page-script')
<script type="text/javascript">
function ChooseAvatar5() {
            $("input[name='image']").click()
        }
        var loadAvatar5 = function(event) {
            var output = document.getElementById('avatar5');
            output.src = URL.createObjectURL(event.target.files[0]);
        };
function ChooseAvatar1(){$("input[name='galary[]']").click()}

		$(function() {
			// Multiple images preview in browser
			var imagesPreview = function(input, placeToInsertImagePreview) {

				if (input.files) {
					var filesAmount = input.files.length;

					for (i = 0; i < filesAmount; i++) {
						var reader = new FileReader();

						reader.onload = function(event) {
							$($.parseHTML('<img class="img-fluid mb-2  bounceIn">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
						}

						reader.readAsDataURL(input.files[i]);
					}
				}

			};

			$('#gallery1').on('change', function() {
				imagesPreview(this, 'div.gallery1');
			});
		});
		$(".image").hover(function(){
		  $(".del",this).css("display", "block") },
		  function(){
			$(".del").css("display", "none");
		});
		$(".del").hover(function(){
		  $(this).css("display", "block") },
		  function(){

		});
		$(".close").click(function(){
		var id = $(this).data("id");
		var $ele = $(this).parent();
		$.ajax(
		{
			url: "{{route('projects.DeleteImage')}}",
			type: 'post',
			data: {
			  _token: '{{ csrf_token() }}',
				"id": id,
			},
			success: function (){
			  $ele.fadeOut().remove();
			}
		});

	});

</script>
@endsection
