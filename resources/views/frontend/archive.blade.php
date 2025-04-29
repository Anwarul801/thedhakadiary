@extends('layouts.frontend_layout')

@section('page_title') আর্কাইভ @endsection

@section('main_content')
    <section class="news-details pt-40 pb-40">
    <div class="container">
        <div class="category_title">
            <h1 class="text-center">আর্কাইভ</h1>
            <form action="">
                <input value="{{$request->date}}" type="date" name="date" class="form-control">
                <button class="btn btn-success"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <div class="row pt-40 pb-40">
            @forelse($posts as $post)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="first-snd-single pb-20">
                        @include('layouts.partials.news_item.medium_news')
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
