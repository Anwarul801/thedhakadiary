@extends('layouts.frontend_layout')

@section('page_title') {{__("lang.$page_title")}} @endsection

@section('main_content')
    <main class="site-content flex-1">
        <section class="section-padding">
            <div class="container">
                <div class="page-title-wrap border-b border-stock-color md:pb-6 pb-4 md:mb-6 mb-4">
                    <h1 class="page-title">{{__("lang.$page_title")}}</h1>
                    <div class="flex justify-between items-center gap-3">
                        <div class="date-wrap">
                            <p class="present">{{isEnglish()?date('d F Y') : formatBanglaDate(date('d F Y'))}}</p>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-12 md:gap-6 gap-4">
                    @forelse($posts as $news)
                        <div class="lg:col-span-3 md:col-span-4 col-span-6">
                            <div class="news-card">
                                <div class="thumbnail">
                                    <a href="{{route('news_details', ['id' => $news->id, 'slug' => $news->slug])}}"><img src="{{asset('storage')}}/{{$news->media->thumbnail??null}}" alt="Thumbnail"></a>
                                </div>
                                <h1 class="title">
                                    <a href="{{route('news_details', ['id' => $news->id, 'slug' => $news->slug])}}">{{$news->title}}</a>
                                </h1>
                                <div class="date">
                                    <p>{{isEnglish()?date_maker($news->publishing_date, 'd F, Y'):formatBanglaDate(date_maker($news->publishing_date, 'd F Y'))}}</p>
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

