@php
    use App\Models\Post;use Illuminate\Support\Str;
    $latest = Post::select('id', 'slug', 'title', 'media_id')->orderBy('id', 'DESC')->where([[checkPost()],['latest_news', 1],['language', isEnglish()?'en':'bn']])->take(10)->get();
    $best_hit = Post::select('id', 'slug', 'title', 'media_id')
    ->where('publishing_date', '>=', now()->subDays(3))
    ->where([
        [checkPost()],
        ['language', isEnglish() ? 'en' : 'bn']
    ])
    ->orderBy('hit', 'DESC')
    ->take(10)
    ->get();
@endphp
{{--<div class="sidebar-card">--}}
{{--    <!-- Tab Header -->--}}
{{--    <div class="button_wrap">--}}
{{--        <button class="sidebar-button active-tab">--}}
{{--            {{__('lang.latest')}}--}}
{{--        </button>--}}
{{--        <button class="sidebar-button">--}}
{{--            {{__('lang.most_read')}}--}}
{{--        </button>--}}
{{--    </div>--}}

{{--    <!-- সর্বশেষ Tab -->--}}
{{--    <ul id="latest" class="md:space-y-6 space-y-4 tab-content ">--}}
{{--        @foreach($latest as $latest_item)--}}
{{--            <li class="sidebar-item">--}}
{{--                <span>{{isEnglish()?$loop->iteration:bangla_number($loop->iteration)}}</span><a--}}
{{--                    href="{{route('news_details', $latest_item->id)}}"--}}
{{--                    class="sidebar-link">{{$latest_item->title}}</a>--}}
{{--            </li>--}}
{{--        @endforeach--}}
{{--        <li class="sidebar-item">--}}
{{--            <a href="{{route('last_published')}}" class="read-more-btn">{{__('lang.read_more')}} <i class="fa-solid fa-angle-right"></i></a>--}}
{{--        </li>--}}
{{--    </ul>--}}

{{--    <!-- সর্বাধিক পঠিত Tab -->--}}
{{--    <ul id="popular" class="tab-content md:space-y-6 space-y-4 hidden">--}}
{{--        @foreach($best_hit as $best_hit_item)--}}
{{--            <li class="sidebar-item">--}}
{{--                <span>{{isEnglish()?$loop->iteration:bangla_number($loop->iteration)}}</span><a--}}
{{--                    href="{{route('news_details', $best_hit_item->id)}}"--}}
{{--                    class="sidebar-link">{{$best_hit_item->title}}</a>--}}
{{--            </li>--}}
{{--        @endforeach--}}
{{--        <li class="sidebar-item">--}}
{{--            <a href="{{route('most_read')}}" class="read-more-btn">{{__('lang.read_more')}} <i class="fa-solid fa-angle-right"></i></a>--}}
{{--        </li>--}}
{{--    </ul>--}}
{{--</div>--}}

<div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">

    <!-- Tabs -->
    <div class="flex relative text-sm font-semibold border-b">
        <button class="sidebar-button active-tab flex-1 py-3 text-center text-red-600 relative">
            <i class="fa-regular fa-clock mr-1"></i> {{__('lang.latest')}}
        </button>
        <button class="sidebar-button flex-1 py-3 text-center text-gray-500">
            <i class="fa-solid fa-chart-line mr-1"></i> {{__('lang.most_read')}}
        </button>

        <!-- Active underline -->
        <span class="absolute bottom-0 left-0 w-1/2 h-[2px] bg-red-600 transition-all duration-300"></span>
    </div>

    <!-- Latest -->
    <ul id="latest" class="tab-content divide-y">
        @foreach($latest as $latest_item)
            <li class="flex items-start gap-3 p-4 hover:bg-gray-50 transition group">

                <!-- Number -->
                <span class="text-red-600 font-bold text-sm min-w-[22px]">
                    {{isEnglish()?$loop->iteration:bangla_number($loop->iteration)}}
                </span>

                <!-- Title -->
                <a href="{{route('news_details', $latest_item->id)}}"
                   class="text-gray-800 text-sm leading-snug group-hover:text-red-600 transition line-clamp-2">
                    {{$latest_item->title}}
                </a>
            </li>
        @endforeach

        <!-- Read More -->
        <li class="p-4">
            <a href="{{route('last_published')}}"
               class="flex items-center justify-center text-red-600 border border-red-600 py-2 rounded-lg hover:bg-red-600 hover:text-white transition text-sm font-medium">
                {{__('lang.read_more')}} <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
            </a>
        </li>
    </ul>

    <!-- Popular -->
    <ul id="popular" class="tab-content divide-y hidden">
        @foreach($best_hit as $best_hit_item)
            <li class="flex items-start gap-3 p-4 hover:bg-gray-50 transition group">

                <span class="text-red-600 font-bold text-sm min-w-[22px]">
                    {{isEnglish()?$loop->iteration:bangla_number($loop->iteration)}}
                </span>

                <a href="{{route('news_details', $best_hit_item->id)}}"
                   class="text-gray-800 text-sm leading-snug group-hover:text-red-600 transition line-clamp-2">
                    {{$best_hit_item->title}}
                </a>
            </li>
        @endforeach

        <li class="p-4">
            <a href="{{route('most_read')}}"
               class="flex items-center justify-center text-red-600 border border-red-600 py-2 rounded-lg hover:bg-red-600 hover:text-white transition text-sm font-medium">
                {{__('lang.read_more')}} <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
            </a>
        </li>
    </ul>

</div>

