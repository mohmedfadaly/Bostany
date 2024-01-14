@extends('front.master.master')
@section('title', __('HOME'))
@section('content')
<div class="main-body body-home overflow-hidden">
    @include('about::front.about')
    @include('about::front.manager')
    @include('about::front.mission')
    @include('about::front.values')
    @include('about::front.travels')
    @include('about::front.files')

</div>
@endsection
