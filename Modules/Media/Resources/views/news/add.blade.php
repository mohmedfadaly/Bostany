@extends('dashboard/master/master')
@section('title', 'اضافة مقال')

@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/colors/palette-gradient.css')}}">
<style>
    .img img {
        width: 120px;
        height: 80px;
        margin-right: 20px;
        margin-top: 20px;
    }

    #gallery-photo-add {
        display: inline-block;
        position: absolute;
        z-index: 1;
        width: 80%;
        height: 50px;
        top: 0;
        left: 0;
        opacity: 0;
        cursor: pointer;
    }
</style>
@endsection

@section('content')
<div class="card">
    {{-- <div class="card-header">
        <h4 class="card-title">Vertical Form</h4>
    </div> --}}
    <div class="card-content">
        <div class="card-body">
            <form class="form form-vertical" novalidate action="{{route('news.store')}}" method="POST" enctype="multipart/form-data">
                <div class="form-body">
                    <div class="row">
                        @csrf
                        <div class="col-sm-12 data-field-col">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label>الصوره </label> <span
                                    class="text-danger">*</span>
                                    <input type="file" name="image"
                                        accept="image/*" onchange="loadAvatar5(event)"
                                        style="display: none;">
                                    <img src="{{ asset('app-assets/images/defoult.jpg') }}"
                                        style="display: block;width: 100%;height: 100px;cursor: pointer;"
                                        onclick="ChooseAvatar5()" id="avatar5">
                                </div>
                                <div class="col-sm-2">
                                    <label>الغلاف </label> <span
                                    class="text-danger">*</span>
                                    <input type="file" name="cover"
                                        accept="image/*" onchange="loadAvatar6(event)"
                                        style="display: none;">
                                    <img src="{{ asset('app-assets/images/defoult.jpg') }}"
                                        style="display: block;width: 100%;height: 100px;cursor: pointer;"
                                        onclick="ChooseAvatar6()" id="avatar6">
                                </div>
                                <div class="col-sm-2">
                                    <label>الافتار </label> <span
                                    class="text-danger">*</span>
                                    <input type="file" name="avatar"
                                        accept="image/*" onchange="loadAvatar7(event)"
                                        style="display: none;">
                                    <img src="{{ asset('app-assets/images/defoult.jpg') }}"
                                        style="display: block;width: 100%;height: 100px;cursor: pointer;"
                                        onclick="ChooseAvatar7()" id="avatar7">
                                </div>
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="name"  style="margin-bottom: 20px;">العنوان عادي </label>

                                                <input type="text" id="name" class="form-control" value="{{ old('title') }}" placeholder=" العنوان" name="title">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="sub_title"  style="margin-bottom: 20px;">العنوان الجانبي  </label>

                                                <input type="text" id="sub_title" value="{{ old('sub_title') }}"  class="form-control" placeholder=" العنوان الجانبي" name="sub_title">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>


                        <div class="col-12 d-flex " style="margin-top: 30px">
                            <textarea class="form-control" name="content"  id="full-featured-non-premium"  rows="10" cols="80" required></textarea>

                        </div>

                        <button class="btn btn-primary store" type="submit" style="margin-right: 20px;margin-top:30px">إضافة مقال
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('page-script')
<script src="{{ asset('app-assets/tinymce/js/tinymce/tinymce.min.js') }}"></script>

<script>
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
        height: 300,
        image_caption: true,
        quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
        noneditable_noneditable_class: 'mceNonEditable',
        toolbar_mode: 'sliding',
        contextmenu: 'link image imagetools table',
        skin: useDarkMode ? 'oxide-dark' : 'oxide',
        content_css: useDarkMode ? 'dark' : 'default',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
    });
</script>
<script type="text/javascript">
        function ChooseAvatar5() {
            $("input[name='image']").click()
        }
        var loadAvatar5 = function(event) {
            var output = document.getElementById('avatar5');
            output.src = URL.createObjectURL(event.target.files[0]);
        };

        function ChooseAvatar7() {
            $("input[name='avatar']").click()
        }
        var loadAvatar7 = function(event) {
            var output = document.getElementById('avatar7');
            output.src = URL.createObjectURL(event.target.files[0]);
        };

        function ChooseAvatar6() {
            $("input[name='cover']").click()
        }
        var loadAvatar6 = function(event) {
            var output = document.getElementById('avatar6');
            output.src = URL.createObjectURL(event.target.files[0]);
        };

</script>
@endsection
