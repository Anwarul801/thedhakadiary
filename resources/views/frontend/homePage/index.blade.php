@extends('layouts.frontend_layout')
@section('page_title')
        Asian Mail24 : Home
@endsection

@section('marque')
    <div class="container mt-3 {{$marque->type == 'In-Active' ? 'd-none' : ''}}">
        <div class="header-top-wrap">
            <div class="ticker">
                <div class="news-title">
                    <h5>ব্রেকিং নিউজ:</h5>
                </div>
                <div class="news">
                    <marquee class="news-content"  scrollamount="6" onmouseover="this.stop();" onmouseout="this.start();">
                        @foreach($breaking_news as $bn)
                            <a href="{{route('news_details', ['id' => $bn->id, 'slug' => $bn->slug])}}">
                                <p style="cursor: pointer">
                                    {{$bn->title}}
                                </p>
                            </a>
                        @endforeach
                    </marquee>
                </div>
            </div>
        </div>
    </div>
@endsection
    @section('main_content')

{{--        popup ad--}}
    @foreach($ads as $ad)
        @if($ad->placement_id == 1 && $ad != null)
            <div id="popup-background"></div>
<div id="popup-container">
    <button id="popup-close"><i class="fas fa-times"></i></button>
            @if($ad->placement_id == 1 && ($ad->file_type == 'GIF' || $ad->file_type == 'Image'))
            <a target="_blank" href="{{$ad->link}}">
                <img src="{{asset('storage')}}/{{$ad->file}}" alt="Popup Ad Image">
            </a>
    @endif
        @if($ad->placement_id == 1 && $ad->file_type == "Video")
        <a target="_blank" href="{{$ad->link}}">
            <video src="{{asset('storage')}}/{{$ad->file}}"></video>
        </a>
        @endif

</div>
        @endif
    @endforeach
{{--end popup ad--}}
<section class="rajniit-section pt-20 pb-40">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-12 col-xs-12">
                @foreach($header_posts as $post)
                    @if($loop->iteration == 1)
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                @include('layouts.partials.news_item.large_news')
                            </div>
                        </div>
                    @else
                        @break
                    @endif
                @endforeach

                <div class="row pt-20">
                    @foreach($header_posts as $post)
                        @if($loop->iteration == 1)
                            @continue
                        @endif
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
                            @include('layouts.partials.news_item.medium_news')
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- col-widget now -->
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="right-single2" style="margin-bottom: 20px;">
                        <div style="width: 300px; height: 250px;">
                    @foreach($ads as $ad)
                                @if($ad->placement_id == 3 && ($ad->file_type == 'GIF' || $ad->file_type == 'Image') && $ad->type  == 'Internal')
                                    <a style="width: 100%;" href="{{$ad->link}}" target="_blank">
                                        <img style="margin: 0 auto;" src="{{asset('storage')}}/{{$ad->file}}" alt="Ad Image">
                                    </a>
                                @endif
                                @if($ad->placement_id == 3 && $ad->file_type == "Video" && $ad->type  == 'Internal')
                                    <a style="width: 100%;" target="_blank" href="{{$ad->link}}">
                                        <video src="{{asset('storage')}}/{{$ad->file}}"></video>
                                    </a>
                                @endif
                                @if($ad->placement_id == 3 && $ad->type == 'External')
                                    {!! $ad->code !!}
                                @endif
                    @endforeach
                        </div>

                </div>
                <div class="right-content-widget">
                    <h4 class="sidebar_title"><a href="{{route('last_published')}}">সর্বশেষ<i class="fa fa-arrow-right"></i></a></h4>
                   @foreach($sorbosesh as $sb)
                        @if($loop->iteration == 5)
                            @break
                        @endif
                        <div class="right-single">
                            <div class="widget-content">
{{--                                <p class="time"><i class="far fa-clock"></i><span>{{ date_maker($sb->publishing_date, 'd m, y', true)  }}</span></p>--}}
                                <h3><a href="{{route('news_details', ['id' => $sb->id, 'slug' => $sb->slug])}}">{{$sb->title}}</a></h3>
                            </div>
                        </div>
                   @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<div id="home_extra">
    @include('layouts.partials.home_extra')
</div>

@endsection

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const popupContainer = document.getElementById('popup-container');
            const popupBackground = document.getElementById('popup-background');
            const popupCloseButton = document.getElementById('popup-close');

            // Function to open the popup
            function openPopup() {
                popupBackground.style.display = 'block';
                popupContainer.style.display = 'block';
                popupContainer.classList.add('popup-open');
            }

            // Function to close the popup
            function closePopup() {
                popupContainer.classList.remove('popup-open');
                setTimeout(function() {
                    popupBackground.style.display = 'none';
                    popupContainer.style.display = 'none';
                }, 300); // Time for the fade-out animation
            }

            // Event listeners to open and close the popup
            popupBackground.addEventListener('click', closePopup);
            popupCloseButton.addEventListener('click', closePopup);

            // Open the popup after a delay (adjust the delay as needed)
            setTimeout(openPopup, 100);
        });
    </script>
@endsection
{{--@section('js')--}}
{{--    <script>--}}
{{--        function call_ajax(){--}}
{{--            jQuery.ajax({--}}
{{--                url: "{{url( route('index_page') )}}",--}}
{{--                headers: {--}}
{{--                    'X-CSRF-TOKEN': "{{csrf_token()}}"--}}
{{--                },--}}
{{--                method: "GET",--}}
{{--                success: function (data) {--}}
{{--                    document.getElementById('home_extra').innerHTML = data.home_extra--}}
{{--                    setTimeout(function (){--}}
{{--                        $("img.img_thumb").each(function() {--}}
{{--                            var currentSrc = $(this).attr("src");--}}
{{--                            var newSrc = currentSrc.replace("media_xs", "media_thumbnail");--}}
{{--                            $(this).attr("src", newSrc);--}}
{{--                        });--}}
{{--                        $("img.img_full_image").each(function() {--}}
{{--                            var currentSrc = $(this).attr("src");--}}
{{--                            var newSrc = currentSrc.replace("media_xs", "media_image");--}}
{{--                            $(this).attr("src", newSrc);--}}
{{--                        });--}}
{{--                    }, 100);--}}
{{--                }--}}
{{--            });--}}
{{--        }--}}


{{--        $(document).ready(function() {--}}
{{--            setTimeout(call_ajax, 10);--}}
{{--        });--}}
{{--    </script>--}}



{{--@endsection--}}

