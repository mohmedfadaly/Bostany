<section class="about-us-section">
    <div class="container">
        <div class="content">
            <p>
                {{ $model4->description }}
            </p>

            <h5>
                {{ $model4->sub_description }}
            </h5>

            <hr style="height: 2px; color: #639e2e; width: 3rem; opacity: 1" />
        </div>
        <div class="about-us-gallery">
            @foreach ($gallary as $key => $value)
            <div class="swiper-slide">
                <figure class="swiper-slide-inner">
                    <img decoding="async" class="swiper-slide-image"
                        src="{{asset('uploads/gallary/'.$value->image)}}" />
                </figure>
            </div>
            <a href="{{asset('uploads/gallary/'.$value->image)}}" data-fancybox="gallery"
                data-caption="{{ $model4->description }}">
                <div style="
                    background-image: url('{{asset('uploads/gallary/'.$value->image)}}');
                    ">
                </div>
            </a>
            @endforeach


        </div>
    </div>
</section>
