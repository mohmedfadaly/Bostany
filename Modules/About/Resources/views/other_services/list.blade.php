@extends('dashboard/master/master')
@section('title', '   خدمات اخري')

@section('page-style')

<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/colors/palette-gradient.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/plugins/file-uploaders/dropzone.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/pages/data-list-view.css')}}">

@endsection
@section('content')

    <!-- Data list view starts -->
    <section id="data-list-view" class="data-list-view-header">
        <button type="button" class="btn-outline-primary add_item">
            <i class='feather icon-plus'></i> إضافة
         </button>

        <!-- DataTable starts -->
        <div class="table-responsive">
            {{-- <table class="table data-list-view"> --}}
              <table class="table zero-configuration table-striped">
                <thead>
                    <tr>
                        <th>الكود</th>
                        <th>العنوان</th>
                        <th>التاريخ</th>
                        <th>التحكم </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($OtherService as  $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td class="product-name">{{ $row->title }}</td>
                        <td>
                            <div class="chip chip-primary">
                                <div class="chip-body">
                                    <div class="chip-text">{{ Date::parse($row->created_at)->diffForHumans() }}</div>
                                </div>
                            </div>
                        </td>
                        {{-- <td class="product-price">$69.99</td> --}}
                        <td class="product-action">
                            <span class="action-edit" data-row="{{$row}}"><i class="feather icon-edit"></i></span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- DataTable ends -->

        <!-- add new sidebar starts -->
        <div class="add-new-data-sidebar">
            <div class="overlay-bg"></div>
            <div class="add-new-data">
                <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                    <div>
                        <h4 class="text-uppercase">إضافة جديد</h4>
                    </div>
                    <div class="hide-data-sidebar">
                        <i class="feather icon-x"></i>
                    </div>
                </div>
                <div class="data-items pb-3">
                    <div class="data-fields px-2 mt-3">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-sm-12 data-field-col">
                                    <label for="data-title" style="margin-bottom: 20px;">العنوان </label>
                                    <input type="text" id="data-title" class="form-control" value="" placeholder=" العنوان" name="title">

                                </div>


                            </div>
                            <button class="real_submit" type="submit" style="display: none"></button>
                        </form>
                    </div>
                </div>
                <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                    <div class="add-data-btn">
                        <button class="btn btn-primary save" type="button">حفظ</button>
                    </div>
                    <div class="cancel-data-btn">
                        <button class="btn btn-outline-danger">إلغاء</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- add new sidebar ends -->

    </section>
    <!-- Data list view end -->

@endsection

@section('vendor-script')

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('app-assets/vendors/js/extensions/dropzone.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.select.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

@endsection

@section('page-script')
<script src="{{asset('app-assets/js/scripts/ui/data-list-view.js')}}"></script>
<script>
/*=========================================================================================
    File Name: data-list-view.js
    Description: List View
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/
function ChooseAvatar5() {
            $("input[name='image']").click()
        }
        var loadAvatar5 = function(event) {
            var output = document.getElementById('avatar5');
            output.src = URL.createObjectURL(event.target.files[0]);
        };

$(document).ready(function() {
  "use strict"
  // init list view datatable
  var dataListView = $(".data-list-view").DataTable({
    responsive: false,
    columnDefs: [
      {
        orderable: true,
        targets: 0,
        checkboxes: { selectRow: true }
      }
    ],
    dom:
      '<"top"<"actions action-btns"B><"action-filters"lf>><"clear">rt<"bottom"<"actions">p>',
    oLanguage: {
      sLengthMenu: "_MENU_",
      sSearch: ""
    },
    aLengthMenu: [[4, 10, 15, 20], [4, 10, 15, 20]],
    select: {
      style: "multi"
    },
    order: [[1, "asc"]],
    bInfo: false,
    pageLength: 4,
    buttons: [
      {

      }
    ],
    initComplete: function(settings, json) {
      $(".dt-buttons .btn").removeClass("btn-secondary")
    }
  });

  dataListView.on('draw.dt', function(){
    setTimeout(function(){
      if (navigator.userAgent.indexOf("Mac OS X") != -1) {
        $(".dt-checkboxes-cell input, .dt-checkboxes").addClass("mac-checkbox")
      }
    }, 50);
  });

  // init thumb view datatable
  var dataThumbView = $(".data-thumb-view").DataTable({
    responsive: false,
    columnDefs: [
      {
        orderable: true,
        targets: 0,
        checkboxes: { selectRow: true }
      }
    ],
    dom:
      '<"top"<"actions action-btns"B><"action-filters"lf>><"clear">rt<"bottom"<"actions">p>',
    oLanguage: {
      sLengthMenu: "_MENU_",
      sSearch: ""
    },
    aLengthMenu: [[4, 10, 15, 20], [4, 10, 15, 20]],
    select: {
      style: "multi"
    },
    order: [[1, "asc"]],
    bInfo: false,
    pageLength: 4,
    buttons: [
      {
        text: "<i class='feather icon-plus'></i> Add New",
        action: function() {
          $(this).removeClass("btn-secondary")
          $(".add-new-data").addClass("show")
          $(".overlay-bg").addClass("show")
        },
        className: "btn-outline-primary"
      }
    ],
    initComplete: function(settings, json) {
      $(".dt-buttons .btn").removeClass("btn-secondary")
    }
  })

  dataThumbView.on('draw.dt', function(){
    setTimeout(function(){
      if (navigator.userAgent.indexOf("Mac OS X") != -1) {
        $(".dt-checkboxes-cell input, .dt-checkboxes").addClass("mac-checkbox")
      }
    }, 50);
  });

  // To append actions dropdown before add new button
  var actionDropdown = $(".actions-dropodown")
  actionDropdown.insertBefore($(".top .actions .dt-buttons"))


  // Scrollbar
  if ($(".data-items").length > 0) {
    new PerfectScrollbar(".data-items", { wheelPropagation: false })
  }

  // Close sidebar
  $(".hide-data-sidebar, .cancel-data-btn, .overlay-bg").on("click", function() {
    $(".add-new-data").removeClass("show")
    $(".overlay-bg").removeClass("show")
    $("#data-name, #data-price").val("")
    $("#data-category, #data-status").prop("selectedIndex", 0)
  })

    // On Edit
    $('.action-edit').on("click",function(e){
      e.stopPropagation();
      var data = $(this).data('row')
      $('form').attr('action',"{{url('admin/other_services/update')}}"+"/"+data.id)

      $('.text-uppercase').text('تعديل ' + data.title)
      $('#data-title').val(data.title);

      $(".add-new-data").addClass("show");
      $(".overlay-bg").addClass("show");
    });
    // On Edit
    $('.add_item').on("click",function(e){
      e.stopPropagation();
      var data = $(this).data('row')
      $('form').attr('action',"{{url('admin/other_services/store')}}")



      $(".add-new-data").addClass("show");
      $(".overlay-bg").addClass("show");
    });

  // On Delete
  $('.action-delete').on("click", function(e){
    e.stopPropagation();
    $(this).closest('td').parent('tr').fadeOut();
  });

  // dropzone init
  Dropzone.options.dataListUpload = {
    complete: function(files) {
      var _this = this
      // checks files in class dropzone and remove that files
      $(".hide-data-sidebar, .cancel-data-btn, .actions .dt-buttons").on(
        "click",
        function() {
          $(".dropzone")[0].dropzone.files.forEach(function(file) {
            file.previewElement.remove()
          })
          $(".dropzone").removeClass("dz-started")
        }
      )
    }
  }
  Dropzone.options.dataListUpload.complete()

  // mac chrome checkbox fix
  if (navigator.userAgent.indexOf("Mac OS X") != -1) {
    $(".dt-checkboxes-cell input, .dt-checkboxes").addClass("mac-checkbox")
  }
})

$('.save').on('click',function(){
    $('.real_submit').click();
})
</script>
@endsection
