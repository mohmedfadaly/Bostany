<!DOCTYPE html>
<html dir="rtl">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="...." />
    <meta name="author" content="misara adel" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Bostany - شركة بستاني لتنسيق الحدائق و الجنائن</title>
    <link rel="shortcut icon" href="{{ asset('front') }}/images/logo/icon.png" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('front') }}/css/lib/animate.css" />
    <link rel="stylesheet" href="{{ asset('front') }}/css/lib/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('front') }}/font-awesome/all.min.css" />
    <link rel="stylesheet" href="{{ asset('front') }}/css/lib/swiper-bundle.min.css" />

    <link rel="stylesheet" href="{{ asset('front') }}/css/lib/jquery.fancybox.css" />
    <link rel="stylesheet" href="{{ asset('front') }}/css/style.css" />
    <link rel="icon" href="https://bostany.net/wp-content/uploads/2018/10/cropped-favicon-free-img-1-300x300.png"
        sizes="192x192" />
    <link rel="apple-touch-icon"
        href="https://bostany.net/wp-content/uploads/2018/10/cropped-favicon-free-img-1-300x300.png" />
</head>

<body>
    @include('front.parts.nav')


    <main>
        @yield('content')

        @include('front.parts.footer')

    </main>

    <script src="{{ asset('front') }}/js/lib/jquery4.js"></script>

    <script src="{{ asset('front') }}/font-awesome/all.min.js"></script>
    <script src="{{ asset('front') }}/js/lib/popper.js"></script>
    <script src="{{ asset('front') }}/js/lib/bootstrap.js"></script>
    <script src="{{ asset('front') }}/js/lib/swiper-bundle.min.js"></script>
    <script src="{{ asset('front') }}/js/lib/jquery.fancybox.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/countup.js/2.8.0/countUp.min.js"
        integrity="sha512-CVTKy2ABGi6IHJfP4ZBpk2/zhwgLjifRe6nGKfRSRY8OfRC9FT8hJqYUcrKJlHDFnsRoeJfqyLnqHgbgR/I+Bw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{ asset('front') }}/js/main.js"></script>
</body>

</html>
