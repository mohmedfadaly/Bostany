@extends('dashboard/master/master')
@section('title', 'اضافة صلاحية')

@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/colors/palette-gradient.css')}}">
@endsection

@section('content')
<div class="content-body">
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-10 " >
                        <label>إسم الصلاحيه</label>
                        <input type="text" name="role" class="sqaure form-control" required="">
                    </div>
                    <div class="col-sm-2 " style="margin-top: 20px">
                        <div class="form-group row">
                            <div class="col-sm-8" style="margin-top: 6px">
                                <label>تحديد الكل</label>
                            </div>
                            <div class="col-sm-4">
                                <div class="vs-checkbox-con vs-checkbox-success">
                                    <input type="checkbox" id="check_all" name="check_all" class="form-control">
                                    <span class="vs-checkbox">
                                    <span class="vs-checkbox--check">
                                     <i class="vs-icon feather icon-check"></i>
                                    </span>
                                   </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">

             <!-- Vuexy Checkbox Color start -->
                <section class="vuexy-checkbox-color">
                    <div class="row">

                        {{Permissions()}}

                    </div>
                </section>
                 <!-- Vuexy Checkbox Color end -->


                 <div class="col-sm-12" style="margin-top:20px;text-align: center;">
                    <button class="btn btn-primary round btn-block add_permission" style="width: 50%;
                    margin-left: auto;
                    margin-right: auto;"  type="button">اضافه</button>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('page-script')
<script type="text/javascript">

    $('#check_all').on('click',function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
    })

    $('.father').on('click',function(){
        var id = $(this).data('id')
        $('.child'+id).not(this).prop('checked', this.checked);
    })

    $('.add_permission').on('click',function(){
        var role = $('input[name="role"]').val()
        var ids = [];
         $('.permission:checkbox:checked').each(function(i){
          ids[i] = $(this).val();
        });

        if(ids.length === 0)
        {
            toastr.error('يجب إختيار صلاحيات')
        }else if(role === '')
        {
            toastr.error('يجب إدخال إسم الصلاحية')
        }else{
             //$('.real_content').css('display','none')
            //$('.loading').css('display','block')
          $.post("{{route('roles.store')}}",{_token:"{{csrf_token()}}",ids:ids,role:role},function(data, status){
            //$('.real_content').css('display','block')
              //$('.loading').css('display','none')
              if(status === 'success')
              {
                toastr.success('تم حفظ الصلاحيه بنجاح')
                setTimeout(function()
                {
                location.replace("{{route('roles.list')}}")
                }, 500);
              }

          });
        }
    })
</script>
@endsection
