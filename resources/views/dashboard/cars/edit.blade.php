@extends('dashboard/master/master')
@section('title', 'تعديل ممرض')

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
            <form class="form form-vertical" action="{{route('cars.update',$data->id)}}" method="POST" enctype="multipart/form-data">
                <div class="form-body">
                    <div class="row">
                        @csrf
                        <div class="col-12">
                            <div class="form-group">
                                <input type="file" accept="image*/" class="form-control" value="" id="logo" name="logo" title="اللوجو" style="width: 18%;float: right;margin-left: 1%;">
                                <input type="text" class="form-control maker_name" required value="{{$data->maker_name}}" name="maker_name" placeholder="إسم الصناع" title="إسم الصانع" style="width: 18%;float: right;margin-left: 1%;">
                                <input type="text" class="form-control maker_code" required value="{{$data->maker_code}}" name="maker_code" placeholder="كود الصناع" title="كود الصانع" style="width: 18%;float: right;margin-left: 1%;">
                                <button class="btn btn-success" data-id="{{$data->maker_code}}" type="submit">تحديث 
                                    <i class="fa fa-check"></i>
                                </button>
                                <button class="btn btn-danger" type="button">حذف كل الموديلات
                                    <i class="fa fa-trash"></i>
                                </button>
                                <button class="btn btn-primary add_model" type="button">إضافة موديل
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row models_list">
                                @foreach($data->Models as $model)                                
                                    <div class="col-6 model{{$model->id}}">
                                        <div class="form-group">
                                            <input type="text" minlength="1" required maxlength="190" class="form-control model_name{{$model->id}}" value="{{$model->model_name}}" name="model_name[]" placeholder="إسم الموديل" title="إسم الموديل" style="float: right; width: 33%; margin-left: 1%;">
                                            <input type="text" minlength="1" required maxlength="190" class="form-control model_code{{$model->id}}" value="{{$model->model_code}}" name="model_code[]" placeholder="كود الموديل" title="كود الموديل" style="float: right; width: 33%; margin-left: 1%;">
                                            <button class="btn btn-success update update{{$model->id}}" data-id="{{$model->id}}" type="button">
                                                <i class="fa fa-check"></i>
                                            </button>
                                            <button class="btn btn-danger delete delete{{$model->id}}" data-id="{{$model->id}}" type="button" onclick="delete_model('{{$model->id}}')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
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


$('.update').on('click',function(){
    var id    = $(this).data('id')
    var model_name = $('.model_name'+id).val()
    var model_code = $('.model_code'+id).val()
    if(model_name.length > 0 && model_code.length > 0)
    {
        $(this).html('<i class="fa fa-spinner fa-pulse"></i>')
        $.get("{{url('cars/update-model')}}"+"/"+id+"/"+model_name+"/"+model_code,function(data, status){
              if(data.status === '1')
              {
                toastr.success('تم تحديث العنصر بنجاح', 'تم التحديث');
                $('.update'+id).html('')
                $('.update'+id).html(' <i class="fa fa-check"></i>')
              }
          });
    }
    
})


function delete_model(id)
{
    Swal.fire({
      title: 'هل انت متأكد من عملية الحذف ؟ ',
    //   text: "هل انت متأكد من عملية الحذف",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'نعم متأكد',
      confirmButtonClass: 'btn btn-primary',
      cancelButtonClass: 'btn btn-danger ml-1',
      buttonsStyling: false,
    }).then(function (result) {
      if (result.value) {
        $(this).html('<i class="fa fa-spinner fa-pulse"></i>')
        $.get("{{url('cars/delete-model')}}"+"/"+id,function(data, status){
            if(data.status === '1')
            {
                toastr.success('تم حذف العنصر بنجاح', 'تم الحذف');
                $('.model'+id).remove()
            }
        });
      }
    })
}

$('.add_model').on('click',function(){
    var id = '_'+Math.trunc(Math.random()*20000) + 123434;
    $('.models_list').prepend(`
        <div class="col-6 model${id}">
            <div class="form-group">
                <input type="text" minlength="1" required maxlength="190" class="form-control" value="" name="new_model_name[]" placeholder="إسم الموديل" title="إسم الموديل" style="float: right; width: 33%; margin-left: 1%;border: 1px solid;">
                <input type="text" minlength="1" required maxlength="190" class="form-control" value="" name="new_model_code[]" placeholder="كود الموديل" title="كود الموديل" style="float: right; width: 33%; margin-left: 1%;border: 1px solid;">
                <button class="btn btn-success" disabled type="button">
                    <i class="fa fa-check"></i>
                </button>
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
