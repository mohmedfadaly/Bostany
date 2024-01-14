@extends('front.master.master')
@section('title', __('Our team'))
@section('content')
<div class="main-body body-home overflow-hidden">
     <!-- Bread Crumb -->
     <div class="bread-crumb my-4">
        <div class="container">
            <ul class="d-flex align-items-center">
                <li><a href="{{route('home')}}">{{__('HOME')}}</a></li>
                <li><a href="">{{__('Our team')}}</a></li>
            </ul>
        </div>
    </div>
    @include('about::front.team.manager')
    @include('about::front.team.teams')

</div>
@endsection
