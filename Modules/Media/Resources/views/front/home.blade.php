@extends('front.master.master')
@section('title', __('Media Center'))
@section('content')
<div class="main-body body-home overflow-hidden">
     <!-- Bread Crumb -->
     <div class="bread-crumb my-4">
        <div class="container">
            <ul class="d-flex align-items-center">
                <li><a href="{{route('home')}}">{{__('Home')}}</a></li>
                <li><a href="">{{__('Media Center')}}</a></li>
            </ul>
        </div>
    </div>
    @include('media::front.head')
    @include('media::front.news')

</div>
@endsection
