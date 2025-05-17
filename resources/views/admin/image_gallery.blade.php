@extends('layouts.admin_layout')
@section('page_title')
    Image Galleries
@endsection
@section('css')
    <style>
        #datatable-buttons_info, #datatable-buttons_paginate, #datatable-buttons_filter{
            display: none;
        }
    </style>
@endsection
@section('main_content')
    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h5 class="">{{ __('Manage Image Gallery') }}</h5>
                </div>
                <div class="col-md-6 text-right"> <a href="{{route('image_gallery.create')}}" class="btn btn-outline-info waves-effect waves-light" ><i class="fa fa-plus-circle"></i>
                        {{ __('Add New') }}</a>
                </div>
            </div>
        </div>
        <div class="card-body form-body">
            <form action="" method="get" id="search_form"></form>
            <div class="row mb-3">
                <div class="col-md-2 mb-2">
                    <label>{{ __('Title') }}</label>
                    <input type="text" value="{{ $request->title }}" name="title" class="form-control"
                           placeholder="Search By Title" form="search_form">
                </div>
                <div class="col-md-2 mb-2">
                    <label>{{ __('Status') }}</label>
                    <select form="search_form" name="status" id="" class="form-control">
                        <option value="" disabled selected>Search By Status</option>
                        <option value="Active" {{$request->status == 'Active' ? 'selected' : ''}}>Active</option>
                        <option value="In-Active" {{$request->status == 'In-Active' ? 'selected' : ''}}>In-Active</option>
                    </select>
                </div>
                <div class="col-md-2 mb-2">
                    <label>{{ __('Action') }}</label>
                    <br>
                    <button class="btn btn-outline-dark" form="search_form" type="submit"><span
                            class="fa fa-search"></span> Search</button>
                    <a href="{{ route('image_gallery.index') }}" class="btn btn-outline-danger">Reset</a>
                </div>
            </div>
            <table class="table  dt-responsive text-center"
                   style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                <tr class="main_title">
                    <th scope="col">#</th>
                    <th scope="col">{{ __('Title') }}</th>
                    <th scope="col">{{ __('Thumbnail') }}</th>
                    <th scope="col">{{ __('Status') }}</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($gallerys as $gallery)
                    <tr>
                        <td scope="row"> {{ ($gallerys->currentpage()-1) * $gallerys->perpage() + $loop->iteration }}</td>
                        <td>{{ $gallery->title }}</td>
                        <td><a href="{{asset($gallery->thumbnail)}}" target="_blank" class="btn btn-sm btn-outline-secondary"><i class="fa fa-eye"></i></a></td>
                        @if(auth()->user()->role_id==1)
                        <td>
                            <form action="{{ route('image_gallery_status_change') }}" method="get"
                                  id="submitform{{ $gallery->id }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $gallery->id }}"
                                       form="submitform{{ $gallery->id }}">
                                <select class="form-control w-50 mx-auto" name="status" form="submitform{{ $gallery->id }}"
                                        onchange="confirmStatusChange(this)">
                                    <option value="Active" {{ $gallery->status == 'Active' ? 'selected' : '' }}>Active
                                    </option>
                                    <option value="In-Active" {{ $gallery->status == 'In-Active' ? 'selected' : '' }}>
                                        In-Active</option>
                                </select>
                            </form>
                        </td>
                        @else
                            <td>
                                <span class="badge badge-{{ $gallery->status == 'Active' ? 'success' : 'danger' }}">{{ $gallery->status }}</span>
                            </td>
                        @endif
                        <td class="text-center d-sm-flex justify-content-evenly">
                            <div class="dropdown mx-auto">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-expanded="false">
                                    Action <i class="mdi mdi-chevron-down"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{route('image_gallery.edit', $gallery->id)}}">Edit</a>
                                    @if($gallery->status!='Active')
                                        <form action="{{ route('image_gallery.destroy', $gallery->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure to Delete?')">Delete</button>
                                        </form>
                                    @endif
                                </div>
                            </div>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="100">No Data Found!</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            {{ $gallerys->appends(request()->input())->links() }}
        </div>
    </div>
@endsection
@section('js')
    <script>
        function confirmStatusChange(selectElement) {
            var selectedValue = selectElement.value;
            var confirmationMessage = "Are you sure you want to change the status to " + selectedValue + "?";

            Swal.fire({
                title: 'Confirmation',
                text: confirmationMessage,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#0eb041',
                cancelButtonColor: '#ff0000',
                confirmButtonText: 'Yes',
                cancelButtonText: 'No'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If the user clicks "OK", submit the form
                    selectElement.form.submit();
                } else {
                    // If the user clicks "Cancel", reset the select to the previous value
                    var previousValue = selectElement.getAttribute('data-previous-value');
                    selectElement.value = previousValue;
                    window.location.reload();
                }
            });
        }

    </script>
@endsection
