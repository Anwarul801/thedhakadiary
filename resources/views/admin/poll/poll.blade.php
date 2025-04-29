@extends('layouts.admin_layout')

@section('page_title')
   Poll
@endsection
@section('main_content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6 align-items-center d-flex">
                            <h4 class="m-0">Poll List</h4>
                        </div>
                        <div class="col-6 text-right">
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#signup-modal"><i class="fe-plus"></i> New Poll</button>
                        </div>
                    </div>
                </div>
                <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header text-center">
                                <h4 class="m-0">
                                    Create a Poll
                                </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>

                            <div class="modal-body">

                                <form class="form-horizontal" action="{{ route('poll.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                            <label for="name">Title *</label>
                                            <input class="form-control" type="text" id="title" name="title" required="" placeholder="Title">
                                    </div>
                                    <div class="form-group">
                                            <label for="name">Description</label>
                                        <textarea class="form-control" name="description" placeholder="Description" id="" cols="30" rows="10"></textarea>
                                    </div>
                                    <div class="form-group account-btn text-center">
                                        <div class="col-12">
                                            <button class="btn width-lg btn-rounded btn-primary waves-effect waves-light" type="submit">Create Poll</button>
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
                            <th>Poll Title</th>
                            <th>Yes</th>
                            <th>No</th>
                            <th>No Comment</th>
                            <th>Vote Now</th>
                            <th>Action</th>
                        </tr>
                        @forelse($polls as $poll)
                            <tr>
                                <td>{{ $loop->iteration}}</td>
                                <td>{{ $poll->title }}</td>
                                <td>{{ $poll->yes }}</td>
                                <td>{{ $poll->no }}</td>
                                <td>{{ $poll->no_comment }}</td>
                                <td><a data-toggle="modal" class="btn btn-outline-primary" data-target="#poll_{{ $poll->id }}" href="#"><i class="fa fa-poll"></i> Vote Now</a></td>
                                <td>
                                    <!-- Example single danger button -->
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" data-toggle="modal" data-target="#edit_{{ $poll->id }}" href="#"><i class="fa fa-edit"></i> EDIT</a>
                                                <form action="{{ route('poll.destroy', $poll->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="dropdown-item" onclick="return confirm('are you sure to delete this User?')"><i class="fa fa-trash"></i> DELETE</button>
                                                </form>
                                        </div>
                                    </div>

                                    <div id="edit_{{ $poll->id }}" class="text-left modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <div class="modal-header text-center">
                                                    <h4 class="m-0">
                                                        Update Poll
                                                    </h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>

                                                <div class="modal-body">

                                                    <form class="form-horizontal" action="{{ route('poll.update', $poll->id) }}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <label for="name">Title *</label>
                                                            <input value="{{$poll->title}}" class="form-control" type="text" id="title" name="title" required="" placeholder="Title">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name">Description</label>
                                                            <textarea class="form-control" name="description" placeholder="Description" id="" cols="30" rows="10">{{$poll->description}}</textarea>
                                                        </div>
                                                        <div class="form-group account-btn text-center">
                                                            <div class="col-12">
                                                                <button class="btn width-lg btn-rounded btn-primary waves-effect waves-light" type="submit">Update Poll</button>
                                                            </div>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div>

                            {{--Pool Modal Start--}}
                                    <div id="poll_{{ $poll->id }}" class="text-left modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <div class="modal-header text-center">
                                                    <h4 class="m-0">
                                                        Vote Now
                                                    </h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>

                                                <div class="modal-body">

                                                    <form class="form-horizontal" action="{{ route('vote', $poll->id) }}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <h4 class="mb-3">{{$poll->title}}</h4>
                                                        <p>{{$poll->description}}</p>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-4">
                                                                    <input id="poll1" type="radio" value="1" name="poll">
                                                                    <label for="poll1">Yes</label>
                                                                </div>
                                                                <div class="col-4">
                                                                    <input id="poll2" type="radio" value="2" name="poll">
                                                                    <label for="poll2">No</label>
                                                                </div>
                                                                <div class="col-4">
                                                                    <input id="poll3" type="radio" value="3" name="poll">
                                                                    <label for="poll3">No Comment</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group account-btn text-center">
                                                            <div class="col-12">
                                                                <button class="form-control btn width-lg btn-rounded btn-primary waves-effect waves-light" type="submit">Vote Now</button>
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
