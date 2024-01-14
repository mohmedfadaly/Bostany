 <!-- Section Travel Us -->
 <div class="travel-us py-5">
    <div class="container">
        <div class="mb-5 mt-4 mx-info text-center">
            <h4 class="colorMain title-sec position-relative mt-0">{{__('our journey')}}</h4>
            <p class="text-white">{{__('Learn about our work during previous years')}}</p>
        </div>
        <div class="row">
            @foreach ($our_journey as $val)

            <div class="col-md-3 col-xs-12 p-0">
                <div class="box-info-date text-center my-3" data-aos="fade-in" data-aos-offset="200" data-aos-easing="ease-in-sine" data-aos-duration="300">
                    <div class="img-date position-relative py-4">
                        <img src="{{ asset('uploads/journey/' . $val->image) }}" alt="">
                    </div>
                    <div class="info-date px-3 py-4">
                        <div class="d-flex align-items-center justify-content-center">
                            <span class="colorMain small-font-13">{{$val->date}}</span>
                        </div>
                        <p class="text-white small-font-13">{{$val->title}}</p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
