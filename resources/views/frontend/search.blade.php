@extends('layouts.frontend_layout')

@section('page_title') সার্চ @endsection

@section('main_content')
    <section class="news-details pt-40 pb-40">
        <div class="container">
            <div class="category_title">
                <h1 class="text-center">সার্চ করুন</h1>
                <form action="" method="get">
                    <input type="text" placeholder="সার্চ করুন ..." name="search" class="form-control">
                    <button class="btn btn-success"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <div class="row pt-40 pb-40">
                @forelse($posts as $post)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="first-snd-single pb-20">
                            <div class="second_image">
                                <a href="{{ route('news_details', ['id' => $post->id, 'slug' => $post->slug]) }}">
                                    <img src="{{ asset('storage') }}/{{ $post->media->xs_thumbnail }}" alt="ad">
                                </a>
                            </div>
                            <div class="second-content">
                                <h3><a href="{{ route('news_details', ['id' => $post->id, 'slug' => $post->slug]) }}">{{ $post->title }}</a></h3>
                            </div>
                        </div>
                    </div>
                @empty
                    <h4 class="col-12 text-center">কোন পোস্ট পাওয়া যায়নি!</h4>
                @endforelse
            </div>
            {{ $posts->appends(Request::except('page'))->links() }}
        </div>
    </section>
@endsection

