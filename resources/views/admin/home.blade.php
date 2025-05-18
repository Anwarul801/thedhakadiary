@extends('layouts.admin_layout')

@section('page_title')
    Dashboard
@endsection

@section('main_content')
<div class="row justify-content-center">
    <div class="col-md-8 mt-5">
        <h1 style="font-size: 55px" class="text-center">Welcome To {{getOptionData('site_title')}} : Dashboard</h1>
    </div>
</div>
@endsection
