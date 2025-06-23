@extends('layouts.admin_layout')

@section('page_title')
    Setting
@endsection
@section('css')
    <style>
        .tox-notifications-container{
            display: none;
        }
    </style>
@endsection
@section('main_content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="m-0">Update Site Setting</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('options.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row justify-content-between">
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="">Site Title</label>
                                    <input type="text" value="{{ getOptionData('site_title') }}" name="site_title" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Slogan</label>
                                    <input type="text" name="slogan" value="{{ getOptionData('slogan') }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Editor's Name</label>
                                    <input type="text" name="editor_name" value="{{ getOptionData('editor_name') }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Editor's Name English</label>
                                    <input type="text" name="editor_name_en" value="{{ getOptionData('editor_name_en') }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Address</label>
                                    <input type="text" name="address" value="{{ getOptionData('address') }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Address English</label>
                                    <input type="text" name="address_en" value="{{ getOptionData('address_en') }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Logo (342x60px)</label> <br>
                                    <img src="{{ asset('storage') }}/{{ getOptionData('logo') }}" style="height: 50px; margin: 5px 0; background: black" alt="">
                                    <input type="file" name="logo" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Favicon (180x180px)</label><br>
                                    <img src="{{ asset('storage') }}/{{ getOptionData('favicon') }}" style="height: 50px; margin: 5px 0; background: black" alt="">
                                    <input type="file" name="favicon" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Share Banner (940x788px)</label><br>
                                    <img src="{{ asset('storage') }}/{{ getOptionData('shared_image') }}" style="height: 50px; margin: 5px 0" alt="">
                                    <input type="file" name="shared_image" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Primary Phone Number</label>
                                    <input type="text" name="phone_1" value="{{ getOptionData('phone_1') }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Secondary Phone Number </label>
                                    <input type="text" name="phone_2" value="{{ getoptionData('phone_2') }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Primary Email</label>
                                    <input type="email" name="email" value="{{ getOptionData('email') }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Second Email</label>
                                    <input type="email" name="email_2" value="{{ getOptionData('email_2') }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="">Facebook</label>
                                    <input type="text" name="fb" value="{{ getOptionData('fb') }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Twitter</label>
                                    <input type="text" name="twitter" value="{{ getOptionData('twitter') }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Instagram</label>
                                    <input type="text" name="instagram" value="{{ getOptionData('instagram') }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Telegram</label>
                                    <input type="text" name="telegram" value="{{ getOptionData('telegram') }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">WhatsApp</label>
                                    <input type="text" name="whats_app" value="{{ getOptionData('whats_app') }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Youtube</label>
                                    <input type="text" name="youtube" value="{{ getOptionData('youtube') }}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Update Setting</button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- end col -->
    </div>
@endsection
@section('js')
    <script src="{{asset('js/tinymce.min.js')}}" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'AuthorMiddleware name',
            mergetags_list: [
                { value: 'First.Name', title: 'First Name' },
                { value: 'Email', title: 'Email' },
            ]
        });
    </script>
@endsection
