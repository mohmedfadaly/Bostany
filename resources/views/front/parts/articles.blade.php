<section class="articles-section">
    <div class="our-services-section">
        <div class="container">
            <div class="content">
                <p>{{ $model6->title }}</p>

                <div class="tree-icon">
                    <span>
                        <i aria-hidden="true" class="fas fa-tree"></i>
                    </span>
                </div>
            </div>

            <div class="articles-content">
                <!--  -->
                <div class="swiper swiper-articles">
                    <div class="swiper-wrapper">
                        @foreach ($news as $key => $value)
                        <div class="swiper-slide">
                            <figure class="swiper-slide-inner">
                                <div class="post-card">
                                    <a href="{{ route('article.front', $value?->id) }}">
                                        <div class="articles-image">
                                            <img loading="lazy" decoding="async" width="750" height="500"
                                                src="{{asset('uploads/news/'.$value->image)}}"
                                                class="attachment-full size-full wp-image-1117" alt="articles-image"
                                                srcset=""
                                                sizes="(max-width: 750px) 100vw, 750px" />
                                        </div>
                                    </a>

                                    <div class="post-card__badge">
                                        {{$value->sub_title}}
                                    </div>

                                    <div class="post-card__description">
                                        <div>
                                            <a href="{{ route('article.front', $value?->id) }}">
                                                {{$value->title}}
                                            </a>
                                        </div>
                                        <a href="{{ route('article.front', $value?->id) }}"> قراءة المزيد » </a>
                                    </div>
                                </div>
                            </figure>
                        </div>
                        @endforeach


                    </div>
                </div>
                <!--  -->
            </div>
        </div>
    </div>
</section>
