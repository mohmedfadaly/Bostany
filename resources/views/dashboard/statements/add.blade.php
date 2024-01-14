@extends('dashboard/master/master')
@section('title', 'الكشف ')

@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/colors/palette-gradient.css')}}">
@endsection

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">

        @include('dashboard.parts.breadcrumbs')

        <div class="content-body">
            <!-- Form wizard with step validation section start -->
            <section id="validation">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form  action="{{route('clinic.mediccheck',$data->id)}}" method="post" enctype="multipart/form-data" class="steps-validation wizard-circle">
                                        {{csrf_field()}}
                                        <input type="hidden" name="id" value="{{$data->id}}">
                                        <!-- Step 1 -->
                                        <h6><i class="step-icon feather icon-file-plus"></i>  التشخيص</h6>
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="diagnosis">التشخيص</label>
                                                            <textarea name="diagnosis" id="diagnosis" rows="4" value="" class="form-control"></textarea>
                                                        </div>
                                                </div>

                                            </div>
                                        </fieldset>

                                        <!-- Step 2 -->
                                        <h6><i class="step-icon feather icon-file-plus"></i>  العلاج</h6>
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="medicines">العلاج</label>
                                                            <textarea name="medicines" id="medicines" rows="4" value="" class="form-control"></textarea>
                                                        </div>
                                                </div>

                                            </div>
                                        </fieldset>

                                        <!-- Step 3 -->
                                        <h6><i class="step-icon feather icon-file-plus"></i> التحليلات</h6>
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="analytics">التحليلات</label>
                                                            <textarea name="analytics" id="analytics" rows="4" value="" class="form-control"></textarea>
                                                        </div>
                                                </div>

                                            </div>
                                        </fieldset>

                                          <!-- Step 3 -->
                                          <h6><i class="step-icon feather icon-file-plus"></i> الاشعة</h6>
                                          <fieldset>
                                              <div class="row">
                                                  <div class="col-md-12">
                                                          <div class="form-group">
                                                              <label for="rays">الاشعة</label>
                                                              <textarea name="rays" id="rays" rows="4" value="" class="form-control"></textarea>
                                                          </div>
                                                  </div>

                                              </div>
                                          </fieldset>

                                            <!-- Step 3 -->
                                        <h6><i class="step-icon feather icon-file-plus"></i> الإعادة</h6>
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="address">الإعادة</label>
                                                            <input type='text' name="return_date" class="form-control format-picker" />
                                                        </div>
                                                </div>

                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Form wizard with step validation section end -->
        </div>
    </div>
</div>
@endsection

@section('page-script')
<script type="text/javascript">
    function ChooseAvatar(){$("input[name='logo']").click()}
	var loadAvatar = function(event) {
		var output = document.getElementById('avatar');
		output.src = URL.createObjectURL(event.target.files[0]);
	};
</script>
@endsection
