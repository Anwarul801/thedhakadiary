<style>
    .footer-text {
        white-space: nowrap;
        text-align: center;
    }

    .footer-text .developer {
        display: inline;
    }

    @media (max-width: 600px) {
        .footer-text {
            white-space: normal;
        }

        .footer-text .developer {
            display: block;
            margin-top: 5px;
        }
    }

</style>

<footer class="section-padding-top">
    <div class="footer-wrap bg-stock-color text-gray-800">
        <!-- Footer Top Bar -->
        <div class="bg-black text-white text-sm">
            <div class="container">
                <div class="flex justify-between items-center space-x-3 lg:py-4 md:py-3 py-2">
                    <div>
                        <a href="{{route('index_page')}}" class="main-logo"><img src="{{asset('storage')}}/{{getOptionData('logo')}}" alt="The Dhaka Diary"
                                                                    class="w-full" /></a>
                    </div>
                    <!-- Footer Social Icons -->
                    <ul class="flex items-center md:space-x-3 space-x-1.5 text-xl">
                        <li class="{{getOptionData('fb')==null?'hidden':''}}"><a target="_blank" href="{{getOptionData('fb')}}" class="social_icon f-social-icon"><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li class="{{getOptionData('twitter')==null?'hidden':''}}"><a target="_blank" href="{{getOptionData('twitter')}}" class="social_icon f-social-icon"><i class="fa-brands fa-x-twitter"></i></a></li>
                        <li class="{{getOptionData('instagram')==null?'hidden':''}}"><a target="_blank" href="{{getOptionData('instagram')}}" class="social_icon f-social-icon"><i class="fa-brands fa-square-instagram"></i></a></li>
                        <li class="{{getOptionData('telegram')==null?'hidden':''}}"><a target="_blank" href="{{getOptionData('telegram')}}" class="social_icon f-social-icon"><i class="fa-solid fa-paper-plane"></i></a></li>
                        <li class="{{getOptionData('youtube')==null?'hidden':''}}"><a target="_blank" href="{{getOptionData('youtube')}}" class="social_icon f-social-icon"><i class="fa-brands fa-youtube"></i></a></li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="py-6 md:py-12 px-4 sm:px-6 lg:px-8">
            <div class="container">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Column 1 -->
                    @php
                    $about_us = $pages->where('id', 1)->first();
                    $privacy_policy = $pages->where('id', 2)->first();
                    $terms_and_condition = $pages->where('id', 3)->first();
                    @endphp
                    <ul class="space-y-3">
                        <li><a href="{{route('page_view', ['id' => $about_us->id, 'slug' => $about_us->slug])}}" class="f-link">{{isEnglish()?$about_us->name_en:$about_us->name}}</a></li>
                        <li><a href="{{route('contact_us')}}" class="f-link">{{__('lang.contact_us')}}</a></li>
                    </ul>

                    <!-- Column 2 -->
                    <div class="">
                        <ul class="space-y-3">
                            <li><a href="{{route('page_view', ['id' => $privacy_policy->id, 'slug' => $privacy_policy->slug])}}" class="f-link">{{isEnglish()?$privacy_policy->name_en:$privacy_policy->name}}</a></li>
                            <li><a href="{{route('page_view', ['id' => $terms_and_condition->id, 'slug' => $terms_and_condition->slug])}}" class="f-link">{{isEnglish()?$terms_and_condition->name_en:$terms_and_condition->name}}</a></li>
                        </ul>
                    </div>

                    <!-- Column 3 -->
                    <div class="">
                        <h3 class="text-lg font-semibold mb-4 ">{{__('lang.editor')}} {{isEnglish()? getOptionData('editor_name_en'): getOptionData('editor_name')}}</h3>
                        <ul class="space-y-3">
                            <li class="flex items-center">
                                <i class="fa-solid fa-location-dot mr-2"></i>
                                <a href="#" class="f-link">
                                    {{isEnglish()? getOptionData('address_en'): getOptionData('address')}}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Copyright Section -->
        <div class="container">
            <div class="md:py-6 py-3  px-4 sm:px-6 lg:px-8 border-t">
                <div class="text-center">
{{--                    <p class="text-primary font-playfair sm:text-base text-sm">Copyright © 2025 All Rights Reserved | <span class="d-sm-block">Developed by <a--}}
{{--                                href="https://innovait.com.bd" target="_blank" class="hover:underline">INNOVA IT</a></span>--}}
{{--                    </p>--}}
                    <p class="footer-text text-primary font-playfair sm:text-base text-sm">
                        Copyright © 2025 All Rights Reserved
                        <span class="developer">| Developed by <a href="https://innovait.com.bd" target="_blank" class="hover:underline">INNOVA IT</a></span>
                    </p>

                </div>
            </div>
        </div>
    </div>
</footer>
