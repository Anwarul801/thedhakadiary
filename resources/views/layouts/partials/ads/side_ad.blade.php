@if(isset($ad))
    <div class="adSmall">
        @if($ad->type== 'Internal')
            <a target="_blank" href="{{$ad->link??null}}">
                <img src="{{asset('storage')}}/{{$ad->file??null}}" alt="ad image">
            </a>
        @else
            {!! $ad->code !!}
        @endif
    </div>
@endif
