@php use Illuminate\Support\Str; @endphp
@extends('layouts.frontend_layout')

@section('page_title') {{ isEnglish()?$author->name_en:$author->name }} @endsection

@section('main_content')
    <main class="site-content flex-1">
        <section class="author-post_section section_short-padding">
            <div class="container">
                <div class="grid grid-cols-12 md:gap-6 gap-4 ">
                    <div class="col-span-12 ">
                        <!-- Sub-grid here -->
                        <div class="grid grid-cols-12 md:gap-6 gap-4">
                            <div class="col-span-12">
                                <div class="page-title-wrap border-b border-stock-color md:pb-6 pb-4">
                                    <div class="flex justify-between items-end flex-wrap gap-3">
                                        <div class="date-wrap">
                                            <p class="present repoter-present">{{isEnglish()?$author->name_en:$author->name}}</p>
                                            <p class="update">{{isEnglish()?$author->designation_en:$author->designation}}</p>
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
                            <div class="xl:col-span-9 lg:col-span-8 md:col-span-7 col-span-12">
                                @forelse($news as $newsItem)
                                    <div class="author-post-list">
                                        <div class="post-thumbnail-wrap">
                                            <a href="{{route('news_details', ['id' => $newsItem->id, 'slug' => $newsItem->slug])}}"><img src="{{asset('storage')}}/{{$newsItem->media->thumbnail??null}}" alt="Thumbnail"></a>
                                        </div>
                                        <div class="post-content">
                                            <a href="{{route('news_details', ['id' => $newsItem->id, 'slug' => $newsItem->slug])}}">
                                                <h2 class="title">{{Str::limit($newsItem->title, 100)}}</h2>
                                            </a>
                                            <a href="{{route('news_details', ['id' => $newsItem->id, 'slug' => $newsItem->slug])}}">
                                                <p class="short-des">{{Str::limit($newsItem->subtitle, 250)}}</p>
                                                <p>{{format_publishing_date($newsItem->publishing_date)}}</p>
                                            </a>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-span-12 text-center ">
                                        <h3 class="text-2xl">{{__('lang.no_data_found')}}</h3>
                                    </div>
                                @endforelse
{{--                                pagination--}}
                                {{$news->links('vendor.pagination.custom')}}
                            </div>
                            <div class="xl:col-span-3 lg:col-span-4 md:col-span-5 col-span-12 md:mt-0 mt-4">
                             @include('layouts.partials.news_item.latest_news')
                                <!-- ad area -->
                                @include('layouts.partials.ads.side_ad', ['ad' => $side_ad])
                                <!-- ad area end-->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

