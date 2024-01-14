  <!-- All Teams -->
  <div class="all-teams py-5 position-relative">
    <img src="{{asset('front')}}/images/shape.png" class="shape-png none-mobile" alt="">
    <div class="container">
        <h4 class="text-white pb-4">{{__('Kaden Investment Team')}}</h4>
        <div class="row">
            @foreach ($teams as $val)

            <div class="col-md-4 col-xs-12 over-x-hidden">
                <div class="box-team my-3" data-aos="fade-left" data-aos-offset="200" data-aos-easing="ease-in-sine" data-aos-duration="300">
                    <div class="up-bos position-relative text-center">
                        <div class="bos-img position-relative pt-5">
                            <img src="{{asset('uploads/team/'.$val->image)}}" alt="" class="w-100">
                        </div>
                        <div class="info-bos text-center position-relative py-3">
                            <h4 class="text-white">{{$val->title}}</h4>
                            <p class="colorMain"> {{$val->specialty}}</p>
                            <ul class="d-flex align-items-center justify-content-center my-3">
                                <li><a href="{{$val->link_twitter}}" class="btn-icon-35 rounded-3 bgColorMain d-flex align-items-center justify-content-center mx-2"><i class="icon-twitter text-white"></i></a></li>
                                <li><a href="{{$val->link_facebook}}" class="btn-icon-35 rounded-3 bgColorMain d-flex align-items-center justify-content-center mx-2"><i class="icon-facebook text-white"></i></a></li>
                                <li><a href="{{$val->link_linkedin}}" class="btn-icon-35 rounded-3 bgColorMain d-flex align-items-center justify-content-center mx-2"><i class="icon-linkedin text-white"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
