<header class="header-bottom">
    <!-- Top Bar -->
    <div class="bg-black text-white text-sm">
        <div class="container">
            <div class="flex justify-between items-center lg:py-4 md:py-3 py-2">
                <div>
                    <a href="{{route('index_page')}}" class="main-logo"><img src="{{asset('storage')}}/{{getOptionData('logo')}}" alt="The Dhaka Diary"
                                                                class="w-full" /></a>
                </div>
                <div class="flex items-center space-x-4 text-base">
                    <span class="hidden sm:block">{{isEnglish()?date('d F Y, l'):bangla_number(\Carbon\Carbon::now()->locale('bn')->isoFormat('D MMMM YYYY, dddd'))}}</span>
                    <div class="border-l border-gray-400 pl-2 flex items-center gap-1.5">
                        <a href="{{route('change_lang')}}" class="appearance-none font-noto-bengali cursor-pointer"><i class="fa-solid fa-globe"></i>
                            {{isEnglish()?' বাংলা ':'English '}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Nav -->
    <div class="shadow-top">
        <div class="container">
            <div class="block ">
                <div class="flex justify-between items-center lg:py-6 sm:py-2.5 relative">
                     <!-- Mobile hamburger -->
                    <div class="lg:hidden">
                        <a href="javascript:;"
                           class="mobile-menu-open text-primary text-2xl focus:outline-none transition-all duration-700 ease-in-out cursor-pointer !inline-block">
                            <i class="fas fa-bars"></i>
                        </a>
                    </div>
                    <!-- Left menu -->
                    <div class="header-horizontal-menu lg:block overflow-x-scroll md:overflow-auto py-2">
                        <ul class="menu-content xl:space-x-5 lg:space-x-4 flex flex-nowrap gap-4 items-center">
                            <li class="active index-item"><a href="{{route('index_page')}}" class="nav-link"><i class="fa-solid fa-house text-xl"></i></a>
                            </li>
                            @foreach($menu_header as $menu)
                                @if($loop->iteration == 9)
                                    @break
                                @endif
                                    @if($menu->type == 'Category')
                                        <li><a href="{{ route('category_view', $menu->category->slug) }}" class="nav-link">{{ isEnglish()? $menu->title_en : $menu->title }}</a></li>
                                    @endif
                                    @if($menu->type == 'Page')
                                        <li><a href="{{ route('page_view', $menu->page_id) }}" class="nav-link">{{ isEnglish()? $menu->title_en : $menu->title }}</a></li>
                                    @endif
                                    @if($menu->type == 'Link')
                                        <li><a href="{{ $menu->link }}" class="nav-link">{{ isEnglish()? $menu->title_en : $menu->title }}</a></li>
                                    @endif
                            @endforeach
                            @php
                                $chunks = $menu_header->chunk(ceil(count($menu_header) / 4));
                             @endphp
                            <!-- Mega Menu Trigger Start -->
                            <li class="menu-item-has-children has-sub-menu megamenu-trigger">
                                <a href="#" class="nav-link"><i class="fa-solid fa-bars"></i></a>
                                <ul class="mega-sub-menu">
                                    @forelse ($chunks as $chunk)
                                        <li class="submenu-item">
                                            <ul>
                                                @foreach ($chunk as $menu)
                                                    @if($menu->type == 'Category')
                                                        <li><a href="{{ route('category_view', $menu->category->slug) }}" class="nav-link">{{ isEnglish()? $menu->title_en : $menu->title }}</a></li>
                                                    @endif
                                                    @if($menu->type == 'Page')
                                                        <li><a href="{{ route('page_view', $menu->page_id) }}" class="nav-link">{{ isEnglish()? $menu->title_en : $menu->title }}</a></li>
                                                    @endif
                                                    @if($menu->type == 'Link')
                                                        <li><a href="{{ $menu->link }}" class="nav-link">{{ isEnglish()? $menu->title_en : $menu->title }}</a></li>
                                                    @endif
                                                @endforeach
                                                @if($loop->last)
                                                        <li><a href="{{route('archive')}}" class="nav-link">{{__('lang.archive')}}</a></li>
                                                @endif
                                            </ul>
                                        </li>
                                    @empty
                                        <li class="submenu-item">
                                            <ul>
                                                    <li><a href="{{route('archive')}}" class="nav-link">{{__('lang.archive')}}</a></li>
                                            </ul>
                                        </li>
                                    @endforelse


                                </ul>
                            </li>
                            <!-- Mega Menu Trigger End -->
                        </ul>
                    </div>

                   

                    <!-- Right Icons -->
                    <div class="right_icon space-x-3 flex justify-center">
                        <form action="{{ route('search') }}" method="GET" class="relative group w-fit !mr-0 !md:mr-2" id="searchForm">
                            <input id="searchInput" type="text" name="search" placeholder="{{ __('lang.search') }}"
                                   class="w-10 pr-10 pl-3 py-1 rounded-full focus:w-52 focus:pr-12 focus:outline-none focus:ring-1 focus:ring-primary transition-all duration-300 ease-in-out" />

                            <button type="button"
                                    onclick="handleSearchClick()"
                                    class="absolute right-2 top-1/2 -translate-y-1/2 w-6 h-6 flex items-center justify-center text-primary cursor-pointer">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </form>

                        <ul class="items-center md:space-x-3 space-x-1.5 text-xl hidden md:flex">
                            <li class="{{getOptionData('fb')==null?'hidden':''}}"><a target="_blank" href="{{getOptionData('fb')}}" class="social_icon"><i class="fa-brands fa-facebook-f"></i></a></li>
                            <li class="{{getOptionData('twitter')==null?'hidden':''}}"><a target="_blank" href="{{getOptionData('twitter')}}" class="social_icon"><i class="fa-brands fa-x-twitter"></i></a></li>
                            <li class="{{getOptionData('instagram')==null?'hidden':''}}"><a target="_blank" href="{{getOptionData('instagram')}}" class="social_icon"><i class="fa-brands fa-square-instagram"></i></a></li>
                            <li class="{{getOptionData('telegram')==null?'hidden':''}}"><a target="_blank" href="{{getOptionData('telegram')}}" class="social_icon"><i class="fa-solid fa-paper-plane"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="block lg:hidden">
                <div class="mobile-off-canvas-menu">
                    <div class="mobile-logo m-logo">
                        <div class="logo-wrap p-3">
                            <a href="{{route('index_page')}}" class="main-logo"><img src="{{asset('storage')}}/{{getOptionData('logo')}}" alt="The Dhaka Diary"
                                                                        class="w-full" /></a>
                        </div>
                    </div>

                    <div class="mobile-canvas-close shadow-top">
                        <p class="text-lg font-semibold">{{__('lang.menu')}}</p>
                        <span class="close-mobile-menu">❌</span>
                    </div>

                    <div class="mobile-main-menu p-4">
                        <ul class="space-y-2 md:flex lg:items-center flex-col">
                            @foreach($menu_header as $menu)
                                @if($menu->type == 'Category')
                                    <li><a href="{{ route('category_view', $menu->category->slug) }}" class="nav-link">{{ isEnglish()? $menu->title_en : $menu->title }}</a></li>
                                @endif
                                @if($menu->type == 'Page')
                                    <li><a href="{{ route('page_view', $menu->page_id) }}" class="nav-link">{{ isEnglish()? $menu->title_en : $menu->title }}</a></li>
                                @endif
                                @if($menu->type == 'Link')
                                    <li><a href="{{ $menu->link }}" class="nav-link">{{ isEnglish()? $menu->title_en : $menu->title }}</a></li>
                                @endif
                            @endforeach
                                <li><a href="{{route('archive')}}" class="nav-link">{{__('lang.archive')}}</a></li>

                        </ul>
                    </div>

                    <div class="follower-part p-4 pt-0 flex gap-4 items-center">
                        <p class="text-base font-bold">{{__('lang.follow_us')}} :</p>

                        <ul class="items-center md:space-x-3 space-x-1.5 text-xl flex">
                            <li class="{{getOptionData('fb')==null?'hidden':''}}"><a target="_blank" href="{{getOptionData('fb')}}" class="social_icon"><i class="fa-brands fa-facebook-f"></i></a></li>
                            <li class="{{getOptionData('twitter')==null?'hidden':''}}"><a target="_blank" href="{{getOptionData('twitter')}}" class="social_icon"><i class="fa-brands fa-x-twitter"></i></a></li>
                            <li class="{{getOptionData('instagram')==null?'hidden':''}}"><a target="_blank" href="{{getOptionData('instagram')}}" class="social_icon"><i class="fa-brands fa-square-instagram"></i></a></li>
                            <li class="{{getOptionData('telegram')==null?'hidden':''}}"><a target="_blank" href="{{getOptionData('telegram')}}" class="social_icon"><i class="fa-solid fa-paper-plane"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="overlay"></div>
            </div>

        </div>
    </div>
</header>
