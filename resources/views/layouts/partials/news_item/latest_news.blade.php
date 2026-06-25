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
    $uid = uniqid('sidebar_');
@endphp
<div class="sidebar-card">
    <!-- Tab Header -->
    <div class="button_wrap">
        <button class="sidebar-button active-tab" onclick="switchTab('{{$uid}}_latest', this)">
            {{__('lang.latest')}}
        </button>
        <button class="sidebar-button" onclick="switchTab('{{$uid}}_popular', this)">
            {{__('lang.most_read')}}
        </button>
    </div>

    <!-- সর্বশেষ Tab -->
    <div id="{{$uid}}_latest" class="tab-content">
        <ul class="latest-news-scroll-list">
            @foreach($latest as $latest_item)
                <li class="sidebar-item">
                    <span>{{isEnglish()?$loop->iteration:bangla_number($loop->iteration)}}</span>
                    <a href="{{route('news_details', $latest_item->id)}}" class="sidebar-link">{{$latest_item->title}}</a>
                </li>
            @endforeach
        </ul>
        <a href="{{route('last_published')}}" class="read-more-btn">{{__('lang.read_more')}} <i class="fa-solid fa-angle-right"></i></a>
    </div>

    <!-- সর্বাধিক পঠিত Tab -->
    <div id="{{$uid}}_popular" class="tab-content" style="display:none">
        <ul class="latest-news-scroll-list">
            @foreach($best_hit as $best_hit_item)
                <li class="sidebar-item">
                    <span>{{isEnglish()?$loop->iteration:bangla_number($loop->iteration)}}</span>
                    <a href="{{route('news_details', $best_hit_item->id)}}" class="sidebar-link">{{$best_hit_item->title}}</a>
                </li>
            @endforeach
        </ul>
        <a href="{{route('most_read')}}" class="read-more-btn">{{__('lang.read_more')}} <i class="fa-solid fa-angle-right"></i></a>
    </div>
</div>
