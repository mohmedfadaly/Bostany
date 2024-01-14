@extends('dashboard/master/master')
@section('title', 'الصيانة')

@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/colors/palette-gradient.css')}}">
@endsection

@section('content')
<div class="content-body">
    <!-- page view start -->
    <section class="page-users-view">
        <div class="row">

            <!-- information card start -->
            @include('dashboard.customer_cars.information_card',['row'=>$row])
            <!-- information card end -->

            <!-- data start -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom mx-2 px-0">
                        <h6 class="border-bottom py-1 mb-0 font-medium-2"><i class="feather icon-lock mr-50 "></i>التشخيصات
                        </h6>
                    </div>
                    <div class="card-body px-75">
                        <div class="table-responsive users-view-permission">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>trouble</th>
                                        <th>pending</th>
                                        <th>permanent</th>
                                        <th>date</th>
                                        <th>time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($row->diagnosis as $value)
                                        <tr>
                                            <td>{{$value->trouble}}</td>
                                            <td>{{$value->pending}}</td>
                                            <td>{{$value->permanent}}</td>
                                            <td>{{$value->date}}</td>
                                            <td>{{$value->time}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- data end -->
        </div>
    </section>
    <!-- page view end -->

</div>
@endsection

@section('page-script')
<script type="text/javascript">

</script>
@endsection
