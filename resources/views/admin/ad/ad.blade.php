@extends('layouts.admin_layout')

@section('page_title')
    Ad
@endsection
@section('main_content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6 align-items-center d-flex">
                            <h4 class="m-0">Ad List</h4>
                        </div>
                        <div class="col-6 text-right">
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#signup-modal"><i class="fe-plus"></i> New Ad</button>
                        </div>
                    </div>
                </div>
                <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <div class="modal-header text-center">
                                <h4 class="m-0">
                                    Create a New Ad
                                </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>

                            <div class="modal-body">

                                <form class="form-horizontal" action="{{ route('ad.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="type">Select Type *</label>
                                            <select onchange="hideAndShowInput()" required class="form-control" name="type" id="type">
                                                <option selected value="Internal">Internal</option>
                                                <option value="External">External</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="placement_id">Select Ad Place *</label>
                                            <select required class="form-control" name="placement_id" id="placement_id">
                                                <option selected disabled>Select Ad Place</option>
                                                @foreach($ad_placements as $ad_place)
                                                    <option value="{{$ad_place->id}}">{{$ad_place->title}}/{{$ad_place->img_size}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div id="external" class="form-group col-md-6 d-none">
                                            <label for="code">Code</label>
                                            <textarea style="height: 80px" name="code" id="code" cols="30" rows="5" placeholder="Code" class="form-control"></textarea>
                                        </div>
                                        <div id="internal1" class="form-group col-md-6">
                                            <label for="file_type">File Type *</label>
                                            <select class="form-control" name="file_type" id="file_type">
                                                <option selected value="Image">Image (MAX: 1MB)</option>
                                                <option value="GIF">GIF (MAX: 1MB)</option>
                                                <option value="Video">Video (MAX: 1MB)</option>
                                            </select>
                                        </div>
                                        <div id="internal2" class="form-group col-md-6">
                                            <label for="file">File *</label>
                                            <input class="form-control" type="file" value="{{date('Y-m-d')}}" id="file" name="file">
                                        </div>
                                        <div id="internal3" class="form-group col-md-6">
                                            <label for="link">Link *</label>
                                            <input value="{{old('link')}}" class="form-control" type="text" placeholder="Link" id="link" name="link">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="status">Select Status *</label>
                                            <select required class="form-control" name="status" id="status">
                                                <option selected value="Active">Active</option>
                                                <option value="In-Active">In-Active</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="start_date">Start Date *</label>
                                            <input class="form-control" type="date" value="{{date('Y-m-d')}}" id="start_date" name="start_date">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="end_date">End Date *</label>
                                            <input id="end_date" type="date" value="{{date('Y-m-d')}}" class="form-control" name="end_date">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group account-btn text-center">
                                        <div class="col-12">
                                            <button class="btn width-lg btn-rounded btn-primary waves-effect waves-light" type="submit">Create Ad</button>
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
                            <th>Ad Type</th>
                            <th>Ad Place</th>
                            <th>File</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @forelse($ads as $ad)
                            <tr>
                                <td>{{ $loop->iteration}}</td>
                                <td>{{ $ad->type }}</td>
                                <td>{{ $ad->ad_placement->title }}</td>
                                <td><a class="btn btn-primary" href="{{asset('storage')}}/{{$ad->file}}" target="_blank">Preview</a></td>
                                <td>{{ $ad->status }}</td>
                                <td>
                                    <!-- Example single danger button -->
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item text-{{$ad->status == 'Active' ? 'danger' : 'primary'}}"   href="{{route('ad.edit', $ad->id)}}"><i class="{{$ad->status == 'Active' ? 'fe-eye-off' : 'fe-eye'}}"></i> {{$ad->status == 'Active' ? 'In-Active' : 'Active'}}</a>
                                                <form action="{{ route('ad.destroy', $ad->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="dropdown-item" onclick="return confirm('are you sure to delete this Ad?')"><i class="fa fa-trash"></i> DELETE</button>
                                                </form>
                                        </div>
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

@section('js')
    <script>
        function hideAndShowInput() {
            var selectElement = document.getElementById("type");
            var internalFirst = document.getElementById("internal1");
            var internalSecond = document.getElementById("internal2");
            var internalThird = document.getElementById("internal3");
            var externalInput = document.getElementById("external");

            if (selectElement.value === "Internal") {
                internalFirst.classList.remove("d-none"); // Show internal input fields
                internalSecond.classList.remove("d-none"); // Show internal input fields
                internalThird.classList.remove("d-none"); // Show internal input fields
                externalInput.classList.add("d-none");    // Hide external input fields
            } else if (selectElement.value === "External") {
                internalFirst.classList.add("d-none"); // Show internal input fields
                internalSecond.classList.add("d-none"); // Show internal input fields
                internalThird.classList.add("d-none"); // Show internal input fields
                externalInput.classList.remove("d-none"); // Show external input fields
            }
        }
    </script>
@endsection
