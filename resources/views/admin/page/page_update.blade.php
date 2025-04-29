@extends('layouts.admin_layout')

@section('page_title')
    Page Update
@endsection
@section('main_content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6 align-items-center d-flex">
                            <h4 class="m-0">Update Page</h4>
                        </div>
                        <div class="col-6 text-right">
                            <a href="{{route('page.index')}}" class="btn btn-primary waves-effect waves-light"><i class="fe-list"></i> Page List</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('page.update', $id) }}" method="Post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Title *</label>
                                    <input value="{{$data->name}}" class="form-control" type="text" id="name" name="name" required="" placeholder="Title">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Title English</label>
                                    <input value="{{$data->name_en}}" class="form-control" type="text" id="name" name="name_en" placeholder="Title">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name">Order *</label>
                                    <input value="{{$data->order}}" class="form-control" type="number" id="name" name="order" required="" placeholder="Order">
                                </div>
                                </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name">Select Status *</label>
                                    <select required class="form-control" name="status" id="">
                                        <option {{$data->status == 'Active' ? 'selected' : ''}} value="Active">Active</option>
                                        <option {{$data->status == 'In-Active' ? 'selected' : ''}} value="In-Active">In-Active</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Description</label>
                                    <textarea class="form-control" name="description" id="" cols="30" rows="10">{{$data->description}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Description English</label>
                                    <textarea class="form-control" name="description_en" id="" cols="30" rows="10">{{$data->description_en}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group account-btn text-center">
                            <div class="col-12">
                                <button class="btn width-lg btn-rounded btn-primary" type="submit">Update Page</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- end col -->
    </div>
@endsection
@section('js')
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
    </script>
@endsection
