@extends('account.layout')

@section('content')

    @include('parts.alert')
    <section class="row flexbox-container" style="top: -100px;position: relative;">
        <div class="col-xl-7 col-10 d-flex justify-content-center">
           
            <div class="card bg-authentication rounded-0 mb-0 w-100">
               
                <div class="row m-0">
                    <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                        {{-- <img src="../../../app-assets/images/pages/lock-screen.png" alt="branding logo"> --}}
                        <img src="{{asset('logo_b.png')}}" style="width:300px" alt="branding logo">
                    </div>
                                           

                    <div class="col-lg-6 col-12 p-0">
                        <div class="card rounded-0 mb-0 px-2 pb-2">
                            <div class="card-header pb-1">
                                <div class="card-title text-center">
                                    <h4 class="mb-0" style="color: #f7941c">قُم بإدخال الايميل او رقم الجوال وسيتم إرسال رسالة لك تحتوي علي خطوات حذف حسابك</h4>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body pt-1">
                                    <form action="{{route('account.send_email_sms')}}" method="POST">

                                        @csrf

                                        <div class="form-group">
                                            <label for="email">إيميل</label>
                                            <input type="radio" name="type" class="type" value="email" id="email" checked>
    
                                            <label for="phone">جوال</label>
                                            <input type="radio" name="type" class="type" value="phone" id="phone">
                                        </div>


                                        <fieldset class="form-label-group position-relative has-icon-left 7_email">
                                            <input type="email" class="form-control" value="{{old('email')}}" name="email" id="user-email" placeholder="قم بإدخال إيميلك" required>
                                            <div class="form-control-position">
                                                <i class="fa fa-at"></i>
                                            </div>
                                        </fieldset>

                                        <fieldset class="form-label-group position-relative has-icon-left 7_phone" style="display: none">
                                            <input type="text" class="form-control" name="phone" value="{{old('phone')}}" id="user-phone" maxlength="10" minlength="10" placeholder="05xxxxxxxx" >
                                            <div class="form-control-position">
                                                <i class="fa fa-phone"></i>
                                            </div>
                                        </fieldset>

                                        {{-- <a href="auth-login.html">Are you not John Doe ?</a> --}}
                                        <button type="submit" class="btn btn-primary float-right" style="background:#061787 !important">إرسال</button>
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
        $('.type').on('change',function(){
            var type = $(this).val()
            if(type === 'email')
            {
                $('.7_email').show()
                $('.7_email input').attr('required',true)

                $('.7_phone').hide()
                $('.7_phone input').removeAttr('required')
            }else if(type === 'phone')
            {
                $('.7_phone').show()
                $('.7_phone input').attr('required',true)
                
                $('.7_email').hide()
                $('.7_email input').removeAttr('required')
            }
        })
    </script>

@endsection