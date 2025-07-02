@php
    use Carbon\Carbon;
    use Illuminate\Support\Str;
@endphp
@extends('layouts.frontend_layout')

@section('page_title')
    {{ __('lang.photo') }}
@endsection
@section('css')
    <style>
        .mySwiper-wrapper {
            position: relative;
        }

        .autoplay-progress-bar {
            overflow: hidden;
            z-index: 9;
        }

        .progress-fill {
            width: 0%;
        }

        .mySwiper-wrapper .gallery_slider_control {
            position: absolute;
            width: 150px;
            height: 35px;
            z-index: 9999;
            top: 10px;
            right: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .swiper-button-prev,
        .swiper-button-next {
            width: 35px !important;
            height: 35px !important;
            margin-top: -19px !important;
        }

        .swiper-button-next {
            right: 0 !important;
        }

        #toggleAutoplay {
            position: absolute;
            left: 50%;
            transform: translateX(-35%);
        }

        #toggleAutoplay,
        .swiper-button-prev::after,
        .swiper-button-next::after {
            color: #fff;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 50%;
            width: 35px;
            height: 35px;
            font-size: 18px !important;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.5);
        }

        .swiper-button-prev::after {
            content: '\f104';

        }

        .swiper-button-next::after {
            content: '\f105';
        }

        #toggleAutoplay:hover,
        .swiper-button-prev::after:hover,
        .swiper-button-next::after:hover {
            color: #fff;
            background-color: rgba(0, 0, 0, 0.7);
        }

        #toggleAutoplay:hover {
            color: #fff;
            background-color: #1100ff;
        }

        .swiper-button-prev:hover::after,
        .swiper-button-next:hover::after {
            color: #fff;
            background-color: #1100ff;
        }
        .gallery-slide-item {
            position: relative;
            height: 426px;
            background: black;
            overflow: hidden;
        }
        @media (max-width: 1399px) {
            .gallery-slide-item {
                height: 380px;
            }
        }
        /* @media (max-width: 1199px) {
            .gallery-slide-item {
                height: 325px;
            }
        } */
        @media (max-width: 360px) {
            .gallery-slide-item {
                height: 238px;
            }
        }
        .gallery-slide-item img {
            width: auto;
            height: 100%;
            object-fit: contain;
        }
        .gallery-slide-item .image-caption {
            position: absolute;
            bottom: 0px;
            left: 0px;
            background-color: rgba(0, 0, 0, 0.5);
            color: #fff;
            padding: 5px 10px; 
            font-size: 16px;
            box-shadow: 0px 1px 10px rgba(255, 255, 255, 0.5);
            width: 100%;
        }
        .gallery-slide-item .caption-text { 
            
        }
    </style>
    <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/swiper-bundle.min.css">
