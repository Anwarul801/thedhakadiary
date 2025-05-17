@extends('layouts.admin_layout')
@section('page_title')
    Image Gallery {{$page_type}}
@endsection
@section('main_content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h5>{{ "$page_type Image Gallery" }}</h5>
                        </div>
                        <div class="col-md-6 text-right"> <a href="{{ route('image_gallery.index') }}"
                                                           class="btn btn-outline-info waves-effect waves-light"><i class="fa fa-list"></i>
                                {{ __('Back To List') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form id="kt_ecommerce_settings_general_form" class="form" action="{{$page_type == 'Create' ? route('image_gallery.store') : route('image_gallery.update', $image_gallery->id)}}" method="POST"
                          enctype="multipart/form-data">
                        @if($page_type!='Create')
                            @method('PUT')
                        @endif
                        @csrf
                        <div class="language_tab">
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <div class="tab-content language_tab_content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="bangla" role="tabpanel"
                                             aria-labelledby="bangla-tab">
                                            <div class="tab-content">
                                                <div class="row">
                                                    @if(auth()->user()->role_id==1)
                                                    <div class="col-6 mb-3">
                                                        <label for="title" class="form-label">Author*</label>
                                                        <select name="author_id" id="" class="form-control">
                                                            <option value="" disabled selected>Select Author</option>
                                                            @foreach($authors as $author)
                                                                <option {{$page_type != 'Create' ? ($image_gallery->author_id==$author->id?'selected':'') : ''}} value="{{$author->id}}">{{$author->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @endif
                                                    <div class="col-6 mb-3">
                                                        <label for="title" class="form-label">Date/Time*</label>
                                                        <input required value="{{$page_type != 'Create' ? $image_gallery->date_time : date('Y-m-d\TH:i')}}" id="title" type="datetime-local"
                                                               class="form-control" name="date_time" >
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <label for="title" class="form-label">Title*</label>
                                                        <input value="{{$page_type != 'Create' ? $image_gallery->title : ''}}" id="title" type="text"
                                                               class="form-control" name="title" placeholder="Title">
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <label for="title_en" class="form-label">Title English*</label>
                                                        <input value="{{$page_type != 'Create' ? $image_gallery->title_en : ''}}" id="title_en" type="text"
                                                               class="form-control" name="title_en" placeholder="Title">
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <label for="thumbnail">Thumbnail (648x486px)</label>
                                                        <input type="file" name="thumbnail" class="form-control">
                                                        @if($page_type=='Update')
                                                            <img style="width: 200px;" src="{{asset($image_gallery->thumbnail)}}" alt="">
                                                        @endif
                                                    </div>
                                                        @if(auth()->user()->role_id==1)
                                                    <div class="col-6 mb-3">
                                                        <label for="order" class="form-label">Order</label>
                                                        <input value="{{$page_type != 'Create' ? $image_gallery->order : ''}}" id="order" type="text"
                                                               class="form-control" name="order" placeholder="Order">
                                                    </div>
                                                        @endif
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <h4 class="h4 text-center" style="margin-top: 20px; font-weight: bold;">Caption With Image</h4>
                                        <table class="table table-bordered multiple_image_uploader">
                                            <thead>
                                            <tr class="main_title">
                                                <th class="text-dark" >Caption</th>
                                                <th class="text-dark" >Caption English</th>
                                                <th class="text-dark" >Photographer</th>
                                                <th class="text-dark" >Photographer English</th>
                                                <th class="text-dark" >Date/Time</th>
                                                <th class="text-dark" >Order</th>
                                                {{--                                                    <th class="text-dark" style="width: 70%;">Date</th>--}}
                                                <th class="text-dark" style="white-space: nowrap">Image (648x486px)</th>
                                                <th class="text-dark">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody id="academic_qualification_table_body">
                                            @if ($page_type == 'Update' && !empty($image_gallery->gallery_images))
                                                @foreach ($image_gallery->gallery_images as $key => $image_galleryImage)
                                                    <tr class="new_item{{ $key }}">
                                                        <td class="text-dark">
                                                            <input class="form-control multiple_uploder_input"
                                                                   value="{{ $image_galleryImage->caption }}" type="text"
                                                                   name="caption[]">
                                                        </td>
                                                        <td class="text-dark">
                                                            <input class="form-control multiple_uploder_input"
                                                                   value="{{ $image_galleryImage->caption_en }}" type="text"
                                                                   name="caption_en[]">
                                                        </td>
                                                        <td class="text-dark">
                                                            <input class="form-control multiple_uploder_input"
                                                                   value="{{ $image_galleryImage->photographer }}" type="text"
                                                                   name="photographer[]">
                                                        </td>
                                                        <td class="text-dark">
                                                            <input class="form-control multiple_uploder_input"
                                                                   value="{{ $image_galleryImage->photographer_en }}" type="text"
                                                                   name="photographer_en[]">
                                                        </td>
                                                        <td class="text-dark">
                                                            <input class="form-control multiple_uploder_input"
                                                                   value="{{ $image_galleryImage->date_time_image }}" type="datetime-local"
                                                                   name="date_time_image[]">
                                                        </td>
                                                        <td style="width: 5%;" class="text-dark">
                                                            <input class="form-control multiple_uploder_input"
                                                                   value="{{ $image_galleryImage->order }}" type="text"
                                                                   name="order_array[]">
                                                        </td>
                                                        <td style="width: 10%; text-align: center;">
                                                            <label class="image_wrap">
                                                                <i class="fa fa-edit cursor-pointer edit_icon" ></i>
                                                                <input type="hidden" name="old_image[]"
                                                                       value="{{ $image_galleryImage->image }}">
                                                                <input type="file" name="image[]"
                                                                       id="other_qual_file_class_{{ $key }}"
                                                                       class="d-none other_qual_file_class"
                                                                       accept=".jpg, .png, .jpeg">
                                                                <div class="image_div">
                                                                    <img src="{{ asset($image_galleryImage->image) }}"
                                                                         id="preview_other_qual_file_class_{{ $key }}"
                                                                         alt="image" class="img-fluid"
                                                                         style="width: 100px;height:50px; cursor: pointer;">
                                                                </div>
                                                            </label>
                                                        </td>
                                                        <td style="width: 5%;">
                                                            <a class="delete_item btn btn-sm form-control btn-outline-danger waves-effect waves-light"
                                                               del_id="{{ $key }}" href="javascript:;"
                                                               title="">
                                                                <i class="fa fa-times"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            <!-- Dynamic rows will be added here -->
                                            </tbody>
                                        </table>
                                        <div class="text-right">
                                            <button class="btn btn-sm btn-outline-info" id="new_academic_row"
                                                    type="button"><i class="fa fa-plus-circle"></i> Add New</button>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" data-kt-ecommerce-settings-type="submit"
                                                class="btn btn-outline-primary submit_btn">
                                            <span class="indicator-label">{{ $page_type }}</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!--end::Action buttons-->
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.querySelectorAll('.upload-container').forEach(function(container) {
            const imageInput = container.querySelector('.imageInput');
            const imagePreview = container.querySelector('.image-preview');

            imageInput.addEventListener('change', function(event) {
                const file = event.target.files[0];

                if (file) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        imagePreview.innerHTML = '<i class="fas fa-edit edit_icon"></i>';
                        imagePreview.appendChild(img);
                    };

                    reader.readAsDataURL(file);
                } else {
                    imagePreview.innerHTML = '<span>Upload image</span>';
                }
            });

            imagePreview.addEventListener('click', function() {
                imageInput.click();
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            var j = 100;
            $("#new_academic_row").click(function(e) {
                var table_body = document.getElementById('academic_qualification_table_body');
                var now_time = Date.now();

                var row = `
            <tr class="new_item` + j + `">
                <td class="text-dark">
                    <input type="text" class="form-control multiple_uploder_input" name="caption[]">
                </td>

                <td class="text-dark">
                    <input class="form-control multiple_uploder_input"
                           value="" type="text"
                           name="caption_en[]">
                </td>
                <td class="text-dark">
                    <input class="form-control multiple_uploder_input"
                           value="" type="text"
                           name="photographer[]">
                </td>
                <td class="text-dark">
                    <input class="form-control multiple_uploder_input"
                           value="" type="text"
                           name="photographer_en[]">
                </td>
                <td class="text-dark">
                    <input class="form-control multiple_uploder_input"
                           value="{{ date('Y-m-d\TH:i') }}" type="datetime-local"
                           name="date_time_image[]">
                </td>
             <td style="width: 5%;" class="text-dark">
                <input class="form-control multiple_uploder_input"
                       value="" type="text"
                       name="order_array[]">
            </td>
                <td>
                    <label class="image_wrap">
                        <i class="fa fa-edit cursor-pointer edit_icon"></i>
                        <input type="file" name="image[]" id="other_qual_file_class_` + now_time + `" accept=".jpg, .png, .jpeg" class="d-none other_qual_file_class">
                        <div class="image_div">
                            <img style="width:100px;" src="{{ asset('backend/img/image.png') }}" alt="album" id="preview_other_qual_file_class_` +
                    now_time + `" class="img-fluid">
                        </div>
                    </label>
                </td>
                <td style="vertical-align:middle; text-align:center">
                    <a del_id="` + j + `" class="delete_item text-center btn btn-sm btn-outline-danger  waves-effect waves-light" href="javascript:;" title=""><i class="fa fa-times"></i>&nbsp;</a>
                </td>
            </tr>
       `;
                j++;
                $(table_body).append(row);
            });
        });

        $(document).on('click', '.delete_item', function() {
            var id = $(this).attr("del_id");
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    $('.new_item' + id).remove();
                }
            });
        });

        $(document).on('change', '.other_qual_file_class', function(e) {
            var current_id = $(this).attr('id');
            var src_builder = "preview_" + current_id;
            const [file] = this.files;
            if (file) {
                $("#" + src_builder).attr('src', URL.createObjectURL(file));
            }
        });
    </script>
@endsection
