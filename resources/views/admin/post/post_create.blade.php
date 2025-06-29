@extends('layouts.admin_layout')

@section('page_title')
    Post Create
@endsection
@section('main_content')
    <!-- Bootstrap CSS -->

    <form class="form-horizontal" action="{{ route('post.store') }}" method="Post" enctype="multipart/form-data">
        @csrf
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="">
                            <h4 class="m-0">Create Post</h4>
                        </div>
                        <div class="select-container">
                            <select name="language" class=" btn btn-danger" id="language">
                                <option value="bn">Bangla</option>
                                <option value="en">English</option>
                            </select>
                        </div>
                        <div class="">
                            <a href="{{route('post.index')}}" class="btn btn-primary waves-effect waves-light"><i class="fe-list"></i> Post List</a>

                        </div>
                    </div>
                </div>
                <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 justify-content-start">
                                <div class=" form-group">
                                    <label style="margin-right: 10px;" for="title">Headline*</label>
                                    <input type="text" name="title" required value="{{old('title')}}" class="form-control" placeholder="News Headline">
                                </div>
                            </div>
                            <div class="col-md-12 justify-content-start">
                                <div class=" form-group">
                                    <label style="margin-right: 10px;" for="title">Sub Headline</label>
                                    <input type="text" name="sub_headline" value="{{old('sub_headline')}}" class="form-control" placeholder="News Sub Headline">
                                </div>
                            </div>
                            <div class="col-md-12 justify-content-start">
                                <div class="form-group">
                                    <label style="margin-right: 10px;" for="subtitle">Short Details</label>
                                    <textarea class="form-control" id="subtitle" name="subtitle" cols="30" rows="3">{{old('subtitle')}}</textarea>
                                </div>
                            </div>
                            @if(auth()->user()->role_id==1)
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="author_id">Select Author</label>
                                    <select class="form-control" name="author_id" id="author_id">
                                        <option selected disabled>Select Author</option>
                                        @foreach($authors as $auth)
                                            <option value="{{$auth->id}}">{{$auth->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @endif
                            <div class="col-md-6 pt-4">
                                <div class="form-group">
                                    <input name="video_check" class="" type="checkbox" id="is_video">
                                    <label for="is_video">Is it a video post ?</label>
                                </div>
                            </div>
                        </div>
                    <div class="row d-none" id="video_input">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="video_duration">Video Duration</label>
                                <input value="{{old('video_duration')}}" class="form-control" type="text" id="video_duration" name="video_duration" placeholder="Video Duration">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="video_id">Video id</label>
                                <input value="{{old('video_id')}}" class="form-control" type="text" id="video_id" name="video_id" placeholder="Video Id">
                            </div>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="news_details">News Details *</label>
                                    <textarea style="height: 600px" class="form-control" name="news_details" id="news_details" cols="30" rows="10">{{old('news_details')}}</textarea>
                                </div>
                            </div>
                        </div>
                    @if(auth()->user()->role_id==1)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h4 class="text-left mb-2">Source *</h4>
                                    <div class="row">
                                        <div class="col-4">
                                            <input type="radio" id="radio_1" onclick="showOthers('radio_1')" value="own_reporter" {{old('source') == 'own_reporter' ? 'checked' : ''}} name="source">
                                            <label class="mt-2" for="radio_1">নিজস্ব প্রতিবেদক</label>
                                        </div>
                                        <div class="col-4">
                                            <input type="radio" id="radio_2" checked onclick="showOthers('radio_2')" value="online_desk" {{old('source') == 'online_desk' ? 'checked' : ''}} name="source">
                                            <label class="mt-2" for="radio_2">অনলাইন ডেস্ক</label>
                                        </div>
                                        <div class="col-4">
                                            <input type="radio" id="radio_3" onclick="showOthers('radio_3')" value="press_release" {{old('source') == 'press_release' ? 'checked' : ''}} name="source">
                                            <label class="mt-2" for="radio_3">প্রেস বিজ্ঞপ্তি</label>

                                        </div>
                                        <div class="col-4">
                                            <input type="radio" id="radio_4" onclick="showOthers('radio_4')" value="online_reporter" {{old('source') == 'online_reporter' ? 'checked' : ''}} name="source">
                                            <label class="mt-2" for="radio_4">অনলাইন প্রতিবেদক</label>
                                        </div>
                                        <div class="col-4">
                                            <input type="radio" id="radio_5" onclick="showOthers('radio_5')" value="None" {{old('source') == 'None' ? 'checked' : ''}} name="source">
                                            <label class="mt-2" for="radio_5">None</label>

                                        </div>
                                        <div class="col-4">
                                            <input type="radio" id="radio_7" onclick="showOthers('radio_7')" value="Author" {{old('source') == 'AuthorMiddleware' ? 'checked' : ''}} name="source">
                                            <label class="mt-2" for="radio_7">Author</label>

                                        </div>
                                        <div class="col-4 d-flex">
                                            <input class="mr-1" type="radio" id="radio_6" onclick="showOthers('radio_6')" value="Others" {{old('source') == 'অন্যান্য' ? 'checked' : ''}} name="source">
                                            <label class="mr-1 mt-2" for="radio_6">অন্যান্য</label>
                                            <input class="form-control d-none" id="others_input" type="text" name="onnanno" placeholder="অন্যান্য">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="source_designation">Source Designation (if have?)</label>
                                <input value="{{old('source_designation')}}" class="form-control" type="text" id="source_designation" name="source_designation" placeholder="Source Designation">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="meta_keywords">Meta Keywords</label>
                                <input value="{{old('meta_keywords')}}" class="form-control" type="text" id="meta_keywords" name="meta_keywords" placeholder="Meta Keywords">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="meta_description">Meta Description</label>
                                <textarea class="form-control" placeholder="Meta Description" name="meta_description" id="" cols="30" rows="5">{{old('meta_description')}}</textarea>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="tags">Tags</label>
                                <input type="text" id="tags" name="tags"
                                       value="{{ old('tags') }}"
                                       data-role="tagsinput"
                                       class="form-control"
                                       placeholder="Add tags (press Enter or comma)">
                            </div>
                        </div>
                    </div>
                        <div class="row">
                            @if(auth()->user()->role_id==1)
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" name="status" id="status">
                                        <option selected disabled>Select Status</option>
                                        <option value="Published">Published</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Draft">Draft</option>
                                    </select>
                                </div>
                            </div>
                            @endif
                            <div class="col-6">
                                <label for="publishing_date">Publishing Date *</label>
                                <input value="{{ date('Y-m-d\TH:i') }}" type="datetime-local" name="publishing_date" required id="publishing_date" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Latest News</label> <br>
                                    <div class="row">
                                        <div class="col-4">
                                            <input type="radio" id="latest_news1" value="1" name="latest_news">
                                            <label for="latest_news1">Yes</label>
                                        </div>
                                        <div class="col-4">
                                            <input type="radio" id="latest_news0" value="0" name="latest_news">
                                            <label for="latest_news0">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
{{--                            <div class="col-md-6">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="">Breaking News</label> <br>--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-4">--}}
{{--                                            <input type="radio" id="breaking_news1" value="1" {{old('breaking_news') == 1 ? 'checked' : ''}} name="breaking_news">--}}
{{--                                            <label for="breaking_news1">Yes</label>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-4">--}}
{{--                                            <input type="radio" id="breaking_news0" value="0" {{old('breaking_news') == 0 ? 'checked' : ''}} name="breaking_news">--}}
{{--                                            <label for="breaking_news0">No</label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>

                        <div class="form-group account-btn text-center">
                            <div class="col-12">
                                <button class="btn width-lg btn-rounded btn-primary" type="submit">Create Post</button>
                            </div>
                        </div>
                </div>
            </div>
        </div><!-- end col -->

        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h4 class="m-0">Select Category</h4>
                </div>
                <div class="card-body" style="max-height: 250px; overflow-y: scroll">
                    @foreach($categories as $category)
                        <div class="mb-1">
                            <input {{$category->id == $request->id ? 'checked' : ''}} style="margin-right: 5px" id="cat_{{ $category->id }}" value="{{ $category->id }}" type="checkbox" name="categories[]"/>
                            <label for="cat_{{ $category->id }}"> {{ $category->name }}</label>

                            @foreach($category->categories as $child)
                                <div class="mb-1" style="padding-left: 20px">
                                    <input {{$category->id == $request->id ? 'checked' : ''}} style="margin-right: 5px" id="cat_{{ $child->id }}" value="{{ $child->id }}" type="checkbox" name="categories[]"/>
                                    <label for="cat_{{ $child->id }}"> {{ $child->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
            @if(auth()->user()->role_id==1)
            <div class="card">
                <div class="card-header">
                    <h4 class="m-0">Select Sections</h4>
                </div>
                <div class="card-body" style="max-height: 250px; overflow-y: scroll">
                    <div class="mb-1">
                        <input style="margin-right: 5px" id="section_1" value="1"  type="radio" name="header_order"/>
                        <label for="section_1"> Header Post 1</label>
                    </div>
                    <div class="mb-1">
                        <input style="margin-right: 5px" id="section_2" value="2"  type="radio" name="header_order"/>
                        <label for="section_2"> Header Post 2</label>
                    </div>
                    <div class="mb-1">
                        <input style="margin-right: 5px" id="section_3" value="3"  type="radio" name="header_order"/>
                        <label for="section_3"> Header Post 3</label>
                    </div>
                    <div class="mb-1">
                        <input style="margin-right: 5px" id="section_4" value="4"  type="radio" name="header_order"/>
                        <label for="section_4"> Header Post 4</label>
                    </div>
                    <div class="mb-1">
                        <input style="margin-right: 5px" id="section_5" value="5"  type="radio" name="header_order"/>
                        <label for="section_5"> Header Post 5</label>
                    </div>
                    <div class="mb-1">
                        <input style="margin-right: 5px" id="section_6" value="6"  type="radio" name="header_order"/>
                        <label for="section_6"> Header Post 6</label>
                    </div>
                </div>
                <button type="button" class="btn btn-danger" onclick="resetRadio()"><i class="fas fa-sync-alt"></i> Uncheck</button>

            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4 class="m-0 d-flex justify-content-between">
                        <span>Feature Image *</span>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="caption">Caption</label>
                                <input required value="{{old('caption')}}" class="form-control" type="text" id="caption" name="caption"  placeholder="Caption">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="image">Image (1200x630px)</label>
                                <input class="form-control" type="file" id="image" name="image" required="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="m-0 d-flex justify-content-between">
                        <span>Media</span>
                        <i class="fa fa-plus" data-toggle="modal" data-target="#create_media" style="background-color: black; color: white; height: 20px; width: 20px; border-radius: 50%; text-align: center; line-height: 20px; font-size: 12px; cursor:pointer;"></i>
                    </h4>
                </div>
                <div class="card-body">
                     <div class="row" id="media_container"></div>
                </div>
            </div>
        </div>
    </div>
    </form>


    <div id="create_media" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header text-center">
                    <h4 class="m-0">
                        Add a New Image (Media)
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>

                <div class="modal-body">

                    <form class="form-horizontal" id="upload_media_form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="type" value="ajax">
                        <div class="form-group">
                            <label for="caption">Caption *</label>
                            <input class="form-control" type="text" id="caption" name="caption" required="" placeholder="Caption">
                        </div>
                        <div class="form-group">
                            <label for="caption">Image : (1200x630px)</label>
                            <input class="form-control" type="file" id="image" name="image" required="">
                        </div>
                        <div class="form-group account-btn text-center">
                            <div class="col-12">
                                <button class="btn width-lg btn-rounded btn-primary waves-effect waves-light" type="submit">Create Media</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>


    {{-- loader--}}
    <div class="popup" id="popup">
        <div class="loader popup-inner">
        </div>
    </div>
@endsection
@section('js')
    <script>
        function resetRadio() {
            const radios = document.querySelectorAll('input[name="header_order"]');
            radios.forEach(radio => radio.checked = false);
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap Tagsinput JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>


    <script>
        tinymce.init({
            selector: "textarea#news_details",
            plugins: "advcode advlist advtable anchor autocorrect autolink autosave casechange charmap checklist codesample directionality editimage emoticons export footnotes formatpainter help image insertdatetime link linkchecker lists media mediaembed mergetags nonbreaking pagebreak permanentpen powerpaste searchreplace table tableofcontents tinymcespellchecker typography visualblocks visualchars wordcount",
            toolbar: "undo redo spellcheckdialog  | blocks fontfamily fontsize | bold italic underline forecolor backcolor | link image | align lineheight checklist bullist numlist | indent outdent | removeformat typography",
            content_style: 'body { font-size: 14pt; text-align: justify; }',
            font_size_formats: '8pt 10pt 12pt 14pt 16pt 18pt 24pt 36pt 48pt',
        });
    </script>

    <script>

        $(document).ready(function () {

            $("#upload_media_form").submit(function (formAction) {
                formAction.preventDefault();

                var myElement = document.getElementById('popup');
                myElement.classList.add('f-in');

                // get form data
                var formData = new FormData(this);

                // ajax request start
                $.ajax({
                    url: "{{ route('media.store') }}",
                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        $("#upload_media_form")[0].reset();
                        myElement.classList.remove('f-in');
                        $("#create_media").modal('hide');
                        toastr.success('Media Uploaded', 'Success', {
                            closeButton: true,
                            progressBar: true
                        });
                        $("#media_container").append(data.response_html);
                    },
                    error: function (data){
                        myElement.classList.remove('f-in');
                    }
                });

            });

        });

        var clickedCheckbox = document.getElementById('is_video');
        var videoBox = document.getElementById('video_input');
        var videoDuration = document.getElementById('video_duration');
        var videoId = document.getElementById('video_id');
        clickedCheckbox.addEventListener('change', function (){
            if(this.checked){
                videoBox.classList.remove('d-none');
            }else {
                videoBox.classList.add('d-none');
            }
        });


        function showOthers(id){
            var checkedItem = document.getElementById(id).value;
            if(checkedItem == "Others"){
                document.getElementById("others_input").classList.remove("d-none");
            }else{
                document.getElementById("others_input").classList.add("d-none");
            }
        }
    </script>
@endsection

@section('css')
    <style>
        .popup {
            width: 100%;
            height: 100%;
            visibility: hidden;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 9999;
            background: rgba(0, 0, 0, 0.75);
            text-align: center;
        }
        .f-in {
            transition: visibility 1s linear 100ms, opacity 100ms;
            visibility: visible !important;
            opacity: 1;
        }
        .popup:before {
            content: '';
            display: inline-block;
            height: 100%;
            margin-right: -4px;
            vertical-align: middle;
        }
        .loader {
            width: 70px;
            height: 70px;
            background: none;
            -webkit-animation: spin 1s linear infinite;
            animation: spin 1s linear infinite;
            border-top: 10px solid #ED018C;
            border-bottom: 10px solid #FC8A1A;
            border-left: 10px solid #01AFF1;
            border-right: 10px solid #00A650;
            border-radius: 50%;
            box-sizing: border-box;
        }
        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100%{
                transform: rotate(360deg);
            }
        }
        .popup-inner {
            display: inline-block;
            vertical-align: middle;
            position: relative;
            max-width: 90%;
            text-align: center;
        }
        .loader:after {
            position: absolute;
            top: 10px;
            left: 10px;
            background: #fff;
            height: 30px;
            width: 30px;
            content: "";
            border-radius: 50%;
            -webkit-animation: spin 1s linear infinite;
            animation: spin 1s linear infinite;
        }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Tagsinput CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet">
    <style>
        .bootstrap-tagsinput {
            width: 100% !important;
            min-height: calc(1.5em + .75rem + 2px);
            padding: 0.375rem 0.75rem;
            line-height: 1.5;
        }
        .bootstrap-tagsinput .tag {
            margin-right: 2px;
            color: white;
            background-color: #0d6efd;
            padding: 0.2rem 0.5rem;
            border-radius: 0.25rem;
        }
    </style>
@endsection
