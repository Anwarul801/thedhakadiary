@extends('layouts.admin_layout')

@section('page_title')
    Menu
@endsection
@section('main_content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6 align-items-center d-flex">
                            <h4 class="m-0">Menu List</h4>
                        </div>
                        <div class="col-6 text-right">
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#signup-modal"><i class="fe-plus"></i> New Menu</button>
                        </div>
                    </div>
                </div>
                <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header text-center">
                                <h4 class="m-0">
                                    Create a New Menu
                                </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>

                            <div class="modal-body">

                                <form class="form-horizontal" action="{{ route('menu.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                            <label for="title">Title *</label>
                                            <input class="form-control" type="text" id="title" name="title" required="" placeholder="Title">
                                    </div>
                                    <div class="form-group">
                                            <label for="title">Title English</label>
                                            <input class="form-control" type="text" id="title" name="title_en"  placeholder="Title">
                                    </div>
                                    <div class="form-group">
                                            <label for="type">Type *</label>
                                        <select onchange="clickToChange(this.value, 'create')" class="form-control" name="type" id="type">
                                            <option selected disabled>Select Menu Type</option>
                                            <option value="Category">Category</option>
                                            <option value="Page">Page</option>
                                            <option value="Link">Link</option>
                                        </select>
                                    </div>
                                    <div id="categoryShow" class="form-group d-none">
                                            <label for="category_id">Select Category</label>
                                        <select class="form-control" name="category_id" id="category_id">
                                            <option selected disabled>Select Category</option>
                                            @foreach($categories as $cat)
                                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div id="pageShow" class="form-group d-none">
                                            <label for="page_id">Select Page</label>
                                        <select class="form-control" name="page_id" id="page_id">
                                            <option selected disabled>Select Page</option>
                                            @foreach($pages as $page)
                                                <option value="{{$page->id}}">{{$page->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
{{--                                    <div class="form-group">--}}
{{--                                        <label for="parent_menu_id">Select Parent Menu</label>--}}
{{--                                        <select class="form-control" name="parent_menu_id" id="parent_menu_id">--}}
{{--                                            <option selected disabled>Select Parent Menu</option>--}}
{{--                                            @foreach($menu_without_parent as $m)--}}
{{--                                                <option value="{{$m->id}}">{{$m->title}}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
                                    <div id="linkShow" class="form-group d-none">
                                            <label for="link">Link *</label>
                                        <input class="form-control" type="text" id="link" name="link" placeholder="Link">
                                    </div>
                                    <div class="form-group account-btn text-center">
                                        <div class="col-12">
                                            <button class="btn width-lg btn-rounded btn-primary waves-effect waves-light" type="submit">Create Menu</button>
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
                            <th>Title</th>
                            <th>Title English</th>
                            <th>Type</th>
                            <th>Link</th>
                            <th>Order</th>
                            <th>Action</th>
                        </tr>
                        @forelse($menus as $menu)
                            <tr>
                                <td>{{ $loop->iteration}}</td>
                                <td>{{ $menu->title }}</td>
                                <td>{{ $menu->title_en ?? null }}</td>
                                <td>{{ $menu->type }}</td>
                                <td class="{{$menu->category_id == null ? 'd-none' : ''}}">{{ $menu->category->name ?? null}}</td>
                                <td class="{{$menu->page_id == null ? 'd-none' : ''}}">{{ $menu->page->name ?? null}}</td>
                                <td class="{{$menu->link == null ? 'd-none' : ''}}">{{ $menu->link ?? null}}</td>
                                <td>{{$menu->order}}</td>
                                <td>
                                    <!-- Example single danger button -->
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" data-toggle="modal" data-target="#edit_{{ $menu->id }}" href="#"><i class="fa fa-edit"></i> EDIT</a>

                                                <form action="{{ route('menu.destroy', $menu->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="dropdown-item" onclick="return confirm('are you sure to delete this Menu?')"><i class="fa fa-trash"></i> DELETE</button>
                                                </form>
                                        </div>
                                    </div>

                                    <div id="edit_{{ $menu->id }}" class="text-left modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <div class="modal-header text-center">
                                                    <h4 class="m-0">
                                                        Update Menu
                                                    </h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>

                                                <div class="modal-body">

                                                    <form class="form-horizontal" action="{{ route('menu.update', $menu->id) }}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <label for="title">Title *</label>
                                                            <input value="{{$menu->title}}" class="form-control" type="text" id="title" name="title" required="" placeholder="Title">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="title">Title English</label>
                                                            <input value="{{$menu->title_en}}" class="form-control" type="text" id="title_en" name="title_en" placeholder="Title">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="type">Type *</label>
                                                            <select onchange="clickToChange(this.value, 'edit', 'categoryShow{{$menu->id}}', 'pageShow{{$menu->id}}', 'linkShow{{$menu->id}}')" class="form-control" name="type" id="type">
                                                                <option selected disabled>Select Menu Type</option>
                                                                <option {{$menu->type == "Category" ? 'selected' : ''}} value="Category">Category</option>
                                                                <option {{$menu->type == "Page" ? 'selected' : ''}} value="Page">Page</option>
                                                                <option {{$menu->type == "Link" ? 'selected' : ''}} value="Link">Link</option>
                                                            </select>
                                                        </div>
                                                        <div id="categoryShow{{$menu->id}}" class="form-group {{$menu->type != 'Category' ? 'd-none' : ''}}">
                                                            <label for="category_id">Select Category</label>
                                                            <select class="form-control" name="category_id" id="category_id">
                                                                <option selected disabled>Select Category</option>
                                                                @foreach($categories as $cat)
                                                                    <option {{$cat->id == $menu->category_id ? 'selected' : ''}} value="{{$cat->id}}">{{$cat->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div id="pageShow{{$menu->id}}" class="form-group {{$menu->type != 'Page' ? 'd-none' : ''}}">
                                                            <label for="page_id">Select Page</label>
                                                            <select class="form-control" name="page_id" id="page_id">
                                                                <option selected disabled>Select Page</option>
                                                                @foreach($pages as $page)
                                                                    <option {{$page->id == $menu->page_id ? 'selected' : ''}} value="{{$page->id}}">{{$page->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div id="linkShow{{$menu->id}}" class="form-group {{$menu->type != 'Link' ? 'd-none' : ''}}">
                                                            <label for="link">Link *</label>
                                                            <input value="{{$menu->link ?? null}}" class="form-control" type="text" id="link" name="link" placeholder="Link">
                                                        </div>
{{--                                                        <div class="form-group">--}}
{{--                                                            <label for="parent_menu_id">Select Parent Menu</label>--}}
{{--                                                            <select class="form-control" name="parent_menu_id" id="parent_menu_id">--}}
{{--                                                                <option disabled selected>Select Parent Menu</option>--}}
{{--                                                                @foreach($menu_without_parent as $m)--}}
{{--                                                                    <option {{ $m->id == $menu->parent_menu_id ? 'selected' : ''}} value="{{$m->id}}">{{$m->title}}</option>--}}
{{--                                                                @endforeach--}}
{{--                                                            </select>--}}
{{--                                                        </div>--}}
                                                        <div class="form-group">
                                                            <label for="name">Order *</label>
                                                            <input value="{{$menu->order}}" class="form-control" type="number" id="name" name="order" required="" placeholder="Order">
                                                        </div>
                                                        <div class="form-group account-btn text-center">
                                                            <div class="col-12">
                                                                <button class="btn width-lg btn-rounded btn-primary waves-effect waves-light" type="submit">Update Menu</button>
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

    <script>
        function clickToChange(value, type = 'create', categoryShowEdit = null, pageShowEdit = null, linkShowEdit = null){
            if(type == "create"){
                if(value == 'Category'){
                    document.getElementById("categoryShow").classList.remove('d-none');
                }else {
                    document.getElementById("categoryShow").classList.add('d-none');
                }
                if(value == 'Page'){
                    document.getElementById("pageShow").classList.remove('d-none');
                }else {
                    document.getElementById("pageShow").classList.add('d-none');
                }
                if(value == 'Link'){
                    document.getElementById("linkShow").classList.remove('d-none');
                }else {
                    document.getElementById("linkShow").classList.add('d-none');
                }
            }else{
                if(value == 'Category'){
                    document.getElementById(categoryShowEdit).classList.remove('d-none');
                }else {
                    document.getElementById(categoryShowEdit).classList.add('d-none');
                }
                if(value == 'Page'){
                    document.getElementById(pageShowEdit).classList.remove('d-none');
                }else {
                    document.getElementById(pageShowEdit).classList.add('d-none');
                }
                if(value == 'Link'){
                    document.getElementById(linkShowEdit).classList.remove('d-none');
                }else {
                    document.getElementById(linkShowEdit).classList.add('d-none');
                }
            }
        }
    </script>
@endsection
