<div class="news-right">
    <div class="right-head">
        <h4>সর্বশেষ</h4>
    </div>
    @foreach($sorbosesh as $sb)
        <div class="news-item">
            <div class="item-img">
                <img src="{{asset('storage')}}/{{$sb->media->xs_thumbnail}}" alt="a">
            </div>
            <div class="news-content">
                <h3><a href="{{route('news_details', ['id' => $sb->id, 'slug' => $sb->slug])}}">{{$sb->title}}</a></h3>
            </div>
        </div>
    @endforeach
</div>
