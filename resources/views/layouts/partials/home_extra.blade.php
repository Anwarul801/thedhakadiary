<section class="news-sports pt-20 pb-20">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="section-head">
                    <span><a href="{{ route('category_view', $category_jatio->slug) }}">জাতীয়</a></span>
                    <span><a href="{{ route('category_view', $category_jatio->slug) }}">আরও <i class="fas fa-angle-right"></i></a></span>
                </div>
                <div class="row">
                        <div class="col-md-6 mb-4">
                    @foreach($national_post as $post)
                        @if($loop->iteration == 2) @break @endif
                             @include('layouts.partials.news_item.medium_news')
                    @endforeach
                        </div>
                    <div class="col-md-6">
                        <div class="row">
                            @foreach($national_post as $post)
                                @if($loop->iteration <= 1)@continue @endif
                                <div class="col-md-6 mb-2">
                                   @include('layouts.partials.news_item.medium_news')
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-4">
                <div class="section-head">
                    <span><a href="{{route('category_view', $category_motamot->slug)}}">মতামত</a></span>
                    <span><a href="{{route('category_view', $category_motamot->slug)}}">আরও <i class="fas fa-angle-right"></i></a></span>
                </div>
                <div class="sidebar_news">
                    <div class="row">
                        @foreach($opinion_post as $post)
                            <div class="col-lg-12 col-md-6 col-sm-6 news-item-col">
                                @include('layouts.partials.news_item.small_news')
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="entertainment pt-40 pb-20">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="section-head">
                    <span><a href="{{route('category_view', $category_rajniti->slug)}}">রাজনীতি</a></span>
                    <span><a href="{{route('category_view', $category_rajniti->slug)}}">আরও <i class="fas fa-angle-right"></i></a></span>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        @foreach($politics_post as $post)
                            @if($loop->iteration == 2)
                                @break
                            @endif
                            <div class="first-snd-single pb-20">
                                @include('layouts.partials.news_item.medium_news')
                            </div>
                        @endforeach
                    </div>
                    @foreach($politics_post as $post)
                        @if($loop->iteration <= 1)
                            @continue
                        @endif
                        <div class="col-lg-12 col-md-6 col-sm-6 news-item-col">
                            @include('layouts.partials.news_item.small_news')
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-6">
                <div class="section-head">
                    <span><a href="{{route('category_view', $category_saradesh->slug)}}">সারাদেশ</a></span>
                    <span><a href="{{route('category_view', $category_saradesh->slug)}}">আরও <i class="fas fa-angle-right"></i></a></span>
                </div>
                <div class="row middle_news">
                    @foreach($saradesh_post as $post)
                        @if($loop->iteration == 2)
                            @break
                        @endif
                        <div class="col-lg-12">
                            @include('layouts.partials.news_item.title_color_news')
                        </div>
                    @endforeach
                    @foreach($saradesh_post as $post)
                        @if($loop->iteration <= 1)
                            @continue
                        @endif
                        <div class="col-lg-6 col-md-6 news-item-col">
                            @include('layouts.partials.news_item.title_color_news')
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="col-lg-3 col-md-12">
                @include('layouts.partials.vote')
            </div>
        </div>
    </div>
</section>

<section class="news-sports pt-20 pb-20">
    <div class="container">
   <div class="`row d-md-flex">
       <div class="col-md-6">
           <div class="container">
               <div class="section-head">
                   <span><a href="{{route('category_view', $category_digital->slug)}}">ডিজিটাল</a></span>
                   <span><a href="{{route('category_view', $category_digital->slug)}}">আরও <i class="fas fa-angle-right"></i></a></span>
               </div>
               <div class="row">
                   @foreach($digital_post as $post)
                        <div class="col-lg-6 col-md-6 news-item-col">
                               @include('layouts.partials.news_item.title_color_news')
                        </div>
                   @endforeach
               </div>
           </div>
       </div>

       <div class="col-md-6">
           <div class="container">
               <div class="section-head">
                   <span><a href="{{route('category_view', $category_rajdhani->slug)}}">রাজধানী</a></span>
                   <span><a href="{{route('category_view', $category_rajdhani->slug)}}">আরও <i class="fas fa-angle-right"></i></a></span>
               </div>
               <div class="row">
                   @foreach($rajdhani_post as $post)
                       <div class="col-lg-6 col-md-6 news-item-col">
                           @include('layouts.partials.news_item.title_color_news')
                       </div>
                   @endforeach
               </div>
           </div>
       </div>
   </div>
