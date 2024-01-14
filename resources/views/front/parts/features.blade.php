<section class="features-section">
    <div class="container content">
        <h1>
            {{$model3->title}}
        </h1>

        <h5>مميزات شركة بستاني</h5>

        <div class="tree-icon">
            <span>
                <i aria-hidden="true" class="fas fa-tree"></i>
            </span>
        </div>

        <div class="features-grid">
            <div class="features-image">
                <img fetchpriority="high" decoding="async" width="550" height="600"
                    src="{{ isset($model3) && $model3->image != null ? asset('uploads/main/'.$model3->image) :  asset('front/images/global/features1img.png') }}"
                    class="attachment-full size-full wp-image-814" alt=""
                    srcset=""
            sizes="(max-width: 550px) 100vw, 550px" />
            </div>

            <div class="features-cards">

                @foreach ($OurFeature as $key => $value)
                <div class="features-card">
                    <div class="card-content">
                        <h4>{{$value->title}}</h4>
                        <p>
                            {{$value->description}}
                        </p>
                    </div>

                    <div class="card-icon">
                        <i aria-hidden="true" class="fas fa-tree"></i>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="features-small-card-swiper">
            <div class="swiper swiper-features">
                <div class="swiper-wrapper">
                    @foreach ($gallary as $key => $value)
                    <div class="swiper-slide">
                        <figure class="swiper-slide-inner">
                            <img decoding="async" class="swiper-slide-image"
                                src="{{asset('uploads/gallary/'.$value->image)}}" />
                        </figure>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="counter-number">
            <div>
                <h6 class="text-center" id="housesCounter">+{{$model3->home}}</h6>
                <p class="text-center">منازل تم تجميلها</p>
            </div>
            <div>
                <h6 class="text-center">+{{$model3->villa}}</h6>
                <p class="text-center">فيلات تم تجميلها</p>
            </div>
            <div>
                <h6 class="text-center">+{{$model3->client}}</h6>
                <p class="text-center">عميل سعيد</p>
            </div>
            <div>
                <h6 class="text-center">+{{$model3->years}}</h6>
                <p class="text-center">سنوات خبرة</p>
            </div>
        </div>
    </div>
</section>
