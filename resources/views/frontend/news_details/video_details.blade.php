@php use Carbon\Carbon;use Illuminate\Support\Str; @endphp
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
        <!--=========Video_Section=========== -->
        <section class="video_section section_short-padding">
            <div class="container">
                <div class="section-title-wrap">
                    <h2 class="section-title section-single-title">ভিডিও</h2>
                </div>
                <div class="grid grid-cols-12 md:gap-6 gap-4">
                    <div class="lg:col-span-8 col-span-12">
                        <div class="news-card">
                            <div class="video_thumbnail">
                                <iframe width="100%"
                                        src="https://www.youtube.com/embed/{{$news->video_id}}?si=fhiq4iH84fViSESw"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>


                            </div>
                            <h1 class="title">
                                <a href="#">{{$news->title}}</a>
                            </h1>
                            <div class="flex items-center gap-1.5 my-2 md:my-4">
                                @php
                                    $url = urlencode(url()->current());
                                @endphp

                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ $url }}"
                                   class="social_icon text-sm" target="_blank">
                                    <i class="fa-brands fa-facebook-f"></i>
                                </a>

                                <a href="https://twitter.com/intent/tweet?url={{ $url }}" class="social_icon text-sm"
                                   target="_blank">
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
                            <div class="date">
                                <p>{{isEnglish()? date_maker($news->publishing_date, 'd F, Y'): formatBanglaDate($news->publishing_date)}}</p>
                            </div>
                        </div>
                        <div class="video-gallery-text">
                            <div class="text-area-card">
                                {!! $news->news_details !!}
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-4 col-span-12">
                        <div class="video-gallery-sidebar">
                            <div class="video-sidebar-title">
                                <h3 class="title">সর্বশেষ ভিডিও</h3>
                            </div>
                            @foreach($latest_videos as $video)
                                <div class="news-card flex items-center gap-4 mb-10 md:mb-12 lg:mb-7 ">
                                    <div class="video_thumbnail flex-2/5">
                                        <a href="{{route('video_details', ['id' => $video->id, 'slug' => $video->slug])}}"><img
                                                src="{{asset('storage')}}/{{$video->media->xs_thumbnail??null}}"
                                                class="h-full" alt="Thumbnail"></a>
                                        <span
                                            class="video_duration w-full text-center">{{$video->video_duration}}</span>
                                    </div>
                                    <h1 class="title flex-3/5">
                                        <a href="{{route('video_details', ['id' => $video->id, 'slug' => $video->slug])}}">{{Str::limit($video->title, 100)}}</a>
                                    </h1>
                                </div>
                            @endforeach

                        </div>
                    </div>
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
