<div class="ent-single">
    <div class="img">
        @if($post->video_id != null)
            <div class="video_duration_title_color_news">
                <p>{{$post->video_duration}}</p>

            </div>
        @endif
        <a href="{{route('news_details', ['id' => $post->id, 'slug' => $post->slug])}}"><img class="img_full_image" src="{{asset('storage')}}/{{$post->media->xs_thumbnail}}" alt="1"></a>
    </div>
    <h3><a href="{{route('news_details', ['id' => $post->id, 'slug' => $post->slug])}}">{{$post->title}}</a></h3>
</div>
