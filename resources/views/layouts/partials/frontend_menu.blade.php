<li class="only_mobile"><a href="{{ route('search') }}"> <span class="mr-2">সার্চ করুন</span> <i class="fa fa-search"></i></a></li>
<li><a href="{{ route('index_page') }}">প্রচ্ছদ</a></li>
<li><a href="{{route('last_published')}}">সর্বশেষ</a></li>
@foreach($menu_header as $menu)
    @if($loop->iteration == 9)
       @break
    @endif
    @if($menu->type == 'Category')
        <li><a href="{{ route('category_view', $menu->category->slug) }}">{{ $menu->title }}</a></li>
    @endif
    @if($menu->type == 'Page')
        <li><a href="{{ route('page_view', $menu->page_id) }}">{{ $menu->title }}</a></li>
    @endif
    @if($menu->type == 'Link')
        <li><a href="{{ $menu->link }}">{{ $menu->title }}</a></li>
    @endif
@endforeach

<li class="{{ isset($mobile_menu) ? ($mobile_menu ? 'menu-item-has-children' : ''): '' }}"><a onclick="event.preventDefault();">আরও <i class="fas fa-angle-down"></i></a>
    <ul class="sub-menu">
        @foreach($menu_header as $menu)
            @if($loop->iteration <= 9)
                @continue
            @endif
            @if($menu->type == 'Category')
                <li><a href="{{ route('category_view', $menu->category->slug) }}">{{ $menu->title }}</a></li>
            @endif
            @if($menu->type == 'Page')
                <li><a href="{{ route('page_view', $menu->page_id) }}">{{ $menu->title }}</a></li>
            @endif
            @if($menu->type == 'Link')
                <li><a href="{{ $menu->link }}">{{ $menu->title }}</a></li>
            @endif
        @endforeach
    </ul>
</li>
<li class="except_mobile"><a href="{{ route('search') }}"><i class="fa fa-search"></i></a></li>

{{--<li><a href="" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop"><i class="fa fa-search"></i></a></li>--}}

{{--<div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">--}}
{{--    <div class="offcanvas-header">--}}
{{--        <h5 id="offcanvasTopLabel">সার্চ করুন</h5>--}}
{{--        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>--}}
{{--    </div>--}}
{{--    <div class="offcanvas-body text-center">--}}
{{--        <form action="{{ route('search') }}" method="get">--}}
{{--            <input type="text" name="search" placeholder="লিখুন ..." class="form-control">--}}
{{--            <button type="submit" style="margin-top: 20px; background-color: var(--main-color); color: white; padding: 10px 25px; border: unset; border-radius: 5px">সার্চ করুন</button>--}}
{{--        </form>--}}
{{--    </div>--}}
{{--</div>--}}
