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
                                        <a
                                            href="{{ route('news_details', ['id' => $mainPost->id, 'slug' => $mainPost->slug]) }}">
                                            <img class="w-full h-[260px] object-cover"
                                                src="{{ asset('storage/' . ($mainPost->media->image ?? 'default.png')) }}">
                                        </a>
                                    </div>

                                    <h1 class="title title-lg">
                                        <a
                                            href="{{ route('news_details', ['id' => $mainPost->id, 'slug' => $mainPost->slug]) }}">
                                            {{ Str::limit($mainPost->title, 100) }}
                                        </a>
                                    </h1>
                                    <div class="short-description_home">
                                        <p>
                                            <a
                                                href="{{ route('news_details', ['id' => $mainPost->id, 'slug' => $mainPost->slug]) }}">
                                                সরকারের বিভিন্ন ডিজিটাল উদ্যোগ ও বেসরকারি খাতের অংশগ্রহণে দেশ দ্রুত
                                                প্রযুক্তিনির্ভর
                                                অর্থনীতির দিকে এগিয়ে যাচ্ছে। নতুন নতুন স্টার্টআপ ও ইনোভেশন তরুণদের জন্য তৈরি
                                                করছে
                                                সম্ভাবনার নতুন দিগন্ত।
                                            </a>
                                        </p>
                                    </div>

                                </div>
                            </div>
                        @endisset


                        <!-- RIGHT SIDE -->
                        <div class="lg:w-1/2 w-full grid grid-cols-2 gap-4">

                            @foreach ([2, 3, 4, 5] as $order)
                                @php
                                    $post = $header_posts->firstWhere('header_order', $order);
                                @endphp

                                @isset($post)
                                    <div
                                        class="
                        news-card
                        border-stock-color

                        lg:border-r lg:pr-4
                        even:lg:border-r-0
                    ">

                                        <div class="thumbnail">
                                            <a href="{{ route('news_details', ['id' => $post->id, 'slug' => $post->slug]) }}">
                                                <img class="w-full h-[120px] object-cover"
                                                    src="{{ asset('storage/' . ($post->media->thumbnail ?? ($post->media->image ?? 'default.png'))) }}">
                                            </a>
                                        </div>

                                        <h1 class="title text-sm">
                                            <a href="{{ route('news_details', ['id' => $post->id, 'slug' => $post->slug]) }}">
                                                {{ Str::limit($post->title, 70) }}
                                            </a>
                                        </h1>

                                    </div>
                                @endisset
                            @endforeach

                        </div>

                    </div>


                    <!-- BOTTOM GRID -->
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-4">

                        @foreach (range(6, 13) as $order)
                            @php
                                $post = $header_posts->firstWhere('header_order', $order);
                            @endphp

                            @isset($post)
                                <div
                                    class="
                    news-card
                    border-stock-color

                    border-r pr-3
                    even:border-r-0

                    md:border-r md:pr-3
                    md:[&:nth-child(3n)]:border-r-0

                    lg:border-r lg:pr-4
                    lg:[&:nth-child(4n)]:border-r-0
                ">

                                    <div class="thumbnail">
                                        <a href="{{ route('news_details', ['id' => $post->id, 'slug' => $post->slug]) }}">
                                            <img class="w-full h-[120px] object-cover"
                                                src="{{ asset('storage/' . ($post->media->thumbnail ?? ($post->media->image ?? 'default.png'))) }}">
                                        </a>
                                    </div>

                                    <h1 class="title text-sm">
                                        <a href="{{ route('news_details', ['id' => $post->id, 'slug' => $post->slug]) }}">
                                            {{ Str::limit($post->title, 70) }}
                                        </a>
                                    </h1>

                                </div>
                            @endisset
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
                        <a href="http://127.0.0.1:8000/category/jateey" class="section_button !bg-black !text-white">আরও পড়ুন <i
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
                                    <a href="#"><span class="sholder">এম সাখাওয়াত হোসেনের কলাম</span> নতুন
                                        শিক্ষানীতিতে আসছে বড় পরিবর্তন</a>
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
                                        alt="thumbnail">
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
        <!--======== national Section end ====== -->

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
                                        alt="thumbnail">
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

        <!--======== International Section ====== -->
        <section class="international_section section-padding-top">
            <div class="container">
                <div class="section-title-wrap">
                    <h2 class="section-title">আন্তর্জাতিক</h2>
                    <div class="section-button-wrap">
                        <a href="http://127.0.0.1:8000/category/antrjatik" class="section_button">আরও পড়ুন <i
                                class="fa-solid fa-angle-right"></i></a>
                    </div>
                </div>

                <div class="grid grid-cols-12 lg:gap-4 gap-3 border-b pb-4 border-stock-color">
                    <!-- Center Big News -->
                    <div class="lg:col-span-6 col-span-12 lg:border-b-0 border-b lg:pb-0 pb-3 border-stock-color">
                        <div class="news-card">
                            <div class="thumbnail">
                                <a href="#">
                                    <img src="http://127.0.0.1:8000/storage/media_thumbnail/g12mt60RjYydz3u53rE7uDRrnTkfTyG9fKKCYigp.jpg"
                                        alt="thumbnail">
                                </a>
                            </div>

                            <h1 class="lg:text-2xl text-xl font-semibold mt-3 mb-2">
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
                    <div class="lg:col-span-6 col-span-12 order-3 lg:border-l lg:pl-4 border-stock-color">
                        <div class="space-y-4">

                            <!-- Item 1 -->
                            <div class="news-card flex gap-3 border-b pb-3 border-stock-color">
                                <div class="thumbnail w-32 flex-shrink-0">
                                    <a href="#">
                                        <img class="w-full h-20 object-cover"
                                            src="http://127.0.0.1:8000/storage/media_thumbnail/g12mt60RjYydz3u53rE7uDRrnTkfTyG9fKKCYigp.jpg"
                                            alt="News Image">
                                    </a>
                                </div>
                                <h1 class="title !mt-0 flex-1">
                                    <a href="#">নতুন নতুন স্টার্টআপ ও ইনোভেশন তরুণদের জন্য তৈরি করছে সম্ভাবনার নতুন
                                        দিগন্ত। </a>
                                </h1>
                            </div>

                            <!-- Item 2 -->
                            <div class="news-card flex gap-3 border-b pb-3 border-stock-color">
                                <div class="thumbnail w-32 flex-shrink-0">
                                    <a href="#">
                                        <img class="w-full h-20 object-cover"
                                            src="http://127.0.0.1:8000/storage/media_thumbnail/g12mt60RjYydz3u53rE7uDRrnTkfTyG9fKKCYigp.jpg"
                                            alt="News Image">
                                    </a>
                                </div>
                                <h1 class="title !mt-0 flex-1">
                                    <a href="#">নতুন নতুন স্টার্টআপ ও ইনোভেশন তরুণদের জন্য তৈরি করছে সম্ভাবনার নতুন
                                        দিগন্ত। </a>
                                </h1>
                            </div>

                            <!-- Item 3 -->
                            <div class="news-card flex gap-3 border-b pb-3 border-stock-color">
                                <div class="thumbnail w-32 flex-shrink-0">
                                    <a href="#">
                                        <img class="w-full h-20 object-cover"
                                            src="http://127.0.0.1:8000/storage/media_thumbnail/g12mt60RjYydz3u53rE7uDRrnTkfTyG9fKKCYigp.jpg"
                                            alt="News Image">
                                    </a>
                                </div>
                                <h1 class="title !mt-0 flex-1">
                                    <a href="#">নতুন সড়ক প্রকল্পে কমবে যানজট</a>
                                </h1>
                            </div>


                            <!-- Item 4 -->
                            <div class="news-card flex gap-3">
                                <div class="thumbnail w-32 flex-shrink-0">
                                    <a href="#">
                                        <img class="w-full h-20 object-cover"
                                            src="http://127.0.0.1:8000/storage/media_thumbnail/g12mt60RjYydz3u53rE7uDRrnTkfTyG9fKKCYigp.jpg"
                                            alt="News Image">
                                    </a>
                                </div>
                                <h1 class="title !mt-0 flex-1">
                                    <a href="#">সরকারের বিভিন্ন ডিজিটাল উদ্যোগ ও বেসরকারি খাতের অংশগ্রহণে দেশ দ্রুত
                                        প্রযুক্তিনির্ভর অর্থনীতির দিকে এগিয়ে যাচ্ছে।</a>
                                </h1>
                            </div>

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

                            <!-- Item 1 -->
                            <div class="news-card flex gap-3 border-b pb-3 border-stock-color">
                                <h1 class="title !mt-0 flex-1">
                                    <a href="#">নতুন শিক্ষানীতিতে আসছে বড় পরিবর্তন</a>
                                </h1>
                                <div class="thumbnail w-32 flex-shrink-0">
                                    <a href="#">
                                        <img class="w-full h-20 object-cover"
                                            src="http://127.0.0.1:8000/storage/media_thumbnail/1bRUCKsHrSd6aJPxwCNOawEGoeQvjzPoaDuOybLC.jpg"
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
                                            src="http://127.0.0.1:8000/storage/media_thumbnail/1bRUCKsHrSd6aJPxwCNOawEGoeQvjzPoaDuOybLC.jpg"
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
                                            src="http://127.0.0.1:8000/storage/media_thumbnail/1bRUCKsHrSd6aJPxwCNOawEGoeQvjzPoaDuOybLC.jpg"
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
                                    <img src="http://127.0.0.1:8000/storage/media_thumbnail/1bRUCKsHrSd6aJPxwCNOawEGoeQvjzPoaDuOybLC.jpg"
                                        alt="thumbnail">
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
                                            src="http://127.0.0.1:8000/storage/media_thumbnail/1bRUCKsHrSd6aJPxwCNOawEGoeQvjzPoaDuOybLC.jpg"
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
                                            src="http://127.0.0.1:8000/storage/media_thumbnail/1bRUCKsHrSd6aJPxwCNOawEGoeQvjzPoaDuOybLC.jpg"
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
                                            src="http://127.0.0.1:8000/storage/media_thumbnail/1bRUCKsHrSd6aJPxwCNOawEGoeQvjzPoaDuOybLC.jpg"
                                            alt="News Image">
                                    </a>
                                </div>
                            </div>

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
                            <h2 class="section-title"> <a href="http://127.0.0.1:8000/category/opradh">অপরাধ</a></h2>
                        </div>
                        <div class="space-y-4 ">
                            <!-- Item 1 -->
                            <div class="news-card flex gap-3 border-b pb-3 border-stock-color">
                                <div class="thumbnail w-32 flex-shrink-0">
                                    <a href="#">
                                        <img class="w-full h-20 object-cover"
                                            src="http://127.0.0.1:8000/storage/media_thumbnail/g12mt60RjYydz3u53rE7uDRrnTkfTyG9fKKCYigp.jpg"
                                            alt="News Image">
                                    </a>
                                </div>
                                <h1 class="title-sm !mt-0 flex-1">
                                    <a href="#">নতুন নতুন স্টার্টআপ ও ইনোভেশন তরুণদের জন্য তৈরি করছে সম্ভাবনার নতুন
                                        দিগন্ত। </a>
                                </h1>
                            </div>
                            <!-- Item 2 -->
                            <div class="news-card flex gap-3 border-b pb-3 border-stock-color">
                                <div class="thumbnail w-32 flex-shrink-0">
                                    <a href="#">
                                        <img class="w-full h-20 object-cover"
                                            src="http://127.0.0.1:8000/storage/media_thumbnail/g12mt60RjYydz3u53rE7uDRrnTkfTyG9fKKCYigp.jpg"
                                            alt="News Image">
                                    </a>
                                </div>
                                <h1 class="title-sm !mt-0 flex-1">
                                    <a href="#">নতুন নতুন স্টার্টআপ ও ইনোভেশন তরুণদের জন্য তৈরি করছে সম্ভাবনার নতুন
                                        দিগন্ত। </a>
                                </h1>
                            </div>
                            <!-- Item 3 -->
                            <div class="news-card flex gap-3 border-b pb-3 border-stock-color">
                                <div class="thumbnail w-32 flex-shrink-0">
                                    <a href="#">
                                        <img class="w-full h-20 object-cover"
                                            src="http://127.0.0.1:8000/storage/media_thumbnail/g12mt60RjYydz3u53rE7uDRrnTkfTyG9fKKCYigp.jpg"
                                            alt="News Image">
                                    </a>
                                </div>
                                <h1 class="title-sm !mt-0 flex-1">
                                    <a href="#">নতুন নতুন স্টার্টআপ ও ইনোভেশন তরুণদের জন্য তৈরি করছে সম্ভাবনার নতুন
                                        দিগন্ত। </a>
                                </h1>
                            </div>
                            <!-- Item 4 -->
                            <div class="news-card flex gap-3  border-stock-color">
                                <div class="thumbnail w-32 flex-shrink-0">
                                    <a href="#">
                                        <img class="w-full h-20 object-cover"
                                            src="http://127.0.0.1:8000/storage/media_thumbnail/g12mt60RjYydz3u53rE7uDRrnTkfTyG9fKKCYigp.jpg"
                                            alt="News Image">
                                    </a>
                                </div>
                                <h1 class="title-sm !mt-0 flex-1">
                                    <a href="#">নতুন নতুন স্টার্টআপ ও ইনোভেশন তরুণদের জন্য তৈরি করছে সম্ভাবনার নতুন
                                        দিগন্ত। </a>
                                </h1>
                            </div>

                        </div>
                    </div>
                    <div class="lg:col-span-4 col-span-12 ">
                        <div class="section-title-wrap lg:mt-0 md:mt-6 mt-4">
                            <h2 class="section-title"> <a href="http://127.0.0.1:8000/category/ain-adalt">আইন আদালত</a>
                            </h2>
                        </div>
                        <div class="space-y-4 lg:border-l lg:pl-4 border-stock-color">
                            <!-- Item 1 -->
                            <div class="news-card flex gap-3 border-b pb-3 border-stock-color">
                                <div class="thumbnail w-32 flex-shrink-0">
                                    <a href="#">
                                        <img class="w-full h-20 object-cover"
                                            src="http://127.0.0.1:8000/storage/media_thumbnail/g12mt60RjYydz3u53rE7uDRrnTkfTyG9fKKCYigp.jpg"
                                            alt="News Image">
                                    </a>
                                </div>
                                <h1 class="title-sm !mt-0 flex-1">
                                    <a href="#">নতুন নতুন স্টার্টআপ ও ইনোভেশন তরুণদের জন্য তৈরি করছে সম্ভাবনার নতুন
                                        দিগন্ত। </a>
                                </h1>
                            </div>
                            <!-- Item 2 -->
                            <div class="news-card flex gap-3 border-b pb-3 border-stock-color">
                                <div class="thumbnail w-32 flex-shrink-0">
                                    <a href="#">
                                        <img class="w-full h-20 object-cover"
                                            src="http://127.0.0.1:8000/storage/media_thumbnail/g12mt60RjYydz3u53rE7uDRrnTkfTyG9fKKCYigp.jpg"
                                            alt="News Image">
                                    </a>
                                </div>
                                <h1 class="title-sm !mt-0 flex-1">
                                    <a href="#">নতুন নতুন স্টার্টআপ ও ইনোভেশন তরুণদের জন্য তৈরি করছে সম্ভাবনার নতুন
                                        দিগন্ত। </a>
                                </h1>
                            </div>
                            <!-- Item 3 -->
                            <div class="news-card flex gap-3 border-b pb-3 border-stock-color">
                                <div class="thumbnail w-32 flex-shrink-0">
                                    <a href="#">
                                        <img class="w-full h-20 object-cover"
                                            src="http://127.0.0.1:8000/storage/media_thumbnail/g12mt60RjYydz3u53rE7uDRrnTkfTyG9fKKCYigp.jpg"
                                            alt="News Image">
                                    </a>
                                </div>
                                <h1 class="title-sm !mt-0 flex-1">
                                    <a href="#">নতুন নতুন স্টার্টআপ ও ইনোভেশন তরুণদের জন্য তৈরি করছে সম্ভাবনার নতুন
                                        দিগন্ত। </a>
                                </h1>
                            </div>
                            <!-- Item 4 -->
                            <div class="news-card flex gap-3 ">
                                <div class="thumbnail w-32 flex-shrink-0">
                                    <a href="#">
                                        <img class="w-full h-20 object-cover"
                                            src="http://127.0.0.1:8000/storage/media_thumbnail/g12mt60RjYydz3u53rE7uDRrnTkfTyG9fKKCYigp.jpg"
                                            alt="News Image">
                                    </a>
                                </div>
                                <h1 class="title-sm !mt-0 flex-1">
                                    <a href="#">নতুন নতুন স্টার্টআপ ও ইনোভেশন তরুণদের জন্য তৈরি করছে সম্ভাবনার নতুন
                                        দিগন্ত। </a>
                                </h1>
                            </div>

                        </div>
                    </div>
                    <div class="lg:col-span-4 col-span-12 ">
                        <div class="section-title-wrap lg:mt-0 md:mt-6 mt-4">
                            <h2 class="section-title"> <a href="http://127.0.0.1:8000/category/swasthz">স্বাস্থ্য</a></h2>
                        </div>
                        <div class="space-y-4 lg:border-l lg:pl-4 border-stock-color">
                            <!-- Item 1 -->
                            <div class="news-card flex gap-3 border-b pb-3 border-stock-color">
                                <div class="thumbnail w-32 flex-shrink-0">
                                    <a href="#">
                                        <img class="w-full h-20 object-cover"
                                            src="http://127.0.0.1:8000/storage/media_thumbnail/g12mt60RjYydz3u53rE7uDRrnTkfTyG9fKKCYigp.jpg"
                                            alt="News Image">
                                    </a>
                                </div>
                                <h1 class="title-sm !mt-0 flex-1">
                                    <a href="#">নতুন নতুন স্টার্টআপ ও ইনোভেশন তরুণদের জন্য তৈরি করছে সম্ভাবনার নতুন
                                        দিগন্ত। </a>
                                </h1>
                            </div>
                            <!-- Item 2 -->
                            <div class="news-card flex gap-3 border-b pb-3 border-stock-color">
                                <div class="thumbnail w-32 flex-shrink-0">
                                    <a href="#">
                                        <img class="w-full h-20 object-cover"
                                            src="http://127.0.0.1:8000/storage/media_thumbnail/g12mt60RjYydz3u53rE7uDRrnTkfTyG9fKKCYigp.jpg"
                                            alt="News Image">
                                    </a>
                                </div>
                                <h1 class="title-sm !mt-0 flex-1">
                                    <a href="#">নতুন নতুন স্টার্টআপ ও ইনোভেশন তরুণদের জন্য তৈরি করছে সম্ভাবনার নতুন
                                        দিগন্ত। </a>
                                </h1>
                            </div>
                            <!-- Item 3 -->
                            <div class="news-card flex gap-3 border-b pb-3 border-stock-color">
                                <div class="thumbnail w-32 flex-shrink-0">
                                    <a href="#">
                                        <img class="w-full h-20 object-cover"
                                            src="http://127.0.0.1:8000/storage/media_thumbnail/g12mt60RjYydz3u53rE7uDRrnTkfTyG9fKKCYigp.jpg"
                                            alt="News Image">
                                    </a>
                                </div>
                                <h1 class="title-sm !mt-0 flex-1">
                                    <a href="#">নতুন নতুন স্টার্টআপ ও ইনোভেশন তরুণদের জন্য তৈরি করছে সম্ভাবনার নতুন
                                        দিগন্ত। </a>
                                </h1>
                            </div>
                            <!-- Item 4 -->
                            <div class="news-card flex gap-3">
                                <div class="thumbnail w-32 flex-shrink-0">
                                    <a href="#">
                                        <img class="w-full h-20 object-cover"
                                            src="http://127.0.0.1:8000/storage/media_thumbnail/g12mt60RjYydz3u53rE7uDRrnTkfTyG9fKKCYigp.jpg"
                                            alt="News Image">
                                    </a>
                                </div>
                                <h1 class="title-sm !mt-0 flex-1">
                                    <a href="#">নতুন নতুন স্টার্টআপ ও ইনোভেশন তরুণদের জন্য তৈরি করছে সম্ভাবনার নতুন
                                        দিগন্ত। </a>
                                </h1>
                            </div>

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
                                <a href="http://127.0.0.1:8000/category/sarades" class="section_button">আরও পড়ুন <i
                                        class="fa-solid fa-angle-right"></i></a>
                            </div>
                        </div>
                        <div class="news-card">
                            <div class="thumbnail">
                                <a href="#">
                                    <img src="http://127.0.0.1:8000/storage/media_thumbnail/ubRJHEndob5DqhAz37oQAyvzqj3m6TSUsVOVguUs.jpg"
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
                                    <li class="sidebar-item">
                                        <span>১</span><a
                                            href="https://thedhakadiary.com/news/16387/dhabite-hadir-grafiti-muche-deway-smalocnar-mukhe-chatrdl"
                                            class="sidebar-link">ঢাবিতে হাদির গ্রাফিতি মুছে দেওয়ায় সমালোচনার মুখে ছ...</a>
                                    </li>
                                    <li class="sidebar-item">
                                        <span>২</span><a
                                            href="https://thedhakadiary.com/news/16386/zuktrajze-asrye-bangladesish-bivinn-ovibaseeder-smkamee-seje-thakar-pramrs"
                                            class="sidebar-link">যুক্তরাজ্যে আশ্রয়ে বাংলাদেশিসহ বিভিন্ন অভিবাসীদের...</a>
                                    </li>
                                    <li class="sidebar-item">
                                        <span>৩</span><a
                                            href="https://thedhakadiary.com/news/16385/rased-prdhan-limit-krs-kre-bktbz-dicche-rased-khannn"
                                            class="sidebar-link">রাশেদ প্রধান লিমিট ক্রস করে বক্তব্য দিচ্ছে: রাশেদ...</a>
                                    </li>
                                    <li class="sidebar-item">
                                        <span>৪</span><a
                                            href="https://thedhakadiary.com/news/16384/iran-zuktrashtr-zuddh-kee-ghtte-zacche-smvabz-carti-drriszpt"
                                            class="sidebar-link">ইরান-যুক্তরাষ্ট্র যুদ্ধ: কী ঘটতে যাচ্ছে— সম্ভাব্য...</a>
                                    </li>
                                    <li class="sidebar-item">
                                        <span>৫</span><a
                                            href="https://thedhakadiary.com/news/16383/smartfon-bzbhare-barche-agam-bardhkz-blche-gbeshna"
                                            class="sidebar-link">স্মার্টফোন ব্যবহারে বাড়ছে ‘আগাম বার্ধক্য’, বলছে গব...</a>
                                    </li>
                                    <li class="sidebar-item">
                                        <span>৫</span><a
                                            href="https://thedhakadiary.com/news/16383/smartfon-bzbhare-barche-agam-bardhkz-blche-gbeshna"
                                            class="sidebar-link">স্মার্টফোন ব্যবহারে বাড়ছে ‘আগাম বার্ধক্য’, বলছে গব...</a>
                                    </li>
                                    <li class="sidebar-item">
                                        <span>৫</span><a
                                            href="https://thedhakadiary.com/news/16383/smartfon-bzbhare-barche-agam-bardhkz-blche-gbeshna"
                                            class="sidebar-link">স্মার্টফোন ব্যবহারে বাড়ছে ‘আগাম বার্ধক্য’, বলছে গব...</a>
                                    </li>                                     
                                </ul>
                                <a href="https://thedhakadiary.com/last_published" class="read-more-btn">আরও পড়ুন <i class="fa-solid fa-angle-right"></i></a>
                            </div>

                            <!-- সর্বাধিক পঠিত Tab -->
                            <div id="popular" class="tab-content flex flex-col justify-between hidden">
                                <ul  class="md:space-y-6 space-y-4 ">
                                    <li class="sidebar-item">
                                        <span>১</span><a
                                            href="https://thedhakadiary.com/news/9324/oosman-hadi-vai-amar-ekjnme-dekha-sbce-sacca-biplbee"
                                            class="sidebar-link">ওসমান হাদি ভাই: আমার একজনমে দেখা সবচে সাচ্চা বিপ্...</a>
                                    </li>
                                    <li class="sidebar-item">
                                        <span>২</span><a
                                            href="https://thedhakadiary.com/news/11791/dhaka-8-asn-55-kendrer-flafl-prkas"
                                            class="sidebar-link">ঢাকা-৮ আসন : ৫৫ কেন্দ্রের ফলাফল প্রকাশ</a>
                                    </li>
                                    <li class="sidebar-item">
                                        <span>৩</span><a
                                            href="https://thedhakadiary.com/news/11064/sibir-netader-ekzoge-dhr-salare-post-nepthze-kee"
                                            class="sidebar-link">শিবির নেতাদের একযোগে ‘ধর শালারে’ পোস্ট; নেপথ্যে কী...</a>
                                    </li>
                                    <li class="sidebar-item">
                                        <span>৪</span><a
                                            href="https://thedhakadiary.com/news/7482/kzantin-rakhte-dui-lakh-taka-dabir-ovizog-dhabir-sufiya-kamal-hl-sngsder-vipir-biruddhe"
                                            class="sidebar-link">ক্যান্টিন রাখতে দুই লাখ টাকা দাবির অভিযোগ ঢাবির সু...</a>
                                    </li>
                                    <li class="sidebar-item">
                                        <span>৫</span><a
                                            href="https://thedhakadiary.com/news/10720/zsorer-jhikrgachay-voter-prcarnakale-jamayater-naree-netreeder-oopr-zubdler-hamla"
                                            class="sidebar-link">যশোরের ঝিকরগাছায় ভোটের প্রচারণাকালে জামায়াতের নারী...</a>
                                    </li> 
                                </ul>
                                <a href="https://thedhakadiary.com/most_read" class="read-more-btn">আরও পড়ুন <i class="fa-solid fa-angle-right"></i></a>
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
                        <a href="http://127.0.0.1:8000/category/mtamt-2" class="section_button bg-black">আরও পড়ুন <i
                                class="fa-solid fa-angle-right"></i></a>
                    </div>
                </div>
                <div class="grid grid-cols-12 gap-6 border-b-0 pb-4 border-stock-color">

                    <!-- Left Featured Card -->
                    <div class="lg:col-span-4 col-span-12">

                        <div class="featured-card p-6 border border-gray-300">

                            <h2 class="featured-title">
                                <a href="#">
                                    <span class="sholder">এম সাখাওয়াত হোসেনের কলাম</span> ইরানে যুক্তরাষ্ট্রের একতরফা
                                    আধিপত্য হারানোর যুদ্ধ
                                </a>
                            </h2>

                            <p class="featured-desc">
                                এই যুদ্ধে ইসরায়েলের উদ্দেশ্য হলো ইরানকে দুর্বল করা। ইরানে অনুগত শাসকরা ফিরলে তাদের বৃহত্তর
                                ইসরায়েলের স্বপ্ন বাস্তবায়ন সম্ভব।
                            </p>

                            <div class="author flex items-center mt-6">
                                <img src="{{ asset('frontend/assets/image/M_Shawkhat_Hossain.webp') }}"
                                    class="w-14 h-14 rounded-full" alt="thumbnail">
                                <div class="ml-3">
                                    <p class="name">এম সাখাওয়াত হোসেন</p>
                                    <p class="designation text-sm text-gray-500">নির্বাচন বিশ্লেষক, সাবেক সামরিক কর্মকর্তা
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Right List -->
                    <div class="lg:col-span-8 col-span-12">
                        <div class="md:space-y-6 space-y-4">

                            <!-- Item -->
                            <div class="opinion-item flex items-start gap-4">
                                <div>
                                    <div class="icon">
                                        <img src="{{ asset('frontend/assets/image/M_Shawkhat_Hossain.webp') }}"
                                            class="w-14 h-14 rounded-full" alt="thumbnail">
                                    </div>
                                </div>
                                <div>
                                    <h3 class="title">
                                        <a href="#">
                                            <span class="sholder">মতামত</span> ট্রাম্প যে কায়দায় নতুন ‘ভূরাজনীতি’ তৈরির
                                            চেষ্টা চালাতে পারেন
                                        </a>
                                    </h3>
                                    <p class="author-name">লেখা: বিশ্লেষক</p>
                                </div>
                            </div>

                            <div class="opinion-item flex items-start gap-4">
                                <div>
                                    <div class="icon">
                                        <img src="{{ asset('frontend/assets/image/M_Shawkhat_Hossain.webp') }}"
                                            class="w-14 h-14 rounded-full" alt="thumbnail">
                                    </div>
                                </div>
                                <div>
                                    <h3 class="title">
                                        <a href="#">
                                            <span class="sholder">মতামত</span> এপ্রিলে ফিল আমাদের আসলে কী শেখাল
                                        </a>
                                    </h3>
                                    <p class="author-name">লেখা: ইমরান কবির</p>
                                </div>
                            </div>

                            <div class="opinion-item flex items-start gap-4">
                                <div>
                                    <div class="icon">
                                        <img src="{{ asset('frontend/assets/image/M_Shawkhat_Hossain.webp') }}"
                                            class="w-14 h-14 rounded-full" alt="thumbnail">
                                    </div>
                                </div>
                                <div>
                                    <h3 class="title">
                                        <a href="#">
                                            <span class="sholder">হাসান ফেরদৌসের কলাম</span> কেমন গেল মেয়র মামুনের প্রথম
                                            ১০০ দিন
                                        </a>
                                    </h3>
                                    <p class="author-name">হাসান ফেরদৌস</p>
                                </div>
                            </div>

                            <div class="opinion-item flex items-start gap-4">
                                <div>
                                    <div class="icon">
                                        <img src="{{ asset('frontend/assets/image/M_Shawkhat_Hossain.webp') }}"
                                            class="w-14 h-14 rounded-full" alt="thumbnail">
                                    </div>
                                </div>
                                <div>
                                    <h3 class="title">
                                        <a href="#">
                                            <span class="sholder">মতামত</span> পূর্ব ও মধ্য ইউরোপ: বাংলাদেশি অভিবাসনের নতুন
                                            করিডর
                                        </a>
                                    </h3>
                                    <p class="author-name">লেখা: আলাপ আলোচনা</p>
                                </div>
                            </div>

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
                            <h2 class="section-title"> <a href="http://127.0.0.1:8000/category/sakshattkar">সাক্ষাৎকার</a>
                            </h2>
                        </div>
                        <div class="space-y-4 ">
                            <!-- Item 1 -->
                            <div class="news-card border-b pb-3 border-stock-color">
                                <div class="thumbnail">
                                    <img
                                        src="http://127.0.0.1:8000/storage/media_thumbnail/IEnxf9OEwNkR27ONRycAS0ngO0NHleV0TJgac3Sl.jpg">
                                </div>
                                <h1 class="title">
                                    <a href="#">ঢাকায় স্টার্টআপ ইকোসিস্টেম দ্রুত বৃদ্ধি পাচ্ছে</a>
                                </h1>
                            </div>
                            <!-- Item 2 -->
                            <div class="news-card border-b pb-3 border-stock-color">

                                <h1 class="title !my-0 flex-1">
                                    <a href="#">নতুন নতুন স্টার্টআপ ও ইনোভেশন তরুণদের জন্য তৈরি করছে সম্ভাবনার নতুন
                                        দিগন্ত। </a>
                                </h1>
                            </div>
                            <!-- Item 3 -->
                            <div class="news-card border-b pb-3 border-stock-color">

                                <h1 class="title !my-0 flex-1">
                                    <a href="#">নতুন নতুন স্টার্টআপ ও ইনোভেশন তরুণদের জন্য তৈরি করছে সম্ভাবনার নতুন
                                        দিগন্ত। </a>
                                </h1>
                            </div>
                            <!-- Item 4 -->
                            <div class="news-card border-b-0 pb-3 border-stock-color">

                                <h1 class="title !my-0 flex-1">
                                    <a href="#">নতুন নতুন স্টার্টআপ ও ইনোভেশন তরুণদের জন্য তৈরি করছে সম্ভাবনার নতুন
                                        দিগন্ত। </a>
                                </h1>
                            </div>
                        </div>
                    </div>
                    <div class="xl:col-span-3 md:col-span-6 col-span-12 ">
                        <div class="section-title-wrap lg:mt-0 md:mt-6 mt-4">
                            <h2 class="section-title"> <a href="http://127.0.0.1:8000/category/sahitz">সাহিত্য</a></h2>
                        </div>
                        <div class="space-y-4 ">
                            <!-- Item 1 -->
                            <div class="news-card border-b pb-3 border-stock-color">
                                <div class="thumbnail">
                                    <img
                                        src="http://127.0.0.1:8000/storage/media_thumbnail/IEnxf9OEwNkR27ONRycAS0ngO0NHleV0TJgac3Sl.jpg">
                                </div>
                                <h1 class="title">
                                    <a href="#">ঢাকায় স্টার্টআপ ইকোসিস্টেম দ্রুত বৃদ্ধি পাচ্ছে</a>
                                </h1>
                            </div>
                            <!-- Item 2 -->
                            <div class="news-card border-b pb-3 border-stock-color">

                                <h1 class="title !my-0 flex-1">
                                    <a href="#">নতুন নতুন স্টার্টআপ ও ইনোভেশন তরুণদের জন্য তৈরি করছে সম্ভাবনার নতুন
                                        দিগন্ত। </a>
                                </h1>
                            </div>
                            <!-- Item 3 -->
                            <div class="news-card border-b pb-3 border-stock-color">

                                <h1 class="title !my-0 flex-1">
                                    <a href="#">নতুন নতুন স্টার্টআপ ও ইনোভেশন তরুণদের জন্য তৈরি করছে সম্ভাবনার নতুন
                                        দিগন্ত। </a>
                                </h1>
                            </div>
                            <!-- Item 4 -->
                            <div class="news-card border-b-0 pb-3 border-stock-color">

                                <h1 class="title !my-0 flex-1">
                                    <a href="#">নতুন নতুন স্টার্টআপ ও ইনোভেশন তরুণদের জন্য তৈরি করছে সম্ভাবনার নতুন
                                        দিগন্ত। </a>
                                </h1>
                            </div>
                        </div>
                    </div>
                    <div class="xl:col-span-3 md:col-span-6 col-span-12 ">
                        <div class="section-title-wrap lg:mt-0 md:mt-6 mt-4">
                            <h2 class="section-title"> <a href="http://127.0.0.1:8000/category/ficar">ফিচার</a></h2>
                        </div>
                        <div class="space-y-4 ">
                            <!-- Item 1 -->
                            <div class="news-card border-b pb-3 border-stock-color">
                                <div class="thumbnail">
                                    <img
                                        src="http://127.0.0.1:8000/storage/media_thumbnail/IEnxf9OEwNkR27ONRycAS0ngO0NHleV0TJgac3Sl.jpg">
                                </div>
                                <h1 class="title">
                                    <a href="#">ঢাকায় স্টার্টআপ ইকোসিস্টেম দ্রুত বৃদ্ধি পাচ্ছে</a>
                                </h1>
                            </div>
                            <!-- Item 2 -->
                            <div class="news-card border-b pb-3 border-stock-color">

                                <h1 class="title !my-0 flex-1">
                                    <a href="#">নতুন নতুন স্টার্টআপ ও ইনোভেশন তরুণদের জন্য তৈরি করছে সম্ভাবনার নতুন
                                        দিগন্ত। </a>
                                </h1>
                            </div>
                            <!-- Item 3 -->
                            <div class="news-card border-b pb-3 border-stock-color">

                                <h1 class="title !my-0 flex-1">
                                    <a href="#">নতুন নতুন স্টার্টআপ ও ইনোভেশন তরুণদের জন্য তৈরি করছে সম্ভাবনার নতুন
                                        দিগন্ত। </a>
                                </h1>
                            </div>
                            <!-- Item 4 -->
                            <div class="news-card border-b-0 pb-3 border-stock-color">

                                <h1 class="title !my-0 flex-1">
                                    <a href="#">নতুন নতুন স্টার্টআপ ও ইনোভেশন তরুণদের জন্য তৈরি করছে সম্ভাবনার নতুন
                                        দিগন্ত। </a>
                                </h1>
                            </div>
                        </div>
                    </div>
                    <div class="xl:col-span-3 md:col-span-6 col-span-12 ">
                        <div class="section-title-wrap lg:mt-0 md:mt-6 mt-4">
                            <h2 class="section-title"> <a href="http://127.0.0.1:8000/category/dhrm">ধর্ম</a></h2>
                        </div>
                        <div class="space-y-4 ">
                            <!-- Item 1 -->
                            <div class="news-card border-b pb-3 border-stock-color">
                                <div class="thumbnail">
                                    <img
                                        src="http://127.0.0.1:8000/storage/media_thumbnail/IEnxf9OEwNkR27ONRycAS0ngO0NHleV0TJgac3Sl.jpg">
                                </div>
                                <h1 class="title">
                                    <a href="#">ঢাকায় স্টার্টআপ ইকোসিস্টেম দ্রুত বৃদ্ধি পাচ্ছে</a>
                                </h1>
                            </div>
                            <!-- Item 2 -->
                            <div class="news-card border-b pb-3 border-stock-color">

                                <h1 class="title !my-0 flex-1">
                                    <a href="#">নতুন নতুন স্টার্টআপ ও ইনোভেশন তরুণদের জন্য তৈরি করছে সম্ভাবনার নতুন
                                        দিগন্ত। </a>
                                </h1>
                            </div>
                            <!-- Item 3 -->
                            <div class="news-card border-b pb-3 border-stock-color">

                                <h1 class="title !my-0 flex-1">
                                    <a href="#">নতুন নতুন স্টার্টআপ ও ইনোভেশন তরুণদের জন্য তৈরি করছে সম্ভাবনার নতুন
                                        দিগন্ত। </a>
                                </h1>
                            </div>
                            <!-- Item 4 -->
                            <div class="news-card border-b-0 pb-3 border-stock-color">

                                <h1 class="title !my-0 flex-1">
                                    <a href="#">নতুন নতুন স্টার্টআপ ও ইনোভেশন তরুণদের জন্য তৈরি করছে সম্ভাবনার নতুন
                                        দিগন্ত। </a>
                                </h1>
                            </div>
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
                            <h2 class="section-title"> <a href="http://127.0.0.1:8000/category/orthneeti">অর্থনীতি</a>
                            </h2>
                        </div>
                        <div class="space-y-4 ">
                            <!-- Item 1 -->
                            <div class="news-card border-b pb-3 border-stock-color">
                                <div class="thumbnail">
                                    <img
                                        src="http://127.0.0.1:8000/storage/media_thumbnail/IEnxf9OEwNkR27ONRycAS0ngO0NHleV0TJgac3Sl.jpg">
                                </div>
                                <h1 class="title">
                                    <a href="#">ঢাকায় স্টার্টআপ ইকোসিস্টেম দ্রুত বৃদ্ধি পাচ্ছে</a>
                                </h1>
                            </div>
                            <!-- Item 2 -->
                            <div class="news-card border-b pb-3 border-stock-color">

                                <h1 class="title !my-0 flex-1">
                                    <a href="#">নতুন নতুন স্টার্টআপ ও ইনোভেশন তরুণদের জন্য তৈরি করছে সম্ভাবনার নতুন
                                        দিগন্ত। </a>
                                </h1>
                            </div>
                            <!-- Item 3 -->
                            <div class="news-card border-b pb-3 border-stock-color">

                                <h1 class="title !my-0 flex-1">
                                    <a href="#">নতুন নতুন স্টার্টআপ ও ইনোভেশন তরুণদের জন্য তৈরি করছে সম্ভাবনার নতুন
                                        দিগন্ত। </a>
                                </h1>
                            </div>
                            <!-- Item 4 -->
                            <div class="news-card border-b-0 pb-3 border-stock-color">

                                <h1 class="title !my-0 flex-1">
                                    <a href="#">নতুন নতুন স্টার্টআপ ও ইনোভেশন তরুণদের জন্য তৈরি করছে সম্ভাবনার নতুন
                                        দিগন্ত। </a>
                                </h1>
                            </div>
                        </div>
                    </div>
                    <div class="xl:col-span-3 md:col-span-6 col-span-12 ">
                        <div class="section-title-wrap lg:mt-0 md:mt-6 mt-4">
                            <h2 class="section-title"> <a
                                    href="http://127.0.0.1:8000/category/abhawa-oo-pribes">পরিবেশ</a></h2>
                        </div>
                        <div class="space-y-4 ">
                            <!-- Item 1 -->
                            <div class="news-card border-b pb-3 border-stock-color">
                                <div class="thumbnail">
                                    <img
                                        src="http://127.0.0.1:8000/storage/media_thumbnail/IEnxf9OEwNkR27ONRycAS0ngO0NHleV0TJgac3Sl.jpg">
                                </div>
                                <h1 class="title">
                                    <a href="#">ঢাকায় স্টার্টআপ ইকোসিস্টেম দ্রুত বৃদ্ধি পাচ্ছে</a>
                                </h1>
                            </div>
                            <!-- Item 2 -->
                            <div class="news-card border-b pb-3 border-stock-color">

                                <h1 class="title !my-0 flex-1">
                                    <a href="#">নতুন নতুন স্টার্টআপ ও ইনোভেশন তরুণদের জন্য তৈরি করছে সম্ভাবনার নতুন
                                        দিগন্ত। </a>
                                </h1>
                            </div>
                            <!-- Item 3 -->
                            <div class="news-card border-b pb-3 border-stock-color">

                                <h1 class="title !my-0 flex-1">
                                    <a href="#">নতুন নতুন স্টার্টআপ ও ইনোভেশন তরুণদের জন্য তৈরি করছে সম্ভাবনার নতুন
                                        দিগন্ত। </a>
                                </h1>
                            </div>
                            <!-- Item 4 -->
                            <div class="news-card border-b-0 pb-3 border-stock-color">

                                <h1 class="title !my-0 flex-1">
                                    <a href="#">নতুন নতুন স্টার্টআপ ও ইনোভেশন তরুণদের জন্য তৈরি করছে সম্ভাবনার নতুন
                                        দিগন্ত। </a>
                                </h1>
                            </div>
                        </div>
                    </div>
                    <div class="xl:col-span-3 md:col-span-6 col-span-12 ">
                        <div class="section-title-wrap lg:mt-0 md:mt-6 mt-4">
                            <h2 class="section-title"> <a href="http://127.0.0.1:8000/category/binodn">বিনোদন</a></h2>
                        </div>
                        <div class="space-y-4 ">
                            <!-- Item 1 -->
                            <div class="news-card border-b pb-3 border-stock-color">
                                <div class="thumbnail">
                                    <img
                                        src="http://127.0.0.1:8000/storage/media_thumbnail/IEnxf9OEwNkR27ONRycAS0ngO0NHleV0TJgac3Sl.jpg">
                                </div>
                                <h1 class="title">
                                    <a href="#">ঢাকায় স্টার্টআপ ইকোসিস্টেম দ্রুত বৃদ্ধি পাচ্ছে</a>
                                </h1>
                            </div>
                            <!-- Item 2 -->
                            <div class="news-card border-b pb-3 border-stock-color">

                                <h1 class="title !my-0 flex-1">
                                    <a href="#">নতুন নতুন স্টার্টআপ ও ইনোভেশন তরুণদের জন্য তৈরি করছে সম্ভাবনার নতুন
                                        দিগন্ত। </a>
                                </h1>
                            </div>
                            <!-- Item 3 -->
                            <div class="news-card border-b pb-3 border-stock-color">

                                <h1 class="title !my-0 flex-1">
                                    <a href="#">নতুন নতুন স্টার্টআপ ও ইনোভেশন তরুণদের জন্য তৈরি করছে সম্ভাবনার নতুন
                                        দিগন্ত। </a>
                                </h1>
                            </div>
                            <!-- Item 4 -->
                            <div class="news-card border-b-0 pb-3 border-stock-color">

                                <h1 class="title !my-0 flex-1">
                                    <a href="#">নতুন নতুন স্টার্টআপ ও ইনোভেশন তরুণদের জন্য তৈরি করছে সম্ভাবনার নতুন
                                        দিগন্ত। </a>
                                </h1>
                            </div>
                        </div>
                    </div>
                    <div class="xl:col-span-3 md:col-span-6 col-span-12 ">
                        <div class="section-title-wrap lg:mt-0 md:mt-6 mt-4">
                            <h2 class="section-title"> <a href="http://127.0.0.1:8000/category/cakrir-khbr">চাকরির খবর</a>
                            </h2>
                        </div>
                        <div class="space-y-4 ">
                            <!-- Item 1 -->
                            <div class="news-card border-b pb-3 border-stock-color">
                                <div class="thumbnail">
                                    <img
                                        src="http://127.0.0.1:8000/storage/media_thumbnail/IEnxf9OEwNkR27ONRycAS0ngO0NHleV0TJgac3Sl.jpg">
                                </div>
                                <h1 class="title">
                                    <a href="#">ঢাকায় স্টার্টআপ ইকোসিস্টেম দ্রুত বৃদ্ধি পাচ্ছে</a>
                                </h1>
                            </div>
                            <!-- Item 2 -->
                            <div class="news-card border-b pb-3 border-stock-color">

                                <h1 class="title !my-0 flex-1">
                                    <a href="#">নতুন নতুন স্টার্টআপ ও ইনোভেশন তরুণদের জন্য তৈরি করছে সম্ভাবনার নতুন
                                        দিগন্ত। </a>
                                </h1>
                            </div>
                            <!-- Item 3 -->
                            <div class="news-card border-b pb-3 border-stock-color">

                                <h1 class="title !my-0 flex-1">
                                    <a href="#">নতুন নতুন স্টার্টআপ ও ইনোভেশন তরুণদের জন্য তৈরি করছে সম্ভাবনার নতুন
                                        দিগন্ত। </a>
                                </h1>
                            </div>
                            <!-- Item 4 -->
                            <div class="news-card border-b-0 pb-3 border-stock-color">

                                <h1 class="title !my-0 flex-1">
                                    <a href="#">নতুন নতুন স্টার্টআপ ও ইনোভেশন তরুণদের জন্য তৈরি করছে সম্ভাবনার নতুন
                                        দিগন্ত। </a>
                                </h1>
                            </div>
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
                                <a href="http://127.0.0.1:8000/category/fzaktcek" class="section_button">আরও পড়ুন <i
                                        class="fa-solid fa-angle-right"></i></a>
                            </div>
                        </div>

                        <div class="grid grid-cols-12 lg:gap-4 gap-3 ">
                            <!-- Center Big News -->
                            <div class="md:col-span-6 col-span-12 md:border-b-0 border-b md:pb-0 pb-3 border-stock-color">
                                <div class="news-card">
                                    <div class="thumbnail">
                                        <a href="#">
                                            <img src="http://127.0.0.1:8000/storage/media_thumbnail/g12mt60RjYydz3u53rE7uDRrnTkfTyG9fKKCYigp.jpg"
                                                alt="thumbnail">
                                        </a>
                                    </div>

                                    <h1 class="lg:text-2xl text-xl font-semibold mt-3 mb-2">
                                        <a href="#">
                                            ডিজিটাল বাংলাদেশের পথে আরেক ধাপ এগিয়ে দেশ
                                        </a>
                                    </h1>

                                    <div class="short-description_home">
                                        <p>
                                            <a href="#">
                                                সরকারের বিভিন্ন ডিজিটাল উদ্যোগ ও বেসরকারি খাতের অংশগ্রহণে দেশ দ্রুত
                                                প্রযুক্তিনির্ভর
                                                অর্থনীতির দিকে এগিয়ে যাচ্ছে। নতুন নতুন স্টার্টআপ ও ইনোভেশন তরুণদের জন্য তৈরি
                                                করছে
                                                সম্ভাবনার নতুন দিগন্ত।
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Side (3 items) -->
                            <div class="md:col-span-6 col-span-12 order-3 lg:border-l lg:pl-4 border-stock-color">
                                <div class="space-y-4">
                                    <!-- Item 1 -->
                                    <div class="news-card border-b pb-3 border-stock-color">
                                        <h1 class="title-sm !my-0 flex-1">
                                            <a href="#">নতুন নতুন স্টার্টআপ ও ইনোভেশন তরুণদের জন্য তৈরি করছে
                                                সম্ভাবনার নতুন
                                                দিগন্ত। </a>
                                        </h1>
                                    </div>
                                    <!-- Item 1 -->
                                    <div class="news-card border-b pb-3 border-stock-color">
                                        <h1 class="title-sm !my-0 flex-1">
                                            <a href="#">নতুন নতুন স্টার্টআপ ও ইনোভেশন তরুণদের জন্য তৈরি করছে
                                                সম্ভাবনার নতুন
                                                দিগন্ত। </a>
                                        </h1>
                                    </div>
                                    <!-- Item 1 -->
                                    <div class="news-card border-b pb-3 border-stock-color">
                                        <h1 class="title-sm !my-0 flex-1">
                                            <a href="#">নতুন নতুন স্টার্টআপ ও ইনোভেশন তরুণদের জন্য তৈরি করছে
                                                সম্ভাবনার নতুন
                                                দিগন্ত। </a>
                                        </h1>
                                    </div>
                                    <!-- Item 1 -->
                                    <div class="news-card border-b-0 pb-3 border-stock-color">
                                        <h1 class="title-sm !my-0 flex-1">
                                            <a href="#">নতুন নতুন স্টার্টআপ ও ইনোভেশন তরুণদের জন্য তৈরি করছে
                                                সম্ভাবনার নতুন
                                                দিগন্ত। </a>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="xl:col-span-6 col-span-12 lg:border-b-0 border-b lg:pb-0 pb-3 border-stock-color">
                        <div class="section-title-wrap">
                            <h2 class="section-title">প্রতিবাদলিপি </h2>
                            <div class="section-button-wrap">
                                <a href="http://127.0.0.1:8000/category/prtibadlipi-oo-sngsodhnee"
                                    class="section_button">আরও পড়ুন <i class="fa-solid fa-angle-right"></i></a>
                            </div>
                        </div>

                        <div class="grid grid-cols-12 lg:gap-4 gap-3 ">
                            <!-- Center Big News -->
                            <div class="md:col-span-6 col-span-12 md:border-b-0 border-b md:pb-0 pb-3 border-stock-color">
                                <div class="news-card">
                                    <div class="thumbnail">
                                        <a href="#">
                                            <img src="http://127.0.0.1:8000/storage/media_thumbnail/g12mt60RjYydz3u53rE7uDRrnTkfTyG9fKKCYigp.jpg"
                                                alt="thumbnail">
                                        </a>
                                    </div>

                                    <h1 class="lg:text-2xl text-xl font-semibold mt-3 mb-2">
                                        <a href="#">
                                            ডিজিটাল বাংলাদেশের পথে আরেক ধাপ এগিয়ে দেশ
                                        </a>
                                    </h1>

                                    <div class="short-description_home">
                                        <p>
                                            <a href="#">
                                                সরকারের বিভিন্ন ডিজিটাল উদ্যোগ ও বেসরকারি খাতের অংশগ্রহণে দেশ দ্রুত
                                                প্রযুক্তিনির্ভর
                                                অর্থনীতির দিকে এগিয়ে যাচ্ছে। নতুন নতুন স্টার্টআপ ও ইনোভেশন তরুণদের জন্য তৈরি
                                                করছে
                                                সম্ভাবনার নতুন দিগন্ত।
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Side (3 items) -->
                            <div class="md:col-span-6 col-span-12 order-3 lg:border-l lg:pl-4 border-stock-color">
                                <div class="space-y-4">
                                    <!-- Item 1 -->
                                    <div class="news-card border-b pb-3 border-stock-color">
                                        <h1 class="title-sm !my-0 flex-1">
                                            <a href="#">নতুন নতুন স্টার্টআপ ও ইনোভেশন তরুণদের জন্য তৈরি করছে
                                                সম্ভাবনার নতুন
                                                দিগন্ত। </a>
                                        </h1>
                                    </div>
                                    <!-- Item 1 -->
                                    <div class="news-card border-b pb-3 border-stock-color">
                                        <h1 class="title-sm !my-0 flex-1">
                                            <a href="#">নতুন নতুন স্টার্টআপ ও ইনোভেশন তরুণদের জন্য তৈরি করছে
                                                সম্ভাবনার নতুন
                                                দিগন্ত। </a>
                                        </h1>
                                    </div>
                                    <!-- Item 1 -->
                                    <div class="news-card border-b pb-3 border-stock-color">
                                        <h1 class="title-sm !my-0 flex-1">
                                            <a href="#">নতুন নতুন স্টার্টআপ ও ইনোভেশন তরুণদের জন্য তৈরি করছে
                                                সম্ভাবনার নতুন
                                                দিগন্ত। </a>
                                        </h1>
                                    </div>
                                    <!-- Item 1 -->
                                    <div class="news-card border-b-0 pb-3 border-stock-color">
                                        <h1 class="title-sm !my-0 flex-1">
                                            <a href="#">নতুন নতুন স্টার্টআপ ও ইনোভেশন তরুণদের জন্য তৈরি করছে
                                                সম্ভাবনার নতুন
                                                দিগন্ত। </a>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section>
        <!--======== International Section end ====== -->

        <!--=========Video_Section=========== -->
        <section class="video_section section_short-padding {{ $videos->count() == 0 ? 'hidden' : '' }}">
            <div class="container border-t pt-6 border-stock-color">
                <div class="section-title-wrap">
                    <h2 class="section-title">{{ __('lang.video') }}</h2>
                    <div class="section-button-wrap">
                        <a href="{{ route('videos') }}" class="section_button">{{ __('lang.see_more') }} <i
                                class="fa-solid fa-angle-right"></i></a>
                    </div>
                </div>
                <div class="grid grid-cols-12 md:gap-6 gap-4 border-b pb-4 border-stock-color">

                    @php
                        $mainVideo = $videos->first();
                        $sideVideos = $videos->slice(1, 4);
                    @endphp

                    <!-- Main Left Video -->
                    @if ($mainVideo)
                        <div
                            class="lg:col-span-6 col-span-12 lg:border-r lg:border-b-0 border-b lg:pr-4 lg:pb-0 pb-3 border-stock-color">
                            <div class="news-card">
                                <div class="video_thumbnail">
                                    <a
                                        href="{{ route('video_details', ['id' => $mainVideo->id, 'slug' => $mainVideo->slug]) }}">
                                        <img src="{{ asset('storage') }}/{{ $mainVideo->media->thumbnail ?? null }}"
                                            alt="Thumbnail">
                                    </a>

                                    <a href="{{ route('video_details', ['id' => $mainVideo->id, 'slug' => $mainVideo->slug]) }}"
                                        class="video-icon-wrap">
                                        <span class="video-icon animate-ripple-blue-vdo">
                                            <i class="fa-solid fa-play"></i>
                                        </span>
                                    </a>

                                    <span class="video_duration">{{ $mainVideo->video_duration }}</span>
                                </div>

                                <h1 class="title title-lg">
                                    <a
                                        href="{{ route('video_details', ['id' => $mainVideo->id, 'slug' => $mainVideo->slug]) }}">
                                        {{ Str::limit($mainVideo->title, 120) }}
                                    </a>
                                </h1>

                                {{-- <div class="short-description">
                                    <p>
                                        <a href="#">
                                            {{ Str::limit($mainVideo->title, 80) }}
                                        </a>
                                    </p>
                                </div> --}}

                                {{-- <div class="short-description_home">
                                    <p>
                                        <a href="#">
                                            {{ Str::limit($mainVideo->title, 150) }}
                                        </a>
                                    </p>
                                </div> --}}
                            </div>
                        </div>
                    @endif


                    <!-- Right Side Videos -->
                    <div class="lg:col-span-6 col-span-12">
                        <div class="grid grid-cols-12 md:gap-y-4 lg:gap-4 gap-3">

                            @foreach ($sideVideos as $index => $video)
                                <div
                                    class="sm:col-span-6 col-span-6 
                    {{ $index % 2 == 0 ? 'border-r lg:pr-4 pr-3 border-stock-color' : '' }}">

                                    <div class="news-card">
                                        <div class="video_thumbnail">
                                            <a
                                                href="{{ route('video_details', ['id' => $video->id, 'slug' => $video->slug]) }}">
                                                <img src="{{ asset('storage') }}/{{ $video->media->thumbnail ?? null }}">
                                            </a>

                                            <a href="{{ route('video_details', ['id' => $video->id, 'slug' => $video->slug]) }}"
                                                class="video-icon-wrap">
                                                <span class="video-icon animate-ripple-blue-vdo">
                                                    <i class="fa-solid fa-play"></i>
                                                </span>
                                            </a>

                                            <span class="video_duration">{{ $video->video_duration }}</span>
                                        </div>

                                        <h1 class="title">
                                            <a
                                                href="{{ route('video_details', ['id' => $video->id, 'slug' => $video->slug]) }}">
                                                {{ Str::limit($video->title, 80) }}
                                            </a>
                                        </h1>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>

                </div>
            </div>
        </section>



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
