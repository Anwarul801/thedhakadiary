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
    </style>
@endsection
@section('og_image')
    {{ asset('storage') }}/{{ $news->media->share_image ?? $news->media->image ?? null }}
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
                                    <div class="border-b-[1px] border-gray-400 mb-3 hidden print:block">
                                        <img src="{{ asset('frontend/assets') }}/image/main_logo_dark.png"
                                            alt="The Dhaka Diary"
                                            class="w-1/2 m-auto hidden print:block break-after-avoid mb-3" />
                                    </div>
                                    <!-- only print logo end -->
                                    {{-- category --}}
                                    <div class="">
                                        @foreach($post_categories as $category)
                                            @if($loop->iteration == 2)
                                                @break
                                            @endif
                                        <a href="{{route('category_view', $category->slug)}}" class="text-[#007bff] hover:text-[#181823] border-b-2 border-[#007bff] hover:border-[#181823] transition-all duration-75 mb-3 md:mb-4 inline-block font-bold text-lg md:text-xl">{{isEnglish()?$category->name_en:$category->name}}</a>
                                        @endforeach
                                    </div>
                                    <span class="text-base md:text-xl text-[#595959] font-bold mb-2 block">{{ $news->sub_headline }}</span>
                                    <h1 class="page-title">{{ $news->title }}</h1>
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
                                                    <a class="text-[14px] md:text-[17px] font-semibold" href="{{ route('author_news', ['id' => $news->author_id, 'name' => $news->author->name_en ?? null]) }}"
                                                        class="present inline-block">{{ isEnglish() ? $news->author->name_en : $news->author->name ?? null }}</a>
                                                @elseif(in_array($news->source, $sources))
                                                    <a class="text-[14px] md:text-[17px] font-semibold" class="present inline-block">{{ __("lang.$news->source") }}</a>
                                                @elseif($news->source != 'None')
                                                    <a class="text-[14px] md:text-[17px] font-semibold" class="present inline-block">{{ $news->source }}</a>
                                                @endif
                                                <p class="update">{{ $news->source_designation }}</p>
                                            </div>
                                            @php
                                                $ago_bn = Carbon::parse($news->updating_date)
                                                    ->locale('bn')
                                                    ->diffForHumans();
                                                $update_bn =
                                                    'আপডেট: ' .
                                                    formatBanglaDate(date_maker($news->updating_date, 'd F Y')) .
                                                    ', ' .
                                                    bangla_number($ago_bn);
                                                $ago_en = Carbon::parse($news->updating_date)
                                                    ->locale('en')
                                                    ->diffForHumans();
                                                $update_en =
                                                    'Updated: ' .
                                                    date_maker($news->updating_date, 'd F Y') .
                                                    ', ' .
                                                    $ago_en;

                                                $created = Carbon::parse($news->publishing_date);
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
                                                    class="updated">{{ isEnglish() ? $create_en : $create_bn }}</span>
                                                <span
                                                    class="prokash hidden">{{ isEnglish() ? $update_en : $update_bn }}</span>
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

                                            <a href="#" class="social_icon text-sm zoomIn" id=""><i
                                                    class="fa-solid fa-magnifying-glass-plus"></i></a>
                                            <a href="#" class="social_icon text-sm zoomOut" id=""><i
                                                    class="fa-solid fa-magnifying-glass-minus"></i></a>
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
                            <div class="md:col-span-8 col-span-12 md:mt-6 mt-4">
                                <figure class="news-title-image md:mb-8 sm:mb-6 mb-4">
                                    <img src="{{ asset('storage') }}/{{ $news->media->image ?? null }}" alt="Thumbnail">
                                    <figcaption
                                        class="sm:text-base text-sm text-secondary bg-[#f8f9fa] text-center border-b border-[#dee2e6] py-2 news-content">
                                        {{ $news->media->caption_en ?? null }}
                                        {{ $news->media->caption ?? null }}
                                    </figcaption>
                                </figure>
                                <div class="text-area-card news-content">
                                    {!! $news->news_details !!}
                                </div>
                            </div>
                            <div class="md:col-span-4 col-span-12 md:mt-0 mt-4 no_print">
                                @include('layouts.partials.news_item.latest_news')

                                <!-- ad area start -->
                                @include('layouts.partials.ads.side_ad', ['ad' => $ad1])

                                <!-- ad area end -->
                                <!-- ad area start -->
                                @include('layouts.partials.ads.side_ad', ['ad' => $ad2])

                                <!-- ad area end -->

                                <!-- ad area start -->
                                @include('layouts.partials.ads.side_ad', ['ad' => $ad3])

                                <!-- ad area end -->

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <section class="Others-news_section md:pb-12 sm:pb-8 pb-6 {{ $related_post->count() == 0 ? 'hidden' : '' }}">
            <div class="container">
                <h2 class="others-news-title">{{ __('lang.others_news') }}</h2>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
                    <!-- Card 1 -->
                    @foreach ($related_post as $rpost)
                        <a href="{{ route('news_details', ['id' => $rpost->id, 'slug' => $rpost->slug]) }}"
                            class="otners-news-item">
                            <h3 class="news-nmbr">{{ isEnglish() ? $loop->iteration : bangla_number($loop->iteration) }}
                            </h3>
                            <p class="news-title">{{ Str::limit($rpost->title, 50) }}</p>
                        </a>
                    @endforeach


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

                <a href="https://www.facebook.com/sharer/sharer.php?u={{ $url }}" class="social_icon text-sm hide_on_mobile"
                    target="_blank">
                    <i class="fa-brands fa-facebook-f"></i>
                </a>

                <a href="https://twitter.com/intent/tweet?url={{ $url }}" class="social_icon text-sm hide_on_mobile"
                    target="_blank">
                    <i class="fa-brands fa-x-twitter"></i>
                </a>

                <a href="https://www.instagram.com/" class="social_icon text-sm hide_on_mobile" target="_blank">
                    <i class="fa-brands fa-instagram"></i>
                </a>

                <a href="https://wa.me/?text={{ $url }}" class="social_icon text-sm hide_on_mobile" target="_blank">
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
    document.addEventListener('DOMContentLoaded', function () {
        const newsElements = document.querySelectorAll('.news-content');
        let fontSize = 1; // em

        // Handle all zoomIn buttons
        document.querySelectorAll('.zoomIn').forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault();
                if (fontSize < 2) {
                    fontSize += 0.1;
                    newsElements.forEach(el => {
                        el.style.fontSize = fontSize + 'em';
                    });
                }
            });
        });

        // Handle all zoomOut buttons
        document.querySelectorAll('.zoomOut').forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault();
                if (fontSize > 0.6) {
                    fontSize -= 0.1;
                    newsElements.forEach(el => {
                        el.style.fontSize = fontSize + 'em';
                    });
                }
            });
        });

        // Toggle prokash and updated
        document.querySelectorAll('.update_prokash_btn').forEach(function (btn) {
            btn.addEventListener('click', function () {
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


    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const newsElements = document.querySelectorAll('.news-content');
            let fontSize = 1; // em

            document.getElementById('zoomIn').addEventListener('click', function(e) {
                e.preventDefault();
                if (fontSize < 2) {
                    fontSize += 0.1;
                    newsElements.forEach(el => {
                        el.style.fontSize = fontSize + 'em';
                    });
                }
            });

            document.getElementById('zoomOut').addEventListener('click', function(e) {
                e.preventDefault();
                if (fontSize > 0.6) {
                    fontSize -= 0.1;
                    newsElements.forEach(el => {
                        el.style.fontSize = fontSize + 'em';
                    });
                }
            });
        });

        document.querySelectorAll('.update_prokash_btn').forEach(function(btn) {
            btn.addEventListener('click', function() {
                const parent = btn.closest('.update'); // parent .update block
                const updated = parent.querySelector('.updated');
                const prokash = parent.querySelector('.prokash');

                updated.classList.toggle('hidden');
                prokash.classList.toggle('hidden');
            });
        });
    </script> --}}
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

window.addEventListener('scroll', function () {
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