</div>
</section>
<section class="news-information pt-2 pb-2">
<div class="container">
    @foreach($ads as $ad)
        @if($ad->placement_id == 7 && $ad != null)
        <hr style="margin-bottom: 0;">
    <p class="text-center text-secondary" style="font-size: 15px; margin: 2px 0;">বিজ্ঞাপন</p>
    <div class="row justify-content-center">
        <div style="width: 970px; max-height: 250px;">
                @if($ad->placement_id == 7 && ($ad->file_type == 'GIF' || $ad->file_type == 'Image') && $ad->type  == 'Internal')
                    <a style="width: 100%;" href="{{$ad->link}}" target="_blank">
                        <img style="margin: 0 auto;" src="{{asset('storage')}}/{{$ad->file}}" alt="Ad Image">
                    </a>
                @endif
                @if($ad->placement_id == 7 && $ad->file_type == "Video" && $ad->type  == 'Internal')
                    <a style="width: 100%;" target="_blank" href="{{$ad->link}}">
                        <video src="{{asset('storage')}}/{{$ad->file}}"></video>
                    </a>
                @endif
                @if($ad->placement_id == 7 && $ad->type == 'External')
                    {!! $ad->code !!}
                @endif
        </div>
    </div>
        @endif
    @endforeach

        <hr>
</div>
</section>
<section class="rajniti-news pt-20 pb-20">
    <div class="container">
        <div class="section-head">
            <span><a href="{{route('category_view', $category_antorjatik->slug)}}">আন্তর্জাতিক</a></span>
            <span><a href="{{route('category_view', $category_antorjatik->slug)}}">আরও <i class="fas fa-angle-right"></i></a></span>
        </div>
        <div class="row">
            @foreach($international_post as $post)
                <div class="col-lg-4">
                    <div class="first-snd-single pb-20">
                        @include('layouts.partials.news_item.medium_news')
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="news-information pt-20 pb-20">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="section-head">
                    <span><a href="{{route('category_view', $category_binodon->slug)}}">বিনোদন</a></span>
                    <span><a href="{{route('category_view', $category_binodon->slug)}}">আরও <i class="fas fa-angle-right"></i></a></span>
                </div>
                <div class="sidebar_news">
                    <div class="row">
                        @foreach($entertainment_post as $post)
                            <div class="col-lg-12 col-md-6 col-sm-6 news-item-col">
                                @include('layouts.partials.news_item.small_news' , ['no_str_limit' => true])

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="section-head">
                    <span><a href="{{route('category_view', $category_netdonia->slug)}}">নেট দুনিয়া</a></span>
                    <span><a href="{{route('category_view', $category_netdonia->slug)}}">আরও <i class="fas fa-angle-right"></i></a></span>
                </div>
                <div class="sidebar_news">
                    <div class="row">
                        @foreach($netdonia_post as $post)
                            <div class="col-lg-12 col-md-6 col-sm-6 news-item-col">
                                @include('layouts.partials.news_item.small_news', ['no_str_limit' => true])

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="section-head">
                    <span><a href="{{route('category_view', $category_cakri->slug)}}">চাকরির প্রস্তুতি</a></span>
                    <span><a href="{{route('category_view', $category_cakri->slug)}}">আরও <i class="fas fa-angle-right"></i></a></span>
                </div>
                <div class="sidebar_news">
                    <div class="row">
                        @foreach($cakri_post as $post)
                            <div class="col-lg-12 col-md-6 col-sm-6 news-item-col">
                                @include('layouts.partials.news_item.small_news', ['no_str_limit' => true])

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        <div class="col-lg-3">
                <div class="right-single2" style="margin-bottom: 20px;">
                        <div style="width: 300px; height: 250px;">
                            @foreach($ads as $ad)
                                @if($ad->placement_id == 5 && ($ad->file_type == 'GIF' || $ad->file_type == 'Image') && $ad->type  == 'Internal')
                                    <a style="width: 100%;" href="{{$ad->link}}" target="_blank">
                                        <img style="margin: 0 auto;" src="{{asset('storage')}}/{{$ad->file}}" alt="Ad Image">
                                    </a>
                                @endif
                                @if($ad->placement_id == 5 && $ad->file_type == "Video" && $ad->type  == 'Internal')
                                    <a style="width: 100%;" target="_blank" href="{{$ad->link}}">
                                        <video src="{{asset('storage')}}/{{$ad->file}}"></video>
                                    </a>
                                @endif
                                @if($ad->placement_id == 5 && $ad->type == 'External')
                                    {!! $ad->code !!}
                                @endif
                            @endforeach
                    </div>
                </div>
                <div class="right-single2">
                    <div style="width: 300px; height: 250px;">
                        @foreach($ads as $ad)
                            @if($ad->placement_id == 6 && ($ad->file_type == 'GIF' || $ad->file_type == 'Image') && $ad->type  == 'Internal')
                                <a style="width: 100%;" href="{{$ad->link}}" target="_blank">
                                    <img style="margin: 0 auto;" src="{{asset('storage')}}/{{$ad->file}}" alt="Ad Image">
                                </a>
                            @endif
                            @if($ad->placement_id == 6 && $ad->file_type == "Video" && $ad->type  == 'Internal')
                                <a style="width: 100%;" target="_blank" href="{{$ad->link}}">
                                    <video src="{{asset('storage')}}/{{$ad->file}}"></video>
                                </a>
                            @endif
                            @if($ad->placement_id == 6 && $ad->type == 'External')
                                {!! $ad->code !!}
                            @endif
                        @endforeach
                    </div>
                </div>
        </div>
        </div>
    </div>

