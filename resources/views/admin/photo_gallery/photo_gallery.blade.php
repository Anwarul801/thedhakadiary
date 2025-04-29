@extends('layouts.admin_layout')

@section('page_title')
    Photo Gallery
@endsection
@section('main_content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6 align-items-center d-flex">
                            <h4 class="m-0">Photo Gallery List</h4>
                        </div>
                        <div class="col-6 text-right">
                            <a href="{{route('photo_gallery.create')}}" type="button" class="btn btn-primary"><i class="fe-plus"></i> New Photo Gallery</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered text-center" >
                        <tr>
                            <th>SL</th>
                            <th>Title</th>
                            <th>Total Media</th>
                            <th>Action</th>
                        </tr>
                        @forelse($photo_gallery as $pg)
                            <tr>
                                <td>{{ $loop->iteration}}</td>
                                <td>{{ $pg->title }}</td>
                                <td>{{ $pg->media->count() }}</td>
                                <td>
                                    <!-- Example single danger button -->
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu">
                                            <button type="button" class="dropdown-item waves-effect waves-light" data-toggle="modal" data-target="#mediamodal{{$pg->id}}"><i class="fe-image"></i> Add Image</button>
                                            <a class="dropdown-item" href="{{route('photo_gallery.edit', $pg->id)}}"><i class="fa fa-edit"></i> EDIT</a>
                                                <form action="{{ route('photo_gallery.destroy', $pg->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="dropdown-item" onclick="return confirm('are you sure to delete this User?')"><i class="fa fa-trash"></i> DELETE</button>
                                                </form>
                                        </div>
                                    </div>
                                </td>
                                <div id="mediamodal{{$pg->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
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
                                                        <input type="hidden" value="{{$pg->id}}" name="photo_gallery_id">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="caption">Caption *</label>
                                                        <input class="form-control" type="text" id="caption" name="caption" required="" placeholder="Caption">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="source">Source *</label>
                                                        <input class="form-control" type="text" id="source" name="source" required="" placeholder="Source">
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
