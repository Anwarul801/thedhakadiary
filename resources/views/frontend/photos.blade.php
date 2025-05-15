@php use Carbon\Carbon;use Illuminate\Support\Str; @endphp
@extends('layouts.frontend_layout')

@section('page_title')
    {{__('lang.photo')}}
@endsection
@section('main_content')
    <main class="site-content flex-1">
        <!--=========Photo_Section=========== -->
        <section class="photo-section section_short-padding">
            <div class="container">
                <div class="section-title-wrap">
                    <h2 class="section-title section-single-title">{{__('lang.photo')}}</h2>
                </div>
                @if ($photos->currentPage() == 1)
                    <!-- Top -->
                    <div class="grid grid-cols-12 md:gap-6 gap-4">
                        @foreach($photos as $photo)
                            @if($loop->iteration!=1)
                                @continue
                            @endif
                            @php

                                $postDateTime = Carbon::parse($photo->date_time);
                                $now = Carbon::now();
                            @endphp
                            <div class="md:col-span-6 col-span-12">
                                <div class="news-card">
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
                                                {{ isEnglish() ? $postDateTime->format('d F, Y') : formatBanglaDate($postDateTime->format('d F Y')) }}
                                            @else
                                                {{ isEnglish() ? $postDateTime->diffForHumans() : bangla_number($postDateTime->diffForHumans()) }}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="md:col-span-6 col-span-12">
                            <div class="grid grid-cols-12 md:gap-y-4 gap-y-0 gap-x-4 md:gap-x-6">
                                @foreach($photos as $photo)

                                    @php

                                        $postDateTime = Carbon::parse($photo->date_time);
                                        $now = Carbon::now();
                                    @endphp
                                    @if($loop->iteration==2 || $loop->iteration==3 || $loop->iteration==4 || $loop->iteration==5)
                                        <div class="md:col-span-6 col-span-6">
                                            <div class="news-card">
                                                <div class="image-thumbnail">
                                                    <a href="{{route('photo_details', ['id' => $photo->id, 'slug' => $photo->title_en])}}"><img
                                                            src="{{asset($photo->thumbnail)}}"
                                                            alt="Thumbnail"></a>
                                                    <span class="image-icon"><i class="fa-solid fa-images"></i></span>
                                                </div>
                                                <h1 class="title">
                                                    <a href="{{route('photo_details', ['id' => $photo->id, 'slug' => $photo->title_en])}}"> {{Str::limit(isEnglish()?$photo->title_en:$photo->title)}} </a>
                                                </h1>
                                                <div class="date">
                                                    <p>
                                                        @if ($postDateTime->diffInHours($now) > 24)
                                                            {{ isEnglish() ? $postDateTime->format('d F, Y') : formatBanglaDate($postDateTime->format('d F Y')) }}
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
                        @foreach($photos as $photo)

                            @php

                                $postDateTime = Carbon::parse($photo->date_time);
                                $now = Carbon::now();
                            @endphp
                            @if($loop->iteration==2 || $loop->iteration==3 || $loop->iteration==4 || $loop->iteration==5 || $loop->iteration==1)
                                @continue
                            @endif
                                <div class="lg:col-span-3 md:col-span-4 col-span-6">
                                    <div class="news-card">
                                        <div class="image-thumbnail">
                                            <a href="{{route('photo_details', ['id' => $photo->id, 'slug' => $photo->title_en])}}"><img
                                                    src="{{asset($photo->thumbnail)}}"
                                                    alt="Thumbnail"></a>
                                            <span class="image-icon"><i class="fa-solid fa-images"></i></span>
                                        </div>
                                        <h1 class="title">
                                            <a href="{{route('photo_details', ['id' => $photo->id, 'slug' => $photo->title_en])}}">{{Str::limit(isEnglish()?$photo->title_en:$photo->title)}} </a>
                                        </h1>
                                        <div class="date">
                                            <p>
                                                @if ($postDateTime->diffInHours($now) > 24)
                                                    {{ isEnglish() ? $postDateTime->format('d F, Y') : formatBanglaDate($postDateTime->format('d F Y')) }}
                                                @else
                                                    {{ isEnglish() ? $postDateTime->diffForHumans() : bangla_number($postDateTime->diffForHumans()) }}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>

                        @endforeach



                        <!-- pagination -->
                        {{$photos->links('vendor.pagination.custom')}}
                    </div>

                @else
                    <!-- bottom -->
                    <div
                        class="grid grid-cols-12 md:gap-6 gap-4 md:pt-7.5 sm:pt-6 pt-4 border-t border-stock-color md:mt-6 mt-5">
                        @foreach($photos as $photo)

                            @php

                                $postDateTime = Carbon::parse($photo->date_time);
                                $now = Carbon::now();
                            @endphp
                            <div class="lg:col-span-3 md:col-span-4 col-span-6">
                                <div class="news-card">
                                    <div class="image-thumbnail">
                                        <a href="{{route('photo_details', ['id' => $photo->id, 'slug' => $photo->title_en])}}"><img
                                                src="{{asset($photo->thumbnail)}}"
                                                alt="Thumbnail"></a>
                                        <span class="image-icon"><i class="fa-solid fa-images"></i></span>
                                    </div>
                                    <h1 class="title">
                                        <a href="{{route('photo_details', ['id' => $photo->id, 'slug' => $photo->title_en])}}">{{Str::limit(isEnglish()?$photo->title_en:$photo->title)}} </a>
                                    </h1>
                                    <div class="date">
                                        <p>
                                            @if ($postDateTime->diffInHours($now) > 24)
                                                {{ isEnglish() ? $postDateTime->format('d F, Y') : formatBanglaDate($postDateTime->format('d F Y')) }}
                                            @else
                                                {{ isEnglish() ? $postDateTime->diffForHumans() : bangla_number($postDateTime->diffForHumans()) }}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                        <!-- pagination -->
                        {{$photos->links('vendor.pagination.custom')}}
                    </div>
                @endif

            </div>
        </section>

    </main>
@endsection

