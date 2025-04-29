<div class="news-item">
    <div class="item-img">
        @if($post->video_id != null)
            <div class="video_duration_small_news">
                <p>{{$post->video_duration}}</p>

            </div>
        @endif
        <a href="{{route('news_details', ['id' => $post->id, 'slug' => $post->slug])}}">
            <img src="{{asset('storage')}}/{{$post->media->xs_thumbnail}}" alt="a">
        </a>
    </div>
    <div class="news-content">
        @if(!isset($no_str_limit))
        <h3><a href="{{route('news_details', ['id' => $post->id, 'slug' => $post->slug])}}">{{ $post->title }}</a></h3>
        @else
        <h3><a href="{{route('news_details', ['id' => $post->id, 'slug' => $post->slug])}}">{{ $post->title }}</a></h3>
        @endif
    </div>
</div>
