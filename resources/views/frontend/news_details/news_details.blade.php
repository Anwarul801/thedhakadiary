@php
    use Carbon\Carbon;
    use Illuminate\Support\Str;
@endphp
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

            .news-details_section,
            .news-details_section * {
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


        .news-zoom-root {
            --zoom-factor: 1;
        }

        .news-zoom-root .news-content {
            transform: scale(var(--zoom-factor));
            transform-origin: top left;
            width: calc(100% / var(--zoom-factor));
        }

        .news-zoom-root img {
            max-width: 100%;
            height: auto;
        }

        .zoom-trigger {
            cursor: pointer;
        }
        .news-zoom-root .news-content {
            transition: transform 0.2s ease;
        }
        /*.tag-list {*/
        /*    display: flex;*/
        /*    flex-wrap: wrap;*/
        /*    gap: 0.5rem;*/
        /*    list-style: none;*/
        /*    padding-left: 0;*/
        /*}*/
        /*.tag-item {*/
        /*    background-color: #eef2f6;*/
        /*    border-radius: 9999px;*/
        /*    padding: 0.25rem 0.75rem;*/
        /*}*/
    </style>
@endsection
@section('og_image')
    {{ asset('storage') }}/{{ $news->media->share_image ?? ($news->media->image ?? null) }}
@endsection
@php
    $image = asset('storage') . '/' . $news->media->share_image ?? ($news->media->image ?? null);
    $extension = pathinfo($image, PATHINFO_EXTENSION);
    $image_type = 'image/' . ($extension === 'jpg' ? 'jpeg' : $extension ?? null);
@endphp
@section('og_image_type')
    {{ $image_type }}
@endsection
@section('og_title')
    {{ $news->title }}
@endsection
@section('meta_keywords')
    {{ $news->meta_keywords }}
@endsection
@section('meta_description')
    {{ $news->meta_description ?? Str::limit(strip_tags($news->news_details), 150) }}
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
                                    <div class="border-b-[1px] border-gray-400 mb-3 hidden print:block">
                                        <img src="{{ asset('frontend/assets') }}/image/main_logo_dark.png"
                                            alt="The Dhaka Diary"
                                            class="w-1/2 m-auto hidden print:block break-after-avoid mb-3" />
                                    </div>
                                    <!-- only print logo end -->
                                    {{-- category --}}
                                    <div class="mb-3 md:mb-4">
                                        @foreach ($post_categories as $category)
                                            @if ($loop->iteration == 2)
                                                @break
                                            @endif
                                            <a href="{{ route('category_view', $category->slug) }}"
                                                class="text-[#c0392b] hover:text-[#181823] border-b-2 border-[#c0392b] hover:border-[#181823] transition-all duration-75 inline-block font-bold text-base md:text-lg uppercase tracking-wide">{{ isEnglish() ? $category->name_en : $category->name }}</a>
                                        @endforeach
                                    </div>
                                    <h1 class="page-title mb-3 md:mb-4">{{ $news->title }}</h1>
                                    @if($news->sub_headline)
                                    <p class="text-base md:text-[19px] text-[#444444] font-normal leading-relaxed mb-3 md:mb-4 border-l-4 border-[#c0392b] pl-3">{{ $news->sub_headline }}</p>
                                    @endif
                                    <div class="flex justify-between items-end flex-wrap gap-3">
                                        <div
                                            class="date-wrap print:flex-auto print:flex print:justify-between print:items-end">
                                            <div>
                                                @php
                                                    $sources = [
                                                        'own_reporter',
                                                        'online_desk',
                                                        'press_release',
                                                        'online_reporter',
                                                    ];
                                                @endphp
                                                @if ($news->source == 'Author' && $news->author_id != null)
                                                    <a class="text-[14px] md:text-[17px] font-semibold"
                                                        href="{{ route('author_news', ['id' => $news->author_id, 'name' => $news->author->name_en ?? null]) }}"
                                                        class="present inline-block">{{ isEnglish() ? $news->author->name_en : $news->author->name ?? null }}</a>
                                                @elseif(in_array($news->source, $sources))
                                                    <a class="text-[14px] md:text-[17px] font-semibold"
                                                        class="present inline-block">{{ __("lang.$news->source") }}</a>
                                                @elseif($news->source != 'None')
                                                    <a class="text-[14px] md:text-[17px] font-semibold"
                                                        class="present inline-block">{{ $news->source }}</a>
                                                @endif
                                                <p class="update">{{ $news->source_designation }}</p>
                                            </div>

{{--                                            @php--}}
{{--                                                $time = newsTimeFormat($news);--}}
{{--                                            @endphp--}}

                                            <p class="update">
                                                <span class="updated">{{ formatCreatedAt($news->created_at) }}</span>
                                                <span class="prokash hidden">{{ formatUpdatedAt($news->updated_at) }}</span>

                                                <img style="width: 20px; display: inline-block"
                                                     class="cursor-pointer update_prokash_btn ms-1 print:hidden"
                                                     src="{{ asset('frontend/assets/image/up-and-down-arrow.png') }}"
                                                     alt="">
                                            </p>
                                        </div>
                                        <div class="flex justify-center items-center  gap-1.5 print:hidden">
                                            @php
                                                $url = route('news_details', $news->id);
                                            @endphp

                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ $url }}"
                                                class="social_icon text-sm" target="_blank">
                                                <i class="fa-brands fa-facebook-f"></i>
                                            </a>

                                            <a href="https://twitter.com/intent/tweet?url={{ $url }}"
                                                class="social_icon text-sm" target="_blank">
                                                <i class="fa-brands fa-x-twitter"></i>
                                            </a>

                                            <a href="https://www.instagram.com/" class="social_icon text-sm"
                                                target="_blank">
                                                <i class="fa-brands fa-instagram"></i>
                                            </a>

                                            <a href="https://wa.me/?text={{ $url }}" class="social_icon text-sm"
                                                target="_blank">
                                                <i class="fa-brands fa-whatsapp"></i>
                                            </a>

                                            <a href="#" class="social_icon text-sm zoomIn" id="zoomInBtn"><i
                                                    class="fa-solid fa-magnifying-glass-plus"></i></a>
                                            <a href="#" class="social_icon text-sm zoomOut" id="zoomOutBtn"><i
                                                    class="fa-solid fa-magnifying-glass-minus"></i></a>
                                            <span id="zoomLevelIndicator" class="text-xs bg-white px-2 py-1 rounded shadow-sm">100%</span>
                                            <a href="#" class="social_icon text-sm copyLinkBtn" id="copyLinkBtn">
                                                <i class="fa-solid fa-copy"></i>
                                            </a>
                                            <a href="#" class="social_icon text-sm" onclick="window.print()"><i
                                                    class="fa-solid fa-print"></i></a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Sub-grid here -->
                        <div class="grid grid-cols-12 md:gap-x-6 gap-x-4">
                            <div class="md:col-span-8 col-span-12 md:mt-6 mt-4 news-zoom-root" id="newsZoomContainer">
                                <figure class="news-title-image md:mb-8 sm:mb-6 mb-4 italic">
                                    <img src="{{ asset('storage') }}/{{ $news->media->image ?? null }}" alt="Thumbnail">
                                    <figcaption
                                        class="sm:text-base text-sm text-secondary bg-[#f8f9fa] text-center border-b border-[#dee2e6] py-2 news-content">
                                        <span style="font-style: normal !important;">{{ $news->media->caption ?? null }}</span> <i >{{ $news->media->source ? "© ".$news->media->source : null }}</i>
                                    </figcaption>
                                </figure>
                                <div class="text-area-card news-content">
                                    {!! $news->news_details !!}
                                </div>
                                @if ($news->tags)
                                    <div class="news-tags print:hidden">
                                        <ul class="tag-list">
                                            @foreach (explode(',', $news->tags) as $tag)
                                                <li class="tag-item">
                                                    <a class="tag-link"
                                                        href="{{ route('search') }}?search={{ $tag }}">{{ trim($tag) }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            <div class="md:col-span-4 col-span-12 md:mt-0 mt-4 no_print hidden md:block">
                                @include('layouts.partials.news_item.latest_news')
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <section class="Others-news_section md:pb-12 sm:pb-8 pb-6">
            <div class="container">
                <h2 class="others-news-title {{ $related_post->count() == 0 ? 'hidden' : '' }}">আরও পড়ুন</h2>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 {{ $related_post->count() == 0 ? 'hidden' : '' }}">
                    <!-- Card 1 -->
                    @foreach ($related_post as $rpost)
                        <div class="news-card">
                            <div class="thumbnail">
                                <a href="{{ route('news_details', $rpost->id) }}">
                                    <img src="{{asset('storage')}}/{{$rpost->thumbnail}}"
                                        alt="{{ $rpost->title ?? 'Thumbnail' }}">
                                </a>
                            </div>

                            <h1 class="title">
                                <a href="{{ route('news_details', $rpost->id) }}">
                                    {{ $rpost->title }}
                                </a>
                            </h1>
                        </div>
                    @endforeach


                </div>
                <div class="block md:hidden mt-6 no_print">
                    @include('layouts.partials.news_item.latest_news')
                </div>
            </div>
        </section>
        {{-- folding icons --}}
        <div class="sidebar-folding-icons">
            <div
                class="flex flex-col justify-center items-center bg-[#EEEEEE] border border-[#dee2e6] p-3 rounded-2xl  gap-1.5 print:hidden">
                @php
                    $url = urlencode(url()->current());
                @endphp

                <a href="https://www.facebook.com/sharer/sharer.php?u={{ $url }}"
                    class="social_icon text-sm hide_on_mobile" target="_blank">
                    <i class="fa-brands fa-facebook-f"></i>
                </a>

                <a href="https://twitter.com/intent/tweet?url={{ $url }}"
                    class="social_icon text-sm hide_on_mobile" target="_blank">
                    <i class="fa-brands fa-x-twitter"></i>
                </a>

                <a href="https://www.instagram.com/" class="social_icon text-sm hide_on_mobile" target="_blank">
                    <i class="fa-brands fa-instagram"></i>
                </a>

                <a href="https://wa.me/?text={{ $url }}" class="social_icon text-sm hide_on_mobile"
                    target="_blank">
                    <i class="fa-brands fa-whatsapp"></i>
                </a>

                <a href="#" class="social_icon text-sm zoomIn" id=""><i
                        class="fa-solid fa-magnifying-glass-plus"></i></a>
                <a href="#" class="social_icon text-sm zoomOut" id=""><i
                        class="fa-solid fa-magnifying-glass-minus"></i></a>
                <a href="#" class="social_icon hide_on_mobile text-sm" onclick="window.print()"><i
                        class="fa-solid fa-print"></i></a>
                <a href="#" class="social_icon text-sm copyLinkBtn" id="copyLinkBtn">
                    <i class="fa-solid fa-copy"></i>
                </a>
                <a href="#" class="social_icon text-sm shareBtn" id="shareBtn">
                    <i class="fa-solid fa-share-nodes"></i>
                </a>
            </div>
        </div>
    </main>
@endsection

@section('js')
    <script>
        const zoomContainer = document.getElementById('newsZoomContainer');
        const MIN_ZOOM = 0.7;
        const MAX_ZOOM = 1.6;
        const ZOOM_STEP = 0.08;
        let currentZoom = 1.0;

        function applyZoom(zoomValue) {
            let clamped = Math.min(MAX_ZOOM, Math.max(MIN_ZOOM, zoomValue));
            currentZoom = clamped;
            zoomContainer.style.setProperty('--zoom-factor', clamped);
            document.getElementById('zoomLevelIndicator').textContent = `${Math.round(clamped * 100)}%`;
        }

        function zoomIn() {
            let newZoom = currentZoom + ZOOM_STEP;
            if (newZoom <= MAX_ZOOM) applyZoom(newZoom);
        }

        function zoomOut() {
            let newZoom = currentZoom - ZOOM_STEP;
            if (newZoom >= MIN_ZOOM) applyZoom(newZoom);
        }

        document.getElementById('zoomInBtn').addEventListener('click', function(e) {
            e.preventDefault();
            zoomIn();
        });

        document.getElementById('zoomOutBtn').addEventListener('click', function(e) {
            e.preventDefault();
            zoomOut();
        });

        applyZoom(1.0);
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {


            // Toggle prokash and updated
            document.querySelectorAll('.update_prokash_btn').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    const parent = btn.closest('.update');
                    const updated = parent.querySelector('.updated');
                    const prokash = parent.querySelector('.prokash');

                    updated.classList.toggle('hidden');
                    prokash.classList.toggle('hidden');
                });
            });


            // Copy link & share functionality
            const copyLinkBtn = document.querySelectorAll('.copyLinkBtn');
            const shareBtn = document.getElementById('shareBtn');
            const currentUrl = @json(route('news_details', $news->id));

            // Copy to clipboard
            copyLinkBtn?.forEach(btn => {
                btn.addEventListener('click', (e) => {
                    e.preventDefault();
                    navigator.clipboard.writeText(currentUrl)
                        .then(() => alert('Link copied to clipboard!'))
                        .catch(() => alert('Failed to copy the link.'));
                });
            });


            // Native Share (only works in supported mobile browsers)
            shareBtn?.addEventListener('click', (e) => {
                e.preventDefault();
                if (navigator.share) {
                    navigator.share({
                        title: document.title,
                        text: 'Check this out!',
                        url: currentUrl,
                    }).catch(err => console.log('Share failed:', err));
                } else {
                    alert('Sharing not supported on this device.');
                }
            });
        });
    </script>



    <script>
        $(function() {
            var div_width = $('#get_width').width();
            var div_height = div_width * 56 / 100;
            $('#video_iframe').css({
                'height': div_height + 'px'
            });
        });
    </script>
    <script>
        let lastScrollTop = window.pageYOffset || document.documentElement.scrollTop;
        const sidebar = document.querySelector('.sidebar-folding-icons');
        let hideSidebarTimeout;

        window.addEventListener('scroll', function() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;


            if (Math.abs(scrollTop - lastScrollTop) > 50) {
                sidebar.classList.add('visible');
                clearTimeout(hideSidebarTimeout);


                hideSidebarTimeout = setTimeout(() => {
                    sidebar.classList.remove('visible');
                }, 2000);

                lastScrollTop = scrollTop;
            }
        });
    </script>
@endsection
