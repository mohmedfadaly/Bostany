@extends('dashboard/master/master')
@section('title', 'الأخطاء')

@section('page-style')

<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/colors/palette-gradient.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/plugins/file-uploaders/dropzone.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/pages/data-list-view.css')}}">

@endsection
@section('content')

    <!-- Data list view starts -->
    <section id="data-list-view" class="data-list-view-header">

        <div class="card">
          <div class="card-header">
              {{-- <h4 class="card-title">Column selectors with Export and Print Options</h4> --}}
          </div>
          <div class="card-content">
              <div class="card-body card-dashboard">
                  <div class="table-responsive">
                    <button class="btn btn-primary add_new" data-toggle="modal" data-target="#exampleModalScrollable">
                        <i class="fa fa-plus"></i>
                        إضافة جديد
                    </button>

                    <a href="{{route('malfunctions.export')}}" class="btn btn-warning">
                        <i class="fa fa-file-excel-o"></i>
                        إستيراد الأخطاء
                    </a>

                    <a href="" class="btn btn-danger">
                        <i class="fa fa-file-excel-o"></i>
                        تصدير الأخطاء
                    </a>

                    {{ $dataTable->table(['class' => 'table table-striped ']) }}
                  </div>
              </div>
          </div>
      </div>


        <!-- Modal -->
        <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form" action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                              <div class="col-sm-12 data-field-col">
                                <label for="data-code">الكود</label>
                                <input type="text" class="form-control" name="code" id="code" maxlength="190" required>
                              </div>

                                <div class="col-sm-12 data-field-col">
                                    <label for="data-desc_ar">الوصف بالعربية</label>
                                    <textarea name="desc_ar" class="form-control" id="desc_ar" maxlength="500" cols="45" rows="3" required></textarea>
                                </div>

                                <div class="col-sm-12 data-field-col">
                                    <label for="data-desc_en">الوصف بالإنجليزية</label>
                                    <textarea name="desc_en" class="form-control" id="desc_en" maxlength="500" cols="45" rows="3" required></textarea>
                                </div>

                                <div class="col-sm-12 data-field-col">
                                    <label for="data-symptoms_ar">الأعراض بالعربية</label>
                                    <textarea name="symptoms_ar" class="form-control" id="symptoms_ar" cols="45" rows="3" ></textarea>
                                </div>

                                <div class="col-sm-12 data-field-col">
                                    <label for="data-symptoms_en">الأعراض بالإنجليزية</label>
                                    <textarea name="symptoms_en" class="form-control" id="symptoms_en" cols="45" rows="3" ></textarea>
                                </div>

                                <div class="col-sm-12 data-field-col">
                                    <label for="data-potential_causes_ar"> الأسباب بالعربية</label>
                                    <textarea name="potential_causes_ar" class="form-control" id="potential_causes_ar" cols="45" rows="3" ></textarea>
                                </div>

                                <div class="col-sm-12 data-field-col">
                                    <label for="data-potential_causes_en"> الأسباب بالإنجليزية</label>
                                    <textarea name="potential_causes_en" class="form-control" id="potential_causes_en" cols="45" rows="3" ></textarea>
                                </div>

                                <div class="col-sm-12 data-field-col">
                                    <label for="data-solution_ar">الحل بالعربية</label>
                                    <textarea name="solution_ar" class="form-control" maxlength="1000" id="solution_ar" cols="45" rows="3" ></textarea>
                                </div>

                                <div class="col-sm-12 data-field-col">
                                    <label for="data-solution_en">الحل بالإنجليزية</label>
                                    <textarea name="solution_en" class="form-control" maxlength="1000" id="solution_en" cols="45" rows="3" ></textarea>
                                </div>

                            </div>

                            <button class="real_submit" type="submit" style="display: none"></button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary save" >حفظ</button>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- Data list view end -->

@endsection

@section('vendor-script')

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('app-assets/vendors/js/extensions/dropzone.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    {{-- <script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script> --}}
    {{-- <script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script> --}}
    {{-- <script src="{{asset('app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js')}}"></script> --}}
    {{-- <script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.select.min.js')}}"></script> --}}
    <script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

@endsection

@section('page-script')

{{-- <script src="{{asset('app-assets/js/scripts/ui/data-list-view.js')}}"></script> --}}

{{ $dataTable->scripts() }}

<script>

$(document).on('click','.add_new',function(){
    $('#exampleModalScrollableTitle').text('إضافة جديد')
    $('#form').attr('action',"{{route('malfunctions.store')}}")
    $('#code')                .val('');
    $('#desc_ar')             .val('');
    $('#desc_en')             .val('');
    $('#symptoms_ar')         .val('');
    $('#symptoms_en')         .val('');
    $('#potential_causes_ar') .val('');
    $('#potential_causes_en') .val('');
    $('#solution_ar')         .val('');
    $('#solution_en')         .val('');
})

$(document).on('click','.action-edit',function(){

    $('.modal-header #exampleModalScrollableTitle').text('تعديل')

   var id                   = $(this).data('id');
   var code                 = $(this).data('code');
   var desc_ar              = $(this).data('desc_ar');
   var desc_en              = $(this).data('desc_en');
   var symptoms_ar          = $(this).data('symptoms_ar');
   var symptoms_en          = $(this).data('symptoms_en');
   var potential_causes_ar  = $(this).data('potential_causes_ar');
   var potential_causes_en  = $(this).data('potential_causes_en');
   var solution_ar          = $(this).data('solution_ar');
   var solution_en          = $(this).data('solution_en');

    $('#form')                .attr('action',"{{url('malfunctions/update')}}"+"/"+id)
    $('#code')                .val(code);
    $('#desc_ar')             .val(desc_ar);
    $('#desc_en')             .val(desc_en);
    $('#symptoms_ar')         .val(symptoms_ar);
    $('#symptoms_en')         .val(symptoms_en);
    $('#potential_causes_ar') .val(potential_causes_ar);
    $('#potential_causes_en') .val(potential_causes_en);
    $('#solution_ar')         .val(solution_ar);
    $('#solution_en')         .val(solution_en);
})

$('.save').on('click',function(){
    $('.real_submit').click();
})

</script>
@endsection