</section>

<section class="rajniti-news pt-20 pb-20">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="section-head">
                    <span><a href="{{route('category_view', $category_khela->slug)}}">খেলা</a></span>
                    <span><a href="{{route('category_view', $category_khela->slug)}}">আরও <i class="fas fa-angle-right"></i></a></span>
                </div>
                @foreach($sports_post as $post)
                    <div class="first-snd-single mb-4">
                        @include('layouts.partials.news_item.medium_news')
                    </div>
                @endforeach
            </div>
            <div class="col-lg-4">
                <div class="section-head">
                    <span><a href="{{route('category_view', $category_orthoniti->slug)}}">অর্থনীতি</a></span>
                    <span><a href="{{route('category_view', $category_orthoniti->slug)}}">আরও <i class="fas fa-angle-right"></i></a></span>
                </div>
                <div class="news-item-col">
                    <div class="row">
                        @foreach($economy_post as $post)
                            @if($loop->iteration == 5) @break @endif
                            <div class="col-lg-12 col-md-6 col-sm-6 news-item-col">
                                @include('layouts.partials.news_item.small_news')

                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="right-single2" style="margin-top: 65px; margin-left: 5px;">
                    <div style="max-width: 400px; height: 333px;">
                        @foreach($ads as $ad)
                            @if($ad->placement_id == 8 && ($ad->file_type == 'GIF' || $ad->file_type == 'Image') && $ad->type  == 'Internal')
                                <a style="width: 100%;" href="{{$ad->link}}" target="_blank">
                                    <img style="margin: 0 auto;" src="{{asset('storage')}}/{{$ad->file}}" alt="Ad Image">
                                </a>
                            @endif
                            @if($ad->placement_id == 8 && $ad->file_type == "Video" && $ad->type  == 'Internal')
                                <a style="width: 100%;" target="_blank" href="{{$ad->link}}">
                                    <video src="{{asset('storage')}}/{{$ad->file}}"></video>
                                </a>
                            @endif
                            @if($ad->placement_id == 8 && $ad->type == 'External')
                                {!! $ad->code !!}
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="section-head">
                    <span><a href="{{route('category_view', $category_corporate->slug)}}">কর্পোরেট</a></span>
                    <span><a href="{{route('category_view', $category_corporate->slug)}}">আরও <i class="fas fa-angle-right"></i></a></span>
                </div>
                @foreach($corporate_post as $cp)
                    <div class="first-snd-single pb-20">
                        @include('layouts.partials.news_item.medium_news')
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="news-sports pt-20 pb-20">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-12 col-xs-12">
                <div class="section-head">
                    <span><a href="{{route('category_view', $category_campus->slug)}}">ক্যাম্পাস</a></span>
                    <span><a href="{{route('category_view', $category_campus->slug)}}">আরও <i class="fas fa-angle-right"></i></a></span>
                </div>
                <div class="row">
                    @foreach($campus_post as $post)
                        <div class="col-lg-12 mb-3">
                            @include('layouts.partials.news_item.large_news', ['no_subtitle' => true])
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4 col-sm-12 col-xs-12">
                <div class="section-head">
                    <span><a href="{{route('category_view', $category_dhormo->slug)}}">ধর্ম</a></span>
                    <span><a href="{{route('category_view', $category_dhormo->slug)}}">আরও <i class="fas fa-angle-right"></i></a></span>
                </div>
                <div class="row">
                    @foreach($religion_post as $post)
                        <div class="col-lg-12 mb-3">
                            @include('layouts.partials.news_item.large_news', ['no_subtitle' => true])
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4 col-sm-12 col-xs-12">
                <div class="section-head">
                    <span><a href="{{route('category_view', $category_book_review->slug)}}">বুক রিভিউ</a></span>
                    <span><a href="{{route('category_view', $category_book_review->slug)}}">আরও <i class="fas fa-angle-right"></i></a></span>
                </div>
                <div class="row">
                    @foreach($book_review_post as $post)
                        <div class="col-lg-12 mb-3">
                            @include('layouts.partials.news_item.large_news', ['no_subtitle' => true])
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="rajniti-news pt-20 pb-20">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="section-head">
                    <span><a href="{{route('category_view', $category_sahitto->slug)}}">সাহিত্য</a></span>
                    <span><a href="{{route('category_view', $category_sahitto->slug)}}">আরও <i class="fas fa-angle-right"></i></a></span>
                </div>
                <div class="row">
                    @foreach($literature_post as $post)
                        @if($loop->iteration == 2)
                            @break
                        @endif
                        <div class="col-lg-12 mb-4">
                            @include('layouts.partials.news_item.medium_news')
                        </div>
                    @endforeach

                    @foreach($literature_post as $post)
                        @if($loop->iteration <= 1)
                            @continue
                        @endif
                        <div class="col-lg-12 col-md-6 col-sm-6 news-item-col">
                            @include('layouts.partials.news_item.small_news')
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="section-head">
                    <span><a href="{{route('category_view', $category_feature->slug)}}">ফিচার</a></span>
                    <span><a href="{{route('category_view', $category_feature->slug)}}">আরও <i class="fas fa-angle-right"></i></a></span>
                </div>
                <div class="row">
                    @foreach($feature_post as $post)
                        @if($loop->iteration == 2)
                            @break
                        @endif
                        <div class="col-lg-12 mb-4">
                            @include('layouts.partials.news_item.medium_news')
                        </div>
                    @endforeach

                    @foreach($feature_post as $post)
                        @if($loop->iteration <= 1)
                            @continue
                        @endif
                        <div class="col-lg-12 col-md-6 col-sm-6 news-item-col">
                            @include('layouts.partials.news_item.small_news')
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="section-head">
                    <span><a href="{{route('category_view', $category_tottho->slug)}}">তথ্য প্রযুক্তি</a></span>
                    <span><a href="{{route('category_view', $category_tottho->slug)}}">আরও <i class="fas fa-angle-right"></i></a></span>
                </div>
                <div class="row">
                    @foreach($it_post as $post)
                        @if($loop->iteration == 2)
                            @break
                        @endif
                        <div class="col-lg-12 mb-4">
                            @include('layouts.partials.news_item.medium_news')
                        </div>
                    @endforeach
                    @foreach($it_post as $post)
                        @if($loop->iteration <= 1)
                            @continue
                        @endif
                        <div class="col-lg-12 col-md-6 col-sm-6 news-item-col">
                            @include('layouts.partials.news_item.small_news')
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="news-sports pt-20 pb-20">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="section-head">
                    <span><a href="{{route('category_view', $category_lifestyle->slug)}}">লাইফ স্টাইল</a></span>
                    <span><a href="{{route('category_view', $category_lifestyle->slug)}}">আরও <i class="fas fa-angle-right"></i></a></span>
                </div>
                <div class="row">

                    @foreach($lifestyle_post as $post)
                        @if($loop->iteration == 2)
                            @break
                        @endif
                        <div class="col-lg-12 mb-4">
                            @include('layouts.partials.news_item.medium_news')
                        </div>

                    @endforeach
                    @foreach($lifestyle_post as $post)
                        @if($loop->iteration <= 1)
                            @continue
                        @endif
                        <div class="col-lg-12 col-md-6 col-sm-6 news-item-col">
                            @include('layouts.partials.news_item.small_news')
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="section-head">
                    <span><a href="{{route('category_view', $category_sastho->slug)}}">স্বাস্থ্য</a></span>
                    <span><a href="{{route('category_view', $category_sastho->slug)}}">আরও <i class="fas fa-angle-right"></i></a></span>
                </div>
                <div class="row">
                    @foreach($sastho_post as $post)
                        @if($loop->iteration == 2)
                            @break
                        @endif
                        <div class="col-lg-12 mb-4">
                            @include('layouts.partials.news_item.medium_news')
                        </div>
                    @endforeach
                    @foreach($sastho_post as $post)
                        @if($loop->iteration <= 1)
                            @continue
                        @endif
                        <div class="col-lg-12 col-md-6 col-sm-6 news-item-col">
                            @include('layouts.partials.news_item.small_news')
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="section-head">
                    <span><a href="{{route('category_view', $category_probash->slug)}}">প্রবাস</a></span>
                    <span><a href="{{route('category_view', $category_probash->slug)}}">আরও <i class="fas fa-angle-right"></i></a></span>
                </div>
                <div class="row">
                    @foreach($probash_post as $post)
                        @if($loop->iteration == 2)
                            @break
                        @endif
                        <div class="col-lg-12 mb-4">
                            @include('layouts.partials.news_item.medium_news')
                        </div>
                    @endforeach
                    @foreach($probash_post as $post)
                        @if($loop->iteration <= 1)
                            @continue
                        @endif
                        <div class="col-lg-12 col-md-6 col-sm-6 news-item-col">
                            @include('layouts.partials.news_item.small_news')
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="section-head">
                    <span><a href="{{route('category_view', $category_adalat->slug)}}">আইন আদালত</a></span>
                    <span><a href="{{route('category_view', $category_adalat->slug)}}">আরও <i class="fas fa-angle-right"></i></a></span>
                </div>
                <div class="row">
                    @foreach($adalat_post as $post)
                        @if($loop->iteration == 2)
                            @break
                        @endif
                        <div class="col-lg-12 mb-4">
                            @include('layouts.partials.news_item.medium_news')
                        </div>
                    @endforeach
                    @foreach($adalat_post as $post)
                        @if($loop->iteration <= 1)
                            @continue
                        @endif
                        <div class="col-lg-12 col-md-6 col-sm-6 news-item-col">
                            @include('layouts.partials.news_item.small_news')
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="rajniit-news pt-40 pb-40">
    <div class="container">
        <div class="section-head">
            <span><a href="{{route('category_view', $category_tour->slug)}}">ট্যুরস এন্ড ট্রাভেলস</a></span>
            <span><a href="{{route('category_view', $category_tour->slug)}}">আরও <i class="fas fa-angle-right"></i></a></span>
        </div>
        <div class="row">
            @foreach($tour_post as $post)
                <div class="col-lg-4">
                    <div class="first-snd-single pb-20">
                        @include('layouts.partials.news_item.medium_news')
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
