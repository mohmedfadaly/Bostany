@extends('dashboard/master/master')
@section('title', 'الرسائل')

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

                              <div class="col-sm-6 data-field-col">
                                <label for="name">الإسم</label>
                                <input type="text" class="form-control" name="" id="name" readonly maxlength="190" required>
                              </div>

                                <div class="col-sm-6 data-field-col">
                                    <label for="email">الإيميل</label>
                                    <input type="text" class="form-control" name="" id="email" readonly maxlength="190" required>
                                  </div>

                                <div class="col-sm-12 data-field-col">
                                    <label for="message">الرسالة</label>
                                    <textarea name="" class="form-control" id="message" readonly maxlength="500" cols="45" rows="3" required></textarea>
                                </div>

                            </div>

                            {{-- <button class="real_submit" type="submit" style="display: none"></button> --}}
                        </form>
                    </div>
                    {{-- <div class="modal-footer">
                        <button type="button" class="btn btn-primary save" >حفظ</button>
                    </div> --}}
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

// $(document).on('click','.add_new',function(){
//     $('#exampleModalScrollableTitle').text('إضافة جديد')
//     $('#form').attr('action',"{{route('malfunctions.store')}}")
//     $('#code')                .val('');
//     $('#desc_ar')             .val('');
//     $('#desc_en')             .val('');
//     $('#symptoms_ar')         .val('');
//     $('#symptoms_en')         .val('');
//     $('#potential_causes_ar') .val('');
//     $('#potential_causes_en') .val('');
//     $('#solution_ar')         .val('');
//     $('#solution_en')         .val('');
// })

$(document).on('click','.action-edit',function(){

    $('.modal-header #exampleModalScrollableTitle').text('عرض رسالة')

  //  var id                   = $(this).data('id');
   var name        = $(this).data('name');
   var email       = $(this).data('email');
   var message     = $(this).data('message');


    // $('#form')                .attr('action',"{{url('malfunctions/update')}}"+"/"+id)
    $('#name')       .val(name);
    $('#email')      .val(email);
    $('#message')    .text(message);
})

// $('.save').on('click',function(){
//     $('.real_submit').click();
// })

</script>
@endsection