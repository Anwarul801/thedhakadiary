@extends('layouts.frontend_layout')

@section('page_title') {{ $category->name }} @endsection

@section('main_content')
    <section class="news-details pt-40 pb-40">
        <div class="container">
            <h1 class="text-center category_title">{{ $category->name }}</h1>
            <div class="row pt-40 pb-40">
                <div class="col-lg-9 col-md-7 col-sm-12 col-xs-12">
                    <div class="row">

                        @forelse($posts as $post)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="first-snd-single pb-20">
                                    @include('layouts.partials.news_item.medium_news')
                                </div>
                            </div>
                        @empty
                            <h4 class="col-12 text-center">কোন পোস্ট পাওয়া যায়নি!</h4>
                        @endforelse
                    </div>
                    {{ $posts->links() }}
                </div>
                <div class="col-lg-3 col-md-5 col-sm-12 col-xs-12 no_print">
                    @include('layouts.partials.last_published_news')
                </div>
            </div>
        </div>
    </section>
@endsection

