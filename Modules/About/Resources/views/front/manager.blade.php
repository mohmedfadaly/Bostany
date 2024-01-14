
        <!-- Info Massage About Us -->
        <div class="info-massage pt-5">
            <div class="container">
                <div class="row flex-row-reverse">
                    <div class="col-md-6 col-xs-12">
                        <div class="img-txt position-relative" data-aos="fade-in" data-aos-offset="200" data-aos-easing="ease-in-sine" data-aos-duration="300">
                            <img src="{{ asset('uploads/manager/' . Setting()->manager_image) }}" alt="" class="position-relative w-100">
                            <img src="{{asset('front')}}/images/old-shape.png" alt="" class="none-mobile">
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12 pt-5">
                        <div class="info-txt pt-5 position-relative" data-aos="fade-up" data-aos-offset="200" data-aos-easing="ease-in-sine" data-aos-duration="300">
                            <img src="{{asset('front')}}/images/quote.png" alt="">
                            <h5 class="colorMain mb-5">{{__('CEO Message')}}</h5>
                            <p class="text-white">{{Setting()->manager_message}}</p>
                        </div>
                        <div class="info-txt mb-3 mt-5" data-aos="fade-up" data-aos-offset="200" data-aos-easing="ease-in-sine" data-aos-duration="400">
                            <h5 class="colorMain">{{Setting()->manager_name}}</h5>
                            <p class="text-white">{{__('CEO - Kaden Investment')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
