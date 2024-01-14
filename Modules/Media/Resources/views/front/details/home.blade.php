@extends('front.master.master')
@section('title', __('Media Center'))
@section('content')
<div class="main-body body-home overflow-hidden">
    <!-- Bread Crumb -->
    <div class="bread-crumb my-4">
        <div class="container">
            <ul class="d-flex align-items-center">
                <li><a href="{{route('home')}}">{{__('Home')}}</a></li>
                <li><a href="{{route('media-center')}}">{{__('Media Center')}}</a></li>
                <li><a href="">{{__('News details')}}</a></li>
            </ul>
        </div>
    </div>
    @include('media::front.details.head')
    @include('media::front.details.also')

</div>
@endsection
