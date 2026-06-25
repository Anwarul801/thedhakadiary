@extends('layouts.admin_layout')

@section('page_title')
    Post Update
@endsection
@section('main_content')
    <form class="form-horizontal" action="{{ route('post.update', $id) }}" method="Post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                               <div class="">
                                   <h4 class="m-0">Update Post</h4>
                               </div>
                           <div class="">
                               <select name="language" id=""  class=" btn btn-danger" >
                                   <option value="bn" {{ $data->language == 'bn' ? 'selected' : '' }}>Bangla</option>
                                   <option value="en" {{ $data->language == 'en' ? 'selected' : '' }}>English</option>
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
                                        <label style="margin-right: 10px;" for="shoulder">Headline *</label>
                                        <input required type="text" name="title" id="title" value="{{$data->title}}" class="form-control" placeholder="News Headline">
                                    </div>
                                </div>
                                <div class="col-md-12 justify-content-start">
                                    <div class=" form-group">
                                        <label style="margin-right: 10px;" for="shoulder">Sub Headline </label>
                                        <input type="text" name="sub_headline" id="sub_headline" value="{{$data->sub_headline}}" class="form-control" placeholder="News Sub Headline">
                                    </div>
                                </div>
                                <div class="col-md-12 justify-content-start">
                                    <div class=" form-group">
                                        <label style="margin-right: 10px;" for="subtitle">Short Details</label>
                                        <textarea class="form-control" id="subtitle" name="subtitle" cols="30" rows="3">{{$data->subtitle}}</textarea>
                                    </div>
                                </div>
                                @if(auth()->user()->role_id==1)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="author_id">Select Author </label>
                                        <select class="form-control" name="author_id" id="author_id">
                                            <option selected disabled>Select Author</option>
                                            @foreach($authors as $auth)
                                                <option value="{{$auth->id}}" {{ $auth->id == $data->author_id ? 'selected' : '' }}>{{$auth->name_bn}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @endif
                                <div class="col-md-6">
                                    <div class="form-group pt-4">
                                        <input name="video_check" {{$data->video_id != null ? 'checked' : ''}} class="" type="checkbox" id="is_video">
                                        <label for="is_video">Is it a video post ?</label>
                                    </div>
                                </div>
                            </div>
                        <div class="row {{$data->video_id != null ? '' : 'd-none'}}" id="video_input">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="video_duration">Video Duration</label>
                                    <input value="{{$data->video_duration}}" class="form-control" type="text" id="video_duration" name="video_duration" placeholder="Video Duration">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="video_id">Video id</label>
                                    <input value="{{$data->video_id}}" class="form-control" type="text" id="video_id" name="video_id" placeholder="Video Id">
                                </div>
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="news_details">News Details *</label>
                                        <textarea required class="form-control" name="news_details" id="news_details" cols="30" rows="10">{{$data->news_details}}</textarea>
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
                                                <input type="radio" id="radio_1" onclick="showOthers('radio_1')" {{ $data->source == "own_reporter" ? "checked" : ""  }} value="own_reporter" name="source">
                                                <label class="mt-2" for="radio_1">নিজস্ব প্রতিবেদক</label>
                                            </div>
                                            <div class="col-4">
                                                <input type="radio" id="radio_2" onclick="showOthers('radio_2')" {{ $data->source == "online_desk" ? "checked" : ""  }} value="online_desk" name="source">
                                                <label class="mt-2" for="radio_2">দ্য ঢাকা ডায়েরি ডেস্ক</label>
                                            </div>
                                            <div class="col-4">
                                                <input type="radio" id="radio_3" onclick="showOthers('radio_3')" {{ $data->source == "press_release" ? "checked" : ""  }} value="press_release" name="source">
                                                <label class="mt-2" for="radio_3">প্রেস বিজ্ঞপ্তি</label>

                                            </div>
                                            <div class="col-4">
                                                <input type="radio" id="radio_4" onclick="showOthers('radio_4')" {{ $data->source == "online_reporter" ? "checked" : ""  }} value="online_reporter" name="source">
                                                <label class="mt-2" for="radio_4">অনলাইন প্রতিবেদক</label>

                                            </div>
                                            <div class="col-4">
                                                <input type="radio" id="radio_5" onclick="showOthers('radio_5')" {{ $data->source == "None" ? "checked" : ""  }} value="None" name="source">
                                                <label class="mt-2" for="radio_5">None</label>

                                            </div>
                                            <div class="col-4">
                                                <input type="radio" id="radio_7" onclick="showOthers('radio_7')" {{ $data->source == "Author" ? "checked" : ""  }} value="Author" name="source">
                                                <label class="mt-2" for="radio_7">Author</label>

                                            </div>
                                            <div class="col-4 d-flex">
                                                <input class="mr-1" type="radio" {{ $data->source != "own_reporter" && $data->source != "online_desk" && $data->source != "press_release" && $data->source != "online_reporter" && $data->source != "None" && $data->source != "Author" ? "checked" : ""  }} id="radio_6" onclick="showOthers('radio_6')" value="Others" name="source">
                                                <label class="mr-1 mt-2" for="radio_6">অন্যান্য</label>
                                                <input id="others_input" class="form-control {{ $data->source != "own_reporter" && $data->source != "online_desk" && $data->source != "press_release" && $data->source != "online_reporter" && $data->source != "None" && $data->source != "Author" ? "" : "d-none"  }}" type="text" value="{{ $data->source }}" name="onnanno" placeholder="অন্যান্য">
                                            </div>

                                            <script>
                                                function showOthers(id){
                                                    var checkedItem = document.getElementById(id).value;
                                                    if(checkedItem == "Others"){
                                                        document.getElementById("others_input").classList.remove("d-none");
                                                    }else{
                                                        document.getElementById("others_input").classList.add("d-none");
                                                    }
                                                }
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="source_designation">Source Designation (if have?)</label>
                                    <input value="{{$data->source_designation}}" class="form-control" type="text" id="source_designation" name="source_designation" placeholder="Source Designation">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="meta_keywords">Meta Keywords</label>
                                    <input value="{{$data->meta_keywords}}" class="form-control" type="text" id="meta_keywords" name="meta_keywords" placeholder="Meta Keywords">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="meta_description">Meta Description</label>
                                    <textarea class="form-control" placeholder="Meta Description" name="meta_description" id="meta_description" cols="30" rows="5">{{$data->meta_description}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="tags">Tags</label>
                                    <input type="text"
                                           id="tags"
                                           name="tags"
                                           data-role="tagsinput"
                                           class="form-control"
                                           value="{{ $data->tags }}"
                                           placeholder="Add tags">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="order">Order</label>
                                    <input value="{{$data->order}}" class="form-control" type="number" id="order" name="order" placeholder="Order">
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
                                            <option {{$data->status == 'Published' ? 'selected' : ''}} value="Published">Published</option>
                                            <option {{$data->status == 'Pending' ? 'selected' : ''}} value="Pending">Pending</option>
                                            <option {{$data->status == 'Draft' ? 'selected' : ''}} value="Draft">Draft</option>
                                        </select>
                                    </div>
                                </div>
                                @endif
                                <div class="col-6">
                                    <label for="publishing_date">Publishing Date *</label>
                                    <input value="{{$data->publishing_date}}" type="datetime-local" name="publishing_date" id="publishing_date" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Latest News</label> <br>
                                        <div class="row">
                                            <div class="col-4">
                                                <input {{$data->latest_news == 1 ? 'checked' : ''}} type="radio" id="latest_news1" value="1" name="latest_news">
                                                <label for="latest_news1">Yes</label>
                                            </div>
                                            <div class="col-4">
                                                <input {{$data->latest_news == 0 ? 'checked' : ''}} type="radio" id="latest_news0" value="0" name="latest_news">
                                                <label for="latest_news0">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
{{--                                <div class="col-md-6">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="">Breaking News</label> <br>--}}
{{--                                        <div class="row">--}}
{{--                                            <div class="col-4">--}}
{{--                                                <input {{$data->breaking_news == 1 ? 'checked' : ''}} type="radio" id="breaking_news1" value="1" name="breaking_news">--}}
{{--                                                <label for="breaking_news1">Yes</label>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-4">--}}
{{--                                                <input {{$data->breaking_news == 0 ? 'checked' : ''}} type="radio" id="breaking_news0" value="0" name="breaking_news">--}}
{{--                                                <label for="breaking_news0">No</label>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>
                            <div class="form-group account-btn text-center">
                                <div class="col-12">
                                    <button class="btn width-lg btn-rounded btn-primary" type="submit">Update Post</button>
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

                            @php
                                $selectedCategory = $data->categories->where('id', $category->id)->first();
                                $position = $selectedCategory ? $selectedCategory->pivot->position ?? '' : '';
                                $isActive = $category->status === 'Active';
                            @endphp

                            <div class="mb-2 category-item">
                                <div>
                                    <input
                                        type="checkbox"
                                        name="categories[]"
                                        value="{{ $category->id }}"
                                        id="cat_{{ $category->id }}"
                                        class="category-checkbox"
                                        data-id="{{ $category->id }}"
                                        data-max="{{ $category->max_position }}"
                                        data-status="{{ $category->status }}"
                                        {{ $selectedCategory ? 'checked' : '' }}
                                    >
                                    <label for="cat_{{ $category->id }}">
                                        {{ $category->name }}
                                    </label>
                                </div>

                                {{-- Position Input --}}
                                <div class="mt-1 position-box"
                                     id="position_box_{{ $category->id }}"
                                     style="{{ ($selectedCategory && $isActive) ? '' : 'display:none;' }}">

                                    <input
                                        type="text"
                                        name="positions[{{ $category->id }}]"
                                        class="form-control form-control-sm position-input number"
                                        placeholder="Max: {{ $category->max_position }}"
                                        min="1"
                                        max="{{ $category->max_position }}"
                                        value="{{ $position }}"
                                        data-max="{{ $category->max_position }}"
                                    >
                                </div>
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
                                <input {{$data->header_order==1?'checked':''}} style="margin-right: 5px" id="section_1" value="1"  type="radio" name="header_order"/>
                                <label for="section_1"> Header Post 1</label>
                            </div>
                            <div class="mb-1">
                                <input {{$data->header_order==2?'checked':''}} style="margin-right: 5px" id="section_2" value="2"  type="radio" name="header_order"/>
                                <label for="section_2"> Header Post 2</label>
                            </div>
                            <div class="mb-1">
                                <input {{$data->header_order==3?'checked':''}} style="margin-right: 5px" id="section_3" value="3"  type="radio" name="header_order"/>
                                <label for="section_3"> Header Post 3</label>
                            </div>
                            <div class="mb-1">
                                <input {{$data->header_order==4?'checked':''}} style="margin-right: 5px" id="section_4" value="4"  type="radio" name="header_order"/>
                                <label for="section_4"> Header Post 4</label>
                            </div>
                            <div class="mb-1">
                                <input {{$data->header_order==5?'checked':''}} style="margin-right: 5px" id="section_5" value="5"  type="radio" name="header_order"/>
                                <label for="section_5"> Header Post 5</label>
                            </div>
                            <div class="mb-1">
                                <input {{$data->header_order==6?'checked':''}} style="margin-right: 5px" id="section_6" value="6"  type="radio" name="header_order"/>
                                <label for="section_6"> Header Post 6</label>
                            </div>
                            <div class="mb-1">
                                <input {{$data->header_order==7?'checked':''}} style="margin-right: 5px" id="section_7" value="7"  type="radio" name="header_order"/>
                                <label for="section_7"> Header Post 7</label>
                            </div>
                            <div class="mb-1">
                                <input {{$data->header_order==8?'checked':''}} style="margin-right: 5px" id="section_8" value="8"  type="radio" name="header_order"/>
                                <label for="section_8"> Header Post 8</label>
                            </div>
                            <div class="mb-1">
                                <input {{$data->header_order==9?'checked':''}} style="margin-right: 5px" id="section_9" value="9"  type="radio" name="header_order"/>
                                <label for="section_9"> Header Post 9</label>
                            </div>
                            <div class="mb-1">
                                <input {{$data->header_order==10?'checked':''}} style="margin-right: 5px" id="section_10" value="10"  type="radio" name="header_order"/>
                                <label for="section_10"> Header Post 10</label>
                            </div>
                            <div class="mb-1">
                                <input {{$data->header_order==11?'checked':''}} style="margin-right: 5px" id="section_11" value="11"  type="radio" name="header_order"/>
                                <label for="section_11"> Header Post 11</label>
                            </div>
                            <div class="mb-1">
                                <input {{$data->header_order==12?'checked':''}} style="margin-right: 5px" id="section_12" value="12"  type="radio" name="header_order"/>
                                <label for="section_12"> Header Post 12</label>
                            </div>
                            <div class="mb-1">
                                <input {{$data->header_order==13?'checked':''}} style="margin-right: 5px" id="section_13" value="13"  type="radio" name="header_order"/>
                                <label for="section_13"> Header Post 13</label>
                            </div>
                    </div>
                        <button type="button" class="btn btn-danger" onclick="resetRadio()"><i class="fas fa-sync-alt"></i> Uncheck</button>
                </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4 class="m-0 d-flex justify-content-between">
                            <span>Update Feature Image</span>
                        </h4>
                    </div>
                    <img src="{{asset('storage')}}/{{$data->media->thumbnail??null}}" alt="">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="caption">Caption</label>
                                    <input value="{{$data->media->caption}}" class="form-control" type="text" id="caption" name="caption" placeholder="Caption">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="media_source">Source/Credit</label>
                                    <input value="{{$data->media->source}}" class="form-control" type="text" id="media_source" name="media_source" placeholder="Source/Credit">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="image">Image (1280x672px)</label>
                                    <input class="form-control" type="file" id="image" name="image">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="badge">Image Badge</label>
                                    <input class="form-control" type="file" id="badge" name="badge">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="m-0 d-flex justify-content-between align-items-center">
                            <span>Media</span>
                            <div class="d-flex gap-1">
                                <button type="button" class="btn btn-sm btn-outline-secondary" id="toggleLibraryBtn" onclick="toggleMediaLibrary()">
                                    <i class="fa fa-images"></i> Library
                                </button>
                                <i class="fa fa-plus" data-bs-toggle="modal" data-bs-target="#create_media" style="background-color: black; color: white; height: 20px; width: 20px; border-radius: 50%; text-align: center; line-height: 20px; font-size: 12px; cursor:pointer;"></i>
                            </div>
                        </h4>
                    </div>
                    <div class="card-body p-2">
                        {{-- pre-load media already used in this post --}}
                        @php
                            preg_match_all('/\[img id=(\d+)\]/', $data->news_details ?? '', $matches);
                            $usedMediaIds = array_unique($matches[1] ?? []);
                            $usedMedia = \App\Models\Media::whereIn('id', $usedMediaIds)->get()->keyBy('id');
                        @endphp

                        <div class="row" id="media_container">
                            @foreach($usedMediaIds as $mid)
                                @if($usedMedia->has($mid))
                                    @php $m = $usedMedia[$mid]; $thumb = asset('storage/'.$m->thumbnail); @endphp
                                    <div class="mb-2 col-6" data-media-id="{{ $m->id }}"
                                         data-caption="{{ $m->caption }}"
                                         data-source="{{ $m->source }}"
                                         data-thumbnail="{{ $thumb }}">
                                        <img class="w-100 mb-1" src="{{ $thumb }}" alt="">
                                        <small class="d-block text-muted text-truncate mb-1 media-caption" title="{{ $m->caption }}">{{ $m->caption }}</small>
                                        <div class="d-flex gap-1">
                                            <button type="button" class="btn btn-primary btn-sm flex-fill"
                                                onclick="insertMediaShortcode('[img id={{ $m->id }}]')">
                                                Insert <i class="fa fa-plus"></i>
                                            </button>
                                            <button type="button" class="btn btn-warning btn-sm"
                                                onclick="openMediaEdit('{{ $m->id }}', this.closest('[data-media-id]').dataset.caption, this.closest('[data-media-id]').dataset.source, this.closest('[data-media-id]').dataset.thumbnail)">
                                                <i class="mdi mdi-pencil"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        {{-- media library panel (hidden by default) --}}
                        <div id="mediaLibraryPanel" style="display:none;">
                            <input type="text" id="mediaSearchInput" class="form-control form-control-sm mb-2" placeholder="Search caption...">
                            <div class="row" id="mediaLibraryGrid" style="max-height:300px; overflow-y:auto;"></div>
                            <div class="text-center mt-1">
                                <button type="button" class="btn btn-sm btn-outline-primary" id="loadMoreBtn" onclick="loadMediaLibrary()" style="display:none;">Load More</button>
                            </div>
                        </div>
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
                    <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">×</button>
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
                            <label for="source">Source/Credit </label>
                            <input class="form-control" type="text" id="source" name="source"  placeholder="Caption">
                        </div>
                        <div class="form-group">
                            <label for="caption">Image : (1280x672px)</label>
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

    {{-- Edit Media Modal --}}
    <div id="edit_media" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display:none;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="m-0">Edit Media</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-3">
                        <img id="edit_media_preview" src="" alt="" class="img-fluid rounded" style="max-height:160px; object-fit:cover;">
                    </div>
                    <form id="edit_media_form" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="edit_media_id" name="media_id">
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <label>Caption *</label>
                            <input class="form-control" type="text" id="edit_caption" name="caption" required placeholder="Caption">
                        </div>
                        <div class="form-group">
                            <label>Source/Credit</label>
                            <input class="form-control" type="text" id="edit_source" name="source" placeholder="Source">
                        </div>
                        <div class="form-group">
                            <label>Replace Image <small class="text-muted">(optional, 1280×672px)</small></label>
                            <input class="form-control" type="file" id="edit_image" name="image" accept="image/*">
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary waves-effect waves-light" type="submit">Update Media</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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

        function bsModal(id) {
            return bootstrap.Modal.getOrCreateInstance(document.getElementById(id));
        }

        function openMediaEdit(id, caption, source, thumbnail) {
            document.getElementById('edit_media_id').value = id;
            document.getElementById('edit_caption').value = caption || '';
            document.getElementById('edit_source').value = source || '';
            document.getElementById('edit_media_preview').src = thumbnail;
            document.getElementById('edit_image').value = '';
            bsModal('edit_media').show();
        }

        $(document).ready(function() {
            $('#edit_media_form').submit(function(e) {
                e.preventDefault();
                var id = document.getElementById('edit_media_id').value;
                var formData = new FormData(this);
                $.ajax({
                    url: '/media/' + id,
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: { 'X-Requested-With': 'XMLHttpRequest' },
                    success: function(data) {
                        bsModal('edit_media').hide();
                        var card = document.querySelector('[data-media-id="' + id + '"]');
                        if (card) {
                            card.querySelector('img').src = data.thumbnail + '?t=' + Date.now();
                            card.querySelector('.media-caption').textContent = data.caption;
                            card.dataset.caption = data.caption;
                            card.dataset.source = data.source || '';
                            card.dataset.thumbnail = data.thumbnail;
                        }
                        toastr.success('Media updated!', 'Success', { closeButton: true, progressBar: true, timeOut: 2000 });
                    },
                    error: function() {
                        toastr.error('Update failed. Please try again.', 'Error');
                    }
                });
            });
        });

        function insertMediaShortcode(shortcode) {
            var editor = tinymce.get('news_details');
            if (editor) {
                editor.insertContent(shortcode);
                toastr.success('Image inserted into editor', 'Done', { closeButton: true, progressBar: true, timeOut: 1500 });
            } else {
                navigator.clipboard.writeText(shortcode);
                toastr.info('Shortcode copied to clipboard', 'Info', { closeButton: true, progressBar: true, timeOut: 1500 });
            }
        }

        var mediaLibraryLoaded = false;
        var mediaLibraryPage = 1;
        var mediaSearchTimeout = null;

        function toggleMediaLibrary() {
            var panel = document.getElementById('mediaLibraryPanel');
            if (panel.style.display === 'none') {
                panel.style.display = 'block';
                if (!mediaLibraryLoaded) loadMediaLibrary();
            } else {
                panel.style.display = 'none';
            }
        }

        function loadMediaLibrary(reset) {
            if (reset) {
                mediaLibraryPage = 1;
                document.getElementById('mediaLibraryGrid').innerHTML = '';
                mediaLibraryLoaded = false;
            }
            var search = document.getElementById('mediaSearchInput').value;
            $.ajax({
                url: "{{ route('media.index') }}",
                method: "GET",
                data: { page: mediaLibraryPage, search: search, per_page: 12 },
                headers: { 'X-Requested-With': 'XMLHttpRequest' },
                success: function(data) {
                    mediaLibraryLoaded = true;
                    var grid = document.getElementById('mediaLibraryGrid');
                    $.each(data.data, function(i, m) {
                        var shortcode = '[img id=' + m.id + ']';
                        var card = '<div class="mb-2 col-6">'
                            + '<img class="w-100 mb-1" src="' + m.thumbnail_url + '" style="height:60px;object-fit:cover;" alt="">'
                            + '<small class="d-block text-muted text-truncate mb-1" title="' + m.caption + '">' + m.caption + '</small>'
                            + '<button type="button" class="btn btn-sm btn-success form-control" onclick="insertMediaShortcode(\'' + shortcode + '\')">'
                            + 'Insert <i class="fa fa-plus"></i></button>'
                            + '</div>';
                        grid.insertAdjacentHTML('beforeend', card);
                    });
                    var loadMoreBtn = document.getElementById('loadMoreBtn');
                    if (data.next_page_url) {
                        mediaLibraryPage++;
                        loadMoreBtn.style.display = 'inline-block';
                    } else {
                        loadMoreBtn.style.display = 'none';
                    }
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('mediaSearchInput').addEventListener('input', function() {
                clearTimeout(mediaSearchTimeout);
                mediaSearchTimeout = setTimeout(function() { loadMediaLibrary(true); }, 400);
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap Tagsinput JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea#news_details',
            plugins: 'anchor autolink charmap code codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo code | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
            font_size_formats: '8pt 10pt 12pt 14pt 16pt 18pt 24pt 36pt 48pt',
            content_style: 'body { font-size: 16pt; text-align: justify; }',
            automatic_uploads: true,
            images_upload_url: '{{ route("tinymce.upload") }}',
            images_upload_handler: function(blobInfo, progress) {
                return new Promise(function(resolve, reject) {
                    var formData = new FormData();
                    formData.append('file', blobInfo.blob(), blobInfo.filename());
                    formData.append('_token', '{{ csrf_token() }}');
                    fetch('{{ route("tinymce.upload") }}', {
                        method: 'POST',
                        body: formData,
                    })
                    .then(function(res) { return res.json(); })
                    .then(function(data) {
                        data.location ? resolve(data.location) : reject('Upload failed');
                    })
                    .catch(function() { reject('Upload error'); });
                });
            },
            setup: function(editor) {
                editor.on('PastePostProcess', function(e) {
                    e.node.querySelectorAll('p, span, div, li, td, th, h1, h2, h3, h4, h5, h6').forEach(function(el) {
                        el.style.fontSize = '16pt';
                    });
                });
                editor.on('submit', function() {
                    var div = document.createElement('div');
                    div.innerHTML = editor.getContent();
                    div.querySelectorAll('p, li, td, th, h1, h2, h3, h4, h5, h6').forEach(function(el) {
                        if (!el.style.fontSize) {
                            el.style.fontSize = '16pt';
                        }
                    });
                    editor.setContent(div.innerHTML, {no_events: true});
                });
            },
        });

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
                        bsModal('create_media').hide();
                        toastr.success('Media Uploaded', 'Success', {
                            closeButton: true,
                            progressBar: true
                        });
                        var shortcode = '[img id=' + data.media_id + ']';
                        var card = '<div class="mb-2 col-6"'
                            + ' data-media-id="' + data.media_id + '"'
                            + ' data-caption="' + data.caption + '"'
                            + ' data-source=""'
                            + ' data-thumbnail="' + data.thumbnail + '">'
                            + '<img class="w-100 mb-1" src="' + data.thumbnail + '" alt="">'
                            + '<small class="d-block text-muted text-truncate mb-1 media-caption">' + data.caption + '</small>'
                            + '<div class="d-flex gap-1">'
                            + '<button type="button" class="btn btn-primary btn-sm flex-fill" onclick="insertMediaShortcode(\'' + shortcode + '\')">'
                            + 'Insert <i class=\'fa fa-plus\'></i></button>'
                            + '<button type="button" class="btn btn-warning btn-sm"'
                            + ' onclick="openMediaEdit(\'' + data.media_id + '\', this.closest(\'[data-media-id]\').dataset.caption, this.closest(\'[data-media-id]\').dataset.source, this.closest(\'[data-media-id]\').dataset.thumbnail)">'
                            + '<i class=\'mdi mdi-pencil\'></i></button>'
                            + '</div></div>';
                        $("#media_container").append(card);
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

    <script>
        document.querySelectorAll('.category-checkbox').forEach(function (checkbox) {
            checkbox.addEventListener('change', function () {

                let id = this.dataset.id;
                let status = this.dataset.status;
                let box = document.getElementById('position_box_' + id);

                if (this.checked && status === 'Active') {
                    box.style.display = 'block';
                } else {
                    box.style.display = 'none';
                }
            });
        });


        // 🔥 Max Position Validation
        document.querySelectorAll('.position-input').forEach(function (input) {
            input.addEventListener('input', function () {

                let max = parseInt(this.dataset.max);
                let value = parseInt(this.value);

                if (value > max) {
                    alert('Max position is ' + max);
                    this.value = max;
                }

                if (value < 1) {
                    this.value = 1;
                }
            });
        });
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
