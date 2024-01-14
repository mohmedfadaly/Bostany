  <!-- Media News -->
  <div class="news media-news py-4 position-relative">
    <div class="container">
        <div class="my-2">
            <h4 class="colorMain title-sec position-relative mt-0">{{__('The latest news in Kaden Investment Company')}}</h4>
        </div>
        <div class="row mb-5">
            <div class="col-md-8 col-xs-12">
                <div class="row my-3">
                    @foreach ($news as $val)

                    <div class="col-md-6 col-xs-12 overflow-hidden">
                        <div class="position-relative overflow-hidden rounded-3 block-new my-3" data-aos="fade-left" data-aos-offset="200" data-aos-easing="ease-in-sine" data-aos-duration="300">
                            <img src="{{ asset('uploads/news/' . $val->image) }}" class="w-100" alt="">
                            <div class="over-info-new p-3">
                                <span class="text-white">{{ Date::parse($val->created_at)->diffForHumans() }}</span>
                                <div class="d-flex align-items-center justify-content-between my-3 position-relative">
                                    <h5 class="m-0 text-white position-relative">{{$val->title}}</h5>
                                    <a href="{{route('show-news',$val->id)}}"><i class="icon-arr-l text-white small-font-11"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
            <div class="col-md-4 col-xs-12 overflow-hidden">
                <div class="overflow-hidden rounded-3 mb-4 mt-5" data-aos="fade-right" data-aos-offset="200" data-aos-easing="ease-in-sine" data-aos-duration="300">
                    <h4 class="m-0 p-3 bgColorMain text-dark">{{__('Read also')}}</h4>
                    <div class="box-more-news p-3">
                        @foreach ($news_rand as $val)

                        <div class="my-4 block-more-new d-flex align-items-center">
                            <div class="img-new overflow-hidden rounded-3">
                                <img src="{{ asset('uploads/news/' . $val->image) }}" alt="" class="w-100 h-100">
                            </div>
                            <div class="info-more-new px-3">
                                <h6 class="text-white mb-3">
                                    {{$val->title}}
                                </h6>
                                <p class="text-secondary">{{ Date::parse($val->created_at)->diffForHumans() }}</p>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
                <div class="overflow-hidden rounded-3 mb-4 mt-5" data-aos="fade-right" data-aos-offset="200" data-aos-easing="ease-in-sine" data-aos-duration="300">
                    <div class="box-more-news-slider">
                        <h4 class="m-0 pt-3 pb-2 text-white text-center">{{__('events')}}</h4>
                        <div class="slide-in-more-image-news">
                            <div id="sliderMedia" class="owl-carousel owl-theme sliderMedia">
                                @foreach ($gallary as $val)
                                <div class="item position-relative">
                                        <img src="{{ asset('uploads/gallary/' . $val->image) }}" alt="" class="w-100 mt-3">
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
