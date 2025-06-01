@php use Carbon\Carbon;use Illuminate\Support\Str; @endphp
@extends('layouts.frontend_layout')

@section('page_title')
    {{isEnglish()?$photo->title_en:$photo->title}}
@endsection
@section('main_content')
    <main class="site-content flex-1">
        <section class="image-gallery-details section_short-padding">
            <div class="container">
                <div class="grid grid-cols-12 md:gap-6 gap-4 ">
                    <div class="col-span-12 ">
                        <!-- Sub-grid here -->
                        <div class="grid grid-cols-12 md:gap-6 gap-4">
                            <div class="col-span-12">
                                <div class="page-title-wrap border-b border-stock-color md:pb-6 pb-4">
                                    <div class="flex justify-between items-end gap-3">
                                        <div class="date-wrap">
                                            <p class="present repoter-present"><i class="fa-solid fa-user mr-1.5"></i>{{__('lang.reporter')}}
                                                {{isEnglish()?$photo->author->name_en:$photo->author->name}}
                                            </p>
                                            <p class="update"> {{isEnglish()?$photo->author->designation_en:$photo->author->designation}} </p>
                                        </div>
                                        <div class="flex justify-center items-center gap-1.5">
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Sub-grid here -->
                        <div class="grid grid-cols-12 md:gap-x-6 gap-x-4 md:mt-6 mt-4">
                            @foreach($photo->gallery_images as $image)

                            @endforeach
                                <div class="lg:col-span-9 md:col-span-7 col-span-12">
                                    @foreach($photo->gallery_images as $key => $image)
                                        <div class="image-details-item {{ $key > 0 ? 'hidden extra-gallery' : '' }}">
                                            @if(isEnglish())
                                            <span class="img-number">{{ $loop->iteration }}/{{ count($photo->gallery_images) }}</span>
                                            @else
                                            <span class="img-number">{{ bangla_number($loop->iteration) }}/{{ bangla_number(count($photo->gallery_images)) }}</span>
                                            @endif
                                            <div class="image-wrap">
                                                <a target="_blank" class="gallery-item" href="{{ asset($image->image) }}">
                                                    <img src="{{ asset($image->image) }}" alt="Image">
                                                </a>
                                            </div>
                                            <div class="image-content">
                                                <h2 class="title">{{ isEnglish()?$image->caption_en:$image->caption  }}</h2>
                                                <p class="photographer"><strong class="text-primary font-bold">{{__('lang.photographer')}}</strong> {{ isEnglish()?$image->photographer_en:$image->photographer  }} </p>
                                                <p class="shoot-time">{{format_publishing_date($image->date_time_image)}}</p>
                                            </div>
                                        </div>
                                    @endforeach

                                    @if(count($photo->gallery_images) > 1)
                                        <a href="javascript:void(0)" onclick="showMoreGallery()" class="section_button mt-4">{{__('lang.see_more')}} <i class="fa-solid fa-angle-down"></i></a>
                                    @endif
                                </div>

                                <div class="lg:col-span-3 md:col-span-5 col-span-12 md:mt-0 mt-4">
                              @include('layouts.partials.news_item.latest_news')

                                <!-- ad area start -->
                                    @include('layouts.partials.ads.side_ad', ['ad' => $side_ad])
                                <!-- ad area end -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@section('js')
    <script>
        function showMoreGallery() {
            document.querySelectorAll('.extra-gallery').forEach(function(item) {
                item.classList.remove('hidden');
            });
            event.target.style.display = 'none';
        }
    </script>
@endsection
