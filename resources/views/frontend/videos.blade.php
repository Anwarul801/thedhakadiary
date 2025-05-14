@php use Illuminate\Support\Str; @endphp
@extends('layouts.frontend_layout')

@section('page_title') {{__('lang.video')}} @endsection
@section('main_content')
    <main class="site-content flex-1">
        <!--=========Video_Section=========== -->
        <section class="video_section section_short-padding">
            <div class="container">
                <div class="section-title-wrap">
                    <h2 class="section-title section-single-title">{{__('lang.video')}}</h2>
                </div>
                <div class="grid grid-cols-12 md:gap-6 gap-4">
                    @forelse($videos as $video)
                        <div class="lg:col-span-3 sm:col-span-6 col-span-12">
                            <div class="news-card">
                                <div class="video_thumbnail">
                                    <a href="{{route('video_details', ['id' => $video->id, 'slug' => $video->slug])}}"><img src="{{asset('storage')}}/{{$video->media->thumbnail??null}}" alt="Thumbnail"></a>
                                    <a href="{{route('video_details', ['id' => $video->id, 'slug' => $video->slug])}}" class="video-icon-wrap">
                                        <span class="video-icon animate-ripple-blue-vdo"><i class="fa-solid fa-play"></i></span>
                                    </a>
                                    <span class="video_duration">{{$video->video_duration}}</span>
                                </div>
                                <h1 class="title">
                                    <a href="{{route('video_details', ['id' => $video->id, 'slug' => $video->slug])}}">{{Str::limit($video->title, 100)}}</a>
                                </h1>
                                <div class="date">
                                    <p>{{isEnglish()?date_maker($video->publishing_date, 'd F, Y'):formatBanglaDate($video->publishing_date)}}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-12 text-center ">
                            <h3 class="text-2xl">{{__('lang.no_data_found')}}</h3>
                        </div>
                    @endforelse

                    <!-- pagination -->
                    {{$videos->links('vendor.pagination.custom')}}
                </div>
            </div>
        </section>
    </main>
@endsection

