@extends('account.layout')

@section('content')

    <section class="row flexbox-container" style="top: -100px;position: relative;">
        <div class="col-xl-7 col-10 d-flex justify-content-center">
           
            <div class="card bg-authentication rounded-0 mb-0 w-100">
               
                <div class="row m-0">
                    <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                        {{-- <img src="../../../app-assets/images/pages/lock-screen.png" alt="branding logo"> --}}
                        <img src="{{asset('logo_b.png')}}" style="width:200px" alt="branding logo">
                    </div>
                                           

                    <div class="col-lg-6 col-12 p-0">
                        <div class="card rounded-0 mb-0 px-2 pb-2">
                            <div class="card-header pb-1">
                                <div class="card-title text-center">
                                    <h4 class="mb-0 remove_title" style="color: #f7941c">هل أنت متأكد من حذف حسابك لدينا ؟ </h4>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body pt-1 add_body text-center">
                                    <form action="" method="">
                                        <button type="button" class="btn btn-danger float-left yes" >نعم متأكد </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('script')

    <script>
        $('.yes').on('click',function(){
            let text = "هل تريد الإستمرار في عملية حذف حسابك ؟!";
            if (confirm(text) == true) {
                $(this).attr('disabled',true)
                delete_account()
            }
        })
        
        function delete_account()
        {
            var url = "{{url('account/delete-account?id=')}}"+"{{$row->id}}"
            $.get(url, function(data, status){
                if(data.status == '1')
                {
                    $('.remove_title').hide();
                    $('.add_body').html(`
                        <h2 class="text-center text-success">تم حذف حسابك بنجاح</h2>
                        <i class="fa fa-check-circle-o text-success" style="font-size: 67px;"></i>
                    `);
                }
            });
        }
    </script>

@endsection