@extends('layouts.admin_layout')

@section('page_title')
    Author
@endsection
@section('main_content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6 align-items-center d-flex">
                            <h4 class="m-0">Author List</h4>
                        </div>
                        <div class="col-6 text-right">
                            <a href="{{route('author.create')}}" type="button" class="btn btn-primary"><i class="fe-plus"></i> New Author</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered text-center" >
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        @forelse($authors as $author)
                            <tr>
                                <td>{{ $loop->iteration}}</td>
                                <td>{{ $author->name_en }} / {{$author->name_bn}}</td>
                                <td>
                                    <!-- Example single danger button -->
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{route('author.edit', $author->id)}}"><i class="fa fa-edit"></i> EDIT</a>
                                                <form action="{{ route('author.destroy', $author->id) }}" method="POST">
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
