  <!-- Section Rate Us -->
  <div class="rate-us pt-2 pb-5 mb-5">
    <div class="container">
        <div class="list-info-about">
            <div class="d-flex align-items-center my-4">
                <img src="{{asset('front')}}/images/p-gray.png" alt="">
                <span class="text-white fs-2 mx-3">{{__('our values')}}</span>
            </div>
            <div class="row">

                @foreach ($our_values as $key => $val )
                      
                        <div class="col-md-3 col-xs-12 overflow-hidden">
                            <div class="my-2" data-aos="fade-left" data-aos-offset="200" data-aos-easing="ease-in-sine" data-aos-duration="400">
                                <span class="oldMainColor fs-1">0{{$key +1}}</span>
                                <div class="px-2">
                                    <p class="text-white fw-bold">{{$val->title}}</p>
                                    <p class="text-white">
                                        {{$val->content}}

                                    </p>
                                </div>
                            </div>
                        </div>
                 @endforeach
            </div>
        </div>
    </div>
</div>
