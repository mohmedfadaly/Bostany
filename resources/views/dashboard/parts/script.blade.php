    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('app-assets/vendors/js/vendors.min.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/extensions/sweet-alerts.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/extensions/toastr.min.js')}}"></script>


    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    @yield('vendor-script')
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{asset('app-assets/js/core/app.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/components.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/ui/jquery.sticky.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/extensions/jquery.steps.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/pdfmake.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/vfs_fonts.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/buttons.html5.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/datatables/datatable.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/forms/wizard-steps.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/forms/select/form-select2.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/pickers/pickadate/picker.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/pickers/pickadate/picker.date.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/pickers/pickadate/picker.time.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/pickers/pickadate/legacy.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/pickers/dateTime/pick-a-datetime.js')}}"></script>

    

    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
    @include('sweetalert::alert')
    @include('sweetalert::validation-alert')
    
    <!-- END: Theme JS-->
    <script>
        $('.loading').css('display','block')
        $(document).ready(function(){
            $('.real_content').css('display','block')
            $('.loading').css('display','none')
        })

        $(document).on('click','._delete',function(e,p = false){
            if (!confirm('هل انت متأكد من عملية الحذف ؟ ')) {
                e.preventDefault()
            } 
        })
    </script>
    
    {{-- page script --}}
    @yield('page-script')
    {{-- page script --}}
