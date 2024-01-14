<nav class="navbar">
    <div class="container">
        <div class="contain">
            <div class="hamburger">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </div>

            <a href="{{route('home.front')}}" class="brand-name">
                <img src="{{ isset($setting) && $setting->logo != null ? asset('uploads/culture/'.$setting->logo) : asset('front/images/logo/icon.png') }}" loading="lazy" alt="" />
            </a>

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{route('home.front')}}" class="nav-link {{ in_array(request()->route()->getName(),['home.front']) ? "active" : ''}}"> الرئيسية </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('about.front')}}" class="nav-link {{ in_array(request()->route()->getName(),['about.front']) ? "active" : ''}}"> عن الشركة </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('articles.front')}}" class="nav-link {{ in_array(request()->route()->getName(),['articles.front','article.front']) ? "active" : ''}}"> مقالات </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('works.front')}}" class="nav-link {{ in_array(request()->route()->getName(),['works.front']) ? "active" : ''}}"> معرض أعمالنا </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('fuq.front')}}" class="nav-link {{ in_array(request()->route()->getName(),['fuq.front']) ? "active" : ''}}"> الأسئلة الشائعة </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('contact.front')}}" class="nav-link {{ in_array(request()->route()->getName(),['contact.front']) ? "active" : ''}}"> تواصل معنا </a>
                </li>
            </ul>

            <div class="button-contain">
                <a href="https://wa.me/{{$setting->phone}}" class="custom-btn secondary-bk">
                    <span> اطلب خدماتنا الآن </span>
                </a>
            </div>
        </div>
    </div>
</nav>
