@extends('dashboard/master/master')
@section('title', 'الإعدادات')

@section('page-style')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/core/colors/palette-gradient.css') }}">
@endsection
@section('content')

<!-- account setting page start -->
<section id="page-account-settings">
    <div class="row">
        <!-- left menu section -->
        <div class="col-md-3 mb-2 mb-md-0">
            <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                <li class="nav-item">
                    <a class="nav-link d-flex py-75 active" id="account-pill-general" data-toggle="pill"
                        href="#account-vertical-general" aria-expanded="true">
                        <i class="feather icon-globe mr-50 font-medium-3"></i>
                            الإعدادات العامة
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link d-flex py-75" id="account-pill-password" data-toggle="pill"
                        href="#account-vertical-password" aria-expanded="false">
                        <i class="feather icon-info mr-50 font-medium-3"></i>
                        المدير العام
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link d-flex py-75" id="account-pill-info" data-toggle="pill"
                        href="#account-vertical-info" aria-expanded="false">
                        <i class="feather icon-info mr-50 font-medium-3"></i>
                            التواصل
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex py-75" id="account-pill-extra" data-toggle="pill"
                        href="#account-vertical-extra" aria-expanded="false">
                        <i class="feather icon-info mr-50 font-medium-3"></i>
                        الصور
                    </a>
                </li>
            </ul>
        </div>
        <!-- right content section -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="account-vertical-general"
                                aria-labelledby="account-pill-general" aria-expanded="true">

                                <form novalidate action="{{ route('setting.update') }}" method="post"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="name">
                                                        الاسم
                                                    </label>
                                                    <input type="text" class="form-control required"
                                                        value="{{ $setting->name }}" id="name"
                                                        name="name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="category">
                                                        lat
                                                    </label>
                                                    <input type="text" class="form-control required"
                                                        value="{{ $setting->lat }}"
                                                        id="lat" name="lat">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="long">
                                                        long
                                                    </label>
                                                    <input type="text" class="form-control required"
                                                        value="{{ $setting->long }}"
                                                        id="lat" name="long">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="zoom">
                                                        zoom
                                                    </label>
                                                    <input type="number" class="form-control required"
                                                        value="{{ $setting->zoom }}"
                                                        id="lat" name="zoom">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="phone">
                                                        الهاتف
                                                    </label>
                                                    <input type="number" class="form-control required"
                                                        value="{{ $setting->phone }}"
                                                        id="phone" name="phone">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="email">
                                                        البريد الإلكتروني
                                                    </label>
                                                    <input type="email" class="form-control required"
                                                        value="{{ $setting->email }}"
                                                        id="email" name="email">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="address[ar]">
                                                        العنوان بالعربي
                                                    </label>
                                                    <input type="text" class="form-control required"
                                                        value="{{ $setting->getTranslation('address', 'ar') }}"
                                                        id="address[ar]" name="address[ar]">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="address[en]">
                                                        العنوان بالإنجليزي
                                                    </label>
                                                    <input type="text" class="form-control required"
                                                        value="{{ $setting->getTranslation('address', 'en') }}"
                                                        id="address[en]" name="address[en]">
                                                </div>
                                            </div>
                                        </div>


                                        <div
                                            class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                            <button type="submit"
                                                class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">
                                                حفظ التعديلات</button>
                                            <button type="reset"
                                                class="btn btn-outline-warning">إعادة</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade " id="account-vertical-password" role="tabpanel"
                                aria-labelledby="account-pill-password" aria-expanded="false">
                                <form novalidate action="{{ route('setting.update') }}" method="post"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <div class="media">
                                        <a href="javascript: void(0);">
                                            <img src="{{ asset('uploads/manager/' . $setting->manager_image) }}"
                                                onclick="ChooseAvatar()" class="rounded mr-75"
                                                alt="profile image" id="avatar" height="64"
                                                width="64">
                                        </a>
                                        <div class="media-body mt-75">
                                            <div
                                                class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                <label
                                                    class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer"
                                                    onclick="ChooseAvatar()">رفع صورة جديدة </label>
                                                <input type="file" id="account-upload" name="manager_image"
                                                    onchange="loadAvatar(event)" hidden>
                                            </div>
                                            <p class="text-muted ml-75 mt-50"><small>Allowed JPG, GIF or
                                                    PNG. Max
                                                    size of
                                                    800kB</small></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="manager_name">
                                                        الاسم
                                                    </label>
                                                    <input type="text" class="form-control required"
                                                        value="{{ $setting->manager_name }}" id="manager_name"
                                                        name="manager_name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="link_linkedin">
                                                        لينكد ان المدير
                                                    </label>
                                                    <input type="text" class="form-control required"
                                                        value="{{ $setting->link_linkedin }}"
                                                        id="link_linkedin" name="link_linkedin">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="link_facebook">
                                                        فيسبوك المدير
                                                    </label>
                                                    <input type="text" class="form-control required"
                                                        value="{{ $setting->link_facebook }}"
                                                        id="link_facebook" name="link_facebook">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="link_twitter">
                                                        تويتر المدير
                                                    </label>
                                                    <input type="text" class="form-control required"
                                                        value="{{ $setting->link_twitter }}"
                                                        id="link_twitter" name="link_twitter">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="data-manager_message_ar">الرسالة بالعربية</label>
                                            <textarea name="manager_message[ar]" class="form-control" id="data-manager_message_ar" cols="45" rows="10" required>
                                                {{$setting->getTranslation('manager_message', 'ar')}}
                                            </textarea>
                                        </div>

                                        <div class="col-12">
                                            <label for="data-manager_message_en">الرسالة بالإنجليزية</label>
                                            <textarea name="manager_message[en]" class="form-control" id="data-manager_message_en" cols="45" rows="10" required>
                                                {{$setting->getTranslation('manager_message', 'en')}}
                                            </textarea>
                                        </div>
                                        <div
                                            class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                            <button type="submit"
                                                class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">
                                                حفظ التعديلات</button>
                                            <button type="reset"
                                                class="btn btn-outline-warning">إعادة</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="account-vertical-info" role="tabpanel"
                                aria-labelledby="account-pill-info" aria-expanded="false">
                                <form novalidate action="{{ route('setting.update') }}" method="post"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="youtube">
                                                     يوتيوب
                                                    </label>
                                                    <input type="text" class="form-control required"
                                                        value="{{ $setting->youtube }}"
                                                        id="youtube" name="youtube">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="facebook">
                                                        فيسبوك
                                                    </label>
                                                    <input type="text" class="form-control required"
                                                        value="{{ $setting->facebook }}"
                                                        id="facebook" name="facebook">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="twitter">
                                                        تويتر
                                                    </label>
                                                    <input type="text" class="form-control required"
                                                        value="{{ $setting->twitter }}"
                                                        id="twitter" name="twitter">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="insta">
                                                        انستجرام
                                                    </label>
                                                    <input type="text" class="form-control required"
                                                        value="{{ $setting->insta }}"
                                                        id="insta" name="insta">
                                                </div>
                                            </div>
                                        </div>


                                        <div
                                            class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                            <button type="submit"
                                                class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">
                                                حفظ التعديلات</button>
                                            <button type="reset"
                                                class="btn btn-outline-warning">إعادة</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="account-vertical-extra"
                                role="tabpanel" aria-labelledby="account-pill-extra"
                                aria-expanded="false">
                                <form novalidate action="{{ route('setting.update') }}" method="post"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <div class="row">

                                        <div class="col-3">
                                            <label> اللوجو </label> <span
                                            class="text-danger">*</span>
                                            <input type="file" name="logo"
                                                accept="image/*" onchange="loadAvatar6(event)"
                                                style="display: none;">
                                            <img src="{{ $setting->logo != null ? asset('uploads/culture/'.$setting->logo) : asset('front/images/logo/icon.png') }}"
                                                style="display: block;width: 100%;height: 100px;cursor: pointer;"
                                                onclick="ChooseAvatar6()" id="avatar6">
                                        </div>
                                        <div class="col-12">
                                            <label>صورة تواصل معنا  </label> <span
                                            class="text-danger">*</span>
                                            <input type="file" name="contact_image"
                                                accept="image/*" onchange="loadAvatar5(event)"
                                                style="display: none;">
                                            <img src="{{ $setting->contact_image != null ? asset('uploads/about/'.$setting->contact_image) : asset('front/images/global/landscapping-work-شركة-بستاني-الأفضل-فى-تنسيق-الحدائق-و-البساتين-تنسيق-حدائق-كافر-صفحات-الموقع-تواصل-مع-الشركة.jpg') }}"
                                                style="display: block;width: 100%;height: 300px;cursor: pointer;"
                                                onclick="ChooseAvatar5()" id="avatar5">
                                        </div>

