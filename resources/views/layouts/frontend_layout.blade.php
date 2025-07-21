@php use Illuminate\Support\Facades\View; @endphp
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('page_title', 'News')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', getOptionData('site_title'))"/>
    <meta name="keywords" content="@yield('meta_keywords', getOptionData('site_title'))"/>
    <meta property="og:locale" content="en_US">
    <meta property="og:title" content="@yield('og_title', getOptionData('site_title'))">
    <meta property="og:description" content="@yield('meta_description', getOptionData('site_title'))">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="@yield('og_subtitle', getOptionData('site_title'))">
{{--    <meta property="og:image" content="@yield('og_image', asset('storage') .'/'. getOptionData('shared_image'))">--}}
    @php
        $ogImage = View::hasSection('og_image')
            ? trim($__env->yieldContent('og_image'))
            : getOptionData('shared_image');
    @endphp

    @if($ogImage)
        <meta property="og:image" content="{{ asset('storage/' . $ogImage) }}">
    @else
        <meta property="og:image" content="{{ asset('image/og.jpg') }}">
    @endif
    <meta property="og:image:secure_url" content="@yield('og_image', asset('storage') .'/'. getOptionData('logo'))">
    <meta property="og:image:width" content="940">
    <meta property="og:image:height" content="788">
    <meta property="og:image:alt" content="The Dhaka Diary">
    <meta property="og:image:type" content="@yield('og_image_type', 'image/jpeg')">
    <meta property="og:type" content="article" />
    <meta name="instagram:card" content="@yield('og_subtitle', getOptionData('site_title'))">
    <meta name="instagram:title" content="@yield('og_title', getOptionData('site_title'))">
    <meta name="instagram:description" content="@yield('meta_description', getOptionData('site_title'))">



    <link rel="icon" href="{{asset('storage')}}/{{getOptionData('favicon')}}" type="image/gif" sizes="60x60">
    <link rel="stylesheet" href="{{asset('frontend/assets')}}/css/fontawsome/css/all.min.css">
    <link rel="stylesheet" href="{{asset('frontend/assets')}}/css/jquery-ui.min.css">
    <link rel="stylesheet" href="{{asset('frontend/assets')}}/css/sidebar-menu.css">
    <link rel="stylesheet" href="{{asset('frontend/assets')}}/css/mega-menu.css">

    @yield('css')
    <link href="{{asset('frontend/assets')}}/css/tailwind_css/tailwind_output.css" rel="stylesheet">
</head>
{{--
Developed By INNOVA IT
Developer Profile: www.innovait.com.bd
--}}
<body class="site">
<div class="scroll-area"><i class="fa-solid fa-angles-up"></i></div>
{{--header area--}}
@include('layouts.partials.frontend_header')
{{--main content--}}
@yield('main_content')
<!-- Footer Area -->
@include('layouts.partials.frontend_footer')


<script src="{{asset('frontend/assets')}}/js/jquery-3.6.1.min.js"></script>
<script src="{{asset('frontend/assets')}}/js/jquery-ui.min.js"></script>
<script src="{{asset('frontend/assets')}}/js/menu.js"></script>
<script src="{{asset('frontend/assets')}}/js/mega-menu.js"></script>
@yield('js')
<script src="{{asset('frontend/assets')}}/js/script.js"></script>
<script>
    let alreadyShown = false;
    document.addEventListener('DOMContentLoaded', () => {
        let footer_ad = document.querySelector('.footer_ad');
        let ad_close_btn = document.querySelector('.close_only');

        window.addEventListener('scroll', () => {
            if (window.scrollY >= 450 && !alreadyShown) {
                footer_ad.classList.remove('hidden');
                alreadyShown = true;
            }
        });

        ad_close_btn.addEventListener('click', () => {
            footer_ad.classList.add('hidden');
        });
    });
</script>
<script>
    let isFocused = false;

    const input = document.getElementById('searchInput');
    const form = document.getElementById('searchForm');

    input.addEventListener('focus', () => isFocused = true);
    input.addEventListener('blur', () => {
        // input থেকে ফোকাস চলে গেলে টাইম দিয়ে false করলাম যেন accidental blur ধরতে না পারেঃ
        setTimeout(() => isFocused = false, 200);
    });

    function handleSearchClick() {
        if (isFocused) {
            form.submit();
        } else {
            input.focus();
        }
    }
</script>


</body>

</html>
