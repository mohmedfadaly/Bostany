 <!-- Slider Media -->
 <div class="slider-media py-2">
    <div class="container">
        <div class="slider overflow-hidden">
            <div id="sliderMedia" class="owl-carousel owl-theme sliderMedia">
                @foreach ($sliders as $val)

                <div class="item position-relative">
                    <img src="{{ asset('uploads/media/sliders/' . $val->image) }}" alt="" class="w-100 bg-up">
                    <div class="over-info-new p-5 w-100 h-100 d-flex flex-column justify-content-end">
                        <div class="mx-txt position-relative">
                            <div class="position-relative">
                                <span class="text-white">{{__('News details')}}</span>
                                <h4 class="text-white">{{$val->title}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>
        </div>
    </div>
</div>
