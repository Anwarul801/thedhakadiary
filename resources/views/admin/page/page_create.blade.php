@extends('layouts.admin_layout')

@section('page_title')
    Page Create
@endsection
@section('main_content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6 align-items-center d-flex">
                            <h4 class="m-0">Create Page</h4>
                        </div>
                        <div class="col-6 text-right">
                            <a href="{{route('page.index')}}" class="btn btn-primary waves-effect waves-light"><i class="fe-list"></i> Page List</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('page.store') }}" method="Post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Title *</label>
                                    <input class="form-control" type="text" id="name" name="name" required="" placeholder="Title">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Details</label>
                                    <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group account-btn text-center">
                            <div class="col-12">
                                <button class="btn width-lg btn-rounded btn-primary" type="submit">Create Page</button>
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
