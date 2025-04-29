@extends('layouts.frontend_layout')

@section('page_title') {{ $page->name }} @endsection

@section('main_content')
    <section class="news-details pt-40 pb-40">
        <div class="container">
            <div class="row pt-40 pb-40 justify-content-center">
                <div class="col-md-7 col-lg-6 col-sm-9 col-xs-12">
                    <h1 class="text-center category_title">{{ $page->name }}</h1>
                    <div class="element-content">
                        {!! $page->description !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

