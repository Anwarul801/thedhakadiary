@php use Carbon\Carbon;use Illuminate\Support\Str; @endphp
@extends('layouts.frontend_layout')
@section('page_title')
    {{isEnglish()? 'The Dhaka Diary' : 'দ্যা ঢাকা ডায়েরী'}}
@endsection
@section('css')
@endsection
@section('main_content')
    <main class="site-content flex-1">
        <!-- ad area -->
        <div class="container {{$ad1!=null? '' : 'hidden'}}">
            <div class="ad-full">
                <a target="_blank" href="{{$ad1->link??null}}">
                    <img src="{{asset('storage')}}/{{$ad1->file??null}}" alt="ad image">
                </a>
            </div>
        </div>
        <!-- ad area end-->
        <!-- ==========Top_Section ======== -->
        <section class="top_section section-padding-top">
            <div class="container">
                <div class="grid grid-cols-12 md:gap-6 gap-4">
                    <div class="xl:col-span-9 col-span-12">
                        <div class="grid grid-cols-12 md:gap-6 gap-4">
                            @foreach($header_posts as $header_post)
                                @if($loop->iteration==2)
                                    @break
                                @endif
                                <div class="xl:col-span-8 sm:col-span-7 col-span-12">
                                    <!-- news card -->
                                    <div class="news-card">
                                        <div class="thumbnail">
                                            <a href="{{route('news_details', ['id' => $header_post->id, 'slug' => $header_post->slug])}}"><img
                                                    src="{{asset('storage')}}/{{$header_post->media->image??null}}"
                                                    alt="Thumbnail"></a>
                                        </div>
                                        <h1 class="title title-lg">
                                            <a href="{{route('news_details', ['id' => $header_post->id, 'slug' => $header_post->slug])}}">{{Str::limit($header_post->title, 100)}}</a>
                                        </h1>
                                        <div class="short-description">
                                            <p>
                                                <a href="{{route('news_details', ['id' => $header_post->id, 'slug' => $header_post->slug])}}">{{$header_post->subtitle}}</a>
                                            </p>
                                        </div>
                                        <div class="date">
                                            <p>{{isEnglish()?date_maker($header_post->publishing_date, 'd F, Y'): formatBanglaDate($header_post->publishing_date)}}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <div class="xl:col-span-4 sm:col-span-5 col-span-12">
                                <div class="grid grid-cols-12 md:gap-y-6 gap-4">
                                    <!-- First side news card -->

                                    @foreach($header_posts as $header_post)
                                        @if($loop->iteration==1)
                                            @continue
                                        @endif
                                        @if($loop->iteration==4)
                                            @break
                                        @endif
                                        <div class="sm:col-span-12 col-span-6">
                                            <div class="news-card">
                                                <div class="thumbnail">
                                                    <a href="{{route('news_details', ['id' => $header_post->id, 'slug' => $header_post->slug])}}"><img
                                                            src="{{asset('storage')}}/{{$header_post->media->thumbnail??null}}"
                                                            alt="Thumbnail"></a>
                                                </div>
                                                <h1 class="title">
                                                    <a href="{{route('news_details', ['id' => $header_post->id, 'slug' => $header_post->slug])}}">{{Str::limit($header_post->title, 100)}}</a>
                                                </h1>
                                                <div class="date">
                                                    <p>{{isEnglish()?date_maker($header_post->publishing_date, 'd F, Y'): formatBanglaDate($header_post->publishing_date)}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>

                        </div>
                        <div class="grid grid-cols-12 md:gap-6 gap-4 mt-4">
                            @foreach($header_posts as $header_post)
                                @if($loop->iteration<4)
                                    @continue
                                @endif
                                <div class="md:col-span-4 col-span-6">
                                    <div class="news-card">
                                        <div class="thumbnail">
                                            <a href="{{route('news_details', ['id' => $header_post->id, 'slug' => $header_post->slug])}}"><img
                                                    src="{{asset('storage')}}/{{$header_post->media->thumbnail??null}}"
                                                    alt="Thumbnail"></a>
                                        </div>
                                        <h1 class="title"><a
                                                href="{{route('news_details', ['id' => $header_post->id, 'slug' => $header_post->slug])}}">{{Str::limit($header_post->title, 100)}}</a>
                                        </h1>
                                        <div class="date">
                                            <p>{{isEnglish()?date_maker($header_post->publishing_date, 'd F, Y'): formatBanglaDate($header_post->publishing_date)}}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>


                    </div>

                    <div class="xl:col-span-3 col-span-12">
                        @include('layouts.partials.news_item.latest_news')

                        <div class="send-video-wrap">
                            <h1 class="title">{{__('lang.send_video_title')}}</h1>

                            <div class="using-mathod">
                                <a href="https://wa.me/{{getOptionData('whats_app')}}" class="item">
                                    <div class="left-part flex items-center gap-4">
                                        <div class="left-icon">
                                            <img src="{{asset('frontend/assets')}}/image/whatsapp.svg" alt="What's up">
                                        </div>
                                        <h3 class="name">{{__('lang.whatsapp')}}</h3>
                                    </div>
                                    <div class="right-icon">
                                        <img src="{{asset('frontend/assets')}}/image/arrow-right.svg" alt="arrow right">
                                    </div>
                                </a>
                                <a href="mailto:{{getOptionData('email')}}" class="item">
                                    <div class="left-part flex items-center gap-4">
                                        <div class="left-icon">
                                            <img src="{{asset('frontend/assets')}}/image/gmail.svg" alt="What's up">
                                        </div>
                                        <h3 class="name">{{__('lang.email')}}</h3>
                                    </div>
                                    <div class="right-icon">
                                        <img src="{{asset('frontend/assets')}}/image/arrow-right.svg" alt="arrow right">
                                    </div>
                                </a>
                            </div>
                        </div>

                        <!-- ad area start -->
                        <div class="adSmall">
                            <a href="#">
                                <img src="{{asset('frontend/assets')}}/image/small-ad-2.png" alt="ad image">
                            </a>
                            <div class="ad-close">
                                <i class="fa-solid fa-circle-exclamation"></i>
                                <i class="fa-solid fa-xmark"></i>
                            </div>
                        </div>
                        <!-- ad area end -->
                    </div>
                </div>
            </div>
        </section>
        <!--========Dynamic category wise post====== -->
        @foreach($categories as $category)
            <section class="education_section section_short-padding">
                <div class="container">
                    <div class="section-title-wrap">
                        <h2 class="section-title">{{isEnglish()?$category->name_en: $category->name}}</h2>
                        <div class="section-button-wrap">
                            <a href="{{route('category_view', $category->slug)}}"
                               class="section_button">{{__('lang.read_more')}} <i
                                    class="fa-solid fa-angle-right"></i></a>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 md:gap-6 gap-4 md:pb-7.5 sm:pb-6 pb-4 border-b border-stock-color">
                        @foreach($category->posts as $news)
                            <div class="lg:col-span-3 md:col-span-4 col-span-6">
                                <div class="news-card">
                                    <div class="thumbnail">
                                        <a href="{{route('news_details', ['id' => $news->id, 'slug' => $news->slug])}}"><img
                                                src="{{asset('storage')}}/{{$news->media->thumbnail??null}}"
                                                alt="Thumbnail"></a>
                                    </div>
                                    <h1 class="title">
                                        <a href="{{route('news_details', ['id' => $news->id, 'slug' => $news->slug])}}">{{Str::limit($news->title, 100)}}</a>
                                    </h1>
                                    <div class="date">
                                        <p>{{isEnglish()?date_maker($news->publishing_date, 'd F, Y'): formatBanglaDate($news->publising_date)}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </section>
        @endforeach


        <!--=========Video_Section=========== -->
        <section class="video_section section_short-padding {{$videos->count() == 0 ? 'hidden' : ''}}">
            <div class="container">
                <div class="section-title-wrap">
                    <h2 class="section-title">{{__('lang.video')}}</h2>
                    <div class="section-button-wrap">
                        <a href="{{route('videos')}}" class="section_button">{{__('lang.see_more')}} <i
                                class="fa-solid fa-angle-right"></i></a>
                    </div>
                </div>
                <div class="grid grid-cols-12 md:gap-6 gap-4 md:pb-7.5 sm:pb-6 pb-4 border-b border-stock-color">
                    @foreach($videos as $video)
                        <div class="lg:col-span-3 sm:col-span-6 col-span-12">
                            <div class="news-card">
                                <div class="video_thumbnail">
                                    <a href="{{route('video_details', ['id' => $video->id, 'slug' => $video->slug])}}"><img
                                            src="{{asset('storage')}}/{{$video->media->thumbnail??null}}"
                                            alt="Thumbnail"></a>
                                    <a href="{{route('video_details', ['id' => $video->id, 'slug' => $video->slug])}}"
                                       class="video-icon-wrap">
                                    <span class="video-icon animate-ripple-blue-vdo"><i
                                            class="fa-solid fa-play"></i></span>
                                    </a>
                                    <span class="video_duration">{{$video->video_duration}}</span>
                                </div>
                                <h1 class="title">
                                    <a href="{{route('video_details', ['id' => $video->id, 'slug' => $video->slug])}}">{{Str::limit($video->title, 100)}}</a>
                                </h1>
                                <div class="date">
                                    <p>{{isEnglish()?date_maker($video->publishing_date, 'd F, Y'): formatBanglaDate($video->publising_date)}}</p>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!--=========Photo_Section=========== -->
        <section class="photo-section ">
            <div class="container">
                <div class="section-title-wrap">
                    <h2 class="section-title">{{__('lang.photo')}}</h2>
                    <div class="section-button-wrap">
                        <a href="{{route('photos')}}" class="section_button">{{__('lang.see_more')}} <i
                                class="fa-solid fa-angle-right"></i></a>
                    </div>
                </div>
                <div class="grid grid-cols-12 md:gap-6 gap-4">
                    <div class="md:col-span-3 col-span-12">
                        <div class="grid grid-cols-12 md:gap-y-4 gap-y-0 gap-x-4 md:gap-x-0">
                            @foreach($photos as $photo)
                                @if($loop->iteration==3)
                                    @break
                                @endif
                                @php

                                    $postDateTime = Carbon::parse($photo->date_time);
                                    $now = Carbon::now();
                                @endphp
                                <div class="md:col-span-12 col-span-6">
                                    <div class="news-card">
                                        <div class="image-thumbnail">
                                            <a href="{{route('photo_details', ['id' => $photo->id, 'slug' => $photo->title_en])}}"><img
                                                    src="{{asset($photo->thumbnail)}}"
                                                    alt="Thumbnail"></a>
                                            <span class="image-icon"><i class="fa-solid fa-images"></i></span>
                                        </div>
                                        <h1 class="title">
                                            <a href="{{route('photo_details', ['id' => $photo->id, 'slug' => $photo->title_en])}}">{{Str::limit(isEnglish()?$photo->title_en:$photo->title)}}</a>
                                        </h1>
                                        <div class="date">

                                            <p>
                                                @if ($postDateTime->diffInHours($now) > 24)
                                                    {{ isEnglish() ? $postDateTime->format('d F, Y') : formatBanglaDate($postDateTime->format('d F Y')) }}
                                                @else
                                                    {{ isEnglish() ? $postDateTime->diffForHumans() : bangla_number($postDateTime->diffForHumans()) }}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="md:col-span-6 col-span-12">
                        @foreach($photos as $photo)
                            @if($loop->iteration!=3)
                                @continue
                            @endif
                            @php

                                $postDateTime = Carbon::parse($photo->date_time);
                                $now = Carbon::now();
                            @endphp
                                <div class="news-card">
                                    <div class="image-thumbnail">
                                        <a href="{{route('photo_details', ['id' => $photo->id, 'slug' => $photo->title_en])}}"><img
                                                src="{{asset($photo->thumbnail)}}"
                                                alt="Thumbnail"></a>
                                        <span class="image-icon"><i class="fa-solid fa-images"></i></span>
                                    </div>
                                    <h1 class="title title-lg">
                                        <a href="{{route('photo_details', ['id' => $photo->id, 'slug' => $photo->title_en])}}">{{Str::limit(isEnglish()?$photo->title_en:$photo->title)}}</a>
                                    </h1>
                                    <div class="date">
                                        <p>
                                            @if ($postDateTime->diffInHours($now) > 24)
                                                {{ isEnglish() ? $postDateTime->format('d F, Y') : formatBanglaDate($postDateTime->format('d F Y')) }}
                                            @else
                                                {{ isEnglish() ? $postDateTime->diffForHumans() : bangla_number($postDateTime->diffForHumans()) }}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                        @endforeach

                    </div>
                    <div class="md:col-span-3 col-span-12">
                        <div class="grid grid-cols-12 md:gap-y-4 gap-y-0 gap-x-4 md:gap-x-0">

                            @foreach($photos as $photo)
                                @if($loop->iteration<4)
                                    @continue
                                @endif
                                @php

                                    $postDateTime = Carbon::parse($photo->date_time);
                                    $now = Carbon::now();
                                @endphp
                                    <div class="md:col-span-12 col-span-6">
                                        <div class="news-card">
                                            <div class="image-thumbnail">
                                                <a href="{{route('photo_details', ['id' => $photo->id, 'slug' => $photo->title_en])}}"><img
                                                        src="{{asset($photo->thumbnail)}}"
                                                        alt="Thumbnail"></a>
                                                <span class="image-icon"><i class="fa-solid fa-images"></i></span>
                                            </div>
                                            <h1 class="title">
                                                <a href="{{route('photo_details', ['id' => $photo->id, 'slug' => $photo->title_en])}}">{{Str::limit(isEnglish()?$photo->title_en:$photo->title)}}</a>
                                            </h1>
                                            <div class="date">
                                                <p>
                                                    @if ($postDateTime->diffInHours($now) > 24)
                                                        {{ isEnglish() ? $postDateTime->format('d F, Y') : formatBanglaDate($postDateTime->format('d F Y')) }}
                                                    @else
                                                        {{ isEnglish() ? $postDateTime->diffForHumans() : bangla_number($postDateTime->diffForHumans()) }}
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- footer ad area -->

        {{--        <div class="ad-full footer_ad hidden">--}}
        {{--            <div class="footer-wraper">--}}
        {{--                <div class="container">--}}
        {{--                    <a href="">--}}
        {{--                        <img src="{{asset('frontend/assets')}}/image/ad-full.png" alt="ad image">--}}
        {{--                    </a>--}}
        {{--                    <div class="ad-close close_only">--}}
        {{--                        <i class="fa-solid fa-xmark"></i>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        <!-- footer ad area end-->
    </main>
@endsection

@section('js')

@endsection
