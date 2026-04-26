@extends('layouts.admin_layout')

@section('page_title')
    User
@endsection
@section('main_content')
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6 align-items-center d-flex">
                            <h4 class="m-0">{{$page_type}} User</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ $page_type=='Create'? route('user.store'): route('user.update', $user->id) }}" method="post" enctype="multipart/form-data">
                        @if($page_type!='Create')
                            @method('PUT')
                        @endif
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="role_id">Select Role *</label>
                                    <select class="form-control" name="role_id" id="role_id">
                                        <option {{$page_type!='Create'&&$user->role_id==2?'selected':''}}  value="2">Operator</option>
                                        <option {{$page_type!='Create'&&$user->role_id==1?'selected':''}} value="1">Admin</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name *</label>
                                    <input class="form-control" value="{{$page_type!='Create'?$user->name:''}}" type="text" id="name" name="name" required="" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name English</label>
                                    <input class="form-control" value="{{$page_type!='Create'?$user->name_en:''}}" type="text" id="name" name="name_en" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="designation">Designation *</label>
                                    <input class="form-control" value="{{$page_type!='Create'?$user->designation:''}}" type="text" id="designation" name="designation" placeholder="Designation">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="designation">Designation English</label>
                                    <input class="form-control" value="{{$page_type!='Create'?$user->designation_en:''}}" type="text" id="designation" name="designation_en" placeholder="Designation">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Email *</label>
                                    <input class="form-control" value="{{$page_type!='Create'?$user->email:''}}" type="email" id="email" name="email" required="" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Phone Number </label>
                                    <input class="form-control" type="text" value="{{$page_type!='Create'?$user->phone_number:''}}" id="phone_number" name="phone_number" required="" placeholder="Phone Number">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password *</label>
                                    <input id="password" placeholder="Create a new password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password-confirm">Confirm Password *</label>
                                    <input id="password-confirm" type="password" placeholder="Retype Password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for=" ">Description</label>
                                    <textarea name="description" id="" cols="30" class="form-control" rows="5">{{$page_type!='Create'?$user->description:''}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for=" ">Description English</label>
                                    <textarea name="description_en" id="" cols="30" class="form-control" rows="5">{{$page_type!='Create'?$user->description_en:''}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group account-btn text-center">
                            <div class="col-12">
                                <button class="btn width-lg btn-rounded btn-primary waves-effect waves-light" type="submit">
                                    {{$page_type}} User</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>



        </div><!-- end col -->
    </div>
@endsection
