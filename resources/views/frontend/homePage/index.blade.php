@php use Carbon\Carbon;use Illuminate\Support\Str; @endphp
@extends('layouts.frontend_layout')
@section('page_title')
    {{isEnglish()? getOptionData('site_title_en') : getOptionData('site_title')}}
@endsection
@section('css')
@endsection
@section('main_content')
    <main class="site-content flex-1">
        <!-- ad area -->
        @include('layouts.partials.ads.banner_ad', ['ad' => $ad1])
        <!-- ad area end-->
        <!-- ==========Top_Section ======== -->
        <section class="top_section section-padding-top">
            <div class="container">
                <div class="grid grid-cols-12 md:gap-6 gap-4">
                    <div class="xl:col-span-9 col-span-12">
                        <div class="grid grid-cols-12 md:gap-6 gap-4">
                            @forelse($header_posts->where('header_order', 1) as $header_post)
                                <div class="xl:col-span-8 sm:col-span-7 col-span-12">
                                    <!-- news card -->
                                    <div class="news-card">
                                        <div class="thumbnail">
                                            <a href="{{route('news_details', ['id' => $header_post->id, 'slug' => $header_post->slug])}}">
                                                    <img src="{{ asset('storage') }}/{{$header_post->media->image??null}}" alt="Default Thumbnail">
                                            </a>
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
                                            <p>{{format_publishing_date($header_post->publishing_date)}}</p>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="xl:col-span-8 sm:col-span-7 col-span-12">
                                </div>
                            @endforelse

                            <div class="xl:col-span-4 sm:col-span-5 col-span-12">
                                <div class="grid grid-cols-12 md:gap-y-6 gap-4">
                                    <!-- First side news card -->

                                    @forelse($header_posts->whereIn('header_order', 2)->sortby('header_order') as $header_post)
                                        <div class="sm:col-span-12 col-span-6">
                                            <div class="news-card">
                                                <div class="thumbnail">
                                                    <a href="{{route('news_details', ['id' => $header_post->id, 'slug' => $header_post->slug])}}">
                                                        @php
                                                            $thumbnail = $header_post->media->thumbnail ?? null;
                                                            $thumbnailPath = $thumbnail ? public_path('storage/' . $thumbnail) : null;
                                                        @endphp

                                                        @if ($thumbnailPath && file_exists($thumbnailPath))
                                                            <img src="{{ asset('storage/' . $thumbnail) }}" alt="Thumbnail">
                                                        @else
                                                            <img src="{{ asset('storage/' . ($header_post->media->image ?? 'default.png')) }}" alt="Default Thumbnail">
                                                        @endif
                                                    </a>
                                                </div>
                                                <h1 class="title">
                                                    <a href="{{route('news_details', ['id' => $header_post->id, 'slug' => $header_post->slug])}}">{{Str::limit($header_post->title, 100)}}</a>
                                                </h1>
                                                <div class="date">
                                                    <p>{{format_publishing_date($header_post->publishing_date)}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="sm:col-span-12 col-span-6">
                                        </div>
                                    @endforelse

                                    @forelse($header_posts->whereIn('header_order', 3)->sortby('header_order') as $header_post)
                                        <div class="sm:col-span-12 col-span-6">
                                            <div class="news-card">
                                                <div class="thumbnail">
                                                    <a href="{{route('news_details', ['id' => $header_post->id, 'slug' => $header_post->slug])}}">
                                                        @php
                                                            $thumbnail = $header_post->media->thumbnail ?? null;
                                                            $thumbnailPath = $thumbnail ? public_path('storage/' . $thumbnail) : null;
                                                        @endphp

                                                        @if ($thumbnailPath && file_exists($thumbnailPath))
                                                            <img src="{{ asset('storage/' . $thumbnail) }}" alt="Thumbnail">
                                                        @else
                                                            <img src="{{ asset('storage/' . ($header_post->media->image ?? 'default.png')) }}" alt="Default Thumbnail">
                                                        @endif
                                                    </a>
                                                </div>
                                                <h1 class="title">
                                                    <a href="{{route('news_details', ['id' => $header_post->id, 'slug' => $header_post->slug])}}">{{Str::limit($header_post->title, 100)}}</a>
                                                </h1>
                                                <div class="date">
                                                    <p>{{format_publishing_date($header_post->publishing_date)}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="sm:col-span-12 col-span-6">
                                        </div>
                                    @endforelse

                                </div>
                            </div>

                        </div>
                        <div class="grid grid-cols-12 md:gap-6 gap-4 mt-4">
                            @forelse($header_posts->whereIn('header_order', 4)->sortby('header_order') as $header_post)
                                <div class="md:col-span-4 col-span-6">
                                    <div class="news-card">
                                        <div class="thumbnail">
                                            <a href="{{route('news_details', ['id' => $header_post->id, 'slug' => $header_post->slug])}}">
                                                @php
                                                    $thumbnail = $header_post->media->thumbnail ?? null;
                                                    $thumbnailPath = $thumbnail ? public_path('storage/' . $thumbnail) : null;
                                                @endphp

                                                @if ($thumbnailPath && file_exists($thumbnailPath))
                                                    <img src="{{ asset('storage/' . $thumbnail) }}" alt="Thumbnail">
                                                @else
                                                    <img src="{{ asset('storage/' . ($header_post->media->image ?? 'default.png')) }}" alt="Default Thumbnail">
                                                @endif
                                            </a>
                                        </div>
                                        <h1 class="title"><a
                                                href="{{route('news_details', ['id' => $header_post->id, 'slug' => $header_post->slug])}}">{{Str::limit($header_post->title, 100)}}</a>
                                        </h1>
                                        <div class="date">
                                            <p>{{format_publishing_date($header_post->publishing_date)}}</p>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="md:col-span-4 col-span-6">
                                </div>
                            @endforelse
                            @forelse($header_posts->whereIn('header_order', 5)->sortby('header_order') as $header_post)
                                <div class="md:col-span-4 col-span-6">
                                    <div class="news-card">
                                        <div class="thumbnail">
                                            <a href="{{route('news_details', ['id' => $header_post->id, 'slug' => $header_post->slug])}}">
                                                @php
                                                    $thumbnail = $header_post->media->thumbnail ?? null;
                                                    $thumbnailPath = $thumbnail ? public_path('storage/' . $thumbnail) : null;
                                                @endphp

                                                @if ($thumbnailPath && file_exists($thumbnailPath))
                                                    <img src="{{ asset('storage/' . $thumbnail) }}" alt="Thumbnail">
                                                @else
                                                    <img src="{{ asset('storage/' . ($header_post->media->image ?? 'default.png')) }}" alt="Default Thumbnail">
                                                @endif
                                            </a>
                                        </div>
                                        <h1 class="title"><a
                                                href="{{route('news_details', ['id' => $header_post->id, 'slug' => $header_post->slug])}}">{{Str::limit($header_post->title, 100)}}</a>
                                        </h1>
                                        <div class="date">
                                            <p>{{format_publishing_date($header_post->publishing_date)}}</p>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="md:col-span-4 col-span-6">
                                </div>
                            @endforelse
                            @forelse($header_posts->whereIn('header_order', 6)->sortby('header_order') as $header_post)
                                <div class="md:col-span-4 col-span-6">
                                    <div class="news-card">
                                        <div class="thumbnail">
                                            <a href="{{route('news_details', ['id' => $header_post->id, 'slug' => $header_post->slug])}}">
                                                @php
                                                    $thumbnail = $header_post->media->thumbnail ?? null;
                                                    $thumbnailPath = $thumbnail ? public_path('storage/' . $thumbnail) : null;
                                                @endphp

                                                @if ($thumbnailPath && file_exists($thumbnailPath))
                                                    <img src="{{ asset('storage/' . $thumbnail) }}" alt="Thumbnail">
                                                @else
                                                    <img src="{{ asset('storage/' . ($header_post->media->image ?? 'default.png')) }}" alt="Default Thumbnail">
                                                @endif
                                            </a>
                                        </div>
                                        <h1 class="title"><a
                                                href="{{route('news_details', ['id' => $header_post->id, 'slug' => $header_post->slug])}}">{{Str::limit($header_post->title, 100)}}</a>
                                        </h1>
                                        <div class="date">
                                            <p>{{format_publishing_date($header_post->publishing_date)}}</p>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="md:col-span-4 col-span-6">
                                </div>
                            @endforelse
                        </div>


                    </div>

                    <div class="xl:col-span-3 col-span-12">
                        @include('layouts.partials.news_item.latest_news')
                        @if(getOptionData('media_submission')=='Yes')
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
                        @endif
                        <!-- ad area start -->
                        @include('layouts.partials.ads.side_ad', ['ad' => $ad2])
                        <!-- ad area end -->
                    </div>
                </div>
            </div>
        </section>
        <!--========Dynamic category wise post====== -->
        @php
            $totalCategories = count($categories);
            $totalAds = 3;
            $interval = ceil($totalCategories / $totalAds); // প্রতি কতটা পরপর ad বসবে
            $adIndex = 1;
        @endphp
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
                                        <a href="{{route('news_details', ['id' => $news->id, 'slug' => $news->slug])}}">
                                            @php
                                                $thumbnail = $news->media->thumbnail ?? null;
                                                $thumbnailPath = $thumbnail ? public_path('storage/' . $thumbnail) : null;
                                            @endphp

                                            @if ($thumbnailPath && file_exists($thumbnailPath))
                                                <img src="{{ asset('storage/' . $thumbnail) }}" alt="Thumbnail">
                                            @else
                                                <img src="{{ asset('storage/' . ($news->media->image ?? 'default.png')) }}" alt="Default Thumbnail">
                                            @endif
                                        </a>
                                    </div>
                                    <h1 class="title">
                                        <a href="{{route('news_details', ['id' => $news->id, 'slug' => $news->slug])}}">{{Str::limit($news->title, 100)}}</a>
                                    </h1>
                                    <div class="date">
                                        <p>{{format_publishing_date($news->publishing_date)}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </section>

            @if($loop->iteration % $interval === 0 && $adIndex <= $totalAds)
                @php
                    $adWithIndex = ${'ad' . ($adIndex + 2)};
                    $adIndex++;
                @endphp
                    @include('layouts.partials.ads.banner_ad', ['ad' => $adWithIndex])
            @endif
        @endforeach
        <div class="text-center my-1">
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-format="autorelaxed"
             data-ad-client="ca-pub-8398372781178295"
             data-ad-slot="4172391014"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
        </div>
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
                                    <p>{{format_publishing_date($video->publishing_date)}}</p>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <div class="text-center my-1">
        <ins class="adsbygoogle"
             style="display:block; text-align:center;"
             data-ad-layout="in-article"
             data-ad-format="fluid"
             data-ad-client="ca-pub-8398372781178295"
             data-ad-slot="8063534560"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
        </div>
        <!--=========Photo_Section=========== -->
        <section class="photo-section mt-4 {{$photos->count() == 0 ? 'hidden' : ''}}">
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
                                                {{format_publishing_date($photo->date_time)}}
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
                                            {{format_publishing_date($photo->date_time)}}
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
                                                    {{format_publishing_date($photo->date_time)}}
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
        @isset($ad6)
                <div class="ad-full footer_ad hidden">
                    <div class="footer-wraper">
                       @include('layouts.partials.ads.banner_ad', ['ad' => $ad6, 'showClose' => true])
                    </div>
                </div>
        @endisset
        <!-- footer ad area end-->
    </main>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: '{{__('lang.error')}}',
                text: '{{ session('error') }}',
                confirmButtonText: '{{__('lang.ok')}}',
                confirmButtonColor: 'black',
            });
        </script>
    @endif

@endsection
