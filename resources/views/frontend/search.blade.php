@php use Illuminate\Support\Str; @endphp
@extends('layouts.frontend_layout')

@section('page_title') {{__('lang.search')}} @endsection

@section('main_content')
    <main class="site-content flex-1">
        <section class="section-padding">
            <div class="container">

                <div class="page-title-wrap border-b border-stock-color md:pb-6 pb-4 md:mb-6 mb-4">
                    <h1 class="page-title mb-4 md:mb-6">{{__('lang.search')}}</h1>
                    <form action="{{route('search')}}" class="">
                        <div class="grid cols-12 md:gap-6 gap-4 items-end">
                            <!-- Text search -->
                            <div>
                                <label class="block mb-1 font-semibold md:text-base text-sm">{{__('lang.search')}} :</label>
                                <input value="{{request()->get('search')}}" type="text" name="search" placeholder="{{__('lang.search_placeholder')}}"
                                       class="w-full md:text-base text-sm border border-gray-300 px-3 md:py-2 py-1 focus:outline-none focus:ring focus:ring-blue-200" />
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="mt-6 flex justify-center">
                            <button type="submit"
                                    class="bg-stock-color cursor-pointer hover:bg-black text-primary hover:text-white font-bold py-2 px-10 transition">
                               <i class="fa fa-search"></i> {{__('lang.search')}}
                            </button>
                        </div>

                    </form>
                </div>
                <div class="grid grid-cols-12 md:gap-6 gap-4">
                    @forelse($posts as $post)
                        <div class="lg:col-span-3 md:col-span-4 col-span-6">
                            <div class="news-card">
                                <div class="thumbnail">
                                    <a href="{{route('news_details', $post->id)}}"><img src="{{asset('storage')}}/{{$post->media->thumbnail??null}}" alt="Thumbnail"></a>
                                </div>
                                <h1 class="title">
                                    <a href="{{route('news_details', $post->id)}}">{{Str::limit($post->title, 100)}}</a>
                                </h1>
    {{--                                <div class="date">--}}
    {{--                                    <p>{{format_publishing_date($post->publishing_date)}}</p>--}}

    {{--                                </div>  --}}
                            </div>
                        </div>
                    @empty
                        <div class="col-span-12 text-center ">
                            <h3 class="text-2xl">{{__('lang.no_data_found')}}</h3>
                        </div>
                    @endforelse
                </div>

                <!-- pagination -->
                    {{$posts->links('vendor.pagination.custom')}}

            </div>
        </section>
    </main>
@endsection

