@extends('dashboard/master/master')
@section('title', 'الأخطاء')

@section('page-style')

<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/colors/palette-gradient.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/plugins/file-uploaders/dropzone.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/pages/data-list-view.css')}}">

@endsection
@section('content')

<section id="basic-datatable">

    <div class="card card-primary card-outline">
        {{-- <div class="card-header">
        <h3 class="m-0" style="display: inline;">مراكز الصيانة</h3>
        </div> --}}

        <div class="card-body">
            <div class="table-responsive ">

                <table class="table zero-configuration table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الصورة</th>
                            <th>الإسم</th>
                            <th>اايميل</th>
                            <th>الجوال</th>
                            <th>النوع</th>
                            <th>المدينة</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $key => $value)
                        <tr>
                            <td>
                                {{$key + 1}}
                            </td>
                            <td><img src="{{asset('uploads/customers/avatar/'.$value->avatar)}}" style="width: 50px;border-radius: 30px;" alt=""></td>
                            <td>{{$value->name}}</td>
                            <td>{{$value->email ?? '-'}}</td>
                            <td>{{$value->phone ?? '-'}}</td>
                            <td>{{$value->gender}}</td>
                            <td>{{$value->city ? $value->city->title : '-'}}</td>
                            <td class="project-actions text-right">
                                <a href="{{route('customers.edit',$value->id)}}" class="btn btn-primary btn-sm " type="submit">  تعديل <i class="fa fa-edit"></i></a>
                                <a href="{{route('customers.delete',$value->id)}}" class="btn btn-danger btn-sm _delete" type="submit">  حذف <i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>


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

{{-- {{ $dataTable->scripts() }} --}}

<script>

$(document).on('click','.add_new',function(){
    $('#exampleModalScrollableTitle').text('إضافة جديد')
    $('#form').attr('action',"{{route('malfunctions.store')}}")
    $('#code')       .val('');
    $('#desc_ar')    .val('');
    $('#desc_en')    .val('');
    $('#solution_ar').val('');
    $('#solution_en').val('');
})

$(document).on('click','.action-edit',function(){

    $('.modal-header #exampleModalScrollableTitle').text('تعديل')

   var id          = $(this).data('id');
   var code        = $(this).data('code');
   var desc_ar     = $(this).data('desc_ar');
   var desc_en     = $(this).data('desc_en');
   var solution_ar = $(this).data('solution_ar');
   var solution_en = $(this).data('solution_en');

    $('#form')       .attr('action',"{{url('malfunctions/update')}}"+"/"+id)
    $('#code')       .val(code);
    $('#desc_ar')    .val(desc_ar);
    $('#desc_en')    .val(desc_en);
    $('#solution_ar').val(solution_ar);
    $('#solution_en').val(solution_en);
})

$('.save').on('click',function(){
    $('.real_submit').click();
})
</script>
@endsection