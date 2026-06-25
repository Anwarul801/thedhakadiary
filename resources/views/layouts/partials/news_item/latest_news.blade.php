@php
    use App\Models\Post;use Illuminate\Support\Str;
    $latest = Post::select('posts.id', 'posts.slug', 'posts.title', 'posts.media_id', 'media.xs_thumbnail as thumbnail')
        ->leftJoin('media', 'media.id', '=', 'posts.media_id')
        ->where('posts.status', 'Published')
        ->where('posts.latest_news', 1)
        ->where('posts.language', isEnglish() ? 'en' : 'bn')
        ->orderBy('posts.id', 'DESC')
        ->take(10)->get();
    $best_hit = Post::select('posts.id', 'posts.slug', 'posts.title', 'posts.media_id', 'media.xs_thumbnail as thumbnail')
        ->leftJoin('media', 'media.id', '=', 'posts.media_id')
        ->where('posts.publishing_date', '>=', now()->subDays(3))
        ->where('posts.status', 'Published')
        ->where('posts.language', isEnglish() ? 'en' : 'bn')
        ->orderBy('posts.hit', 'DESC')
        ->take(10)->get();
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
        <ul class="sidebar-news-list">
            @foreach($latest as $latest_item)
                <li class="sidebar-news-item">
                    <a href="{{route('news_details', $latest_item->id)}}" class="sidebar-news-link">
                        <div class="sidebar-news-thumb">
                            <img src="{{ asset('storage') }}/{{ $latest_item->thumbnail }}" alt="{{ $latest_item->title }}" loading="lazy" onerror="this.style.display='none'">
                        </div>
                        <p class="sidebar-news-title">{{ Str::limit($latest_item->title, 60) }}</p>
                    </a>
                </li>
            @endforeach
        </ul>
        <a href="{{route('last_published')}}" class="sidebar-all-btn">{{__('lang.read_more')}}</a>
    </div>

    <!-- সর্বাধিক পঠিত Tab -->
    <div id="{{$uid}}_popular" class="tab-content" style="display:none">
        <ul class="sidebar-news-list">
            @foreach($best_hit as $best_hit_item)
                <li class="sidebar-news-item">
                    <a href="{{route('news_details', $best_hit_item->id)}}" class="sidebar-news-link">
                        <div class="sidebar-news-thumb">
                            <img src="{{ asset('storage') }}/{{ $best_hit_item->thumbnail }}" alt="{{ $best_hit_item->title }}" loading="lazy" onerror="this.style.display='none'">
                        </div>
                        <p class="sidebar-news-title">{{ Str::limit($best_hit_item->title, 60) }}</p>
                    </a>
                </li>
            @endforeach
        </ul>
        <a href="{{route('most_read')}}" class="sidebar-all-btn">{{__('lang.read_more')}}</a>
    </div>
</div>
