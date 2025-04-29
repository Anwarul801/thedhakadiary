@extends('layouts.admin_layout')

@section('page_title')
   Author Type
@endsection
@section('main_content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6 align-items-center d-flex">
                            <h4 class="m-0">Type List</h4>
                        </div>
                        <div class="col-6 text-right">
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#signup-modal"><i class="fe-plus"></i> New Type</button>
                        </div>
                    </div>
                </div>
                <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header text-center">
                                <h4 class="m-0">
                                    Create a Author Type
                                </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>

                            <div class="modal-body">

                                <form class="form-horizontal" action="{{ route('type.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                            <label for="name">Title *</label>
                                            <input class="form-control" type="text" id="title" name="title" required="" placeholder="Title">
                                    </div>
                                    <div class="form-group account-btn text-center">
                                        <div class="col-12">
                                            <button class="btn width-lg btn-rounded btn-primary waves-effect waves-light" type="submit">Create Type</button>
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
                            <th>Type Name</th>
                            <th>Action</th>
                        </tr>
                        @forelse($types as $type)
                            <tr>
                                <td>{{ $loop->iteration}}</td>
                                <td>{{ $type->title }}</td>
                                <td>
                                    <!-- Example single danger button -->
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" data-toggle="modal" data-target="#edit_{{ $type->id }}" href="#"><i class="fa fa-edit"></i> EDIT</a>
                                                <form action="{{ route('type.destroy', $type->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="dropdown-item" onclick="return confirm('are you sure to delete this User?')"><i class="fa fa-trash"></i> DELETE</button>
                                                </form>
                                        </div>
                                    </div>

                                    <div id="edit_{{ $type->id }}" class="text-left modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <div class="modal-header text-center">
                                                    <h4 class="m-0">
                                                        Update Author Type
                                                    </h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>

                                                <div class="modal-body">

                                                    <form class="form-horizontal" action="{{ route('type.update', $type->id) }}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <label for="name">Title *</label>
                                                            <input value="{{$type->title}}" class="form-control" type="text" id="title" name="title" required="" placeholder="Title">
                                                        </div>
                                                        <div class="form-group account-btn text-center">
                                                            <div class="col-12">
                                                                <button class="btn width-lg btn-rounded btn-primary waves-effect waves-light" type="submit">Update Type</button>
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
