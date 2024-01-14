<div class="news media-news py-4 position-relative">
    <div class="container">
        <div class="d-flex align-items-center my-4">
            <img src="{{asset('front')}}/images/p-gray.png" alt="">
            <span class="text-white fs-2 mx-3">{{__('Read also')}}</span>
        </div>
        <div class="row my-3">
            @foreach ($news_rand as $val)
            <div class="col-md-4 col-xs-12 overflow-hidden">
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
</div>
