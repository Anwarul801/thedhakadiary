<div class="first-snd-single">
    <div class="second_image">
        @if($post->video_id != null)
            <div class="video_duration_medium_news">
                <p>{{$post->video_duration}}</p>

            </div>
        @endif
        <a href="{{ route('news_details', ['id' => $post->id, 'slug' => $post->slug]) }}">
            <img class="img_thumb" src="{{asset('storage')}}/{{ $post->media->xs_thumbnail }}" alt="ad">
        </a>
    </div>
    <div class="second-content">
        <h3><a href="{{ route('news_details', ['id' => $post->id, 'slug' => $post->slug]) }}">{{ $post->title }}</a></h3>
{{--        <p class="time"><i class="far fa-clock"></i><span>{{ date_maker($post->publishing_date, 'd m, y', true)  }}</span></p>--}}
    </div>
</div>
