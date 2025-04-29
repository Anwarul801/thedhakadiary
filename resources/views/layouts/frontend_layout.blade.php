<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <!--====== Title ======-->
    <title>@yield('page_title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@yield('meta_description', getOptionData('site_title'))"/>
    <meta name="keywords" content="@yield('meta_keywords', getOptionData('site_title'))"/>
    <meta property="og:locale" content="en_US">
    <meta property="og:title" content="@yield('og_title', getOptionData('site_title'))">
    <meta property="og:description" content="@yield('meta_description', getOptionData('site_title'))">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="@yield('og_subtitle', getOptionData('site_title'))">
    <meta property="og:image" content="@yield('og_image', asset('storage') .'/'. getOptionData('shared_image'))">
    <meta property="og:image:secure_url" content="{{ asset('storage') }}/{{ getOptionData('logo') }}">
    <meta property="og:image:width" content="940">
    <meta property="og:image:height" content="788">
    <meta property="og:image:alt" content="Asian Mail 24">
    <meta property="og:image:type" content="image/jpeg">
    <meta name="instagram:card" content="@yield('og_subtitle', getOptionData('site_title'))">
    <meta name="instagram:title" content="@yield('og_title', getOptionData('site_title'))">
    <meta name="instagram:description" content="@yield('meta_description', getOptionData('site_title'))">


    <link rel="stylesheet" href="{{asset('frontend')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/fontawesome.all.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/style.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/default.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/stkey.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/mega-menu.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/menu-responsive.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/responsive.css">

    <link rel="icon" href="{{ asset('storage') }}/{{ getOptionData('favicon') }}">

    {{-- toastr --}}
    <link rel="stylesheet" href="{{asset('admin')}}/css/toastr.min.css">
</head>
<body>

<!--====== PRELOADER PART START ======-->

<!--<div id="preloader">
    <div class="preloader">
        <span></span>
        <span></span>
    </div>
</div>-->

<!--====== PRELOADER PART ENDS ======-->


<!--====== Header Part Start ======-->

<header class="header-area">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 align-self-center">
                    <div class="top-address">
                        <ul>
                            <li><i class="fas fa-map-marker-alt"></i><span>ঢাকা</span></li>
                            <li><i class="fas fa-calendar"></i><span>{{date_maker(date('Y-m-d'),'d m y', true, true)}}</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 d-fox align-self-center text-center">
                    <div class="top-logo">
                        <a href="{{route('index_page')}}"><img src="{{asset('storage')}}/{{ getOptionData('logo') }}" alt="logo"></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 align-self-center">
                    <div class="top-social">
                        <ul>
                            <li class="{{getOptionData('fb') == null ? 'd-none' : ''}}"><a href="{{getOptionData('fb')}}"><img
                                        src="{{asset('frontend')}}/img/facebook.png" alt=""></a></li>
                            <li class="{{getOptionData('twitter') == null ? 'd-none' : ''}}"><a href="{{getOptionData('twitter')}}"><img
                                        src="{{asset('frontend')}}/img/twitter.png" alt=""></a></li>
                            <li class="{{getOptionData('linkedin') == null ? 'd-none' : ''}}"><a href="{{getOptionData('linkedin')}}"><img
                                        src="{{asset('frontend')}}/img/linkedin.png" alt=""></a></li>
                            <li class="{{getOptionData('instagram') == null ? 'd-none' : ''}}"><a href="{{getOptionData('instagram')}}"><img
                                        src="{{asset('frontend')}}/img/instagram.png" alt=""></a></li>
                            <li class="{{getOptionData('youtube') == null ? 'd-none' : ''}}"><a href="{{getOptionData('youtube')}}"><img
                                        src="{{asset('frontend')}}/img/youtube.png" alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-none d-lg-block">
                        <div class="header-menu">
                            <!--AkHAN THEKE MENU KAJ SURU-->
                            <div class="header-horizontal-menu text-center">
                                <ul class="menu-content">
                                    @include('layouts.partials.frontend_menu', ['mobile_menu' => false])
                                </ul>
                            </div>
                        </div> <!-- header menu -->
                    </div> <!-- desktop nav -->
                    <!--Mobile Nav Menu-->
                    <div class="d-lg-none">
                        <!--Bar-->
                        <div class="bar_logo">
                            <div class="mobile-logo mx-auto">
                                <a href="{{route('index_page')}}"><img src="{{asset('storage')}}/{{ getOptionData('logo_for_mobile') }}" alt="logo"></a>
                            </div> <!-- mobile logo -->
                            <div class="mobile-toggle">
                                <a class="mobile-menu-open" href="javascript:;"><i class="far fa-bars"></i></a>
                            </div>
                        </div>

                        <div class="mobile-off-canvas-menu">

                            <div class="mobile-canvas-close close-mobile-menu">
                                <p>Menu <i class="fas fa-times"></i></p>
                            </div>

                            <div class="mobile-main-menu">
                                <ul class="menu-content">
                                    @include('layouts.partials.frontend_menu', ['mobile_menu' => true])
                                </ul>
                            </div> <!-- mobile main menu -->
                        </div> <!-- mobile off canvas menu -->
                        <div class="overlay"></div>
                    </div>
                    <!-- mobile nav -->
                </div>
            </div>
        </div>
    </div>
</header>

    <div class="container mt-3">
@foreach($ads as $ad)
        <div class="container text-center">
            @if($ad->placement_id == 2 && ($ad->file_type == 'GIF' || $ad->file_type == 'Image') && $ad->type  == 'Internal')
                <a style="max-width: 100%;" href="{{$ad->link}}" target="_blank">
                    <img style="margin: 0 auto;" src="{{asset('storage')}}/{{$ad->file}}" alt="Ad Image">
                </a>
            @endif
            @if($ad->placement_id == 2 && $ad->file_type == "Video" && $ad->type  == 'Internal')
                <a style="max-width: 100%;" target="_blank" href="{{$ad->link}}">
                    <video src="{{asset('storage')}}/{{$ad->file}}"></video>
                </a>
            @endif
            @if($ad->placement_id == 2 && $ad->type == 'External')
                {!! $ad->code !!}
            @endif
        </div>
@endforeach
        <hr>
    </div>

@yield('marque')
 @yield('main_content')


@foreach($ads as $ad)
    @if($ad->placement_id == 9 && $ad != null)
    <div id="show-on-scroll">
        <div id="ad-container">
            <div class="container py-3 mb-0">
                    @if($ad->placement_id == 9 && ($ad->file_type == 'GIF' || $ad->file_type == 'Image') && $ad->type  == 'Internal')
                    <a style="width: 100%;" href="{{$ad->link}}" target="_blank">
                <img style="margin: 0 auto;" src="{{asset('storage')}}/{{$ad->file}}" alt="Ad Image">
                    </a>
                @endif
                        @if($ad->placement_id == 9 && $ad->file_type == "Video" && $ad->type  == 'Internal')
                            <a style="width: 100%;" target="_blank" href="{{$ad->link}}">
                                <video src="{{asset('storage')}}/{{$ad->file}}"></video>
                            </a>
                        @endif
            @if($ad->placement_id == 9 && $ad->type == 'External')
                {!! $ad->code !!}
            @endif

            </div>
            <button id="close-button"><i class="fas fa-times"></i></button>
        </div>

    </div>
    @endif
@endforeach


<footer class="footer-area">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 align-self-center">
                    <div class="ft-top-left">
                        <a href="{{route('index_page')}}"><img src="{{asset('storage')}}/{{ getOptionData('logo') }}" alt="logo"></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 align-self-center">
                    <div class="ft-top-right {{getOptionData('editor_name') == null ? 'd-none' : ''}}">
                        <p>সম্পাদক: {{getOptionData('editor_name')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-link">
                        <ul>
                            @foreach($pages as $page)
                                <li><a href="{{ route('page_view', $page->id) }}">{{$page->name}}</a></li>
                            @endforeach
                                <li><a href="{{ route('archive') }}?date={{date('Y-m-d')}}">আর্কাইভ</a></li>
                        </ul>
                    </div>
                    <div class="footer-address text-center">
                        <ul>
                            <li class="{{getOptionData('address') == null ? 'd-none' : ''}}"><span>{{getOptionData('address')}}</span></li>
                            <li class="{{getOptionData('phone_1') == null ? 'd-none' : ''}}"><span><a href="tel:{{getOptionData('phone_1')}}"><i class="fas fa-mobile"></i> {{getOptionData('phone_1')}}</a></span></li>
                            <li class="{{getOptionData('phone_2') == null ? 'd-none' : ''}}"><span><a href="tel:{{getOptionData('phone_2')}}"><i class="fas fa-mobile"></i> {{getOptionData('phone_2')}}</a></span></li>
                            <li class="{{getOptionData('email') == null ? 'd-none' : ''}}"><span><a href="mailto:{{getoptionData('email')}}"><i class="fas fa-envelope"></i> {{getOptionData('email')}}</a></span></li>
                            <li class="{{getOptionData('email_2') == null ? 'd-none' : ''}}"><span><a href="mailto:{{getOptionData('email_2')}}"><i class="far fa-envelope"></i> {{getOptionData('email_2')}}</a></span></li>
                        </ul>
                    </div>
                    <div class="footer-description text-center">
                        <p>{!! getOptionData('footer_description') !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<p class="copy_right">
    &copy; 2023 | All Right Reserved | Developed By <a target="_blank" href="https://innovainst.com/">INNOVA IT</a>
</p>



<!--jQuery js-->
<script src="{{asset('frontend')}}/js/jquery-3.3.1.min.js"></script>
<!--proper js-->
<script src="{{asset('frontend')}}/js/popper.min.js"></script>
<!--bootstrap js-->
<script src="{{asset('frontend')}}/js/bootstrap.min.js"></script>
<!--mainmenu js-->
<script src="{{asset('frontend')}}/js/meanmenu.min.js"></script>
<!--counterup js-->
<script src="{{asset('frontend')}}/js/counter.min.js"></script>
<!--popup js-->
<script src="{{asset('frontend')}}/js/magnific-popup.min.js"></script>
<!--counterup js-->
<script src="{{asset('frontend')}}/js/owl.carousel.min.js"></script>
<!--waypoints js-->
<script src="{{asset('frontend')}}/js/waypoints.js"></script>
<!--ajax js-->
<script src="{{asset('frontend')}}/js/ajax.js"></script>
<script src="{{asset('frontend')}}/js/main.js"></script>
{{-- toastr --}}
<script src="{{asset('admin')}}/js/toastr.min.js"></script>
{{--toastr js--}}
{!! Toastr::message() !!}

<script>
    @if($errors->any())
    @foreach($errors->all() as $error)
    toastr.error('{{ $error }}', 'Error', {
        closeButton: true,
        progressBar: true
    });
    @endforeach
    @endif

    function setActionToModal(get_action){
        document.getElementById('delete_modal_form').setAttribute('action', get_action)
    }
</script>

<script>
    // Close button functionality
    var closeButton = document.getElementById('close-button');
    var adContainer = document.getElementById('ad-container');

    closeButton.addEventListener('click', function() {
        adContainer.style.display = 'none'; // Hide the ad container
    });

// show on scroll

    document.addEventListener('DOMContentLoaded', function() {
        const showOnScroll = document.getElementById('show-on-scroll');

        // Function to show the section
        function showSectionOnScroll() {
            showOnScroll.style.display = 'block';
        }

        // Function to hide the section
        function hideSectionOnScroll() {
            showOnScroll.style.display = 'none';
        }

        // Event listener to show the section when user scrolls down
        window.addEventListener('scroll', function() {
            const scrollY = window.scrollY || window.pageYOffset;
            const viewportHeight = window.innerHeight;

            // Show the section when user scrolls slightly below the website's bottom
            if (scrollY >= (viewportHeight - 30)) {
                showSectionOnScroll();
            } else {
                hideSectionOnScroll();
            }
        });
    });

</script>
<script src="{{ asset('frontend/js/mimg.js') }}"></script>

@yield('js')
</body>
</html>