{{--
                                        <div class="col-12">
                                            <label for="data-about_ar">من نحن بالعربية</label>
                                            <textarea name="about[ar]" class="form-control" id="data-about_ar" cols="45" rows="10" required>
                                                {{$setting->getTranslation('about', 'ar')}}
                                            </textarea>
                                        </div>

                                        <div class="col-12">
                                            <label for="data-about_en">من نحن بالإنجليزية</label>
                                            <textarea name="about[en]" class="form-control" id="data-about_en" cols="45" rows="10" required>
                                                {{$setting->getTranslation('about', 'en')}}
                                            </textarea>
                                        </div>
                                        <div class="col-12">
                                            <label for="data-mission_ar">مهمتنا بالعربية</label>
                                            <textarea name="mission[ar]" class="form-control" id="data-mission_ar" cols="45" rows="10" required>
                                                {{$setting->getTranslation('mission', 'ar')}}
                                            </textarea>
                                        </div>

                                        <div class="col-12">
                                            <label for="data-mission_en"> مهمتنا بالإنجليزية</label>
                                            <textarea name="mission[en]" class="form-control" id="data-mission_en" cols="45" rows="10" required>
                                                {{$setting->getTranslation('mission', 'en')}}
                                            </textarea>
                                        </div>
                                        <div class="col-12">
                                            <label for="data-culture_ar">ثقافتنا بالعربية</label>
                                            <textarea name="culture[ar]" class="form-control" id="data-culture_ar" cols="45" rows="10" required>
                                                {{$setting->getTranslation('culture', 'ar')}}
                                            </textarea>
                                        </div>

                                        <div class="col-12">
                                            <label for="data-culture_en"> ثقافتنا بالإنجليزية</label>
                                            <textarea name="culture[en]" class="form-control" id="data-culture_en" cols="45" rows="10" required>
                                                {{$setting->getTranslation('culture', 'en')}}
                                            </textarea>
                                        </div> --}}
                                        <div
                                            class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                            <button type="submit"
                                                class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">
                                                حفظ التعديلات</button>
                                            <button type="reset"
                                                class="btn btn-outline-warning">إعادة</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('page-script')
