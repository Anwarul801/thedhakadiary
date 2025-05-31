@extends('layouts.frontend_layout')

@section('page_title') {{ isEnglish()?$page->name_en:$page->name }} @endsection
@section('main_content')
    <main class="site-content flex-1">
        <section class="privacy_policy_section section-padding">
            <div class="container">
                <div class="grid grid-cols-12 gap-6 ">
                    <div class="lg:col-span-10 col-span-12 lg:col-start-2 col-start-auto">
                        <!-- Sub-grid here -->
                        <div class="grid grid-cols-12 gap-4">
                            <div class="col-span-12">
                                <div class="page-title-wrap border-b border-stock-color md:pb-6 pb-4 md:mb-6 mb-4">
                                    <h1 class="page-title">{{isEnglish()? $page->name_en: $page->name}}</h1>
                                    <p class="present">{{isEnglish()? date('d F Y'): formatBanglaDate(date('d F Y'))}}</p>
                                </div>
                            </div>
                        </div>
                        <!-- Sub-grid here -->
                        <div class="grid grid-cols-12 gap-x-6">
                            <div class="md:col-span-8 col-span-12">
                                <div class="about-content-wrap">
                                    <div class="text-area-card">
                                        {!! isEnglish()?$page->description_en:$page->description !!}
                                    </div>
                                </div>
                            </div>
                            <div class="md:col-span-4 col-span-12 md:mt-0 mt-4">
                                <div class="grid grid-cols-12 gap-4 ">
                                    <div class="col-span-12">
                                        <div class="section-title-wrap">
                                            <h2 class="section-title">{{__('lang.selected_news')}}</h2>
                                        </div>
                                    </div>
                                    @foreach($side_news as $news)
                                        <div class="md:col-span-12 col-span-6">
                                            <div class="news-card">
                                                <div class="thumbnail">
                                                    <a href="{{route('news_details', ['id' => $news->id, 'slug' => $news->slug])}}"><img src="{{asset('storage')}}/{{$news->media->thumbnail??null}}" alt="Thumbnail"></a>
                                                </div>
                                                <h1 class="title"><a href="{{route('news_details', ['id' => $news->id, 'slug' => $news->slug])}}">{{Str::limit($news->title, 50)}}</a></h1>
                                                <div class="date">
                                                    <p>{{isEnglish()?date_maker($news->publishing_date, 'd F Y'): formatBanglaDate($news->publishing_date)}}</p>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="col-span-12">
                                        <!-- ad area start -->
                                        @include('layouts.partials.ads.side_ad', ['ad' => $side_ad])
                                        <!-- ad area end -->
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

