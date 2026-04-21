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
{{--        @include('layouts.partials.ads.banner_ad', ['ad' => $ad1])--}}
        <!-- ad area end-->
        <!-- ==========Top_Section ======== -->
        <section class="top_section section-padding-top">
            <div class="container">
                <div class="border-b pb-2 border-stock-color">

                    <!-- TOP SECTION -->
                    <div class="flex flex-col lg:flex-row gap-4 border-b pb-4 border-stock-color">

                        <!-- LEFT BIG -->
                        @php
                            $mainPost = $header_posts->firstWhere('header_order', 1);
                        @endphp

                        @isset($mainPost)
                            <div class="lg:w-1/2 w-full lg:border-r lg:pr-4 border-stock-color">
                                <div class="news-card">

                    <div class="thumbnail">
                        <a href="{{ route('news_details', $mainPost->id) }}">
                            <img class="w-full h-[260px] object-cover"
                                 src="{{ asset('storage/'.($mainPost->media->image ?? 'default.png')) }}">
                        </a>
                    </div>

                    <h1 class="title title-lg">
                        <a href="{{ route('news_details', $mainPost->id) }}">
                            {{ Str::limit($mainPost->title, 100) }}
                        </a>
                    </h1>

                </div>
            </div>
        @else
            <div class="lg:w-1/2 w-full lg:border-r lg:pr-4 border-stock-color">
                <div class="news-card">
                </div>
            </div>
        @endisset


                        <!-- RIGHT SIDE -->
                        <div class="lg:w-1/2 w-full grid grid-cols-2 gap-4">

                            @foreach ([2, 3, 4, 5] as $order)
                                @php
                                    $post = $header_posts->firstWhere('header_order', $order);
                                @endphp

                @if($post)
                    <div class="
            news-card
            border-stock-color
            lg:border-r lg:pr-4
            even:lg:border-r-0
        ">

                        <div class="thumbnail">
                            <a href="{{ route('news_details', $post->id) }}">
                                <img class="w-full h-[120px] object-cover"
                                     src="{{ asset('storage/'.($post->media->thumbnail ?? $post->media->image ?? 'default.png')) }}">
                            </a>
                        </div>

                        <h1 class="title text-sm">
                            <a href="{{ route('news_details', $post->id) }}">
                                {{ Str::limit($post->title, 70) }}
                            </a>
                        </h1>

                    </div>
                @else
                    {{-- Empty placeholder --}}
                    <div class="
            news-card
            border-stock-color
            lg:border-r lg:pr-4
            even:lg:border-r-0
        ">
                    </div>
                @endif
            @endforeach

                        </div>

                    </div>


                    <!-- BOTTOM GRID -->
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-4">

                        @foreach (range(6, 13) as $order)
                            @php
                                $post = $header_posts->firstWhere('header_order', $order);
                            @endphp

            <div class="
        news-card
        border-stock-color

        border-r pr-3
        even:border-r-0

        md:border-r md:pr-3
        md:[&:nth-child(3n)]:border-r-0

        lg:border-r lg:pr-4
        lg:[&:nth-child(4n)]:border-r-0
    ">

                @if($post)
                    <div class="thumbnail">
                        <a href="{{ route('news_details', $post->id) }}">
                            <img class="w-full h-[120px] object-cover"
                                 src="{{ asset('storage/'.($post->media->thumbnail ?? $post->media->image ?? 'default.png')) }}">
                        </a>
                    </div>

                    <h1 class="title text-sm">
                        <a href="{{ route('news_details', $post->id) }}">
                            {{ Str::limit($post->title, 70) }}
                        </a>
                    </h1>
                @else
                    {{-- 🔥 Empty Slot --}}
                    <div class="flex items-center justify-center h-[150px] bg-gray-100 text-gray-400 text-sm">

                    </div>
                @endif

            </div>
        @endforeach

                    </div>

                </div>
            </div>
        </section>

        <!--======== national Section ====== -->
        <section class="national_section section_short-padding section-margin-top">
            <div class="container">
                <div class="section-title-wrap">
                    <h2 class="section-title">জাতীয়</h2>
                    <div class="section-button-wrap">
                        <a href="{{route('category_view', 'jateey')}}" class="section_button !bg-black !text-white">আরও পড়ুন <i
                                class="fa-solid fa-angle-right"></i></a>
                    </div>
                </div>

                <div class="grid grid-cols-12 lg:gap-4 gap-3 border-b pb-4 border-stock-color">

                    <!-- Left Side (3 items) -->
                    <div class="lg:col-span-4 col-span-12 lg:order-1 order-2 lg:border-r lg:pr-4 border-stock-color">
                        <div class="space-y-4">
                            @foreach(range(1,3) as $position)
                                @isset($cat1[$position])
                                    <div class="news-card flex gap-3 {{$position!=3?'border-b pb-3 border-stock-color':''}}">
                                        <h1 class="title !mt-0 flex-1">
                                            <a href="{{ route('news_details', $cat1[$position]->id) }}"><span class="sholder">{{$cat1[$position]->sub_headline}}</span>
                                                {{$cat1[$position]->title}}</a>
                                        </h1>
                                        <div class="thumbnail w-32 flex-shrink-0">
                                            <a href="{{ route('news_details', $cat1[$position]->id) }}">
                                                <img class="w-full h-20 object-cover"
                                                    src="{{asset('storage')}}/{{$cat1[$position]->xs_thumbnail}}"
                                                    alt="News Image">
                                            </a>
                                        </div>
                                    </div>
                                @else
                                    <div class="news-card flex gap-3 {{$position!=3?'border-b pb-3 border-stock-color':''}}">
                                    </div>
                                @endisset
                            @endforeach
                        </div>
                    </div>

                    <!-- Center Big News -->
                    @isset($cat1[4])
                    <div
                        class="lg:col-span-4 col-span-12 lg:order-2 order-1 lg:border-b-0 border-b lg:pb-0 pb-3 border-stock-color">
                        <div class="news-card">
                            <div class="thumbnail">
                                <a href="{{ route('news_details', $cat1[4]->id) }}">
                                    <img src="{{asset('storage')}}/{{$cat1[4]->thumbnail}}"
                                        alt="news thumbnail">
                                </a>
                            </div>

                            <h1 class="lg:text-2xl text-xl font-semibold mt-3">
                                <a href="{{ route('news_details', $cat1[4]->id) }}">
                                    {{$cat1[4]->title}}
                                </a>
                            </h1>

                            <div class="short-description_home">
                                <p>
                                    <a href="{{ route('news_details', $cat1[4]->id) }}">
                                        {{$cat1[4]->subtitle}}
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    @else
                        <div
                            class="lg:col-span-4 col-span-12 lg:order-2 order-1 lg:border-b-0 border-b lg:pb-0 pb-3 border-stock-color">
                            <div class="news-card">
                            </div>
                        </div>
                    @endisset
                    <!-- Right Side (3 items) -->
                    <div class="lg:col-span-4 col-span-12 order-3 lg:border-l lg:pl-4 border-stock-color">
                        <div class="space-y-4">

                            @foreach(range(5,7) as $position)
                                @isset($cat1[$position])
                                    <div class="news-card flex gap-3 {{$position!=7?'border-b pb-3 border-stock-color':''}}">
                                        <h1 class="title !mt-0 flex-1">
                                            <a href="{{ route('news_details', $cat1[$position]->id) }}"><span class="sholder">{{$cat1[$position]->sub_headline}}</span>
                                                {{$cat1[$position]->title}}</a>
                                        </h1>
                                        <div class="thumbnail w-32 flex-shrink-0">
                                            <a href="{{ route('news_details', $cat1[$position]->id) }}">
                                                <img class="w-full h-20 object-cover"
                                                     src="{{asset('storage')}}/{{$cat1[$position]->xs_thumbnail}}"
                                                     alt="News Image">
                                            </a>
                                        </div>
                                    </div>
                                @else
                                    <div class="news-card flex gap-3 {{$position!=7?'border-b pb-3 border-stock-color':''}}">
                                        <h1 class="title !mt-0 flex-1">

                                        </h1>
                                        <div class="thumbnail w-32 flex-shrink-0">

                                        </div>
                                    </div>
                                @endisset
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!--======== national Section end ====== -->

        <!--======== Politics Section ====== -->
        <section class="politics_section section-padding-top">
            <div class="container">
                <div class="section-title-wrap">
                    <h2 class="section-title">রাজনীতি</h2>
                    <div class="section-button-wrap">
                        <a href="{{route('category_view', 'rajneeti')}}" class="section_button">আরও পড়ুন <i
                                class="fa-solid fa-angle-right"></i></a>
                    </div>
                </div>
                <div class="grid grid-cols-12 md:gap-6 gap-4 border-b pb-4 border-stock-color">

                    @isset($cat2[1])
                    <!-- Main Left News -->
                    <div
                        class="lg:col-span-6 col-span-12 lg:border-r lg:border-b-0 border-b lg:pr-4 lg:pb-0 pb-3 border-stock-color">
                        <div class="news-card">
                            <div class="thumbnail">
                                <a href="{{route('news_details', $cat2[1]->id)}}">
                                    <img src="{{asset('storage')}}/{{$cat1[1]->image}}"
                                        alt="news image">
                                </a>
                            </div>
                            <h1 class="title title-lg">
                                <a href="{{route('news_details', $cat2[1]->id)}}">{{$cat2[1]->title}}</a>
                            </h1>
                            <div class="short-description">
                                <p>
                                    <a href="{{route('news_details', $cat2[1]->id)}}">{{$cat2[1]->sub_headline}}</a>
                                </p>
                            </div>
                            <div class="short-description_home">
                                <p>
                                    <a href="{{route('news_details', $cat2[1]->id)}}">
                                        {{$cat2[1]->subtitle}}
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    @else
                        <div
                            class="lg:col-span-6 col-span-12 lg:border-r lg:border-b-0 border-b lg:pr-4 lg:pb-0 pb-3 border-stock-color">
                            <div class="news-card">
                            </div>
                        </div>
                    @endisset

                    <!-- Right Side -->
                    <div class="lg:col-span-6 col-span-12">
                        <div class="grid grid-cols-12 md:gap-y-4 lg:gap-4 gap-3">

                            @foreach(range(2,5) as $position)
                                @isset($cat2[$position])
                                    <div class="sm:col-span-6 col-span-6 {{in_array($loop->iteration, [1,3]) ? 'border-r lg:pr-4 pr-3 border-stock-color' : ''}}">
                                        <div class="news-card">
                                            <div class="thumbnail">
                                                <img
                                                    src="{{asset('storage')}}/{{$cat2[$position]->thumbnail}}">
                                            </div>
                                            <h1 class="title">
                                                <a href="{{ route('news_details', $cat2[$position]->id) }}">{{$cat2[1]->title}}</a>
                                            </h1>
                                        </div>
                                    </div>
                                @else
                                    <div class="sm:col-span-6 col-span-6 {{in_array($loop->iteration, [1,3]) ? 'border-r lg:pr-4 pr-3 border-stock-color' : ''}}">
                                        <div class="news-card">
                                        </div>
                                    </div>
                                @endisset
                            @endforeach
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
                    <h2 class="section-title">শিক্ষা</h2>
                    <div class="section-button-wrap">
                        <a href="{{route('category_view', 'siksha')}}" class="section_button">আরও পড়ুন <i
                                class="fa-solid fa-angle-right"></i></a>
                    </div>
                </div>

                <div class="grid grid-cols-12 lg:gap-4 gap-3 border-b pb-4 border-stock-color">

                    <!-- Left Side (3 items) -->
                    <div class="lg:col-span-4 col-span-12 lg:order-1 order-2 lg:border-r lg:pr-4 border-stock-color">
                        <div class="space-y-4">
                            @foreach(range(1,3) as $position)
                                @isset($cat3[$position])
                                    <div class="news-card flex gap-3 {{$position!=3?'border-b pb-3 border-stock-color':''}}">
                                        <h1 class="title !mt-0 flex-1">
                                            <a href="{{ route('news_details', $cat3[$position]->id) }}"><span class="sholder">{{$cat3[$position]->sub_headline}}</span>
                                                {{$cat3[$position]->title}}</a>
                                        </h1>
                                        <div class="thumbnail w-32 flex-shrink-0">
                                            <a href="{{ route('news_details', $cat3[$position]->id) }}">
                                                <img class="w-full h-20 object-cover"
                                                     src="{{asset('storage')}}/{{$cat3[$position]->xs_thumbnail}}"
                                                     alt="News Image">
                                            </a>
                                        </div>
                                    </div>
                                @else
                                    <div class="news-card flex gap-3 {{$position!=3?'border-b pb-3 border-stock-color':''}}">
                                    </div>
                                @endisset
                            @endforeach
                        </div>
                    </div>

                    <!-- Center Big News -->
                    @isset($cat3[4])
                        <div
                            class="lg:col-span-4 col-span-12 lg:order-2 order-1 lg:border-b-0 border-b lg:pb-0 pb-3 border-stock-color">
                            <div class="news-card">
                                <div class="thumbnail">
                                    <a href="{{ route('news_details', $cat3[4]->id) }}">
                                        <img src="{{asset('storage')}}/{{$cat3[4]->thumbnail}}"
                                             alt="news thumbnail">
                                    </a>
                                </div>

                                <h1 class="lg:text-2xl text-xl font-semibold mt-3">
                                    <a href="{{ route('news_details', $cat3[4]->id) }}">
                                        {{$cat3[4]->title}}
                                    </a>
                                </h1>

                                <div class="short-description_home">
                                    <p>
                                        <a href="{{ route('news_details', $cat3[4]->id) }}">
                                            {{$cat3[4]->subtitle}}
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @else
                        <div
                            class="lg:col-span-4 col-span-12 lg:order-2 order-1 lg:border-b-0 border-b lg:pb-0 pb-3 border-stock-color">
                            <div class="news-card">
                            </div>
                        </div>
                    @endisset
                    <!-- Right Side (3 items) -->
                    <div class="lg:col-span-4 col-span-12 order-3 lg:border-l lg:pl-4 border-stock-color">
                        <div class="space-y-4">

                            @foreach(range(5,7) as $position)
                                @isset($cat3[$position])
                                    <div class="news-card flex gap-3 {{$position!=7?'border-b pb-3 border-stock-color':''}}">
                                        <h1 class="title !mt-0 flex-1">
                                            <a href="{{ route('news_details', $cat3[$position]->id) }}"><span class="sholder">{{$cat3[$position]->sub_headline}}</span>
                                                {{$cat3[$position]->title}}</a>
                                        </h1>
                                        <div class="thumbnail w-32 flex-shrink-0">
                                            <a href="{{ route('news_details', $cat3[$position]->id) }}">
                                                <img class="w-full h-20 object-cover"
                                                     src="{{asset('storage')}}/{{$cat3[$position]->xs_thumbnail}}"
                                                     alt="News Image">
                                            </a>
                                        </div>
                                    </div>
                                @else
                                    <div class="news-card flex gap-3 {{$position!=7?'border-b pb-3 border-stock-color':''}}">
                                        <h1 class="title !mt-0 flex-1">

                                        </h1>
                                        <div class="thumbnail w-32 flex-shrink-0">

                                        </div>
                                    </div>
                                @endisset
                            @endforeach
                        </div>
                    </div>


                </div>
            </div>
        </section>
        <section class="edu_campus_section section-padding-top">
            <div class="container">
                <div class="section-title-wrap">
                    <h2 class="section-title">ক্যাম্পাস</h2>
                    <div class="section-button-wrap">
                        <a href="{{route('category_view', 'kzampas')}}" class="section_button">আরও পড়ুন <i
                                class="fa-solid fa-angle-right"></i></a>
                    </div>
                </div>

                <div class="grid grid-cols-12 lg:gap-4 gap-3 border-b pb-4 border-stock-color">

                    <!-- Left Side (3 items) -->
                    <div class="lg:col-span-4 col-span-12 lg:order-1 order-2 lg:border-r lg:pr-4 border-stock-color">
                        <div class="space-y-4">
                            @foreach(range(1,3) as $position)
                                @isset($cat4[$position])
                                    <div class="news-card flex gap-3 {{$position!=3?'border-b pb-3 border-stock-color':''}}">
                                        <h1 class="title !mt-0 flex-1">
                                            <a href="{{ route('news_details', $cat4[$position]->id) }}"><span class="sholder">{{$cat4[$position]->sub_headline}}</span>
                                                {{$cat4[$position]->title}}</a>
                                        </h1>
                                        <div class="thumbnail w-32 flex-shrink-0">
                                            <a href="{{ route('news_details', $cat4[$position]->id) }}">
                                                <img class="w-full h-20 object-cover"
                                                     src="{{asset('storage')}}/{{$cat4[$position]->xs_thumbnail}}"
                                                     alt="News Image">
                                            </a>
                                        </div>
                                    </div>
                                @else
                                    <div class="news-card flex gap-3 {{$position!=3?'border-b pb-3 border-stock-color':''}}">
                                    </div>
                                @endisset
                            @endforeach
                        </div>
                    </div>

                    <!-- Center Big News -->
                    @isset($cat4[4])
                        <div
                            class="lg:col-span-4 col-span-12 lg:order-2 order-1 lg:border-b-0 border-b lg:pb-0 pb-3 border-stock-color">
                            <div class="news-card">
                                <div class="thumbnail">
                                    <a href="{{ route('news_details', $cat4[4]->id) }}">
                                        <img src="{{asset('storage')}}/{{$cat4[4]->thumbnail}}"
                                             alt="news thumbnail">
                                    </a>
                                </div>

                                <h1 class="lg:text-2xl text-xl font-semibold mt-3">
                                    <a href="{{ route('news_details', $cat4[4]->id) }}">
                                        {{$cat4[4]->title}}
                                    </a>
                                </h1>

                                <div class="short-description_home">
                                    <p>
                                        <a href="{{ route('news_details', $cat4[4]->id) }}">
                                            {{$cat4[4]->subtitle}}
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @else
                        <div
                            class="lg:col-span-4 col-span-12 lg:order-2 order-1 lg:border-b-0 border-b lg:pb-0 pb-3 border-stock-color">
                            <div class="news-card">
                            </div>
                        </div>
                    @endisset
                    <!-- Right Side (3 items) -->
                    <div class="lg:col-span-4 col-span-12 order-3 lg:border-l lg:pl-4 border-stock-color">
                        <div class="space-y-4">

                            @foreach(range(5,7) as $position)
                                @isset($cat4[$position])
                                    <div class="news-card flex gap-3 {{$position!=7?'border-b pb-3 border-stock-color':''}}">
                                        <h1 class="title !mt-0 flex-1">
                                            <a href="{{ route('news_details', $cat4[$position]->id) }}"><span class="sholder">{{$cat4[$position]->sub_headline}}</span>
                                                {{$cat4[$position]->title}}</a>
                                        </h1>
                                        <div class="thumbnail w-32 flex-shrink-0">
                                            <a href="{{ route('news_details', $cat4[$position]->id) }}">
                                                <img class="w-full h-20 object-cover"
                                                     src="{{asset('storage')}}/{{$cat4[$position]->xs_thumbnail}}"
                                                     alt="News Image">
                                            </a>
                                        </div>
                                    </div>
                                @else
                                    <div class="news-card flex gap-3 {{$position!=7?'border-b pb-3 border-stock-color':''}}">
                                        <h1 class="title !mt-0 flex-1">

                                        </h1>
                                        <div class="thumbnail w-32 flex-shrink-0">

                                        </div>
                                    </div>
                                @endisset
                            @endforeach
                        </div>
                    </div>


                </div>
            </div>
        </section>
        <!--======== Education & Campus Section end ====== -->

        <!--======== International Section ====== -->
        <section class="international_section section-padding-top">
            <div class="container">
                <div class="section-title-wrap">
                    <h2 class="section-title">আন্তর্জাতিক</h2>
                    <div class="section-button-wrap">
                        <a href="{{route('category_view', 'antrjatik')}}" class="section_button">আরও পড়ুন <i
                                class="fa-solid fa-angle-right"></i></a>
                    </div>
                </div>

                <div class="grid grid-cols-12 lg:gap-4 gap-3 border-b pb-4 border-stock-color">
                    @isset($cat5[1])
                    <!-- Center Big News -->
                    <div class="lg:col-span-6 col-span-12 lg:border-b-0 border-b lg:pb-0 pb-3 border-stock-color">
                        <div class="news-card">
                            <div class="thumbnail">
                                <a href="{{route('news_details', $cat5[1]->id)}}">
                                    <img src="{{asset('storage')}}/{{$cat5[1]->image}}"
                                        alt="thumbnail">
                                </a>
                            </div>

                            <h1 class="lg:text-2xl text-xl font-semibold mt-3 mb-2">
                                <a href="{{route('news_details', $cat5[1]->id)}}">
                                    {{$cat5[1]->title}}
                                </a>
                            </h1>

                            <div class="short-description_home">
                                <p>
                                    <a href="{{route('news_details', $cat5[1]->id)}}">
                                        {{$cat5[1]->subtitle}}
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    @else
                        <div class="lg:col-span-6 col-span-12 lg:border-b-0 border-b lg:pb-0 pb-3 border-stock-color">
                            <div class="news-card">
                            </div>
                        </div>
                    @endisset

                    <!-- Right Side (3 items) -->
                    <div class="lg:col-span-6 col-span-12 order-3 lg:border-l lg:pl-4 border-stock-color">
                        <div class="space-y-4">
                            @foreach(range(2,5) as $position)
                                @isset($cat5[$position])
                            <div class="news-card flex gap-3 {{$position!=5?'border-b pb-3 border-stock-color':''}}">
                                <div class="thumbnail w-32 flex-shrink-0">
                                    <a href="{{route('news_details', $cat5[$position]->id)}}">
                                        <img class="w-full h-20 object-cover"
                                            src="{{asset('storage')}}/{{$cat5[$position]->xs_thumbnail}}"
                                            alt="News Image">
                                    </a>
                                </div>
                                <h1 class="title !mt-0 flex-1">
                                    <a href="{{route('news_details', $cat5[$position]->id)}}">{{$cat5[$position]->title}}</a>
                                </h1>
                            </div>
                                @else
                                    <div class="news-card flex gap-3 {{$position!=5?'border-b pb-3 border-stock-color':''}}">
                                    </div>
                                @endisset
                            @endforeach

                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!--======== International Section end ====== -->

        <!--======== Sports Section ====== -->
        <section class="sports_section section-padding-top">
            <div class="container">
                <div class="section-title-wrap">
                    <h2 class="section-title">খেলা</h2>
                    <div class="section-button-wrap">
                        <a href="http://127.0.0.1:8000/category/khela" class="section_button">আরও পড়ুন <i
                                class="fa-solid fa-angle-right"></i></a>
                    </div>
                </div>

                <div class="grid grid-cols-12 lg:gap-4 gap-3 border-b pb-4 border-stock-color">

                    <!-- Left Side (3 items) -->
                    <div class="lg:col-span-4 col-span-12 lg:order-1 order-2 lg:border-r lg:pr-4 border-stock-color">
                        <div class="space-y-4">
                            @foreach(range(1,3) as $position)
                                @isset($cat6[$position])
                                    <div class="news-card flex gap-3 {{$position!=3?'border-b pb-3 border-stock-color':''}}">
                                        <h1 class="title !mt-0 flex-1">
                                            <a href="{{ route('news_details', $cat6[$position]->id) }}"><span class="sholder">{{$cat6[$position]->sub_headline}}</span>
                                                {{$cat6[$position]->title}}</a>
                                        </h1>
                                        <div class="thumbnail w-32 flex-shrink-0">
                                            <a href="{{ route('news_details', $cat6[$position]->id) }}">
                                                <img class="w-full h-20 object-cover"
                                                     src="{{asset('storage')}}/{{$cat6[$position]->xs_thumbnail}}"
                                                     alt="News Image">
                                            </a>
                                        </div>
                                    </div>
                                @else
                                    <div class="news-card flex gap-3 {{$position!=3?'border-b pb-3 border-stock-color':''}}">
                                    </div>
                                @endisset
                            @endforeach
                        </div>
                    </div>

                    <!-- Center Big News -->
                    @isset($cat6[4])
                        <div
                            class="lg:col-span-4 col-span-12 lg:order-2 order-1 lg:border-b-0 border-b lg:pb-0 pb-3 border-stock-color">
                            <div class="news-card">
                                <div class="thumbnail">
                                    <a href="{{ route('news_details', $cat6[4]->id) }}">
                                        <img src="{{asset('storage')}}/{{$cat6[4]->thumbnail}}"
                                             alt="news thumbnail">
                                    </a>
                                </div>

                                <h1 class="lg:text-2xl text-xl font-semibold mt-3">
                                    <a href="{{ route('news_details', $cat6[4]->id) }}">
                                        {{$cat6[4]->title}}
                                    </a>
                                </h1>

                                <div class="short-description_home">
                                    <p>
                                        <a href="{{ route('news_details', $cat6[4]->id) }}">
                                            {{$cat6[4]->subtitle}}
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @else
                        <div
                            class="lg:col-span-4 col-span-12 lg:order-2 order-1 lg:border-b-0 border-b lg:pb-0 pb-3 border-stock-color">
                            <div class="news-card">
                            </div>
                        </div>
                    @endisset
                    <!-- Right Side (3 items) -->
                    <div class="lg:col-span-4 col-span-12 order-3 lg:border-l lg:pl-4 border-stock-color">
                        <div class="space-y-4">

                            @foreach(range(5,7) as $position)
                                @isset($cat6[$position])
                                    <div class="news-card flex gap-3 {{$position!=7?'border-b pb-3 border-stock-color':''}}">
                                        <h1 class="title !mt-0 flex-1">
                                            <a href="{{ route('news_details', $cat6[$position]->id) }}"><span class="sholder">{{$cat6[$position]->sub_headline}}</span>
                                                {{$cat6[$position]->title}}</a>
                                        </h1>
                                        <div class="thumbnail w-32 flex-shrink-0">
                                            <a href="{{ route('news_details', $cat6[$position]->id) }}">
                                                <img class="w-full h-20 object-cover"
                                                     src="{{asset('storage')}}/{{$cat6[$position]->xs_thumbnail}}"
                                                     alt="News Image">
                                            </a>
                                        </div>
                                    </div>
                                @else
                                    <div class="news-card flex gap-3 {{$position!=7?'border-b pb-3 border-stock-color':''}}">
                                        <h1 class="title !mt-0 flex-1">

                                        </h1>
                                        <div class="thumbnail w-32 flex-shrink-0">

                                        </div>
                                    </div>
                                @endisset
                            @endforeach
                        </div>
                    </div>


                </div>
            </div>
        </section>
        <!--======== Sports Section end ====== -->

        <!--======== Crime law & health Section ====== -->
        <section class="crime_law_health_section section-padding-top">
            <div class="container">

                <div class="grid grid-cols-12 lg:gap-4 gap-3 border-b pb-4 border-stock-color">

                    <!-- left Side (3 items) -->
                    <div class="lg:col-span-4 col-span-12 ">
                        <div class="section-title-wrap lg:mt-0 md:mt-6 mt-4">
                            <h2 class="section-title"> <a href="{{route('category_view', 'opradh')}}">অপরাধ</a></h2>
                        </div>
                        <div class="space-y-4 ">
                            @foreach(range(1,4) as $position)
                                @isset($cat7[$position])
                                    <div class="news-card flex gap-3 {{$position!==4?'border-b pb-3':''}} border-stock-color">
                                        <div class="thumbnail w-32 flex-shrink-0">
                                            <a href="{{route('news_details', $cat7[$position]->id)}}">
                                                <img class="w-full h-20 object-cover"
                                                     src="{{asset('storage')}}/{{$cat7[$position]->xs_thumbnail}}"
                                                     alt="News Image">
                                            </a>
                                        </div>
                                        <h1 class="title-sm !mt-0 flex-1">
                                            <a href="{{route('news_details', $cat7[$position]->id)}}">{{$cat7[$position]->title}}</a>
                                        </h1>
                                    </div>
                                @else
                                    <div class="news-card flex gap-3 {{$position!==4?'border-b pb-3':''}} border-stock-color">
                                    </div>
                                @endisset
                            @endforeach
                        </div>
                    </div>
                    <div class="lg:col-span-4 col-span-12 ">
                        <div class="section-title-wrap lg:mt-0 md:mt-6 mt-4">
                            <h2 class="section-title"> <a href="{{route('category_view', 'ain-adalt')}}">আইন আদালত</a>
                            </h2>
                        </div>
                        <div class="space-y-4 lg:border-l lg:pl-4 border-stock-color">
                            @foreach(range(1,4) as $position)
                                @isset($cat8[$position])
                                    <div class="news-card flex gap-3 {{$position!==4?'border-b pb-3':''}} border-stock-color">
                                        <div class="thumbnail w-32 flex-shrink-0">
                                            <a href="{{route('news_details', $cat8[$position]->id)}}">
                                                <img class="w-full h-20 object-cover"
                                                     src="{{asset('storage')}}/{{$cat8[$position]->xs_thumbnail}}"
                                                     alt="News Image">
                                            </a>
                                        </div>
                                        <h1 class="title-sm !mt-0 flex-1">
                                            <a href="{{route('news_details', $cat8[$position]->id)}}">{{$cat8[$position]->title}}</a>
                                        </h1>
                                    </div>
                                @else
                                    <div class="news-card flex gap-3 {{$position!==4?'border-b pb-3':''}} border-stock-color">
                                    </div>
                                @endisset
                            @endforeach

                        </div>
                    </div>
                    <div class="lg:col-span-4 col-span-12 ">
                        <div class="section-title-wrap lg:mt-0 md:mt-6 mt-4">
                            <h2 class="section-title"> <a href="{{route('category_view', 'swasthz')}}">স্বাস্থ্য</a></h2>
                        </div>
                        <div class="space-y-4 lg:border-l lg:pl-4 border-stock-color">
                            @foreach(range(1,4) as $position)
                                @isset($cat9[$position])
                                    <div class="news-card flex gap-3 {{$position!==4?'border-b pb-3':''}} border-stock-color">
                                        <div class="thumbnail w-32 flex-shrink-0">
                                            <a href="{{route('news_details', $cat9[$position]->id)}}">
                                                <img class="w-full h-20 object-cover"
                                                     src="{{asset('storage')}}/{{$cat9[$position]->xs_thumbnail}}"
                                                     alt="News Image">
                                            </a>
                                        </div>
                                        <h1 class="title-sm !mt-0 flex-1">
                                            <a href="{{route('news_details', $cat9[$position]->id)}}">{{$cat9[$position]->title}}</a>
                                        </h1>
                                    </div>
                                @else
                                    <div class="news-card flex gap-3 {{$position!==4?'border-b pb-3':''}} border-stock-color">
                                    </div>
                                @endisset
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!--======== Crime law & health Section end ====== -->

        <!--======== whole_country Section ====== -->
        <section class="whole_country_section section-padding-top">
            <div class="container">

                <div class="grid grid-cols-12 md:gap-6 gap-4 border-b pb-4 border-stock-color">

                    <!-- Main Left News -->
                    <div
                        class="lg:col-span-7 col-span-12 lg:border-r lg:border-b-0 border-b lg:pr-4 lg:pb-0 pb-3 border-stock-color">
                        <div class="section-title-wrap">
                            <h2 class="section-title">সারাদেশ</h2>
                            <div class="section-button-wrap">
                                <a href="{{route('category_view', 'sarades')}}" class="section_button">আরও পড়ুন <i
                                        class="fa-solid fa-angle-right"></i></a>
                            </div>
                        </div>
                        @isset($cat10[1])
                        <div class="news-card">
                            <div class="thumbnail">
                                <a href="{{route('news_details', $cat10[1]->id)}}">
                                    <img src="{{asset('storage')}}/{{$cat10[1]->image}}"
                                        alt="Thumbnail">
                                </a>
                            </div>
                            <h1 class="title title-lg">
                                <a href="{{route('news_details', $cat10[1]->id)}}">{{$cat10[1]->title}}</a>
                            </h1>
                            <div class="short-description">
                                <p>
                                    <a href="{{route('news_details', $cat10[1]->id)}}">{{$cat10[1]->sub_headline}}</a>
                                </p>
                            </div>
                            <div class="short-description_home">
                                <p>
                                    <a href="{{route('news_details', $cat10[1]->id)}}">
                                        {{$cat10[1]->subtitle}}
                                    </a>
                                </p>
                            </div>
                        </div>
                        @else
                            <div class="news-card">
                            </div>
                        @endisset
                    </div>

                    <!-- Right Side -->
                    <div class="lg:col-span-5 col-span-12">
                        <div class="sidebar-card">
                            <!-- Tab Header -->
                            <div class="button_wrap">
                                <button class="sidebar-button active-tab">
                                    সর্বশেষ
                                </button>
                                <button class="sidebar-button">
                                    সর্বাধিক পঠিত
                                </button>
                            </div>

                            <!-- সর্বশেষ Tab -->
                            <div id="latest" class="tab-content flex flex-col justify-between">
                                <ul class="md:space-y-6 space-y-4  ">
                                    @foreach($latest as $latest_item)
                                        <li class="sidebar-item">
                                            <span>{{isEnglish()?$loop->iteration:bangla_number($loop->iteration)}}</span><a
                                                href="{{route('news_details', ['id' => $latest_item->id, 'slug' => $latest_item->slug])}}"
                                                class="sidebar-link">{{Str::limit($latest_item->title, 50)}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                                <a href="{{route('last_published')}}" class="read-more-btn">আরও পড়ুন <i class="fa-solid fa-angle-right"></i></a>
                            </div>

                            <!-- সর্বাধিক পঠিত Tab -->
                            <div id="popular" class="tab-content flex flex-col justify-between hidden">
                                <ul  class="md:space-y-6 space-y-4 ">
                                    @foreach($best_hit as $best_hit_item)
                                        <li class="sidebar-item">
                                            <span>{{isEnglish()?$loop->iteration:bangla_number($loop->iteration)}}</span><a
                                                href="{{route('news_details', ['id' => $best_hit_item->id, 'slug' => $best_hit_item->slug])}}"
                                                class="sidebar-link">{{Str::limit($best_hit_item->title, 50)}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                                <a href="{{route('most_read')}}" class="read-more-btn">আরও পড়ুন <i class="fa-solid fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>
        <!--======== whole_country Section end ====== -->

        <section class="opinion-section section_short-padding section-margin-top">
            <div class="container">
                <div class="section-title-wrap">
                    <h2 class="section-title">মতামত</h2>
                    <div class="section-button-wrap">
                        <a href="{{route('category_view', 'mtamt-2')}}" class="section_button bg-black">আরও পড়ুন <i
                                class="fa-solid fa-angle-right"></i></a>
                    </div>
                </div>
                <div class="grid grid-cols-12 gap-6 border-b-0 pb-4 border-stock-color">

                    <!-- Left Featured Card -->
                    <div class="lg:col-span-4 col-span-12">
                        @isset($cat11[1])
                        <div class="featured-card p-6 border border-gray-300">

                            <h2 class="featured-title">
                                <a href="{{route('news_details', $cat11[1]->id)}}">
                                    <span class="sholder">{{$cat11[1]->sub_headline}}</span>  {{$cat11[1]->title}}
                                </a>
                            </h2>

                            <p class="featured-desc">
                                {{$cat11[1]->subtitle}}
                            </p>

                            <div class="author flex items-center mt-6">
                                <img src="{{ asset('frontend/assets/image/M_Shawkhat_Hossain.jpg') }}"
                                    class="w-14 h-14 rounded-full" alt="thumbnail">
                                <div class="ml-3">
                                    <p class="name">{{$cat11[1]->author_name}}</p>
                                    <p class="designation text-sm text-gray-500">{{$cat11[1]->author_designation}}
                                    </p>
                                </div>
                            </div>

                        </div>
                        @else
                        @endisset
                    </div>

                    <!-- Right List -->
                    <div class="lg:col-span-8 col-span-12">
                        <div class="md:space-y-6 space-y-4">
                            @foreach(range(2,5) as $position)
                                @isset($cat11[$position])
                            <div class="opinion-item flex items-start gap-4">
                                <div>
                                    <div class="icon">
                                        <img src="{{ asset('frontend/assets/image/M_Shawkhat_Hossain.jpg') }}"
                                            class="w-14 h-14 rounded-full" alt="thumbnail">
                                    </div>
                                </div>
                                <div>
                                    <h3 class="title">
                                        <a href="#">
                                            <span class="sholder">{{$cat11[$position]->sub_headline}}</span>{{$cat11[$position]->title}}
                                        </a>
                                    </h3>
                                    <p class="author-name">লেখা: {{$cat11[$position]->author_name}}</p>
                                </div>
                            </div>
                                @else
                                    <div class="opinion-item flex items-start gap-4">
                                    </div>
                                @endisset
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!--======== সাক্ষাৎকার,সাহিত্য, ফিচার, ধর্ম  Section ====== -->
        <section class="interview_feature_religion_section section-padding-top">
            <div class="container">

                <div class="grid grid-cols-12 lg:gap-4 gap-3 border-b pb-4 border-stock-color">

                    <!-- left Side (3 items) -->
                    <div class="xl:col-span-3 md:col-span-6 col-span-12 ">
                        <div class="section-title-wrap lg:mt-0 md:mt-6 mt-4">
                            <h2 class="section-title"> <a href="{{route('category_view', 'sakshattkar')}}">সাক্ষাৎকার</a>
                            </h2>
                        </div>
                        <div class="space-y-4 ">
                            @foreach(range(1,4) as $position)
                                @isset($cat12[$position])
                                    <div class="news-card border-b{{$position==4?'-0':''}} pb-3 border-stock-color">
                                        @if($position==1)
                                            <div class="thumbnail">
                                                <img
                                                    src="{{asset('storage')}}/{{$cat12[$position]->thumbnail}}" alt="news thumbnail">
                                            </div>
                                        @endif
                                        <h1 class="title">
                                            <a href="{{route('news_details', $cat12[$position]->id)}}">{{$cat12[$position]->title}}</a>
                                        </h1>
                                    </div>
                                @else
                                    <div class="news-card border-b{{$position==4?'-0':''}} pb-3 border-stock-color">
                                    </div>
                                @endisset
                            @endforeach
                        </div>
                    </div>
                    <div class="xl:col-span-3 md:col-span-6 col-span-12 ">
                        <div class="section-title-wrap lg:mt-0 md:mt-6 mt-4">
                            <h2 class="section-title"> <a href="{{route('category_view', 'sahitz')}}">সাহিত্য</a></h2>
                        </div>
                        <div class="space-y-4 ">
                            @foreach(range(1,4) as $position)
                                @isset($cat13[$position])
                                    <div class="news-card border-b{{$position==4?'-0':''}} pb-3 border-stock-color">
                                        @if($position==1)
                                            <div class="thumbnail">
                                                <img
                                                    src="{{asset('storage')}}/{{$cat13[$position]->thumbnail}}" alt="news thumbnail">
                                            </div>
                                        @endif
                                        <h1 class="title">
                                            <a href="{{route('news_details', $cat13[$position]->id)}}">{{$cat13[$position]->title}}</a>
                                        </h1>
                                    </div>
                                @else
                                    <div class="news-card border-b{{$position==4?'-0':''}} pb-3 border-stock-color">
                                    </div>
                                @endisset
                            @endforeach
                        </div>
                    </div>
                    <div class="xl:col-span-3 md:col-span-6 col-span-12 ">
                        <div class="section-title-wrap lg:mt-0 md:mt-6 mt-4">
                            <h2 class="section-title"> <a href="{{route('category_view', 'ficar')}}">ফিচার</a></h2>
                        </div>
                        <div class="space-y-4 ">
                            @foreach(range(1,4) as $position)
                                @isset($cat14[$position])
                                    <div class="news-card border-b{{$position==4?'-0':''}} pb-3 border-stock-color">
                                        @if($position==1)
                                            <div class="thumbnail">
                                                <img
                                                    src="{{asset('storage')}}/{{$cat14[$position]->thumbnail}}" alt="news thumbnail">
                                            </div>
                                        @endif
                                        <h1 class="title">
                                            <a href="{{route('news_details', $cat14[$position]->id)}}">{{$cat14[$position]->title}}</a>
                                        </h1>
                                    </div>
                                @else
                                    <div class="news-card border-b{{$position==4?'-0':''}} pb-3 border-stock-color">
                                    </div>
                                @endisset
                            @endforeach
                        </div>
                    </div>
                    <div class="xl:col-span-3 md:col-span-6 col-span-12 ">
                        <div class="section-title-wrap lg:mt-0 md:mt-6 mt-4">
                            <h2 class="section-title"> <a href="{{route('category_view', 'dhrm')}}">ধর্ম</a></h2>
                        </div>
                        <div class="space-y-4 ">
                            @foreach(range(1,4) as $position)
                                @isset($cat15[$position])
                                    <div class="news-card border-b{{$position==4?'-0':''}} pb-3 border-stock-color">
                                        @if($position==1)
                                            <div class="thumbnail">
                                                <img
                                                    src="{{asset('storage')}}/{{$cat15[$position]->thumbnail}}" alt="news thumbnail">
                                            </div>
                                        @endif
                                        <h1 class="title">
                                            <a href="{{route('news_details', $cat15[$position]->id)}}">{{$cat15[$position]->title}}</a>
                                        </h1>
                                    </div>
                                @else
                                    <div class="news-card border-b{{$position==4?'-0':''}} pb-3 border-stock-color">
                                    </div>
                                @endisset
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!--======== সাক্ষাৎকার,সাহিত্য, ফিচার, ধর্ম Section end ====== -->

        <!--======== অর্থনীতি, পরিবেশ, বিনোদন, চাকরির খবর  Section ====== -->
        <section class="arthoniti_poribesh_binodon_chakrir_khobor_section section_short-padding section-margin-top">
            <div class="container">

                <div class="grid grid-cols-12 lg:gap-4 gap-3 border-b pb-4 border-stock-color">

                    <!-- left Side (3 items) -->
                    <div class="xl:col-span-3 md:col-span-6 col-span-12 ">
                        <div class="section-title-wrap lg:mt-0 md:mt-6 mt-4">
                            <h2 class="section-title"> <a href="{{route('category_view', 'orthneeti')}}">অর্থনীতি</a>
                            </h2>
                        </div>
                        <div class="space-y-4 ">
                            @foreach(range(1,4) as $position)
                                @isset($cat16[$position])
                                    <div class="news-card border-b{{$position==4?'-0':''}} pb-3 border-stock-color">
                                        @if($position==1)
                                            <div class="thumbnail">
                                                <img
                                                    src="{{asset('storage')}}/{{$cat16[$position]->thumbnail}}" alt="news thumbnail">
                                            </div>
                                        @endif
                                        <h1 class="title">
                                            <a href="{{route('news_details', $cat16[$position]->id)}}">{{$cat16[$position]->title}}</a>
                                        </h1>
                                    </div>
                                @else
                                    <div class="news-card border-b{{$position==4?'-0':''}} pb-3 border-stock-color">
                                    </div>
                                @endisset
                            @endforeach
                        </div>
                    </div>
                    <div class="xl:col-span-3 md:col-span-6 col-span-12 ">
                        <div class="section-title-wrap lg:mt-0 md:mt-6 mt-4">
                            <h2 class="section-title"> <a
                                    href="{{route('category_view', 'abhawa-oo-pribes')}}">পরিবেশ</a></h2>
                        </div>
                        <div class="space-y-4 ">
                            @foreach(range(1,4) as $position)
                                @isset($cat17[$position])
                                    <div class="news-card border-b{{$position==4?'-0':''}} pb-3 border-stock-color">
                                        @if($position==1)
                                            <div class="thumbnail">
                                                <img
                                                    src="{{asset('storage')}}/{{$cat17[$position]->thumbnail}}" alt="news thumbnail">
                                            </div>
                                        @endif
                                        <h1 class="title">
                                            <a href="{{route('news_details', $cat17[$position]->id)}}">{{$cat17[$position]->title}}</a>
                                        </h1>
                                    </div>
                                @else
                                    <div class="news-card border-b{{$position==4?'-0':''}} pb-3 border-stock-color">
                                    </div>
                                @endisset
                            @endforeach
                        </div>
                    </div>
                    <div class="xl:col-span-3 md:col-span-6 col-span-12 ">
                        <div class="section-title-wrap lg:mt-0 md:mt-6 mt-4">
                            <h2 class="section-title"> <a href="{{route('category_view', 'binodn')}}">বিনোদন</a></h2>
                        </div>
                        <div class="space-y-4 ">
                            @foreach(range(1,4) as $position)
                                @isset($cat18[$position])
                                    <div class="news-card border-b{{$position==4?'-0':''}} pb-3 border-stock-color">
                                        @if($position==1)
                                            <div class="thumbnail">
                                                <img
                                                    src="{{asset('storage')}}/{{$cat18[$position]->thumbnail}}" alt="news thumbnail">
                                            </div>
                                        @endif
                                        <h1 class="title">
                                            <a href="{{route('news_details', $cat18[$position]->id)}}">{{$cat18[$position]->title}}</a>
                                        </h1>
                                    </div>
                                @else
                                    <div class="news-card border-b{{$position==4?'-0':''}} pb-3 border-stock-color">
                                    </div>
                                @endisset
                            @endforeach
                        </div>
                    </div>
                    <div class="xl:col-span-3 md:col-span-6 col-span-12 ">
                        <div class="section-title-wrap lg:mt-0 md:mt-6 mt-4">
                            <h2 class="section-title"> <a href="{{route('category_view', 'cakrir-khbr')}}">চাকরির খবর</a>
                            </h2>
                        </div>
                        <div class="space-y-4 ">
                            @foreach(range(1,4) as $position)
                                @isset($cat19[$position])
                                    <div class="news-card border-b{{$position==4?'-0':''}} pb-3 border-stock-color">
                                        @if($position==1)
                                            <div class="thumbnail">
                                                <img
                                                    src="{{asset('storage')}}/{{$cat19[$position]->thumbnail}}" alt="news thumbnail">
                                            </div>
                                        @endif
                                        <h1 class="title">
                                            <a href="{{route('news_details', $cat19[$position]->id)}}">{{$cat19[$position]->title}}</a>
                                        </h1>
                                    </div>
                                @else
                                    <div class="news-card border-b{{$position==4?'-0':''}} pb-3 border-stock-color">
                                    </div>
                                @endisset
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!--======== অর্থনীতি, পরিবেশ, বিনোদন, চাকরির খবর Section end ====== -->

        <!--======== International Section ====== -->
        <section class="international_section section-padding-top">
            <div class="container">
                <div class="grid grid-cols-12 lg:gap-4 gap-3 ">
                    <div class="xl:col-span-6 col-span-12 lg:border-b-0 border-b lg:pb-0 pb-3 border-stock-color">
                        <div class="section-title-wrap">
                            <h2 class="section-title">ফ্যাক্টচেক</h2>
                            <div class="section-button-wrap">
                                <a href="{{route('category_view', 'fzaktcek')}}" class="section_button">আরও পড়ুন <i
                                        class="fa-solid fa-angle-right"></i></a>
                            </div>
                        </div>

                        <div class="grid grid-cols-12 lg:gap-4 gap-3 ">
                            <!-- Center Big News -->
                            @isset($cat20[1])
                            <div class="md:col-span-6 col-span-12 md:border-b-0 border-b md:pb-0 pb-3 border-stock-color">
                                <div class="news-card">
                                    <div class="thumbnail">
                                        <a href="{{route('news_details', $cat20[1]->id)}}">
                                            <img src="{{asset('storage')}}/{{$cat20[1]->thumbnail}}"
                                                alt="thumbnail">
                                        </a>
                                    </div>

                                    <h1 class="lg:text-2xl text-xl font-semibold mt-3 mb-2">
                                        <a href="{{route('news_details', $cat20[1]->id)}}">
                                            {{$cat20[1]->title}}
                                        </a>
                                    </h1>

                                    <div class="short-description_home">
                                        <p>
                                            <a href="{{route('news_details', $cat20[1]->id)}}">
                                                {{$cat20[1]->subtitle}}
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @else
                                <div class="md:col-span-6 col-span-12 md:border-b-0 border-b md:pb-0 pb-3 border-stock-color">
                                    <div class="news-card">
                                    </div>
                                </div>
                            @endisset

                            <!-- Right Side (3 items) -->
                            <div class="md:col-span-6 col-span-12 order-3 lg:border-l lg:pl-4 border-stock-color">
                                <div class="space-y-4">
                                    @foreach(range(2,5) as $position)
                                        @isset($cat20[$position])
                                         <div class="news-card border-b{{$position==5?'-0':''}} pb-3 border-stock-color">
                                        <h1 class="title-sm !my-0 flex-1">
                                            <a href="{{route('news_details', $cat20[$position]->id)}}">{{$cat20[$position]->title}}</a>
                                        </h1>
                                    </div>
                                        @else
                                            <div class="news-card border-b{{$position==5?'-0':''}} pb-3 border-stock-color">
                                            </div>
                                        @endisset
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="xl:col-span-6 col-span-12 lg:border-b-0 border-b lg:pb-0 pb-3 border-stock-color">
                        <div class="section-title-wrap">
                            <h2 class="section-title">প্রতিবাদলিপি ও সংশোধনী</h2>
                            <div class="section-button-wrap">
                                <a href="{{route('category_view', 'prtibadlipi-oo-sngsodhnee')}}" class="section_button">আরও পড়ুন <i
                                        class="fa-solid fa-angle-right"></i></a>
                            </div>
                        </div>

                        <div class="grid grid-cols-12 lg:gap-4 gap-3 ">
                            <!-- Center Big News -->
                            @isset($cat21[1])
                            <div class="md:col-span-6 col-span-12 md:border-b-0 border-b md:pb-0 pb-3 border-stock-color">
                                <div class="news-card">
                                    <div class="thumbnail">
                                        <a href="{{route('news_details', $cat21[1]->id)}}">
                                            <img src="{{asset('storage')}}/{{$cat21[1]->thumbnail}}"
                                                alt="thumbnail">
                                        </a>
                                    </div>

                                    <h1 class="lg:text-2xl text-xl font-semibold mt-3 mb-2">
                                        <a href="{{route('news_details', $cat21[1]->id)}}">
                                            {{$cat21[1]->title}}
                                        </a>
                                    </h1>

                                    <div class="short-description_home">
                                        <p>
                                            <a href="{{route('news_details', $cat21[1]->id)}}">
                                                {{$cat21[1]->subtitle}}
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @else
                                <div class="md:col-span-6 col-span-12 md:border-b-0 border-b md:pb-0 pb-3 border-stock-color">
                                    <div class="news-card">
                                    </div>
                                </div>
                            @endisset

                            <!-- Right Side (3 items) -->
                            <div class="md:col-span-6 col-span-12 order-3 lg:border-l lg:pl-4 border-stock-color">
                                <div class="space-y-4">
                                    @foreach(range(2,5) as $position)
                                        @isset($cat21[$position])
                                         <div class="news-card border-b{{$position==5?'-0':''}} pb-3 border-stock-color">
                                        <h1 class="title-sm !my-0 flex-1">
                                            <a href="{{route('news_details', $cat21[$position]->id)}}">{{$cat21[$position]->title}}</a>
                                        </h1>
                                    </div>
                                        @else
                                            <div class="news-card border-b{{$position==5?'-0':''}} pb-3 border-stock-color">
                                            </div>
                                        @endisset
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--======== International Section end ====== -->

        <!--=========Video_Section=========== -->
{{--        <section class="video_section section_short-padding {{ $videos->count() == 0 ? 'hidden' : '' }}">--}}
{{--            <div class="container border-t pt-6 border-stock-color">--}}
{{--                <div class="section-title-wrap">--}}
{{--                    <h2 class="section-title">{{ __('lang.video') }}</h2>--}}
{{--                    <div class="section-button-wrap">--}}
{{--                        <a href="{{ route('videos') }}" class="section_button">{{ __('lang.see_more') }} <i--}}
{{--                                class="fa-solid fa-angle-right"></i></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="grid grid-cols-12 md:gap-6 gap-4 border-b pb-4 border-stock-color">--}}

{{--                    @php--}}
{{--                        $mainVideo = $videos->first();--}}
{{--                        $sideVideos = $videos->slice(1, 4);--}}
{{--                    @endphp--}}

{{--                    <!-- Main Left Video -->--}}
{{--                    @if ($mainVideo)--}}
{{--                        <div--}}
{{--                            class="lg:col-span-6 col-span-12 lg:border-r lg:border-b-0 border-b lg:pr-4 lg:pb-0 pb-3 border-stock-color">--}}
{{--                            <div class="news-card">--}}
{{--                                <div class="video_thumbnail">--}}
{{--                                    <a--}}
{{--                                        href="{{ route('video_details', ['id' => $mainVideo->id, 'slug' => $mainVideo->slug]) }}">--}}
{{--                                        <img src="{{ asset('storage') }}/{{ $mainVideo->media->thumbnail ?? null }}"--}}
{{--                                            alt="Thumbnail">--}}
{{--                                    </a>--}}

{{--                                    <a href="{{ route('video_details', ['id' => $mainVideo->id, 'slug' => $mainVideo->slug]) }}"--}}
{{--                                        class="video-icon-wrap">--}}
{{--                                        <span class="video-icon animate-ripple-blue-vdo">--}}
{{--                                            <i class="fa-solid fa-play"></i>--}}
{{--                                        </span>--}}
{{--                                    </a>--}}

{{--                                    <span class="video_duration">{{ $mainVideo->video_duration }}</span>--}}
{{--                                </div>--}}

{{--                                <h1 class="title title-lg">--}}
{{--                                    <a--}}
{{--                                        href="{{ route('video_details', ['id' => $mainVideo->id, 'slug' => $mainVideo->slug]) }}">--}}
{{--                                        {{ Str::limit($mainVideo->title, 120) }}--}}
{{--                                    </a>--}}
{{--                                </h1>--}}

{{--                                --}}{{-- <div class="short-description">--}}
{{--                                    <p>--}}
{{--                                        <a href="#">--}}
{{--                                            {{ Str::limit($mainVideo->title, 80) }}--}}
{{--                                        </a>--}}
{{--                                    </p>--}}
{{--                                </div> --}}

{{--                                --}}{{-- <div class="short-description_home">--}}
{{--                                    <p>--}}
{{--                                        <a href="#">--}}
{{--                                            {{ Str::limit($mainVideo->title, 150) }}--}}
{{--                                        </a>--}}
{{--                                    </p>--}}
{{--                                </div> --}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endif--}}


{{--                    <!-- Right Side Videos -->--}}
{{--                    <div class="lg:col-span-6 col-span-12">--}}
{{--                        <div class="grid grid-cols-12 md:gap-y-4 lg:gap-4 gap-3">--}}

{{--                            @foreach ($sideVideos as $index => $video)--}}
{{--                                <div--}}
{{--                                    class="sm:col-span-6 col-span-6--}}
{{--                    {{ $index % 2 == 0 ? 'border-r lg:pr-4 pr-3 border-stock-color' : '' }}">--}}

{{--                                    <div class="news-card">--}}
{{--                                        <div class="video_thumbnail">--}}
{{--                                            <a--}}
{{--                                                href="{{ route('video_details', ['id' => $video->id, 'slug' => $video->slug]) }}">--}}
{{--                                                <img src="{{ asset('storage') }}/{{ $video->media->thumbnail ?? null }}">--}}
{{--                                            </a>--}}

{{--                                            <a href="{{ route('video_details', ['id' => $video->id, 'slug' => $video->slug]) }}"--}}
{{--                                                class="video-icon-wrap">--}}
{{--                                                <span class="video-icon animate-ripple-blue-vdo">--}}
{{--                                                    <i class="fa-solid fa-play"></i>--}}
{{--                                                </span>--}}
{{--                                            </a>--}}

{{--                                            <span class="video_duration">{{ $video->video_duration }}</span>--}}
{{--                                        </div>--}}

{{--                                        <h1 class="title">--}}
{{--                                            <a--}}
{{--                                                href="{{ route('video_details', ['id' => $video->id, 'slug' => $video->slug]) }}">--}}
{{--                                                {{ Str::limit($video->title, 80) }}--}}
{{--                                            </a>--}}
{{--                                        </h1>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}

{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}



        <!--========Dynamic category wise post====== -->
        {{-- @php
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
        @endisset --}}
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