@endsection
@section('main_content')
    <main class="site-content flex-1">
        <!--=========Photo_Section=========== -->
        <section class="photo-section section_short-padding">
            <div class="container">
                <div class="section-title-wrap">
                    <h2 class="section-title section-single-title">{{ __('lang.photo') }}</h2>
                </div>
                @if ($photos->currentPage() == 1)
                    <!-- Top -->
                    <div class="grid grid-cols-12 md:gap-6 gap-4">
                        @foreach ($photos as $photo)
                            @if ($loop->iteration != 1)
                                @continue
                            @endif
                            @php

                                $postDateTime = Carbon::parse($photo->date_time);
                                $now = Carbon::now();
                            @endphp
                            <div class="md:col-span-6 col-span-12">

                                <!-- Swiper Wrapper -->
                                <div class="mySwiper-wrapper">
                                    <!-- Progress Bar -->
                                    <div
                                        class="autoplay-progress-bar absolute top-0 left-0 w-full h-1 overflow-hidden bg-gray-300">
                                        <div class="progress-fill h-full bg-blue-500 transition-all duration-0"></div>
                                    </div>

                                    <!-- Swiper -->

                                    <div class="swiper mySwiper">
                                        <div class="swiper-wrapper"> 
                                            @foreach ($photo->gallery_images as $key => $img)
                                                @if ($key >= 0)
                                                    <div class="swiper-slide">
                                                        <div class="gallery-slide-item">
                                                            <a
                                                                href="{{ route('photo_details', ['id' => $photo->id, 'slug' => $photo->title_en]) }}">
                                                                <img src="{{ asset($img->image) }}" alt="Gallery Image"
                                                                    class="max-w-full w-auto h-full object-contain">
                                                            </a>
                                                            <figcaption class="image-caption">
                                                                <div class="caption-text">{{ $img->caption }}</div>
                                                            </figcaption>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="news-card">
                                            <h1 class="title title-lg">
                                                <a href="{{route('photo_details', ['id' => $photo->id, 'slug' => $photo->title_en])}}">{{Str::limit(isEnglish()?$photo->title_en:$photo->title)}}</a>
                                            </h1>
                                        </div>

                                        <div class="gallery_slider_control">
                                            <!-- Navigation Next-->
                                            <div class="swiper-button-next"></div>

                                            <!-- Pause/Play Button -->
                                            <span id="toggleAutoplay"
                                                class=" bg-blue-600 p-2 rounded-full text-white cursor-pointer !z-999999999">
                                                <i class="fa-solid fa-pause"></i>
                                            </span>
                                            <!-- Navigation Prev-->
                                            <div class="swiper-button-prev gallery-slider-prev"></div>
                                        </div>
                                    </div>
                                </div>


                                {{-- <div class="news-card">
                                    <div class="image-thumbnail">
                                        <a href="{{route('photo_details', ['id' => $photo->id, 'slug' => $photo->title_en])}}"><img src="{{asset($photo->thumbnail)}}"
                                                                                  alt="Thumbnail"></a>
                                        <span class="image-icon"><i class="fa-solid fa-images"></i></span>
                                    </div>
                                    <h1 class="title title-lg">
                                        <a href="{{route('photo_details', ['id' => $photo->id, 'slug' => $photo->title_en])}}">{{Str::limit(isEnglish()?$photo->title_en:$photo->title)}}</a>
                                    </h1>
                                    <div class="date">
                                        <p>
                                            @if ($postDateTime->diffInHours($now) > 24)
                                                {{ isEnglish() ? $postDateTime->format('d F Y') : formatBanglaDate($postDateTime->format('d F Y')) }}
                                            @else
                                                {{ isEnglish() ? $postDateTime->diffForHumans() : bangla_number($postDateTime->diffForHumans()) }}
                                            @endif
                                        </p>
                                    </div>
                                </div> --}}
                            </div>
                        @endforeach

                        <div class="md:col-span-6 col-span-12">
                            <div class="grid grid-cols-12 md:gap-y-4 gap-y-0 gap-x-4 md:gap-x-6">
                                @foreach ($photos as $photo)
                                    @php

                                        $postDateTime = Carbon::parse($photo->date_time);
                                        $now = Carbon::now();
                                    @endphp
                                    @if ($loop->iteration == 2 || $loop->iteration == 3 || $loop->iteration == 4 || $loop->iteration == 5)
                                        <div class="md:col-span-6 col-span-6">
                                            <div class="news-card">
                                                <div class="image-thumbnail">
                                                    <a
                                                        href="{{ route('photo_details', ['id' => $photo->id, 'slug' => $photo->title_en]) }}"><img
                                                            src="{{ asset($photo->thumbnail) }}" alt="Thumbnail"></a>
                                                    <span class="image-icon"><i class="fa-solid fa-images"></i></span>
                                                </div>
                                                <h1 class="title">
                                                    <a
                                                        href="{{ route('photo_details', ['id' => $photo->id, 'slug' => $photo->title_en]) }}">
                                                        {{ Str::limit(isEnglish() ? $photo->title_en : $photo->title) }}
                                                    </a>
                                                </h1>
                                                <div class="date">
                                                    <p>
                                                        @if ($postDateTime->diffInHours($now) > 24)
                                                            {{ isEnglish() ? $postDateTime->format('d F Y') : formatBanglaDate($postDateTime->format('d F Y')) }}
                                                        @else
                                                            {{ isEnglish() ? $postDateTime->diffForHumans() : bangla_number($postDateTime->diffForHumans()) }}
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                    </div>

                    <!-- bottom -->
                    <div
                        class="grid grid-cols-12 md:gap-6 gap-4 md:pt-7.5 sm:pt-6 pt-4 border-t border-stock-color md:mt-6 mt-5">
                        @foreach ($photos as $photo)
                            @php

                                $postDateTime = Carbon::parse($photo->date_time);
                                $now = Carbon::now();
                            @endphp
                            @if (
                                $loop->iteration == 2 ||
                                    $loop->iteration == 3 ||
                                    $loop->iteration == 4 ||
                                    $loop->iteration == 5 ||
                                    $loop->iteration == 1)
                                @continue
                            @endif
                            <div class="lg:col-span-3 md:col-span-4 col-span-6">
                                <div class="news-card">
                                    <div class="image-thumbnail">
                                        <a
                                            href="{{ route('photo_details', ['id' => $photo->id, 'slug' => $photo->title_en]) }}"><img
                                                src="{{ asset($photo->thumbnail) }}" alt="Thumbnail"></a>
                                        <span class="image-icon"><i class="fa-solid fa-images"></i></span>
                                    </div>
                                    <h1 class="title">
                                        <a
                                            href="{{ route('photo_details', ['id' => $photo->id, 'slug' => $photo->title_en]) }}">{{ Str::limit(isEnglish() ? $photo->title_en : $photo->title) }}
                                        </a>
                                    </h1>
                                    <div class="date">
                                        <p>
                                            @if ($postDateTime->diffInHours($now) > 24)
                                                {{ isEnglish() ? $postDateTime->format('d F Y') : formatBanglaDate($postDateTime->format('d F Y')) }}
                                            @else
                                                {{ isEnglish() ? $postDateTime->diffForHumans() : bangla_number($postDateTime->diffForHumans()) }}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach



                        <!-- pagination -->
                        {{ $photos->links('vendor.pagination.custom') }}
                    </div>
                @else
                    <!-- bottom -->
                    <div
                        class="grid grid-cols-12 md:gap-6 gap-4 md:pt-7.5 sm:pt-6 pt-4 border-t border-stock-color md:mt-6 mt-5">
                        @foreach ($photos as $photo)
                            <div class="lg:col-span-3 md:col-span-4 col-span-6">
                                <div class="news-card">
                                    <div class="image-thumbnail">
                                        <a
                                            href="{{ route('photo_details', ['id' => $photo->id, 'slug' => $photo->title_en]) }}"><img
                                                src="{{ asset($photo->thumbnail) }}" alt="Thumbnail"></a>
                                        <span class="image-icon"><i class="fa-solid fa-images"></i></span>
                                    </div>
                                    <h1 class="title">
                                        <a
                                            href="{{ route('photo_details', ['id' => $photo->id, 'slug' => $photo->title_en]) }}">{{ Str::limit(isEnglish() ? $photo->title_en : $photo->title) }}
                                        </a>
                                    </h1>
                                    <div class="date">
                                        <p>
                                            {{ format_publishing_date($photo->date_time) }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                        <!-- pagination -->
                        {{ $photos->links('vendor.pagination.custom') }}
                    </div>
                @endif

            </div>
        </section>

    </main>
@endsection

@section('js')
    <script src="{{ asset('frontend/assets') }}/js/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 10,
            loop: true,
            speed: 1000,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            // pagination: {
            //   el: ".swiper-pagination",
            //   clickable: true,
            // },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            on: {
                autoplayTimeLeft(s, time, progress) {
                    const bar = document.querySelector(".progress-fill");
                    bar.style.width = `${(1 - progress) * 100}%`;
                }
            }
        });

        const toggleBtn = document.getElementById("toggleAutoplay");
        let isPaused = false;

        toggleBtn.addEventListener("click", () => {
            if (isPaused) {
                swiper.autoplay.start();
                toggleBtn.innerHTML = '<i class="fa-solid fa-pause"></i>';
            } else {
                swiper.autoplay.stop();
                toggleBtn.innerHTML = '<i class="fa-solid fa-play"></i>';
            }
            isPaused = !isPaused;
        });
    </script>
@endsection
