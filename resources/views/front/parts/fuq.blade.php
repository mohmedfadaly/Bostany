<section class="questions-section">
    <div class="container">
        <div class="questions-content">
            <div class="questions-images">
                <img loading="lazy" decoding="async" width="394" height="550"
                    src="{{ isset($model5) && $model5->image != null ? asset('uploads/main/'.$model5->image) : asset('front/images/global/شركة-بستاني-الأفضل-فى-تنسيق-الحدائق-و-البساتين.jpg') }}"
                    class="attachment-full size-full wp-image-1000" alt=""
                    srcset=""
                    sizes="(max-width: 394px) 100vw, 394px" />

                <div class="questions-images-content">
                    <h4> {{ $model5->sub_title }}</h4>
                </div>
            </div>

            <div class="questions-ask">
                <h4>{{ $model5->title }}</h4>

                <p>
                    {{ $model5->description }}
                </p>

                <div class="questions-collapes">
                    <div id="accordion">
                        @foreach ($Fuq as $key => $value)
                        <div class="card">
                            <div id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse"
                                        data-target="#collapse{{$key + 1}}" aria-expanded="true"
                                        aria-controls="collapse{{$key + 1}}">
                                        <i class="fas fa-chevron-left"></i>
                                        {{$value->title}}
                                    </button>
                                </h5>
                            </div>

                            <div id="collapse{{$key + 1}}" class="collapse show" aria-labelledby="heading{{$key + 1}}"
                                data-parent="#accordion">
                                <div class="card-body">
                                    <p>
                                        {{$value->description}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach



                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
