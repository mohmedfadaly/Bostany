 <!-- Box Mission -->
 <div class="box-mission mb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-xs-12 p-0 px-2">
                <div class="img-mi">
                    <img src="{{ asset('uploads/culture/' . Setting()->culture_image) }}" alt="" class="w-100">
                </div>
            </div>
            <div class="col-md-7 col-xs-12 p-0">
                <div class="bgSecondColor p-5 overflow-hidden">
                    <div class="mb-5 mx-info" data-aos="fade-left" data-aos-offset="200" data-aos-easing="ease-in-sine" data-aos-duration="300">
                        <h4 class="colorMain title-sec position-relative mt-0">{{__('Our mission')}}</h4>
                        <p class="text-white">{{Setting()->mission}}</p>
                    </div>
                    <div class="mt-4 mx-info" data-aos="fade-left" data-aos-offset="200" data-aos-easing="ease-in-sine" data-aos-duration="350">
                        <h4 class="colorMain position-relative mt-0">{{__('Our culture')}}</h4>
                        <p class="text-white">{{Setting()->culture}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
