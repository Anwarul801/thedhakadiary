@extends('layouts.frontend_layout')

@section('page_title') {{ isEnglish()?$category->name_en:$category->name }} @endsection

@section('main_content')
    <!-- ad area -->
    @include('layouts.partials.ads.banner_ad', ['ad' => $category_top_ad])
    <!-- ad area end-->
    <main class="site-content flex-1">
        <section class="section-padding">
            <div class="container">
                <div class="page-title-wrap border-b border-stock-color md:pb-6 pb-4 md:mb-6 mb-4">
                    <h1 class="page-title">{{ isEnglish()?$category->name_en:$category->name }}</h1>
                    <div class="flex justify-between items-center gap-3">
                        <div class="date-wrap">
                            <p class="present">{{isEnglish()?date('d F Y') : formatBanglaDate(date('d F Y'))}}</p>
                            @isset($last_post)
                            <p class="update">{{__('lang.updated_at')}} <span>{{isEnglish()?date_maker($last_post->publishing_date, 'd F Y'):formatBanglaDate(date_maker($last_post->publishing_date, 'd F Y'))}}</span></p>
                            @endisset
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-12 md:gap-6 gap-4">
                    @forelse($posts as $news)
                        <div class="lg:col-span-3 md:col-span-4 col-span-6">
                            <div class="news-card">
                                <div class="thumbnail">
                                    <a href="{{route('news_details', ['id' => $news->id, 'slug' => $news->slug])}}"><img src="{{asset('storage')}}/{{$news->media->thumbnail??$news->media->image??null}}" alt="Thumbnail"></a>
                                </div>
                                <h1 class="title">
                                    <a href="{{route('news_details', ['id' => $news->id, 'slug' => $news->slug])}}">{{$news->title}}</a>
                                </h1>
                                <div class="date">
                                    <p>{{format_publishing_date($news->publishing_date)}}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-12 text-center ">
                            <h3 class="text-2xl">{{__('lang.no_data_found')}}</h3>
                        </div>
                    @endforelse
                        {{ $posts->links('vendor.pagination.custom') }}

                </div>

            </div>
        </section>
    </main>
@endsection

