@extends('dashboard/master/master')
@section('title', ' الاعمال')

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
            <form class="form form-vertical" action="{{route('gallary.update')}}" method="POST" enctype="multipart/form-data">
                <div class="form-body">
                    <div class="row">
                        @csrf
                        <div class="col-sm-12 data-field-col">
                            <div class="row">

                                {{-- image --}}
                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="card-header">
                                    <label class="text-primary">صور الاعمال : <span class="text-danger">*</span></label>
                                        <div class="btn btn-primary" style="float: left;height:36px;padding:3px;">

                                        <input type="file" name="galary[]" id="gallery1"  style="display: none;" accept="image/*" multiple>
                                        <label  style="cursor: pointer;font-size:14px;width: 100%;height: 100%;" onclick="ChooseAvatar1()" id="avatar1">  إضافة صور  <i class="fas fa-camera"></i></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12"style="margin-top: 20px;">

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12 marbo img">
                                                <h5 class="m-0" style="display: inline; text-align: center;">قائمة صور  </h5>
                                                <div class="gallery1">
                                                @foreach($gallary as $key => $value)
                                                <div class="filtr-item image col-sm-2"  style="position: relative;display: inline-block;" data-category="1" data-sort="white sample">
                                                    <button type="button" data-id="{{$value->id}}" class="btn btn-danger btn-sm del close"   style="z-index: 9999; position: absolute;background-color: red;display: none;border: none;font-size: 22px;padding: 5px 10px;color: #fff;border-radius: 50%;top: 30px;right: 20px;" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                                    <img src="{{asset('uploads/gallary/'.$value->image)}}" class="img-fluid mb-2  bounceIn" alt="black sample"/>
                                                </div>
                                                @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary store" type="submit" style="margin-right: 20px;margin-top:30px">تعديل الفاعليات
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
			url: "{{route('gallary.DeleteImage')}}",
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
