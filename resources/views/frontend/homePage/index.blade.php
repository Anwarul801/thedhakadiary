@php
    use Carbon\Carbon;
    use Illuminate\Support\Str;
@endphp
@extends('layouts.frontend_layout')
@section('page_title')
    {{ isEnglish() ? getOptionData('site_title_en') : getOptionData('site_title') }}
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
                    <div class="xl:col-span-12 col-span-12 border-b pb-2 border-stock-color">
                        <div class="grid grid-cols-12 md:gap-6 gap-4 border-b pb-4 border-stock-color">
                            @forelse($header_posts->where('header_order', 1) as $header_post)
                                <div
                                    class="lg:col-span-6 col-span-12 lg:border-r lg:border-b-0 border-b lg:pr-4 lg:pb-0 pb-3 border-stock-color">
                                    <!-- news card -->
                                    <div class="news-card">
                                        <div class="thumbnail">
                                            <a
                                                href="{{ route('news_details', ['id' => $header_post->id, 'slug' => $header_post->slug]) }}">
                                                <img src="{{ asset('storage') }}/{{ $header_post->media->image ?? null }}"
                                                    alt="Default Thumbnail">
                                            </a>
                                        </div>
                                        <h1 class="title title-lg">
                                            <a
                                                href="{{ route('news_details', ['id' => $header_post->id, 'slug' => $header_post->slug]) }}">{{ Str::limit($header_post->title, 100) }}</a>
                                        </h1>
                                        <div class="short-description">
                                            <p>
                                                <a
                                                    href="{{ route('news_details', ['id' => $header_post->id, 'slug' => $header_post->slug]) }}">{{ $header_post->subtitle }}</a>
                                            </p>
                                        </div>
                                        <div class="short-description_home">
                                            <p>
                                                <a
                                                    href="{{ route('news_details', ['id' => $header_post->id, 'slug' => $header_post->slug]) }}">
                                                    {!! \Illuminate\Support\Str::limit($header_post->news_details, 400) !!}
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="lg:col-span-6 col-span-12">
                                </div>
                            @endforelse

                            <div class="lg:col-span-6 col-span-12">
                                <div class="grid grid-cols-12 md:gap-y-4 lg:gap-4 gap-3">
                                    <!-- First side news card -->

                                    @forelse($header_posts->whereIn('header_order', 2)->sortby('header_order') as $header_post)
                                        <div class="sm:col-span-6 col-span-6 border-r lg:pr-4 pr-3 border-stock-color">
                                            <div class="news-card">
                                                <div class="thumbnail">
                                                    <a
                                                        href="{{ route('news_details', ['id' => $header_post->id, 'slug' => $header_post->slug]) }}">
                                                        @php
                                                            $thumbnail = $header_post->media->thumbnail ?? null;
                                                            $thumbnailPath = $thumbnail
                                                                ? public_path('storage/' . $thumbnail)
                                                                : null;
                                                        @endphp

                                                        @if ($thumbnailPath && file_exists($thumbnailPath))
                                                            <img src="{{ asset('storage/' . $thumbnail) }}"
                                                                alt="Thumbnail">
                                                        @else
                                                            <img src="{{ asset('storage/' . ($header_post->media->image ?? 'default.png')) }}"
                                                                alt="Default Thumbnail">
                                                        @endif
                                                    </a>
                                                </div>
                                                <h1 class="title">
                                                    <a
                                                        href="{{ route('news_details', ['id' => $header_post->id, 'slug' => $header_post->slug]) }}">{{ Str::limit($header_post->title, 100) }}</a>
                                                </h1>

                                            </div>
                                        </div>
                                    @empty
                                        <div class="sm:col-span-6 col-span-6">
                                        </div>
                                    @endforelse

                                    @forelse($header_posts->whereIn('header_order', 3)->sortby('header_order') as $header_post)
                                        <div class="sm:col-span-6 col-span-6">
                                            <div class="news-card">
                                                <div class="thumbnail">
                                                    <a
                                                        href="{{ route('news_details', ['id' => $header_post->id, 'slug' => $header_post->slug]) }}">
                                                        @php
                                                            $thumbnail = $header_post->media->thumbnail ?? null;
                                                            $thumbnailPath = $thumbnail
                                                                ? public_path('storage/' . $thumbnail)
                                                                : null;
                                                        @endphp

                                                        @if ($thumbnailPath && file_exists($thumbnailPath))
                                                            <img src="{{ asset('storage/' . $thumbnail) }}"
                                                                alt="Thumbnail">
                                                        @else
                                                            <img src="{{ asset('storage/' . ($header_post->media->image ?? 'default.png')) }}"
                                                                alt="Default Thumbnail">
                                                        @endif
                                                    </a>
                                                </div>
                                                <h1 class="title">
                                                    <a
                                                        href="{{ route('news_details', ['id' => $header_post->id, 'slug' => $header_post->slug]) }}">{{ Str::limit($header_post->title, 100) }}</a>
                                                </h1>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="sm:col-span-6 col-span-6">
                                        </div>
                                    @endforelse
                                    @forelse($header_posts->whereIn('header_order', 4)->sortby('header_order') as $header_post)
                                        <div class="sm:col-span-6 col-span-6 border-r lg:pr-4 pr-3 border-stock-color">
                                            <div class="news-card">
                                                <div class="thumbnail">
                                                    <a
                                                        href="{{ route('news_details', ['id' => $header_post->id, 'slug' => $header_post->slug]) }}">
                                                        @php
                                                            $thumbnail = $header_post->media->thumbnail ?? null;
                                                            $thumbnailPath = $thumbnail
                                                                ? public_path('storage/' . $thumbnail)
                                                                : null;
                                                        @endphp

                                                        @if ($thumbnailPath && file_exists($thumbnailPath))
                                                            <img src="{{ asset('storage/' . $thumbnail) }}"
                                                                alt="Thumbnail">
                                                        @else
                                                            <img src="{{ asset('storage/' . ($header_post->media->image ?? 'default.png')) }}"
                                                                alt="Default Thumbnail">
                                                        @endif
                                                    </a>
                                                </div>
                                                <h1 class="title">
                                                    <a
                                                        href="{{ route('news_details', ['id' => $header_post->id, 'slug' => $header_post->slug]) }}">{{ Str::limit($header_post->title, 100) }}</a>
                                                </h1>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="sm:col-span-6 col-span-6">
                                        </div>
                                    @endforelse
                                    @forelse($header_posts->whereIn('header_order', 5)->sortby('header_order') as $header_post)
                                        <div class="sm:col-span-6 col-span-6">
                                            <div class="news-card">
                                                <div class="thumbnail">
                                                    <a
                                                        href="{{ route('news_details', ['id' => $header_post->id, 'slug' => $header_post->slug]) }}">
                                                        @php
                                                            $thumbnail = $header_post->media->thumbnail ?? null;
                                                            $thumbnailPath = $thumbnail
                                                                ? public_path('storage/' . $thumbnail)
                                                                : null;
                                                        @endphp

                                                        @if ($thumbnailPath && file_exists($thumbnailPath))
                                                            <img src="{{ asset('storage/' . $thumbnail) }}"
                                                                alt="Thumbnail">
                                                        @else
                                                            <img src="{{ asset('storage/' . ($header_post->media->image ?? 'default.png')) }}"
                                                                alt="Default Thumbnail">
                                                        @endif
                                                    </a>
                                                </div>
                                                <h1 class="title">
                                                    <a
                                                        href="{{ route('news_details', ['id' => $header_post->id, 'slug' => $header_post->slug]) }}">{{ Str::limit($header_post->title, 100) }}</a>
                                                </h1>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="sm:col-span-6 col-span-6">
                                        </div>
                                    @endforelse

                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-12 lg:gap-4 gap-3 mt-4">
                            @forelse($header_posts->whereIn('header_order', 6)->sortby('header_order') as $header_post)
                                <div
                                    class="lg:col-span-3 md:col-span-4 col-span-6 border-r lg:pr-4 pr-3 border-stock-color">
                                    <div class="news-card">
                                        <div class="thumbnail">
                                            <a
                                                href="{{ route('news_details', ['id' => $header_post->id, 'slug' => $header_post->slug]) }}">
                                                @php
                                                    $thumbnail = $header_post->media->thumbnail ?? null;
                                                    $thumbnailPath = $thumbnail
                                                        ? public_path('storage/' . $thumbnail)
                                                        : null;
                                                @endphp

                                                @if ($thumbnailPath && file_exists($thumbnailPath))
                                                    <img src="{{ asset('storage/' . $thumbnail) }}" alt="Thumbnail">
                                                @else
                                                    <img src="{{ asset('storage/' . ($header_post->media->image ?? 'default.png')) }}"
                                                        alt="Default Thumbnail">
                                                @endif
                                            </a>
                                        </div>
                                        <h1 class="title"><a
                                                href="{{ route('news_details', ['id' => $header_post->id, 'slug' => $header_post->slug]) }}">{{ Str::limit($header_post->title, 100) }}</a>
                                        </h1>
                                    </div>
                                </div>
                            @empty
                                <div
                                    class="lg:col-span-3 md:col-span-4 col-span-6 border-r lg:pr-4 pr-3 border-stock-color">
                                </div>
                            @endforelse
                            @forelse($header_posts->whereIn('header_order', 7)->sortby('header_order') as $header_post)
                                <div
                                    class="lg:col-span-3 md:col-span-4 col-span-6 md:border-r lg:pr-4 md:pr-3 border-stock-color">
                                    <div class="news-card">
                                        <div class="thumbnail">
                                            <a
                                                href="{{ route('news_details', ['id' => $header_post->id, 'slug' => $header_post->slug]) }}">
                                                @php
                                                    $thumbnail = $header_post->media->thumbnail ?? null;
                                                    $thumbnailPath = $thumbnail
                                                        ? public_path('storage/' . $thumbnail)
                                                        : null;
                                                @endphp

                                                @if ($thumbnailPath && file_exists($thumbnailPath))
                                                    <img src="{{ asset('storage/' . $thumbnail) }}" alt="Thumbnail">
                                                @else
                                                    <img src="{{ asset('storage/' . ($header_post->media->image ?? 'default.png')) }}"
                                                        alt="Default Thumbnail">
                                                @endif
                                            </a>
                                        </div>
                                        <h1 class="title"><a
                                                href="{{ route('news_details', ['id' => $header_post->id, 'slug' => $header_post->slug]) }}">{{ Str::limit($header_post->title, 100) }}</a>
                                        </h1>
                                    </div>
                                </div>
                            @empty
                                <div
                                    class="lg:col-span-3 md:col-span-4 col-span-6 border-r lg:pr-4 pr-3 border-stock-color">
                                </div>
                            @endforelse
                            @forelse($header_posts->whereIn('header_order', 8)->sortby('header_order') as $header_post)
                                <div
                                    class="lg:col-span-3 md:col-span-4 col-span-6 lg:border-r md:border-r-0 border-r lg:pr-4 md:pr-0 pr-3 border-stock-color">
                                    <div class="news-card">
                                        <div class="thumbnail">
                                            <a
                                                href="{{ route('news_details', ['id' => $header_post->id, 'slug' => $header_post->slug]) }}">
                                                @php
                                                    $thumbnail = $header_post->media->thumbnail ?? null;
                                                    $thumbnailPath = $thumbnail
                                                        ? public_path('storage/' . $thumbnail)
                                                        : null;
                                                @endphp

                                                @if ($thumbnailPath && file_exists($thumbnailPath))
                                                    <img src="{{ asset('storage/' . $thumbnail) }}" alt="Thumbnail">
                                                @else
                                                    <img src="{{ asset('storage/' . ($header_post->media->image ?? 'default.png')) }}"
                                                        alt="Default Thumbnail">
                                                @endif
                                            </a>
                                        </div>
                                        <h1 class="title"><a
                                                href="{{ route('news_details', ['id' => $header_post->id, 'slug' => $header_post->slug]) }}">{{ Str::limit($header_post->title, 100) }}</a>
                                        </h1>
                                    </div>
                                </div>
                            @empty
                                <div
                                    class="lg:col-span-3 md:col-span-4 col-span-6 lg:border-r md:border-r-0 border-r lg:pr-4 md:pr-0 pr-3 border-stock-color">
                                </div>
                            @endforelse
                            @forelse($header_posts->whereIn('header_order', 9)->sortby('header_order') as $header_post)
                                <div
                                    class="lg:col-span-3 md:col-span-4 col-span-6 lg:border-r-0 md:border-r border-r-0 lg:pr-0 md:pr-3 border-stock-color">
                                    <div class="news-card">
                                        <div class="thumbnail">
                                            <a
                                                href="{{ route('news_details', ['id' => $header_post->id, 'slug' => $header_post->slug]) }}">
                                                @php
                                                    $thumbnail = $header_post->media->thumbnail ?? null;
                                                    $thumbnailPath = $thumbnail
                                                        ? public_path('storage/' . $thumbnail)
                                                        : null;
                                                @endphp

                                                @if ($thumbnailPath && file_exists($thumbnailPath))
                                                    <img src="{{ asset('storage/' . $thumbnail) }}" alt="Thumbnail">
                                                @else
                                                    <img src="{{ asset('storage/' . ($header_post->media->image ?? 'default.png')) }}"
                                                        alt="Default Thumbnail">
                                                @endif
                                            </a>
                                        </div>
                                        <h1 class="title"><a
                                                href="{{ route('news_details', ['id' => $header_post->id, 'slug' => $header_post->slug]) }}">{{ Str::limit($header_post->title, 100) }}</a>
                                        </h1>
                                    </div>
                                </div>
                            @empty
                                <div
                                    class="lg:col-span-3 md:col-span-4 col-span-6 lg:border-r-0 md:border-r border-r-0 lg:pr-0 md:pr-3 border-stock-color">
                                </div>
                            @endforelse
                            @forelse($header_posts->whereIn('header_order', 10)->sortby('header_order') as $header_post)
                                <div
                                    class="lg:col-span-3 md:col-span-4 col-span-6 border-r lg:pr-4 pr-3 border-stock-color">
                                    <div class="news-card">
                                        <div class="thumbnail">
                                            <a
                                                href="{{ route('news_details', ['id' => $header_post->id, 'slug' => $header_post->slug]) }}">
                                                @php
                                                    $thumbnail = $header_post->media->thumbnail ?? null;
                                                    $thumbnailPath = $thumbnail
                                                        ? public_path('storage/' . $thumbnail)
                                                        : null;
                                                @endphp

                                                @if ($thumbnailPath && file_exists($thumbnailPath))
                                                    <img src="{{ asset('storage/' . $thumbnail) }}" alt="Thumbnail">
                                                @else
                                                    <img src="{{ asset('storage/' . ($header_post->media->image ?? 'default.png')) }}"
                                                        alt="Default Thumbnail">
                                                @endif
                                            </a>
                                        </div>
                                        <h1 class="title"><a
                                                href="{{ route('news_details', ['id' => $header_post->id, 'slug' => $header_post->slug]) }}">{{ Str::limit($header_post->title, 100) }}</a>
                                        </h1>
                                    </div>
                                </div>
                            @empty
                                <div
                                    class="lg:col-span-3 md:col-span-4 col-span-6 border-r lg:pr-4 pr-3 border-stock-color">
                                </div>
                            @endforelse
                            @forelse($header_posts->whereIn('header_order', 11)->sortby('header_order') as $header_post)
                                <div
                                    class="lg:col-span-3 md:col-span-4 col-span-6 lg:border-r lg:pr-4 pr-0 border-stock-color">
                                    <div class="news-card">
                                        <div class="thumbnail">
                                            <a
                                                href="{{ route('news_details', ['id' => $header_post->id, 'slug' => $header_post->slug]) }}">
                                                @php
                                                    $thumbnail = $header_post->media->thumbnail ?? null;
                                                    $thumbnailPath = $thumbnail
                                                        ? public_path('storage/' . $thumbnail)
                                                        : null;
                                                @endphp

                                                @if ($thumbnailPath && file_exists($thumbnailPath))
                                                    <img src="{{ asset('storage/' . $thumbnail) }}" alt="Thumbnail">
                                                @else
                                                    <img src="{{ asset('storage/' . ($header_post->media->image ?? 'default.png')) }}"
                                                        alt="Default Thumbnail">
                                                @endif
                                            </a>
                                        </div>
                                        <h1 class="title"><a
                                                href="{{ route('news_details', ['id' => $header_post->id, 'slug' => $header_post->slug]) }}">{{ Str::limit($header_post->title, 100) }}</a>
                                        </h1>
                                    </div>
                                </div>
                            @empty
                                <div
                                    class="lg:col-span-3 md:col-span-4 col-span-6 lg:border-r lg:pr-4 pr-0 border-stock-color">
                                </div>
                            @endforelse
                            @forelse($header_posts->whereIn('header_order', 12)->sortby('header_order') as $header_post)
                                <div
                                    class="lg:col-span-3 md:col-span-4 col-span-6 border-r lg:pr-4 pr-3 border-stock-color">
                                    <div class="news-card">
                                        <div class="thumbnail">
                                            <a
                                                href="{{ route('news_details', ['id' => $header_post->id, 'slug' => $header_post->slug]) }}">
                                                @php
                                                    $thumbnail = $header_post->media->thumbnail ?? null;
                                                    $thumbnailPath = $thumbnail
                                                        ? public_path('storage/' . $thumbnail)
                                                        : null;
                                                @endphp

                                                @if ($thumbnailPath && file_exists($thumbnailPath))
                                                    <img src="{{ asset('storage/' . $thumbnail) }}" alt="Thumbnail">
                                                @else
                                                    <img src="{{ asset('storage/' . ($header_post->media->image ?? 'default.png')) }}"
                                                        alt="Default Thumbnail">
                                                @endif
                                            </a>
                                        </div>
                                        <h1 class="title"><a
                                                href="{{ route('news_details', ['id' => $header_post->id, 'slug' => $header_post->slug]) }}">{{ Str::limit($header_post->title, 100) }}</a>
                                        </h1>
                                    </div>
                                </div>
                            @empty
                                <div
                                    class="lg:col-span-3 md:col-span-4 col-span-6 border-r lg:pr-4 pr-3 border-stock-color">
                                </div>
                            @endforelse
                            @forelse($header_posts->whereIn('header_order', 13)->sortby('header_order') as $header_post)
                                <div class="lg:col-span-3 md:col-span-4 col-span-6">
                                    <div class="news-card">
                                        <div class="thumbnail">
                                            <a
                                                href="{{ route('news_details', ['id' => $header_post->id, 'slug' => $header_post->slug]) }}">
                                                @php
                                                    $thumbnail = $header_post->media->thumbnail ?? null;
                                                    $thumbnailPath = $thumbnail
                                                        ? public_path('storage/' . $thumbnail)
                                                        : null;
                                                @endphp

                                                @if ($thumbnailPath && file_exists($thumbnailPath))
                                                    <img src="{{ asset('storage/' . $thumbnail) }}" alt="Thumbnail">
                                                @else
                                                    <img src="{{ asset('storage/' . ($header_post->media->image ?? 'default.png')) }}"
                                                        alt="Default Thumbnail">
                                                @endif
                                            </a>
                                        </div>
                                        <h1 class="title"><a
                                                href="{{ route('news_details', ['id' => $header_post->id, 'slug' => $header_post->slug]) }}">{{ Str::limit($header_post->title, 100) }}</a>
                                        </h1>
                                    </div>
                                </div>
                            @empty
                                <div class="lg:col-span-3 md:col-span-4 col-span-6">
                                </div>
                            @endforelse
                        </div>


                    </div>

                    {{-- <div class="xl:col-span-3 col-span-12">
                        @include('layouts.partials.news_item.latest_news')
                        @if (getOptionData('media_submission') == 'Yes')
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
                    </div> --}}
                </div>
            </div>
        </section>

        <!--======== Entertainment Section ====== -->
        <section class="entertainment_section section-padding-top">
            <div class="container">
                <div class="section-title-wrap">
                    <h2 class="section-title">জাতীয়</h2>
                    <div class="section-button-wrap">
                        <a href="http://127.0.0.1:8000/category/jateey" class="section_button">আরও পড়ুন <i
                                class="fa-solid fa-angle-right"></i></a>
                    </div>
                </div>

                <div class="grid grid-cols-12 lg:gap-4 gap-3 border-b pb-4 border-stock-color">

                    <!-- Left Side (3 items) -->
                    <div class="lg:col-span-4 col-span-12 lg:order-1 order-2 lg:border-r lg:pr-4 border-stock-color">
                        <div class="space-y-4">

                            <!-- Item 1 -->
                            <div class="news-card flex gap-3 border-b pb-3 border-stock-color">
                                <h1 class="title !mt-0 flex-1">
                                    <a href="#">নতুন শিক্ষানীতিতে আসছে বড় পরিবর্তন</a>
                                </h1>
                                <div class="thumbnail w-32 flex-shrink-0">
                                    <a href="#">
                                        <img class="w-full h-20 object-cover"
                                            src="http://127.0.0.1:8000/storage/media_thumbnail/eecBrWMDsI1SeUknqRoI5kCkmTmvAWfTwi3CkprO.png"
                                            alt="News Image">
                                    </a>
                                </div>
                            </div>

                            <!-- Item 2 -->
                            <div class="news-card flex gap-3 border-b pb-3 border-stock-color">
                                <h1 class="title !mt-0 flex-1">
                                    <a href="#">প্রযুক্তি খাতে তরুণদের নতুন সুযোগ</a>
                                </h1>
                                <div class="thumbnail w-32 flex-shrink-0">
                                    <a href="#">
                                        <img class="w-full h-20 object-cover"
                                            src="http://127.0.0.1:8000/storage/media_thumbnail/eecBrWMDsI1SeUknqRoI5kCkmTmvAWfTwi3CkprO.png"
                                            alt="News Image">
                                    </a>
                                </div>
                            </div>

                            <!-- Item 3 -->
                            <div class="news-card flex gap-3 lg:border-b-0 border-b pb-3 border-stock-color">
                                <h1 class="title !mt-0 flex-1">
                                    <a href="#">স্টার্টআপে বিনিয়োগ বাড়ছে দেশে</a>
                                </h1>
                                <div class="thumbnail w-32 flex-shrink-0">
                                    <a href="#">
                                        <img class="w-full h-20 object-cover"
                                            src="http://127.0.0.1:8000/storage/media_thumbnail/eecBrWMDsI1SeUknqRoI5kCkmTmvAWfTwi3CkprO.png"
                                            alt="News Image">
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Center Big News -->
                    <div
                        class="lg:col-span-4 col-span-12 lg:order-2 order-1 lg:border-b-0 border-b lg:pb-0 pb-3 border-stock-color">
                        <div class="news-card">
                            <div class="thumbnail">
                                <a href="#">
                                    <img src="http://127.0.0.1:8000/storage/media_thumbnail/eecBrWMDsI1SeUknqRoI5kCkmTmvAWfTwi3CkprO.png"
                                        alt="">
                                </a>
                            </div>

                            <h1 class="lg:text-2xl text-xl font-semibold mt-3">
                                <a href="#">
                                    ডিজিটাল বাংলাদেশের পথে আরেক ধাপ এগিয়ে দেশ
                                </a>
                            </h1>

                            <div class="short-description_home">
                                <p>
                                    <a href="#">
                                        সরকারের বিভিন্ন ডিজিটাল উদ্যোগ ও বেসরকারি খাতের অংশগ্রহণে দেশ দ্রুত প্রযুক্তিনির্ভর
                                        অর্থনীতির দিকে এগিয়ে যাচ্ছে। নতুন নতুন স্টার্টআপ ও ইনোভেশন তরুণদের জন্য তৈরি করছে
                                        সম্ভাবনার নতুন দিগন্ত।
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Right Side (3 items) -->
                    <div class="lg:col-span-4 col-span-12 order-3 lg:border-l lg:pl-4 border-stock-color">
                        <div class="space-y-4">

                            <!-- Item 1 -->
                            <div class="news-card flex gap-3 border-b pb-3 border-stock-color">
                                <h1 class="title !mt-0 flex-1">
                                    <a href="#">বিশ্ববাজারে রপ্তানি বাড়ছে বাংলাদেশের</a>
                                </h1>
                                <div class="thumbnail w-32 flex-shrink-0">
                                    <a href="#">
                                        <img class="w-full h-20 object-cover"
                                            src="http://127.0.0.1:8000/storage/media_thumbnail/eecBrWMDsI1SeUknqRoI5kCkmTmvAWfTwi3CkprO.png"
                                            alt="News Image">
                                    </a>
                                </div>
                            </div>

                            <!-- Item 2 -->
                            <div class="news-card flex gap-3 border-b pb-3 border-stock-color">
                                <h1 class="title !mt-0 flex-1">
                                    <a href="#">নতুন সড়ক প্রকল্পে কমবে যানজট</a>
                                </h1>
                                <div class="thumbnail w-32 flex-shrink-0">
                                    <a href="#">
                                        <img class="w-full h-20 object-cover"
                                            src="http://127.0.0.1:8000/storage/media_thumbnail/eecBrWMDsI1SeUknqRoI5kCkmTmvAWfTwi3CkprO.png"
                                            alt="News Image">
                                    </a>
                                </div>
                            </div>

                            <!-- Item 3 -->
                            <div class="news-card flex gap-3">
                                <h1 class="title !mt-0 flex-1">
                                    <a href="#">স্বাস্থ্যসেবায় আধুনিক প্রযুক্তির ব্যবহার বাড়ছে</a>
                                </h1>
                                <div class="thumbnail w-32 flex-shrink-0">
                                    <a href="#">
                                        <img class="w-full h-20 object-cover"
                                            src="http://127.0.0.1:8000/storage/media_thumbnail/eecBrWMDsI1SeUknqRoI5kCkmTmvAWfTwi3CkprO.png"
                                            alt="News Image">
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!--======== Entertainment Section end ====== -->

        <!--======== Politics Section ====== -->
        <section class="politics_section section-padding-top">
            <div class="container">
                <div class="section-title-wrap">
                    <h2 class="section-title">রাজনীতি</h2>
                    <div class="section-button-wrap">
                        <a href="http://127.0.0.1:8000/category/rajneeti" class="section_button">আরও পড়ুন <i
                                class="fa-solid fa-angle-right"></i></a>
                    </div>
                </div>
                <div class="grid grid-cols-12 md:gap-6 gap-4 border-b pb-4 border-stock-color">

                    <!-- Main Left News -->
                    <div
                        class="lg:col-span-6 col-span-12 lg:border-r lg:border-b-0 border-b lg:pr-4 lg:pb-0 pb-3 border-stock-color">
                        <div class="news-card">
                            <div class="thumbnail">
                                <a href="#">
                                    <img src="http://127.0.0.1:8000/storage/media_thumbnail/IEnxf9OEwNkR27ONRycAS0ngO0NHleV0TJgac3Sl.jpg"
                                        alt="Thumbnail">
                                </a>
                            </div>
                            <h1 class="title title-lg">
                                <a href="#">বাংলাদেশে প্রযুক্তি খাতে নতুন সম্ভাবনার দ্বার উন্মোচন</a>
                            </h1>
                            <div class="short-description">
                                <p>
                                    <a href="#">দেশের তরুণদের জন্য আইটি খাতে তৈরি হচ্ছে নতুন কর্মসংস্থান</a>
                                </p>
                            </div>
                            <div class="short-description_home">
                                <p>
                                    <a href="#">
                                        বাংলাদেশের প্রযুক্তি খাতে দ্রুত উন্নয়ন ঘটছে। নতুন স্টার্টআপ, সফটওয়্যার কোম্পানি এবং
                                        ফ্রিল্যান্সিং সুযোগ বৃদ্ধির ফলে তরুণদের জন্য নতুন সম্ভাবনার সৃষ্টি হয়েছে।
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Right Side -->
                    <div class="lg:col-span-6 col-span-12">
                        <div class="grid grid-cols-12 md:gap-y-4 lg:gap-4 gap-3">

                            <!-- Item 1 -->
                            <div class="sm:col-span-6 col-span-6 border-r lg:pr-4 pr-3 border-stock-color">
                                <div class="news-card">
                                    <div class="thumbnail">
                                        <img
                                            src="http://127.0.0.1:8000/storage/media_thumbnail/IEnxf9OEwNkR27ONRycAS0ngO0NHleV0TJgac3Sl.jpg">
                                    </div>
                                    <h1 class="title">
                                        <a href="#">ঢাকায় স্টার্টআপ ইকোসিস্টেম দ্রুত বৃদ্ধি পাচ্ছে</a>
                                    </h1>
                                </div>
                            </div>

                            <!-- Item 2 -->
                            <div class="sm:col-span-6 col-span-6">
                                <div class="news-card">
                                    <div class="thumbnail">
                                        <img
                                            src="http://127.0.0.1:8000/storage/media_thumbnail/IEnxf9OEwNkR27ONRycAS0ngO0NHleV0TJgac3Sl.jpg">
                                    </div>
                                    <h1 class="title">
                                        <a href="#">ফ্রিল্যান্সিংয়ে বাংলাদেশের তরুণদের সাফল্য</a>
                                    </h1>
                                </div>
                            </div>

                            <!-- Item 3 -->
                            <div class="sm:col-span-6 col-span-6 border-r lg:pr-4 pr-3 border-stock-color">
                                <div class="news-card">
                                    <div class="thumbnail">
                                        <img
                                            src="http://127.0.0.1:8000/storage/media_thumbnail/IEnxf9OEwNkR27ONRycAS0ngO0NHleV0TJgac3Sl.jpg">
                                    </div>
                                    <h1 class="title">
                                        <a href="#">আইটি সেক্টরে বাড়ছে চাকরির সুযোগ</a>
                                    </h1>
                                </div>
                            </div>

                            <!-- Item 4 -->
                            <div class="sm:col-span-6 col-span-6">
                                <div class="news-card">
                                    <div class="thumbnail">
                                        <img
                                            src="http://127.0.0.1:8000/storage/media_thumbnail/IEnxf9OEwNkR27ONRycAS0ngO0NHleV0TJgac3Sl.jpg">
                                    </div>
                                    <h1 class="title">
                                        <a href="#">বাংলাদেশে ই-কমার্স ব্যবসার প্রসার</a>
                                    </h1>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </section>
        <!--======== Politics Section end ====== -->

        <!--======== Education & Campus Section ====== -->
        <section class="edu_campus_section section-padding-top">
            <div class="container">
                <div class="section-title-wrap">
                    <h2 class="section-title">শিক্ষা এবং ক্যাম্পাস</h2>
                    <div class="section-button-wrap">
                        <a href="http://127.0.0.1:8000/category/siksha" class="section_button">আরও পড়ুন <i
                                class="fa-solid fa-angle-right"></i></a>
                    </div>
                </div>

                <div class="grid grid-cols-12 lg:gap-4 gap-3 border-b pb-4 border-stock-color">

                    <!-- Left Side (3 items) -->
                    <div class="lg:col-span-4 col-span-12 lg:order-1 order-2 lg:border-r lg:pr-4 border-stock-color">
                        <div class="space-y-4">

                            <!-- Item 1 -->
                            <div class="news-card flex gap-3 border-b pb-3 border-stock-color">
                                <h1 class="title !mt-0 flex-1">
                                    <a href="#">নতুন শিক্ষানীতিতে আসছে বড় পরিবর্তন</a>
                                </h1>
                                <div class="thumbnail w-32 flex-shrink-0">
                                    <a href="#">
                                        <img class="w-full h-20 object-cover"
                                            src="http://127.0.0.1:8000/storage/media_thumbnail/1YPqa8RbZsBcHnoUY5NJzl4y9gWh1p9EIASuwrrz.jpg"
                                            alt="News Image">
                                    </a>
                                </div>
                            </div>

                            <!-- Item 2 -->
                            <div class="news-card flex gap-3 border-b pb-3 border-stock-color">
                                <h1 class="title !mt-0 flex-1">
                                    <a href="#">প্রযুক্তি খাতে তরুণদের নতুন সুযোগ</a>
                                </h1>
                                <div class="thumbnail w-32 flex-shrink-0">
                                    <a href="#">
                                        <img class="w-full h-20 object-cover"
                                            src="http://127.0.0.1:8000/storage/media_thumbnail/1YPqa8RbZsBcHnoUY5NJzl4y9gWh1p9EIASuwrrz.jpg"
                                            alt="News Image">
                                    </a>
                                </div>
                            </div>

                            <!-- Item 3 -->
                            <div class="news-card flex gap-3 lg:border-b-0 border-b pb-3 border-stock-color">
                                <h1 class="title !mt-0 flex-1">
                                    <a href="#">স্টার্টআপে বিনিয়োগ বাড়ছে দেশে</a>
                                </h1>
                                <div class="thumbnail w-32 flex-shrink-0">
                                    <a href="#">
                                        <img class="w-full h-20 object-cover"
                                            src="http://127.0.0.1:8000/storage/media_thumbnail/1YPqa8RbZsBcHnoUY5NJzl4y9gWh1p9EIASuwrrz.jpg"
                                            alt="News Image">
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Center Big News -->
                    <div
                        class="lg:col-span-4 col-span-12 lg:order-2 order-1 lg:border-b-0 border-b lg:pb-0 pb-3 border-stock-color">
                        <div class="news-card">
                            <div class="thumbnail">
                                <a href="#">
                                    <img src="http://127.0.0.1:8000/storage/media_thumbnail/1YPqa8RbZsBcHnoUY5NJzl4y9gWh1p9EIASuwrrz.jpg"
                                        alt="">
                                </a>
                            </div>

                            <h1 class="lg:text-2xl text-xl font-semibold mt-3">
                                <a href="#">
                                    ডিজিটাল বাংলাদেশের পথে আরেক ধাপ এগিয়ে দেশ
                                </a>
                            </h1>

                            <div class="short-description_home">
                                <p>
                                    <a href="#">
                                        সরকারের বিভিন্ন ডিজিটাল উদ্যোগ ও বেসরকারি খাতের অংশগ্রহণে দেশ দ্রুত প্রযুক্তিনির্ভর
                                        অর্থনীতির দিকে এগিয়ে যাচ্ছে। নতুন নতুন স্টার্টআপ ও ইনোভেশন তরুণদের জন্য তৈরি করছে
                                        সম্ভাবনার নতুন দিগন্ত।
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Right Side (3 items) -->
                    <div class="lg:col-span-4 col-span-12 order-3 lg:border-l lg:pl-4 border-stock-color">
                        <div class="space-y-4">

                            <!-- Item 1 -->
                            <div class="news-card flex gap-3 border-b pb-3 border-stock-color">
                                <h1 class="title !mt-0 flex-1">
                                    <a href="#">বিশ্ববাজারে রপ্তানি বাড়ছে বাংলাদেশের</a>
                                </h1>
                                <div class="thumbnail w-32 flex-shrink-0">
                                    <a href="#">
                                        <img class="w-full h-20 object-cover"
                                            src="http://127.0.0.1:8000/storage/media_thumbnail/1YPqa8RbZsBcHnoUY5NJzl4y9gWh1p9EIASuwrrz.jpg"
                                            alt="News Image">
                                    </a>
                                </div>
                            </div>

                            <!-- Item 2 -->
                            <div class="news-card flex gap-3 border-b pb-3 border-stock-color">
                                <h1 class="title !mt-0 flex-1">
                                    <a href="#">নতুন সড়ক প্রকল্পে কমবে যানজট</a>
                                </h1>
                                <div class="thumbnail w-32 flex-shrink-0">
                                    <a href="#">
                                        <img class="w-full h-20 object-cover"
                                            src="http://127.0.0.1:8000/storage/media_thumbnail/1YPqa8RbZsBcHnoUY5NJzl4y9gWh1p9EIASuwrrz.jpg"
                                            alt="News Image">
                                    </a>
                                </div>
                            </div>

                            <!-- Item 3 -->
                            <div class="news-card flex gap-3">
                                <h1 class="title !mt-0 flex-1">
                                    <a href="#">স্বাস্থ্যসেবায় আধুনিক প্রযুক্তির ব্যবহার বাড়ছে</a>
                                </h1>
                                <div class="thumbnail w-32 flex-shrink-0">
                                    <a href="#">
                                        <img class="w-full h-20 object-cover"
                                            src="http://127.0.0.1:8000/storage/media_thumbnail/1YPqa8RbZsBcHnoUY5NJzl4y9gWh1p9EIASuwrrz.jpg"
                                            alt="News Image">
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!--======== Education & Campus Section end ====== -->

        <!--========Dynamic category wise post====== -->
        @php
            $totalCategories = count($categories);
            $totalAds = 3;
            $interval = ceil($totalCategories / $totalAds); // প্রতি কতটা পরপর ad বসবে
            $adIndex = 1;
        @endphp
        @foreach ($categories as $category)
            <section class="education_section section_short-padding">
                <div class="container">
                    <div class="section-title-wrap">
                        <h2 class="section-title">{{ isEnglish() ? $category->name_en : $category->name }}</h2>
                        <div class="section-button-wrap">
                            <a href="{{ route('category_view', $category->slug) }}"
                                class="section_button">{{ __('lang.read_more') }} <i
                                    class="fa-solid fa-angle-right"></i></a>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 md:gap-6 gap-4 md:pb-7.5 sm:pb-6 pb-4 border-b border-stock-color">
                        @foreach ($category->posts as $news)
                            <div class="lg:col-span-3 md:col-span-4 col-span-6">
                                <div class="news-card">
                                    <div class="thumbnail">
                                        <a href="{{ route('news_details', ['id' => $news->id, 'slug' => $news->slug]) }}">
                                            @php
                                                $thumbnail = $news->media->thumbnail ?? null;
                                                $thumbnailPath = $thumbnail
                                                    ? public_path('storage/' . $thumbnail)
                                                    : null;
                                            @endphp

                                            @if ($thumbnailPath && file_exists($thumbnailPath))
                                                <img src="{{ asset('storage/' . $thumbnail) }}" alt="Thumbnail">
                                            @else
                                                <img src="{{ asset('storage/' . ($news->media->image ?? 'default.png')) }}"
                                                    alt="Default Thumbnail">
                                            @endif
                                        </a>
                                    </div>
                                    <h1 class="title">
                                        <a
                                            href="{{ route('news_details', ['id' => $news->id, 'slug' => $news->slug]) }}">{{ Str::limit($news->title, 100) }}</a>
                                    </h1>
                                    <div class="date">
                                        <p>{{ format_publishing_date($news->publishing_date) }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </section>

            @if ($loop->iteration % $interval === 0 && $adIndex <= $totalAds)
                @php
                    $adWithIndex = ${'ad' . ($adIndex + 2)};
                    $adIndex++;
                @endphp
                @include('layouts.partials.ads.banner_ad', ['ad' => $adWithIndex])
            @endif
        @endforeach
        <div class="text-center my-1">
            <ins class="adsbygoogle" style="display:block" data-ad-format="autorelaxed"
                data-ad-client="ca-pub-8398372781178295" data-ad-slot="4172391014"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>
        <!--=========Video_Section=========== -->
        <section class="video_section section_short-padding {{ $videos->count() == 0 ? 'hidden' : '' }}">
            <div class="container">
                <div class="section-title-wrap">
                    <h2 class="section-title">{{ __('lang.video') }}</h2>
                    <div class="section-button-wrap">
                        <a href="{{ route('videos') }}" class="section_button">{{ __('lang.see_more') }} <i
                                class="fa-solid fa-angle-right"></i></a>
                    </div>
                </div>
                <div class="grid grid-cols-12 md:gap-6 gap-4 md:pb-7.5 sm:pb-6 pb-4 border-b border-stock-color">
                    @foreach ($videos as $video)
                        <div class="lg:col-span-3 sm:col-span-6 col-span-12">
                            <div class="news-card">
                                <div class="video_thumbnail">
                                    <a href="{{ route('video_details', ['id' => $video->id, 'slug' => $video->slug]) }}"><img
                                            src="{{ asset('storage') }}/{{ $video->media->thumbnail ?? null }}"
                                            alt="Thumbnail"></a>
                                    <a href="{{ route('video_details', ['id' => $video->id, 'slug' => $video->slug]) }}"
                                        class="video-icon-wrap">
                                        <span class="video-icon animate-ripple-blue-vdo"><i
                                                class="fa-solid fa-play"></i></span>
                                    </a>
                                    <span class="video_duration">{{ $video->video_duration }}</span>
                                </div>
                                <h1 class="title">
                                    <a
                                        href="{{ route('video_details', ['id' => $video->id, 'slug' => $video->slug]) }}">{{ Str::limit($video->title, 100) }}</a>
                                </h1>
                                <div class="date">
                                    <p>{{ format_publishing_date($video->publishing_date) }}</p>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <div class="text-center my-1">
            <ins class="adsbygoogle" style="display:block; text-align:center;" data-ad-layout="in-article"
                data-ad-format="fluid" data-ad-client="ca-pub-8398372781178295" data-ad-slot="8063534560"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>
        <!--=========Photo_Section=========== -->
        <section class="photo-section mt-4 {{ $photos->count() == 0 ? 'hidden' : '' }}">
            <div class="container">
                <div class="section-title-wrap">
                    <h2 class="section-title">{{ __('lang.photo') }}</h2>
                    <div class="section-button-wrap">
                        <a href="{{ route('photos') }}" class="section_button">{{ __('lang.see_more') }} <i
                                class="fa-solid fa-angle-right"></i></a>
                    </div>
                </div>
                <div class="grid grid-cols-12 md:gap-6 gap-4">
                    <div class="md:col-span-3 col-span-12">
                        <div class="grid grid-cols-12 md:gap-y-4 gap-y-0 gap-x-4 md:gap-x-0">
                            @foreach ($photos as $photo)
                                @if ($loop->iteration == 3)
                                    @break
                                @endif
                                <div class="md:col-span-12 col-span-6">
                                    <div class="news-card">
                                        <div class="image-thumbnail">
                                            <a
                                                href="{{ route('photo_details', ['id' => $photo->id, 'slug' => $photo->title_en]) }}"><img
                                                    src="{{ asset($photo->thumbnail) }}" alt="Thumbnail"></a>
                                            <span class="image-icon"><i class="fa-solid fa-images"></i></span>
                                        </div>
                                        <h1 class="title">
                                            <a
                                                href="{{ route('photo_details', ['id' => $photo->id, 'slug' => $photo->title_en]) }}">{{ Str::limit(isEnglish() ? $photo->title_en : $photo->title) }}</a>
                                        </h1>
                                        <div class="date">

                                            <p>
                                                {{ format_publishing_date($photo->date_time) }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="md:col-span-6 col-span-12">
                        @foreach ($photos as $photo)
                            @if ($loop->iteration != 3)
                                @continue
                            @endif
                            <div class="news-card">
                                <div class="image-thumbnail">
                                    <a
                                        href="{{ route('photo_details', ['id' => $photo->id, 'slug' => $photo->title_en]) }}"><img
                                            src="{{ asset($photo->thumbnail) }}" alt="Thumbnail"></a>
                                    <span class="image-icon"><i class="fa-solid fa-images"></i></span>
                                </div>
                                <h1 class="title title-lg">
                                    <a
                                        href="{{ route('photo_details', ['id' => $photo->id, 'slug' => $photo->title_en]) }}">{{ Str::limit(isEnglish() ? $photo->title_en : $photo->title) }}</a>
                                </h1>
                                <div class="date">
                                    <p>
                                        {{ format_publishing_date($photo->date_time) }}
                                    </p>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="md:col-span-3 col-span-12">
                        <div class="grid grid-cols-12 md:gap-y-4 gap-y-0 gap-x-4 md:gap-x-0">

                            @foreach ($photos as $photo)
                                @if ($loop->iteration < 4)
                                    @continue
                                @endif
                                <div class="md:col-span-12 col-span-6">
                                    <div class="news-card">
                                        <div class="image-thumbnail">
                                            <a
                                                href="{{ route('photo_details', ['id' => $photo->id, 'slug' => $photo->title_en]) }}"><img
                                                    src="{{ asset($photo->thumbnail) }}" alt="Thumbnail"></a>
                                            <span class="image-icon"><i class="fa-solid fa-images"></i></span>
                                        </div>
                                        <h1 class="title">
                                            <a
                                                href="{{ route('photo_details', ['id' => $photo->id, 'slug' => $photo->title_en]) }}">{{ Str::limit(isEnglish() ? $photo->title_en : $photo->title) }}</a>
                                        </h1>
                                        <div class="date">
                                            <p>
                                                {{ format_publishing_date($photo->date_time) }}
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

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: '{{ __('lang.error') }}',
                text: '{{ session('error') }}',
                confirmButtonText: '{{ __('lang.ok') }}',
                confirmButtonColor: 'black',
            });
        </script>
    @endif
@endsection
