<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="{{ route('home') }}">
                        <i class="fe-airplay"></i>
                        <span> Dashboard </span>
                    </a>
                </li>
                @if(auth()->user()->role_id == 2)
                    <li>
                        <a href="javascript: void(0);">
                            <i class="fe-edit"></i>
                            <span> Post </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="{{ route('post.create') }}">Create Post</a></li>
                            <li><a href="{{route('post.index')}}">Post List</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('image_gallery.index') }}">
                            <i class="fe-image"></i>
                            <span> Photos </span>
                        </a>
                    </li>
                @endif
                @if(auth()->user()->role_id == 1)

                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-edit"></i>
                        <span> Post </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('post.create') }}">Create Post</a></li>
                        <li><a href="{{route('post.index')}}">Post List</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('image_gallery.index') }}">
                        <i class="fe-image"></i>
                        <span> Photos </span>
                    </a>
                </li>
                    <li>
                    <a href="{{ route('category.index') }}">
                        <i class="fe-layers"></i>
                        <span> Categories </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('menu.index') }}">
                        <i class="fe-menu"></i>
                        <span> Menu </span>
                    </a>
                </li>
{{--                <li>--}}
{{--                    <a href="{{ route('poll.index') }}">--}}
{{--                        <i class="fe-stop-circle"></i>--}}
{{--                        <span> Poll </span>--}}
{{--                    </a>--}}
{{--                </li>--}}
                <li>
                    <a href="{{ route('media.index') }}">
                        <i class="fe-image"></i>
                        <span> Media </span>
                    </a>
                </li>
{{--                <li>--}}
{{--                    <a href="{{ route('author.index') }}">--}}
{{--                        <i class="fe-edit-1"></i>--}}
{{--                        <span> AuthorMiddleware </span>--}}
{{--                    </a>--}}
{{--                </li>--}}
                <li>
                    <a href="{{ route('page.index') }}">
                        <i class="fe-file"></i>
                        <span> Pages </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('ad.index') }}">
                        <i class="fe-video-off"></i>
                        <span> Ad Management </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.index') }}">
                        <i class="fe-user"></i>
                        <span> User List </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('contact_message.index') }}">
                        <i class="fe-message-square"></i>

                        <span> Contact Messages </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('options.index') }}">
                        <i class="fe-settings"></i>
                        <span> Site Settings </span>
                    </a>
                </li>

                @endif
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
