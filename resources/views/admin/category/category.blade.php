@extends('layouts.admin_layout')

@section('page_title')
    Category
@endsection
@section('main_content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6 align-items-center d-flex">
                            <h4 class="m-0">Category List</h4>
                        </div>
                        <div class="col-6 text-right">
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#signup-modal"><i class="fe-plus"></i> New Category</button>
                        </div>
                    </div>
                </div>
                <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header text-center">
                                <h4 class="m-0">
                                    Create a New Category
                                </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>

                            <div class="modal-body">

                                <form class="form-horizontal" action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Name *</label>
                                        <input class="form-control" type="text" id="name" name="name" required placeholder="Category Name">
                                        @error('name')
                                        <span style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="name_en">Name English</label>
                                        <input class="form-control" type="text" id="name_en" name="name_en" placeholder="Category Name">
                                        @error('name_en')
                                        <span style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group account-btn text-center">
                                        <div class="col-12">
                                            <button class="btn width-lg btn-rounded btn-primary waves-effect waves-light" type="submit">Create Category</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>

                <div class="card-body pb-5">
                    <table class="table table-bordered text-center" >
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Name English</th>
                            <th>Order</th>
                            <th>Home Page Status</th>
                            <th>Action</th>
                        </tr>
                        @forelse($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration}}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->name_en ?? '' }}</td>
                                <td>{{ $category->order ?? '' }}</td>
                                <td><a class="btn btn-sm btn-{{$category->status=='Active'?'success':'danger'}}" href="{{route('category_status_change')}}?id={{$category->id}}">{{ $category->status ?? '' }}</a></td>
                                <td>
                                    <!-- Example single danger button -->
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" data-toggle="modal" data-target="#edit_{{ $category->id }}" href="#"><i class="fa fa-edit"></i> EDIT</a>
                                            <a class="dropdown-item" href="{{route('post.create')}}?id={{$category->id}}"><i class="fas fa-arrow-circle-up"></i> POST</a>
                                               @if($category->deletable != 0)
                                                <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="dropdown-item" onclick="return confirm('are you sure to delete this Category?')"><i class="fa fa-trash"></i> DELETE</button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>

                                    <div id="edit_{{ $category->id }}" class="text-left modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <div class="modal-header text-center">
                                                    <h4 class="m-0">
                                                        Update Category
                                                    </h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>

                                                <div class="modal-body">

                                                    <form class="form-horizontal" action="{{ route('category.update', $category->id) }}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <label for="name">Name *</label>
                                                            <input value="{{$category->name}}" class="form-control" type="text" id="name" name="name" required placeholder="Category Name">
                                                            @error('name')
                                                            <span style="color:red">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="name_en">Name English</label>
                                                            <input value="{{$category->name_en}}" class="form-control" type="text" id="name_en" name="name_en" placeholder="Category Name">
                                                            @error('name_en')
                                                            <span style="color:red">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="order">Order *</label>
                                                            <input value="{{$category->order}}" class="form-control" type="number" id="order" name="order" required placeholder="Order">
                                                            @error('order')
                                                            <span style="color:red">{{ $message }}</span>
                                                            @enderror
                                                        </div>


                                                        <div class="form-group account-btn text-center">
                                                            <div class="col-12">
                                                                <button class="btn width-lg btn-rounded btn-primary waves-effect waves-light" type="submit">Update Category</button>
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
