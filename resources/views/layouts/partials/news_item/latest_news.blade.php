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
<div class="sidebar-card">
    <!-- Tab Header -->
    <div class="button_wrap">
        <button class="sidebar-button active-tab">
            {{__('lang.latest')}}
        </button>
        <button class="sidebar-button">
            {{__('lang.most_read')}}
        </button>
    </div>

    <!-- সর্বশেষ Tab -->
    <ul id="latest" class="md:space-y-6 space-y-4 tab-content ">
        @foreach($latest as $latest_item)
            <li class="sidebar-item">
                <span>{{isEnglish()?$loop->iteration:bangla_number($loop->iteration)}}</span><a
                    href="{{route('news_details', ['id' => $latest_item->id, 'slug' => $latest_item->slug])}}"
                    class="sidebar-link">{{Str::limit($latest_item->title, 50)}}</a>
            </li>
        @endforeach
        <li class="sidebar-item">
            <a href="{{route('last_published')}}" class="read-more-btn">{{__('lang.read_more')}} <i class="fa-solid fa-angle-right"></i></a>
        </li>
    </ul>

    <!-- সর্বাধিক পঠিত Tab -->
    <ul id="popular" class="tab-content md:space-y-6 space-y-4 hidden">
        @foreach($best_hit as $best_hit_item)
            <li class="sidebar-item">
                <span>{{isEnglish()?$loop->iteration:bangla_number($loop->iteration)}}</span><a
                    href="{{route('news_details', ['id' => $best_hit_item->id, 'slug' => $best_hit_item->slug])}}"
                    class="sidebar-link">{{Str::limit($best_hit_item->title, 50)}}</a>
            </li>
        @endforeach
        <li class="sidebar-item">
            <a href="{{route('most_read')}}" class="read-more-btn">{{__('lang.read_more')}} <i class="fa-solid fa-angle-right"></i></a>
        </li>
    </ul>
</div>
