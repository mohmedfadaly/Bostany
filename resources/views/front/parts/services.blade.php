<section class="our-services-section">
    <div class="container">
        <div class="content">
            <h5>
                {{$model2->title}}
            </h5>

            <p>
                {{$model2->description}}

            </p>

            <div class="tree-icon">
                <span>
                    <i aria-hidden="true" class="fas fa-tree"></i>
                </span>
            </div>
        </div>

        <div class="our-services-grid">
            @foreach ($OurService as $key => $value)
            <div class="our-services-card">
                <div>
                    <h6>0{{$key + 1}}.</h6>
                </div>
                <h3>{{$value->title}}</h3>
                <p>
                    {{$value->description}}
                </p>
            </div>
            @endforeach

        </div>
    </div>
</section>
