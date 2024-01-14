@extends('dashboard/master/master')
@section('title', 'تعديل مركز صيانة')

@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/colors/palette-gradient.css')}}">
@endsection

@section('content')
<div class="card">
    {{-- <div class="card-header">
        <h4 class="card-title">Vertical Form</h4>
    </div> --}}
    <div class="card-content">
        <div class="card-body">
            <form class="form form-vertical" action="{{route('maintenance_center.update',$row->id)}}" method="POST" enctype="multipart/form-data">
                <div class="form-body">
                    <div class="row">
                        @csrf

                        <div class="col-12">
                            <div class="row">

                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="logo"> الشعار <span class="text-primary">*</span> </label>
                                        <input type="file" class="form-control" name="logo" accept="image/*" id="logo">
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="name_en">الإسم بالعربية <span class="text-danger">*</span> </label>
                                        <input type="text" value="{{$row->name_ar}}" class="form-control" maxlength="190" name="name_en" required id="name_en">
                                    </div>
                                </div>
        
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="name_ar">الإسم بالإنجليزية <span class="text-danger">*</span> </label>
                                        <input type="text"  value="{{$row->name_en}}" class="form-control" maxlength="190" name="name_ar" required id="name_ar">
                                    </div>
                                </div>
        
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="city_id">المدينة <span class="text-danger">*</span> </label>
                                        <select name="city_id" class="form-control" id="city_id">
                                            @foreach($cities as $city)
                                                <option value="{{$city->id}}" {{ $row->city_id === $city->id ? 'selected' : '' }}>{{$city->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-6">
                            <div class="row">

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="phones"> أرقام الجوال <span class="text-warning">إفصل بين كل رقم بمسافة </span></label>
                                        <textarea name="phones" class="form-control" id="phones" cols="10" rows="5" required>{{ $row->phones }}</textarea>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="emails"> الإيميلات <span class="text-warning">إفصل بين كل إيميل بمسافة </span> </label>
                                        <textarea name="emails" class="form-control" id="emails" cols="10" rows="5">{{$row->emails}}</textarea>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="lat"> lat <span class="text-danger">*</span></label>
                                        <input name="lat"  value="{{$row->lat}}" class="form-control" id="lat" required>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="lng"> lng <span class="text-danger">*</span></label>
                                        <input name="lng"  value="{{$row->lng}}" class="form-control" id="lng" required>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="address"> العنوان <span class="text-danger">*</span></label>
                                        <textarea name="address" class="form-control" id="address" cols="10" rows="5" required>{{$row->address}}</textarea>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-6">
                            <div class="row">
                                <div class="col-6">
                                    @foreach($dates as $key => $date)
                                        <div class="form-group">
                                            @if($key == 0)
                                                <label> الأيام <span class="text-danger"> *</span> </label>
                                            @endif
                                            <select name="day{{$key+1}}[]" class="select2 form-control" multiple="multiple"  id="day{{$key+1}}">
                                                @foreach(WeekDayes('null') as $en =>$ar)
                                                    <option value="{{$en}}" {{ in_array($en,explode(' ',$date->day)) ? 'selected' : ''}}>{{$ar}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endforeach

                                    @for($i = count($dates) + 1;$i<=7;$i++)
                                        <div class="form-group">
                                            @if($i == 1)
                                                <label> الأيام <span class="text-danger"> *</span> </label>
                                            @endif
                                            <select name="day{{$i}}[]" class="select2 form-control" multiple="multiple"  id="day{{$i}}">
                                                @foreach(WeekDayes('null') as $en =>$ar)
                                                    <option value="{{$en}}">{{$ar}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endfor
                                </div>

                                <div class="col-6">

                                    @foreach($dates as $time_key => $time)
                                        <div class="form-group">
                                            @if($time_key == 0)
                                                <label > المواعيد <span class="text-danger"> *</span> </label>
                                            @endif
                                            <input type="text" value="{{$time->time}}" name="time{{$time_key+1}}" class="form-control" maxlength="190" >
                                        </div>
                                    @endforeach

                                    @for($i = count($dates) + 1;$i<=7;$i++)
                                        <div class="form-group">
                                             @if($i == 1)
                                                <label > المواعيد <span class="text-danger"> *</span> </label>
                                            @endif
                                            <input type="text" name="time{{$i}}" class="form-control" maxlength="190" >
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <button class="btn btn-primary" type="submit">حفظ</button>

            </form>
        </div>
    </div>
</div>
@endsection

@section('page-script')
<script type="text/javascript">

</script>
@endsection
