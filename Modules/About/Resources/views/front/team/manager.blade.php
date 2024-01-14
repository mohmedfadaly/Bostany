
        <div class="bos-man-up py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-5 col-xs-12">
                        <div class="up-bos position-relative text-center">
                            <img src="{{asset('front')}}/images/shim.png" alt="" class="none-mobile">
                            <div class="bos-img position-relative pt-5">
                                <img src="{{ asset('uploads/manager/' . Setting()->manager_image) }}" alt="" class="w-100">
                            </div>
                            <div class="info-bos text-center position-relative">
                                <h4 class="text-white">{{Setting()->manager_name}}</h4>
                                <p class="colorMain">{{__('CEO - Kaden Investment')}}</p>
                                <ul class="d-flex align-items-center justify-content-center my-3">
                                    <li><a href="{{Setting()->link_twitter}}" class="btn-icon-35 rounded-3 bgColorMain d-flex align-items-center justify-content-center mx-2"><i class="icon-twitter text-white"></i></a></li>
                                    <li><a href="{{Setting()->link_facebook}}" class="btn-icon-35 rounded-3 bgColorMain d-flex align-items-center justify-content-center mx-2"><i class="icon-facebook text-white"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-xs-12 d-flex justify-content-center">
                        <div class="right-in-view">
                            <div class="d-flex align-items-center">
                                <div class="icon-title p-2 rounded-3 d-flex align-items-center justify-content-center">
                                    <img src="{{asset('front')}}/images/p-white.png" alt="">
                                </div>
                                <h2 class="text-white mx-3 fw-bold">{{__('Our team')}}</h2>
                            </div>
                            <p class="text-white mt-4">{{__('You can get to know all Kaden members from here and communicate with them through their attached accounts')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
