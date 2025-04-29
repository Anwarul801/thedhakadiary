<div class="first-news-single">
    <div class="image">
        @if($post->video_id != null)
            <div class="video_duration_large_news">
                <p>{{$post->video_duration}}</p>

            </div>
        @endif
        <a href="{{route('news_details', ['id' => $post->id, 'slug' => $post->slug] )}}">
            <img class="img_full_image" src="{{asset('storage')}}/{{$post->media->xs_thumbnail}}" alt="ra">
        </a>
    </div>
    <div class="first-content">
        @if(!isset($no_subtitle))
            <h2><a style="font-size: 21px" class="text-danger" href="{{route('news_details', ['id' => $post->id, 'slug' => $post->slug])}}">{{$post->shoulder}}</a></h2>
            <h3><a href="{{route('news_details', ['id' => $post->id, 'slug' => $post->slug])}}">{{$post->title}}</a></h3>
        @else
            <p><a style="color: var(--soft-dark)" href="{{route('news_details', ['id' => $post->id, 'slug' => $post->slug])}}">{{$post->title}}</a></p>
        @endif
        @if(!isset($no_subtitle))
            <p>
                {{ $post->meta_description }}
            </p>
        @endif
{{--        <p class="time"><i class="far fa-clock"></i><span>{{ date_maker($post->publishing_date, 'd m, y', true)  }}</span></p>--}}
    </div>
</div>
