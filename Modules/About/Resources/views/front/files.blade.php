
        <!-- Download Files -->
        <div class="download-files py-5 position-relative">
            <img src="{{asset('front')}}/images/old-shape.png" alt="" class="none-mobile">
            <div class="container py-5">
                <div class="mb-5 mt-4 mx-info">
                    <h4 class="colorMain title-sec position-relative mt-0">{{__('Download profile')}}</h4>
                </div>
                <div class="row py-5">
                    @foreach ($files as $val)

                    <div class="col-md-6 col-xs-12 overflow-hidden">
                        <div class="box-info-file p-3 rounded-3 my-3 position-relative" data-aos="fade-up" data-aos-offset="200" data-aos-easing="ease-in-sine" data-aos-duration="300">
                            <div class="d-flex align-items-center justify-content-end">
                                <a href="{{ asset('uploads/files/' . $val->file) }}" download class="btn-icon-45 rounded-circle bgColorMain d-flex align-items-center justify-content-center position-relative">
                                    <i class="icon-download text-white"></i>
                                </a>
                            </div>
                            <div class="d-flex align-items-center justify-content-center my-5">
                                <img src="{{asset('front')}}/images/logo.png" alt="">
                            </div>
                            <div class="info-file h-100 w-100 px-3 py-4 d-flex align-items-end">
                                <p class="text-white m-0">{{$val->title}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
