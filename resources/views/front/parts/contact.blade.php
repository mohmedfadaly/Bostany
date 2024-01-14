<section class="call-us-section">
    <div class="container">
        <div class="call-us-content">
            <div class="image-three">
                <img src="{{ isset($model7) && $model7->image != null ? asset('uploads/main/'.$model7->image) : asset('front/images/global/cropped-potted-plant-1.png') }}" alt="call-us" />
            </div>
            <div class="logo-call-us">
                <img loading="lazy" width="1206" height="531"
                    src="{{ asset('front') }}/images/logo-groub/logo-dark/Arabic-Dark.png"
                    class="attachment-full size-full wp-image-13" alt=""
                    srcset="
          {{ asset('front') }}/images/logo-groub/logo-dark/Arabic-Dark.png          1206w,
          {{ asset('front') }}/images/logo-groub/logo-dark/Arabic-Dark-300x132.png   300w,
          {{ asset('front') }}/images/logo-groub/logo-dark/Arabic-Dark-1024x451.png 1024w,
          {{ asset('front') }}/images/logo-groub/logo-dark/Arabic-Dark-768x338.png   768w
        "
                    sizes="(max-width: 1206px) 100vw, 1206px" />
            </div>

            <p>
                {{ $model7->description }}
            </p>

            <div class="call-us-number">
                <h2>
                    <a href="https://wa.me/{{$setting->phone}}" target="_blank">{{$setting->phone}}</a>
                </h2>
            </div>

            <hr style="height: 2px; color: #0d3c00; width: 3rem; opacity: 1" />
        </div>
    </div>
</section>
