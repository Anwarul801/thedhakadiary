@extends('layouts.admin_layout')

@section('page_title')
    Media
@endsection
@section('main_content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6 align-items-center d-flex">
                            <h4 class="m-0">Media List</h4>
                        </div>
                        <div class="col-6 text-right">
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#signup-modal"><i class="fe-plus"></i> New Media</button>
                        </div>
                    </div>
                </div>
                <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header text-center">
                                <h4 class="m-0">
                                    Create a New Media
                                </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>

                            <div class="modal-body">

                                <form class="form-horizontal" action="{{ route('media.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                            <label for="caption">Select Photo Gallery</label>
                                        <select class="form-control" name="photo_gallery_id" id="">
                                            <option selected disabled>Select Photo Gallery</option>
                                            @foreach($pgs as $pg)
                                                <option value="{{$pg->id}}">{{$pg->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                            <label for="caption">Caption *</label>
                                            <input class="form-control" type="text" id="caption" name="caption" required="" placeholder="Caption">
                                    </div>
                                    <div class="form-group">
                                            <label for="source">Source</label>
                                            <input class="form-control" type="text" id="source" name="source" placeholder="Source">
                                    </div>
                                    <div class="form-group">
                                            <label for="caption">Image : (640x427px) *</label>
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

                <div class="card-body">
                    <table class="table table-bordered text-center" >
                        <tr>
                            <th>SL</th>
                            <th>Photo</th>
                            <th>Caption</th>
                            <th>Copy Code</th>
                            <th>Action</th>
                        </tr>
                        @forelse($media as $m)
                            <tr>
                                <td>{{ $loop->iteration}}</td>
                                <td>
                                    <a href="{{ asset('storage') }}/{{ $m->image }}" target="_blank">
                                        <img src="{{ asset('storage') }}/{{ $m->xs_thumbnail }}" style="height: 30px" alt="">
                                    </a>
                                </td>
                                <td>{{ $m->caption }}</td>

                                <td><button onclick="navigator.clipboard.writeText('[img id={{ "\"" . $m->id . "\"" }}]'); alert('Short Code copied')" class="btn btn-secondary">Copy Image ShortCode</button></td>
                                <td>
                                    <!-- Example single danger button -->
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" data-toggle="modal" data-target="#edit_{{ $m->id }}" href="#"><i class="fa fa-edit"></i> EDIT</a>
                                                <form action="{{ route('media.destroy', $m->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="dropdown-item" onclick="return confirm('are you sure to delete this User?')"><i class="fa fa-trash"></i> DELETE</button>
                                                </form>
                                        </div>
                                    </div>

                                    <div id="edit_{{ $m->id }}" class="text-left modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <div class="modal-header text-center">
                                                    <h4 class="m-0">
                                                        Update Media
                                                    </h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>

                                                <div class="modal-body">

                                                    <form class="form-horizontal" action="{{ route('media.update', $m->id) }}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <label for="caption">Select Photo Gallery</label>
                                                            <select class="form-control" name="photo_gallery_id" id="">
                                                                <option selected disabled>Select Photo Gallery</option>
                                                                @foreach($pgs as $pg)
                                                                    <option {{$pg->id == $m->photo_gallery_id ? 'selected' : ''}} value="{{$pg->id}}">{{$pg->title}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="caption">Caption *</label>
                                                            <input value="{{$m->caption}}" class="form-control" type="text" id="caption" name="caption" required="" placeholder="Caption">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="source">Source</label>
                                                            <input value="{{$m->source}}" class="form-control" type="text" id="source" name="source" placeholder="Source">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="caption">Image : (640x427px) *</label>
                                                            <input class="form-control" type="file" id="image" name="image">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name">Order *</label>
                                                            <input value="{{$m->order}}" class="form-control" type="number" id="name" name="order" required="" placeholder="Order">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name">Select Status *</label>
                                                            <select class="form-control" name="status" id="">
                                                                <option {{$m->status == 'Active' ? 'selected' : ''}} value="Active">Active</option>
                                                                <option {{$m->status == 'In-Active' ? 'selected' : ''}} value="In-Active">In-Active</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group account-btn text-center">
                                                            <div class="col-12">
                                                                <button class="btn width-lg btn-rounded btn-primary waves-effect waves-light" type="submit">Update Media</button>
                                                            </div>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="100">No data found</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>



        </div><!-- end col -->
    </div>
@endsection
