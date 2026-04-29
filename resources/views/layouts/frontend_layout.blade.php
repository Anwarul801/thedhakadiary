<!doctype html>
<html>
<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-XYPC21P87J"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-XYPC21P87J');
    </script>

    <!-- SWG (NEW ADD THIS) -->
    <script async type="application/javascript"
            src="https://news.google.com/swg/js/v1/swg-basic.js"></script>
    <script>
        (self.SWG_BASIC = self.SWG_BASIC || []).push( basicSubscriptions => {
            basicSubscriptions.init({
                type: "NewsArticle",
                isPartOfType: ["Product"],
                isPartOfProductId: "CAowzYDGDA:openaccess",
                clientOptions: { theme: "light", lang: "en" },
            });
        });
    </script>
    <meta name="google-adsense-account" content="ca-pub-8398372781178295">
    <meta name="google-site-verification" content="4WhxjqMJuja8s5JF3706UgNNqjLlcnlMwU6RwxXclMk" />
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-WX4KFQ35');</script>
    <!-- End Google Tag Manager -->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8398372781178295"
            crossorigin="anonymous"></script>

    <meta charset="UTF-8">

    <title>@yield('page_title', 'News')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="pushsdk" content="8ff59d6102defccff768ca21dfd87c4d">
    <meta name="description" content="@yield('meta_description', getOptionData('site_title'))"/>
    <meta name="keywords" content="@yield('meta_keywords', getOptionData('site_title'))"/>
    <meta property="og:locale" content="en_US">
    <meta property="og:title" content="@yield('og_title', getOptionData('site_title'))">
    <meta property="og:description" content="@yield('meta_description', getOptionData('site_title'))">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="@yield('og_subtitle', getOptionData('site_title'))">
    <meta property="og:image" content="@yield('og_image', asset('storage') .'/'. getOptionData('shared_image'))">
    <meta property="og:image:width" content="1280" />
    <meta property="og:image:height" content="672" />
    <meta property="og:image:secure_url" content="@yield('og_image', asset('storage') .'/'. getOptionData('logo'))">
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
    <style>
        /* ডিজাইন ২: বোল্ড ও মডার্ন (উভয় পাশে বার ও গাঢ় ব্যাকগ্রাউন্ড) */
        .design-2 .section-title-wrap {
            background: #e2e8f0;
            padding: 0.75rem 1rem;
            border-radius: 12px;
            border-left: 5px solid #0f172a;
            border-right: 5px solid #0f172a;
        }
        .design-2 .section-title {
            color: #0f172a;
            font-size: 1.6rem;
            font-weight: 800;
        }
        .design-2 .section_button {
            background: #0f172a;
            color: white;
            padding: 0.5rem 1.2rem;
            border-radius: 40px;
        }
        .design-2 .section_button:hover {
            background: #334155;
            gap: 0.7rem;
        }
        /**, .border, .border-b, .border-t, .border-l, .border-r, [class*="border-"] {*/
        /*    border-color: #4a5568 !important;*/
        /*}*/
    </style>

</head>
{{--
Developed By INNOVA IT
Developer Profile: www.innovait.com.bd
--}}
<body class="site">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WX4KFQ35"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div class="scroll-area"><i class="fa-solid fa-angles-up"></i></div>
{{--header area--}}
@include('layouts.partials.frontend_header')
<!-- Adds 01 -->
<div class="text-center my-1">
    <ins class="adsbygoogle"
         style="display:block"
         data-ad-client="ca-pub-8398372781178295"
         data-ad-slot="4226388991"
         data-ad-format="auto"
         data-full-width-responsive="true"></ins>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>

</div>


{{--main content--}}
@yield('main_content')
<div class="text-center my-1">
<ins class="adsbygoogle"
     style="display:block"
     data-ad-format="fluid"
     data-ad-layout-key="-fb+5w+4e-db+86"
     data-ad-client="ca-pub-8398372781178295"
     data-ad-slot="8111636025"></ins>
<script>
    (adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
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
