@extends('dashboard/master/master')
@section('title', 'اضافة سيارة')

@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/colors/palette-gradient.css')}}">
@endsection

@section('content')
<div class="card">
    {{-- <div class="card-header">
        <h4 class="card-title">Vertical Form</h4>
    </div> --}}
    <div class="card-content">
        <div class="card-body">
            <form class="form form-vertical" action="{{route('cars.store')}}" method="POST" enctype="multipart/form-data">
                <div class="form-body">
                    <div class="row">
                        @csrf

                        <div class="col-12">
                            <div class="form-group">
                                <input type="file" accept="image*/" class="form-control" value="" id="logo" name="logo" title="اللوجو" style="width: 20%;float: right;margin-left: 1%;">
                                <input type="text" class="form-control maker_name" value="" required name="maker_name" placeholder="إسم الصانع" title="إسم الصانع" style="width: 20%;float: right;margin-left: 1%;">
                                <input type="text" class="form-control maker_code" value="" required name="maker_code" placeholder="كود الصانع" title="كود الصانع" style="width: 20%;float: right;margin-left: 1%;">
                                <button class="btn btn-success" type="submit">حفظ 
                                    <i class="fa fa-check"></i>
                                </button>
                                <button class="btn btn-primary add_model" type="button">إضافة موديل
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row models_list">
                                <div class="col-6 model1">
                                    <div class="form-group">
                                        <input type="text" minlength="1" required maxlength="190" class="form-control model_name1" value="" name="new_model_name[]" placeholder="إسم الموديل" title="إسم الموديل" style="float: right; width: 40%; margin-left: 1%;">
                                        <input type="text" minlength="1" required maxlength="190" class="form-control model_code1" value="" name="new_model_code[]" placeholder="كود الموديل" title="كود الموديل" style="float: right; width: 40%; margin-left: 1%">

                                        <button class="btn btn-warning remove remove1" data-id="1" type="button" >
                                            <i class="fa fa-minus-circle"></i>
                                        </button>
                                    </div>
                                </div>
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

$('.add_model').on('click',function(){
    var id = '_'+Math.trunc(Math.random()*20000) + 123434;
    $('.models_list').prepend(`
        <div class="col-6 model${id}">
            <div class="form-group">
                <input type="text" minlength="1" required maxlength="190" class="form-control" value="" name="new_model_name[]" placeholder="إسم الموديل" title="إسم الموديل" style="float: right; width: 40%; margin-left: 1%;border: 1px solid;">
                <input type="text" minlength="1" required maxlength="190" class="form-control" value="" name="new_model_code[]" placeholder="كود الموديل" title="كود الموديل" style="float: right; width: 40%; margin-left: 1%;border: 1px solid;">

                <button class="btn btn-warning remove remove${id}" data-id="${id}" type="button" >
                    <i class="fa fa-minus-circle"></i>
                </button>
            </div>
        </div>
    `)
})

$(document).on('click','.remove',function(){
    
    var id = $(this).data('id')
    $('.models_list .model'+id).remove();
})
</script>
@endsection