<script type="text/javascript">
        function ChooseAvatar() {
            $("input[name='manager_image']").click()
        }
        var loadAvatar = function(event) {
            var output = document.getElementById('avatar');
            output.src = URL.createObjectURL(event.target.files[0]);
        };
        function ChooseAvatar5() {
            $("input[name='contact_image']").click()
        }
        var loadAvatar5 = function(event) {
            var output = document.getElementById('avatar5');
            output.src = URL.createObjectURL(event.target.files[0]);
        };

        function ChooseAvatar6() {
            $("input[name='logo']").click()
        }
        var loadAvatar6 = function(event) {
            var output = document.getElementById('avatar6');
            output.src = URL.createObjectURL(event.target.files[0]);
        };

        // $(document).on('click', '.add_mobiles', function() {
        //     $('.mobiles').append(
        //         `
		// <div class="col-sm-12 father${Date.now()}" style="margin-top:10px">
		// 	<div class="row">
		// 		<div class="col-sm-11" style="padding-left: 5px ">
        //             <input type="text" name="extra[]" class="form-control" placeholder="الإضافة" >
		// 		</div>
		// 		<div class="col-sm-1" style="padding: 0 ">
		// 			<button type="button" class="btn btn-danger btn-block remove_mobiles" data-code="${Date.now()}">
		// 				<i style="margin: 0px -7px " class="fa fa-minus-circle"></i>
		// 			</button>
		// 		</div>
		// 	</div>
		// </div>
		// `
        //     );
        // })

        // $(document).on('click', '.remove_mobiles', function() {
        //     var cla = '.father' + $(this).data('code');
        //     $(cla).remove();
        // })


    </script>
    {{-- <script src="{{ asset('app-assets/tinymce/js/tinymce/tinymce.min.js') }}"></script> --}}
    {{-- <script>
        var useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;

        tinymce.init({
            selector: 'textarea#full-featured-non-premium',
            plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
            imagetools_cors_hosts: ['picsum.photos'],
            menubar: 'file edit view insert format tools table help',
            toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
            toolbar_sticky: true,
            autosave_ask_before_unload: true,
            autosave_interval: '30s',
            autosave_prefix: '{path}{query}-{id}-',
            autosave_restore_when_empty: false,
            autosave_retention: '2m',
            image_advtab: true,
            link_list: [{
                    title: 'My page 1',
                    value: 'https://www.tiny.cloud'
                },
                {
                    title: 'My page 2',
                    value: 'http://www.moxiecode.com'
                }
            ],
            image_list: [{
                    title: 'My page 1',
                    value: 'https://www.tiny.cloud'
                },
                {
                    title: 'My page 2',
                    value: 'http://www.moxiecode.com'
                }
            ],
            image_class_list: [{
                    title: 'None',
                    value: ''
                },
                {
                    title: 'Some class',
                    value: 'class-name'
                }
            ],
            importcss_append: true,
            file_picker_callback: function(callback, value, meta) {
                /* Provide file and text for the link dialog */
                if (meta.filetype === 'file') {
                    callback('https://www.google.com/logos/google.jpg', {
                        text: 'My text'
                    });
                }

                /* Provide image and alt text for the image dialog */
                if (meta.filetype === 'image') {
                    callback('https://www.google.com/logos/google.jpg', {
                        alt: 'My alt text'
                    });
                }

                /* Provide alternative source and posted for the media dialog */
                if (meta.filetype === 'media') {
                    callback('movie.mp4', {
                        source2: 'alt.ogg',
                        poster: 'https://www.google.com/logos/google.jpg'
                    });
                }
            },
            templates: [{
                    title: 'New Table',
                    description: 'creates a new table',
                    content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>'
                },
                {
                    title: 'Starting my story',
                    description: 'A cure for writers block',
                    content: 'Once upon a time...'
                },
                {
                    title: 'New list with dates',
                    description: 'New List with dates',
                    content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>'
                }
            ],
            template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
            template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
            height: 600,
            image_caption: true,
            quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
            noneditable_noneditable_class: 'mceNonEditable',
            toolbar_mode: 'sliding',
            contextmenu: 'link image imagetools table',
            skin: useDarkMode ? 'oxide-dark' : 'oxide',
            content_css: useDarkMode ? 'dark' : 'default',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
        });
    </script> --}}
@endsection
