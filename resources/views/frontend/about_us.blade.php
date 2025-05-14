@extends('layouts.frontend_layout')

@section('page_title') {{ isEnglish()?$page->name_en:$page->name }} @endsection

@section('main_content')
    <main class="site-content flex-1">
        <section class="section-padding">
            <div class="container">
                <div class="grid grid-cols-12 md:gap-6 gap-4 ">
                    <div class="lg:col-span-10 col-span-12 lg:col-start-2 col-start-auto">
                        <!-- Sub-grid here -->
                        <div class="grid grid-cols-12 md:gap-6 gap-4">
                            <div class="md:col-span-8 col-span-12">
                                <div class="page-title-wrap border-b border-stock-color md:pb-6 pb-4">
                                    <h1 class="page-title">{{isEnglish()? $page->name_en: $page->name}}</h1>
                                    <div class="flex justify-between items-center gap-3">
                                        <div class="date-wrap">
                                            <p class="present">{{isEnglish()? date('d F Y'): formatBanglaDate(date('d F Y'))}}</p>
                                            <p class="update">আপডেট হয়েছে <span>{{isEnglish()? date_maker($page->updated_at??$page->created_at, 'd F Y'): formatBanglaDate(date_maker($page->updated_at??$page->created_at, 'd F Y'))}}</span></p>
                                        </div>
                                        <div class="flex justify-center items-center gap-1.5">
                                            <p class="text-primary">শেয়ার করুন:</p>
                                            <a href="#" class="social_icon text-sm"><i class="fa-solid fa-share"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Sub-grid here -->
                        <div class="grid grid-cols-12 md:gap-x-6 gap-x-4">
                            <div class="md:col-span-8 col-span-12">
                                <div class="about-content-wrap  md:mt-6 mt-4">
                                    <div class="text-area-card">
                                        {!! isEnglish()?$page->description_en:$page->description !!}
                                    </div>
                                </div>
                            </div>
                            <div class="md:col-span-4 col-span-12 md:mt-0 mt-4">
                                <div class="grid grid-cols-12 gap-4 ">
                                    <div class="col-span-12">
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
                                    <div class="col-span-12">
                                        <h2 class="section-title">বাছাইকৃত খবর</h2>
                                    </div>
                                    <div class="md:col-span-12 col-span-6">
                                        <div class="news-card">
                                            <div class="thumbnail">
                                                <a href="#"><img src="{{asset('frontend/assets')}}/image/image-gallery/side-1.png" alt="Thumbnail"></a>
                                            </div>
                                            <h1 class="title"><a href="#">স্বাধীনতার জন্য আমাদের অঙ্গীকার: শেষ রক্ত বিন্দু পর্যন্ত!</a></h1>
                                            <div class="date">
                                                <p>৩০ আগষ্ট  ২০২২</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="md:col-span-12 col-span-6">
                                        <div class="news-card">
                                            <div class="thumbnail">
                                                <a href="#"><img src="{{asset('frontend/assets')}}/image/image-gallery/side-2.png" alt="Thumbnail"></a>
                                            </div>
                                            <h1 class="title"><a href="#">দেশের স্বাধীনতা রক্ষায় আমাদের প্রতিজ্ঞা: জীবন দান!</a></h1>
                                            <div class="date">
                                                <p>৩০ আগষ্ট  ২০২২</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="md:col-span-12 col-span-6">
                                        <div class="news-card">
                                            <div class="thumbnail">
                                                <a href="#"><img src="{{asset('frontend/assets')}}/image/image-gallery/side-1.png" alt="Thumbnail"></a>
                                            </div>
                                            <h1 class="title"><a href="#">স্বাধীনতার জন্য আমাদের অঙ্গীকার: শেষ রক্ত বিন্দু পর্যন্ত!</a></h1>
                                            <div class="date">
                                                <p>৩০ আগষ্ট  ২০২২</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12">
                                        <!-- ad area start -->
                                        <div class="adSmall" style="margin-top: 0 !important;">
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
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

