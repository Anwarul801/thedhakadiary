@extends('layouts.admin_layout')

@section('page_title')
    Page
@endsection
@section('main_content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6 align-items-center d-flex">
                            <h4 class="m-0">Page List</h4>
                        </div>
                        <div class="col-6 text-right">
                            <a href="{{route('page.create')}}" type="button" class="btn btn-primary"><i class="fe-plus"></i> New Page</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered text-center" >
                        <tr>
                            <th>SL</th>
                            <th>Title</th>
                            <th>Title English</th>
                            <th>Action</th>
                        </tr>
                    @forelse($page_lists as $page)
                            <tr>
                                <td>{{ $loop->iteration}}</td>
                                <td>{{ $page->name }}</td>
                                <td>{{ $page->name_en }}</td>
                                <td>
                                    <!-- Example single danger button -->
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{route('page.edit', $page->id)}}"><i class="fa fa-edit"></i> EDIT</a>
                                                @if($page->deletable != 0)
                                                <form action="{{ route('page.destroy', $page->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="dropdown-item" onclick="return confirm('are you sure to delete this Page?')"><i class="fa fa-trash"></i> DELETE</button>
                                                </form>
                                                @endif
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
