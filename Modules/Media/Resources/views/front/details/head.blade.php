  <!-- Details Media News -->
  <div class="slider-media-news py-2">
    <div class="container">
        <div class="item-head-details position-relative">
            <img src="{{asset('uploads/news/cover/'.$data->cover)}}" alt="" class="w-100 bg-up">
            <div class="over-info-new p-5 w-100 h-100 d-flex flex-column justify-content-end">
                <div class="mx-txt position-relative">
                    <div class="position-relative">
                        <span class="text-white">{{__('News details')}}</span>
                        <h4 class="text-white">{{$data->title}}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="info-new-details my-5">
            <h6 class="text-white small-font-12">{{ Date::parse($data->created_at)->diffForHumans() }}</h6>
            <p class="text-white line-height-txt">
                {{$data->content}}</p>
        </div>
    </div>
</div>
