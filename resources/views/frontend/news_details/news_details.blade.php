@extends('layouts.frontend_layout')
@section('page_title')
{{ $news->title }}
@endsection
@section('og_image'){{ asset('storage') }}/{{ $news->media->image }}@endsection
@section('og_title'){{ $news->title }}@endsection
@section('og_subtitle'){{ $news->subtitle }}@endsection
@section('meta_keywords'){{ $news->meta_keywords }}@endsection
@section('meta_description'){{ $news->meta_description }}@endsection
@section('main_content')
    <section class="news-details pt-40 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-detail-infor print_area">
                        <div class="news-detail-title">
                            <h5>
                                <a style="margin-right: 5px;  color: black; font-size: 15px" href="{{ route('index_page') }}">প্রচ্ছদ /</a>
                                @foreach($news->categories as $cat)
                                    <a style="margin-right: 5px;  color: black; font-size: 15px" href="{{ route('category_view', $cat->slug) }}">{{ $cat->name }} /</a>
                                @endforeach
                            </h5>
                            <h2>{{$news->shoulder}}</h2>
                            <h1 class="news_title_h1">{{$news->title}}</h1>
                            <p>{{$news->subtitle}} </p>
                        </div>
                        <div class="social-add">
                            <div class="author-name">
                                <div class="">
                                <div style="width: 45px; height: 10px; background-color: var(--soft-white); margin-bottom: 9px;"></div>
                                </div>
                                <h5 class="name">{{$news->source}} <span class="locaton"></span></h5>
                                <p class="date">প্রকাশ: {{ date_maker($news->publishing_date, 'd m, y', true)}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt-40 pb-40">
                <div class="col-lg-8 col-md-7 col-sm-12 col-xs-12">
                    <div class="news-element print_area">
                        <div class="social_share no_print">
                            <a href="{{ fb_share(url()->current()) }}" target="_blank" class="facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="{{twitter_share(url()->current())}}" target="_blank" class="twitter"><i class="fab fa-twitter"></i></a>
                            <a href="{{whatsapp_share(url()->current())}}" target="_blank" class="whatsapp"><i class="fab fa-whatsapp"></i></a>
                            <a href="{{ route('print_news', $news->id) }}" target="_blank" class="print"><i class="fas fa-print"></i></a>
                            <a href="javascript:;" onclick="navigator.clipboard.writeText('{{url()->current()}}');alert('link Copied')" class=""><i class="fas fa-copy"></i></a>
                        </div>

                        <div class="img" id="get_width">
                            @if($news->video_id !== null)
                                <iframe id="video_iframe" width="100%" src="https://www.youtube.com/embed/{{$news->video_id}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            @else
                                <img class="img_full_image" src="{{asset('storage')}}/{{$news->media->xs_thumbnail}}" alt="1">
                                @if($news->media->caption)
                                    <i>{{ $news->media->caption }} </i>
                                @endif
                            @endif

                        </div>
                        <div class="element-content">
                            <div class="bold_tag_customize">
                                {!! $news->news_details!!}
                            </div>
                            <div class="tags-news">
                                <ul>
                                    @php
                                        $tags = explode(",", rtrim($news->tags, ','));
                                    @endphp
                                    @foreach($tags as $tag)
                                        <li><a href="{{ route('search') }}?search={{ $tag }}">{{$tag}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 no_print">
                    @include('layouts.partials.last_published_news')
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        $(function () {
            var div_width = $('#get_width').width();
            var div_height = div_width * 56 /100;
            $('#video_iframe').css({ 'height' : div_height + 'px'});
        });
    </script>
@endsection
