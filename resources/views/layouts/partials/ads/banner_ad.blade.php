@if(isset($ad))
    @isset($showClose)
        <div class="container">
            @if($ad->type== 'Internal')
                <a target="_blank" href="{{$ad->link??null}}">
                    <img src="{{asset('storage')}}/{{$ad->file??null}}" alt="ad image">
                </a>
            @else
                {!! $ad->code !!}
            @endif
            <div class="ad-close close_only">
                <i class="fa-solid fa-xmark"></i>
            </div>
        </div>
    @else
        <div class="container {{$ad!=null? '' : 'hidden'}}">
            <div class="ad-full">
                @if($ad->type== 'Internal')
                    <a target="_blank" href="{{$ad->link??null}}">
                        <img src="{{asset('storage')}}/{{$ad->file??null}}" alt="ad image">
                    </a>
                @else
                    {!! $ad->code !!}
                @endif
            </div>
        </div>
    @endisset

@endif
