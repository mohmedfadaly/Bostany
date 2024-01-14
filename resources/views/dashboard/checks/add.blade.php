@extends('dashboard/master/master')
@section('title', 'اضافة ممرض')

@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/colors/palette-gradient.css')}}">
@endsection

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">

        @include('dashboard.parts.breadcrumbs')

        <div class="content-body">
            <section id="multiple-column-form">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-content">
                                <div class="card-body">
                                    <form  action="{{route('clinic.storepatient')}}" method="post" enctype="multipart/form-data" class="form">
                                        {{csrf_field()}}
                                            <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-6 col-12">

                                                    <div class="form-group">
                                                        <label for="full-bg-select">المرضي </label>

                                                        <select class="select2-full-bg form-control patient" name="patient" id="full-bg-select">
                                                            <option value="">غير محدد</option>

                                                            @foreach ($data as $val)
                                                            <option value="{{$val->id}}">{{$val->patient_name}}</option>

                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="name">الاسم </label>

                                                        <input type="text" id="name" class="form-control" placeholder=" الاسم" name="name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="phone">
                                                           الهاتف
                                                        </label>
                                                        <input type="number" class="form-control required" placeholder=" الهاتف"  id="phone" name="phone">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <fieldset class="form-group">
                                                        <label for="address">الجنس</label>
                                                        <select class="form-control" name="gender" id="basicSelect">
                                                            <option value="1">ذكر </option>
                                                            <option value="0">انثي </option>
                                                        </select>
                                                    </fieldset>
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="address">العنوان</label>
                                                        <textarea name="address" id="address" rows="4" class="form-control"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <div class="row">

                                                        <div class="col-md-12 col-12">
                                                            <fieldset class="form-group">
                                                                <label for="address">نوع الكشف</label>
                                                                <select class="form-control" name="type" id="basicSelect">
                                                                    <option value="1">كشف </option>
                                                                    <option value="0">إعادة </option>
                                                                </select>
                                                            </fieldset>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="phone">
                                                                   العمر
                                                                </label>
                                                                <input type="number" class="form-control required"  placeholder=" العمر" id="age" name="age">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <fieldset class="form-group">
                                                                <label for="address"> دور الكشف</label>
                                                                <input type="number" readonly class="form-control required" value="{{$count + 1}}"  placeholder=" الدور" id="sort" name="sort">
                                                            </fieldset>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-primary mr-1 mb-1">حفظ</button>
                                                    <button type="reset" class="btn btn-outline-warning mr-1 mb-1">إعادة</button>
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
    </div>
</div>
@endsection

@section('page-script')
<script type="text/javascript">
    function ChooseAvatar(){$("input[name='logo']").click()}
	var loadAvatar = function(event) {
		var output = document.getElementById('avatar');
		output.src = URL.createObjectURL(event.target.files[0]);
	};

$(document).on('change','.patient', function(){

var data = {
patient    : $(this).val(),
_token        : $("input[name='_token']").val()
}


    $.ajax({
    url     : "{{ route('clinic.Getpatient') }}",
    method  : 'post',
    data    : data,
    success : function(s,result){
      console.log(s);
      $("input[name='name']").val(s.patient_name)
      $("input[name='phone']").val(s.patient_phone)
      $("textarea[name='address']").html(s.patient_address)
      $("input[name='age']").val(s.age)
      $("select[name='gender'] > option").each(function() {
        if($(this).val() == s.gender)
        {
          $(this).attr("selected","")
        }
      });

    }});

});
</script>
@endsection
