@extends('layouts.admin_layout')

@section('page_title')
    Post
@endsection
@section('main_content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6 align-items-center d-flex">
                            <h4 class="m-0">Post List</h4>
                        </div>
                        <div class="col-6 text-right">
                            <a href="{{route('post.print_all')}}" target="_blank" type="button" class="btn btn-warning"><i class="fa fa-print"></i> Print All</a>
                            <a href="{{route('marque')}}?type={{$marque->type == 'Active' ? 'Active' : 'In-Active'}}" type="button" class="btn btn-{{$marque->type == 'Active' ? 'danger' : 'primary'}}"><i class="fe-{{$marque->type == 'Active' ? 'x' : 'check'}} "></i> Breaking News
                                {{$marque->type == 'Active' ? 'In-Active' : 'Active'}}</a>
                            <a href="{{route('post.create')}}" type="button" class="btn btn-primary"><i class="fe-plus"></i> New Post</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="" id="search_form"></form>
                    <table class="table table-bordered text-center" >
                        <tr>
                            <th>SL</th>
                            <th>Date</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Hit</th>
                            <th>Action</th>
                        </tr>
{{--                        search start--}}
                        <tr>
                        <td>#</td>
                        <td>
                            <input type="date" class="form-control" value="{{ $request->date }}" form="search_form" name="date">
                        </td>
                        <td>
                            <input type="text" class="form-control" value="{{ $request->title }}" form="search_form" name="title" placeholder="Title">
                        </td>
                        <td>
                            <select form="search_form" class="form-control" name="status" id="status">
                                <option selected disabled>Select Status</option>
                                <option {{$request->status == 'Published'? 'selected' : ''}} value="Published">Published</option>
                                <option {{$request->status == 'Pending'? 'selected' : ''}} value="Pending">Pending</option>
                                <option {{$request->status == 'Draft'? 'selected' : ''}} value="Draft">Draft</option>
                            </select>
                        </td>
                        <td>
                            <select name="hit" id="hit" form="search_form" class="form-control">
                                <option selected disabled>Select Hit</option>
                                <option {{$request->hit == 'ASC' ? 'selected' : ''}} value="ASC">Least Viewed</option>
                                <option {{$request->hit == 'DESC' ? 'selected' : ''}} value="DESC">Most Viewed</option>
                            </select>
                        </td>
                        <td>
                            <button type="submit" form="search_form" class="btn btn-outline-primary mb-2"><i class="fa fa-search"></i> Search</button>
                            <a href="{{ route('post.index') }}" class="btn btn-outline-danger mb-2">Reset</a>
                        </td>
                        </tr>

{{--                        loop start--}}
                        @forelse($posts as $post)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ date_maker($post->created_at, 'd m, y', true)  }}</td>
                                <td>{{ $post->title }}</td>
                                <td>
                                    <a href="{{route('status_change')}}?id={{$post->id}}" class="bg-{{$post->status == 'Published' ? 'primary': ($post->status == 'Draft' ? 'secondary': ($post->status == 'Pending' ? 'info':''))}} text-white" style="padding: 5px 10px; cursor:pointer;">{{ $post->status }}</a>
                                </td>
                                <td>{{ $post->hit == null ? 0 : $post->hit }}</td>
                                <td>
                                    <!-- Example single danger button -->
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{route('news_details', ['id' => $post->id, 'slug' => $post->slug])}}?type=admin" target="_blank"><i class="fa fa-eye"></i> View</a>
                                            <a class="dropdown-item" href="{{route('post.edit', $post->id)}}"><i class="fa fa-edit"></i> EDIT</a>
                                                <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="dropdown-item" onclick="return confirm('are you sure to delete this User?')"><i class="fa fa-trash"></i> DELETE</button>
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
