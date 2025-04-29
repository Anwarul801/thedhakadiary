@extends('layouts.admin_layout')

@section('page_title')
    Author Update
@endsection
@section('main_content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6 align-items-center d-flex">
                            <h4 class="m-0">Update Author</h4>
                        </div>
                        <div class="col-6 text-right">
                            <a href="{{route('author.index')}}" class="btn btn-primary waves-effect waves-light"><i class="fe-list"></i> Author List</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('author.update', $data->id) }}" method="Post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name_en">Name English *</label>
                                    <input value="{{$data->name_en}}" class="form-control" type="text" id="name_en" name="name_en" required="" placeholder="Name English">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name_bn">Name Bangla *</label>
                                    <input value="{{$data->name_bn}}" class="form-control" type="text" id="name_bn" name="name_bn" required="" placeholder="Name Bangla">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email *</label>
                                    <input value="{{$data->email}}" class="form-control" type="email" id="email" name="email" required="" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="profession">Profession *</label>
                                    <input value="{{$data->profession}}" class="form-control" type="text" id="profession" name="profession" required="" placeholder="Profession">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="profile_picture">Profile Picture</label>
                                    <input class="form-control" type="file" id="profile_picture" name="profile_picture">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="type_id">Author Type *</label>
                                    <select class="form-control" name="type_id" id="type_id">
                                        <option selected disabled>Select Type Of Author</option>
                                        @foreach($types as $type)
                                            <option {{$type->id == $data->type_id ? 'selected' : ''}} value="{{$type->id}}">{{$type->title}}</option>
                                        @endforeach
                                    </select>
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
                                    <select class="form-control" name="status" id="">
                                        <option {{$data->status == 'Active' ? 'selected' : ''}} value="Active">Active</option>
                                        <option {{$data->status == 'In-Active' ? 'selected' : ''}} value="In-Active">In-Active</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Details</label>
                                    <textarea class="form-control" name="details" id="" cols="30" rows="10">{{$data->details}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group account-btn text-center">
                            <div class="col-12">
                                <button class="btn width-lg btn-rounded btn-primary" type="submit">Update Author</button>
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
