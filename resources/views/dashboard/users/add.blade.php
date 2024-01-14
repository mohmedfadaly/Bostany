@extends('dashboard/master/master')
@section('title', 'اضافة مشروع')

@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/colors/palette-gradient.css')}}">
<style>
    .img img {
        width: 120px;
        height: 80px;
        margin-right: 20px;
        margin-top: 20px;
    }

    #gallery-photo-add {
        display: inline-block;
        position: absolute;
        z-index: 1;
        width: 80%;
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
            <form class="form form-vertical" action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
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
                                    <img src="{{ asset('app-assets/images/defoult.jpg') }}"
                                        style="display: block;width: 100%;height: 150px;cursor: pointer;"
                                        onclick="ChooseAvatar5()" id="avatar5">
                                </div>
                                <div class="col-sm-8">
                                    <div class="row">
                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-name"> الاسم</label>
                                            <input type="text" class="form-control" name="name" id="data-name">
                                        </div>
                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-email"> البريد</label>
                                            <input type="email" class="form-control" name="email" id="data-email">
                                        </div>
                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-phone"> الهاتف</label>
                                            <input type="text" class="form-control" name="phone" id="data-phone">
                                        </div>
                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-phone"> الصلاحية</label>
                                            <select class="select2 form-control" name="role">
                                                @foreach ($roles as $val)
                                                    <option value="{{ $val->id }}">
                                                        {{ $val->name }}
                                                    </option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-password"> كلمة المرور</label>
                                            <input type="password" class="form-control" name="password" id="data-password">
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>


                        <button class="btn btn-primary store" type="submit" style="margin-right: 20px;margin-top:30px">إضافة مدير
                            <i class="fa fa-plus"></i>
                        </button>
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
        $('.store').on('click',function(event){
            var galary = document.getElementById("gallery1");
            if ('files' in galary) {
                if(galary.files.length == 0) {
					event.preventDefault();
                    toastr.error('يجب إختيار صور المعرض')
                }
            }
        })
        function ChooseAvatar1() {
            $("input[name='galary[]']").click()
        }
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
                $('.gallery1').html(' ');
                imagesPreview(this, 'div.gallery1');
            });
        });
</script>
@endsection
