@extends('front.master.master')
@section('title', __('Media Center'))
@section('content')
<div class="main-body body-home overflow-hidden">
      <!-- Main Body -->
    <div class="main-body result-search overflow-hidden">

        <!-- Form Search -->
        <div class="container m-auto my-5">
            <form action="{{route('search')}}" method="GET" class="">
                <div class="position-relative">
                    <input type="text" name="search" placeholder="{{__('Enter your search term')}}" class="w-100 rounded-pill border">
                    <i class="icon-search fix-icon-Input text-white"></i>
                </div>
            </form>
        </div>

        <!-- Result Search -->
        <div class="news media-news py-4 position-relative">
            <div class="container">

                <div class="container my-2">
                    <h4 class="colorMain title-sec position-relative mt-0">{{__('research results')}}</h4>
                </div>

                <div class="row my-3">
                    @foreach ($news as $val)
                    <div class="col-md-4 col-xs-12 overflow-hidden">
                        <div class="block-hover" data-aos="fade-left" data-aos-offset="200" data-aos-easing="ease-in-sine" data-aos-duration="300">
                            <div class="position-relative overflow-hidden rounded-3 block-new my-3">
                                <img src="{{ asset('uploads/news/' . $val->image) }}" class="w-100" alt="">
                                <div class="over-info-new p-3">
                                    <span class="text-white">{{ Date::parse($val->created_at)->diffForHumans() }}</span>
                                    <div class="d-flex align-items-center justify-content-between my-3 position-relative">
                                        <h5 class="m-0 text-white position-relative">{{$val->title}}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <p class="text-white">{{ Str::limit($val->content,70) }}</p>
                                <a href="{{route('show-news',$val->id)}}"><i class="icon-arr-l colorMain small-font-12"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
