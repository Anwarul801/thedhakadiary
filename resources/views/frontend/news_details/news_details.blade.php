@php use Carbon\Carbon; @endphp
@extends('layouts.frontend_layout')
@section('page_title')
    {{ $news->title }}
@endsection
@section('css')
    <style>
        @media print {
            body * {
                visibility: hidden;
            }

            .news-details_section, .news-details_section * {
                visibility: visible;
            }

            .news-details_section {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }

            .no_print {
                display: none !important;
            }
        }
    </style>
@endsection
@section('og_image')
    {{ asset('storage') }}/{{ $news->media->image }}
@endsection
@section('og_title')
    {{ $news->title }}
@endsection
@section('meta_keywords')
    {{ $news->meta_keywords }}
@endsection
@section('meta_description')
    {{ $news->meta_description }}
@endsection
@section('main_content')
    <main class="site-content flex-1">
        <section class="news-details_section section-padding">
            <div class="container">
                <div class="grid grid-cols-12 md:gap-6 gap-4 ">
                    <div class="lg:col-span-10 col-span-12 lg:col-start-2 col-start-auto">
                        <!-- Sub-grid here -->
                        <div class="grid grid-cols-12 md:gap-6 gap-4">
                            <div class="md:col-span-8 col-span-12">
                                <div class="page-title-wrap border-b border-stock-color md:pb-6 pb-4">
                                    <!-- only print logo -->
                                    <div class="border-b-[1px] border-gray-400 mb-3">
                                        <img src="{{asset('frontend/assets')}}/image/main_logo_dark.png"
                                             alt="The Dhaka Diary"
                                             class="w-1/2 m-auto hidden print:block break-after-avoid mb-3"/>
                                    </div>
                                    <!-- only print logo end -->
                                    <h1 class="page-title">{{$news->title}}</h1>
                                    <div class="flex justify-between items-end flex-wrap gap-3">
                                        <div
                                            class="date-wrap print:flex-auto print:flex print:justify-between print:items-end">
                                            <div>
                                                @if($news->source == 'Author'&&$news->author_id!= null)
                                                    <a href="{{route('author_news', ['id' => $news->author_id, 'name' => $news->author->name_en??null])}}" class="present inline-block">{{isEnglish()?($news->author->name_en):($news->author->name??null)}}</a>
                                                    @elseif($news->source!='None')
                                                    <a class="present inline-block">{{__("lang.$news->source")}}</a>
                                                @endif
                                                <p class="update">{{__('lang.site_title')}}</p>
                                            </div>
                                            @php
                                                $ago_bn = Carbon::parse($news->updated_at)->locale('bn')->diffForHumans();
                                                $update_bn = "আপডেট: ".formatBanglaDate(date_maker($news->updated_at, 'd F Y')).", ".bangla_number($ago_bn);
                                                $ago_en = Carbon::parse($news->updated_at)->locale('en')->diffForHumans();
                                                $update_en = "Updated: ".date_maker($news->updated_at, 'd F Y').", ".$ago_en;


                                               $created = Carbon::parse($news->created_at);
                                                // Bangla Format
                                                $date_bn = formatBanglaDate($created->format('d F Y'));
                                                $time_bn = bangla_number($created->format('H:i'));
                                                $create_bn = "প্রকাশিত: {$date_bn}, {$time_bn}";

                                                // English Format
                                                $date_en = $created->format('d F Y');
                                                $time_en = $created->format('H:i');
                                                $create_en = "Published: {$date_en}, {$time_en}";
                                            @endphp
                                            <p class="update"><span
                                                    class="updated">{{isEnglish()?$update_en:$update_bn}}</span> <span
                                                    class="prokash hidden">{{isEnglish()?$create_en:$create_bn}}</span>
                                                <img style="width: 20px; display: inline-block" class="cursor-pointer update_prokash_btn ms-1 print:hidden" src="{{asset('frontend/assets/image/up-and-down-arrow.png')}}" alt="">
                                            </p>
                                        </div>
                                        <div class="flex justify-center items-center  gap-1.5 print:hidden">
                                            @php
                                                $url = urlencode(url()->current());
                                            @endphp

                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ $url }}" class="social_icon text-sm" target="_blank">
                                                <i class="fa-brands fa-facebook-f"></i>
                                            </a>

                                            <a href="https://twitter.com/intent/tweet?url={{ $url }}" class="social_icon text-sm" target="_blank">
                                                <i class="fa-brands fa-x-twitter"></i>
                                            </a>

                                            <a href="https://www.instagram.com/" class="social_icon text-sm" target="_blank">
                                                <i class="fa-brands fa-instagram"></i>
                                            </a>

                                            <a href="https://wa.me/?text={{ $url }}" class="social_icon text-sm" target="_blank">
                                                <i class="fa-brands fa-whatsapp"></i>
                                            </a>

                                            <a href="#" class="social_icon text-sm" id="zoomIn"><i
                                                    class="fa-solid fa-magnifying-glass-plus"></i></a>
                                            <a href="#" class="social_icon text-sm" id="zoomOut"><i
                                                    class="fa-solid fa-magnifying-glass-minus"></i></a>
                                            <a href="#" class="social_icon text-sm" onclick="window.print()"><i
                                                    class="fa-solid fa-print"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Sub-grid here -->
                        <div class="grid grid-cols-12 md:gap-x-6 gap-x-4">
                            <div class="md:col-span-8 col-span-12 md:mt-6 mt-4">
                                <figure class="news-title-image md:mb-8 sm:mb-6 mb-4">
                                    <img src="{{asset('storage')}}/{{$news->media->image??null}}" alt="Thumbnail">
                                    <figcaption
                                        class="sm:text-base text-sm text-secondary text-center md:mt-3 mt-2 news-content">
                                        {{$news->media->caption??null}}
                                    </figcaption>
                                </figure>
                                <div class="text-area-card news-content">
                                    {!! $news->news_details !!}
                                </div>
                            </div>
                            <div class="md:col-span-4 col-span-12 md:mt-0 mt-4 no_print">
                                @include('layouts.partials.news_item.latest_news')

                                <!-- ad area start -->
                                <div class="adSmall no_print">
                                    <a href="#">
                                        <img src="{{asset('frontend/assets')}}/image/small-ad-2.png" alt="ad image">
                                    </a>
                                    <div class="ad-close">
                                        <i class="fa-solid fa-circle-exclamation"></i>
                                        <i class="fa-solid fa-xmark"></i>
                                    </div>
                                </div>
                                <!-- ad area end -->
                                <!-- ad area start -->
                                <div class="adSmall no_print">
                                    <a href="#">
                                        <img src="{{asset('frontend/assets')}}/image/samll-ad-1.png" alt="ad image">
                                    </a>
                                    <div class="ad-close">
                                        <i class="fa-solid fa-circle-exclamation"></i>
                                        <i class="fa-solid fa-xmark"></i>
                                    </div>
                                </div>
                                <!-- ad area end -->

                                <!-- ad area start -->
                                <div class="adSmall no_print">
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
        </section>

        <section class="Others-news_section md:pb-12 sm:pb-8 pb-6 {{$related_post->count() == 0 ? 'hidden' : ''}}">
            <div class="container">
                <h2 class="others-news-title">{{__('lang.others_news')}}</h2>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
                    <!-- Card 1 -->
                    @foreach($related_post as $rpost)
                        <a href="{{route('news_details', ['id' => $rpost->id, 'slug' => $rpost->slug])}}" class="otners-news-item">
                            <h3 class="news-nmbr">{{isEnglish()?$loop->iteration:bangla_number($loop->iteration)}}</h3>
                            <p class="news-title">{{$rpost->title}}</p>
                        </a>
                    @endforeach


                </div>

            </div>
        </section>
    </main>

@endsection

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const newsElements = document.querySelectorAll('.news-content');
            let fontSize = 1; // em

            document.getElementById('zoomIn').addEventListener('click', function (e) {
                e.preventDefault();
                if (fontSize < 2) {
                    fontSize += 0.1;
                    newsElements.forEach(el => {
                        el.style.fontSize = fontSize + 'em';
                    });
                }
            });

            document.getElementById('zoomOut').addEventListener('click', function (e) {
                e.preventDefault();
                if (fontSize > 0.6) {
                    fontSize -= 0.1;
                    newsElements.forEach(el => {
                        el.style.fontSize = fontSize + 'em';
                    });
                }
            });
        });

        document.querySelectorAll('.update_prokash_btn').forEach(function (btn) {
            btn.addEventListener('click', function () {
                const parent = btn.closest('.update'); // parent .update block
                const updated = parent.querySelector('.updated');
                const prokash = parent.querySelector('.prokash');

                updated.classList.toggle('hidden');
                prokash.classList.toggle('hidden');
            });
        });
    </script>
    <script>
        $(function () {
            var div_width = $('#get_width').width();
            var div_height = div_width * 56 / 100;
            $('#video_iframe').css({'height': div_height + 'px'});
        });
    </script>
@endsection
