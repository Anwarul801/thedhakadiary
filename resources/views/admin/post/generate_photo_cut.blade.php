<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="{{asset('frontend/assets')}}/css/tailwind_css/tailwind_output.css" rel="stylesheet">
    <title>Generate Photo Cut</title>
    <style>
        .post_generate_wrapp{
            width: 720px;
            margin: 25px auto;
            position: relative;
        }
        .frame_img{
            width: 100%;
        }
        .date {
            color: #ffffff;
            display: inline-block;
            position: absolute;
            top: 6px;
            right: 15px;
            font-size: 20px;
            font-weight: 600;
        }
        .post_thumbnail {
            width: 670px;
            height: 353px;
            background: red;
            position: absolute;
            top: 53px;
            left: 25px;
        }
        .post_thumbnail .post_thumbnail_img{
            width: 100%;
            height: 100%;
        }
        .title_wrapp {
            width: 95.7%;
            height: 235px; 
            position: absolute;
            bottom: 67px;
            left: 0;
            margin: 0 16px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .title{
            font-size: 35px;
            color: #ffffff;
            text-transform: uppercase; 
            text-align: center;
            font-weight: 800;
            padding: 20px;
        }
        .check_in_comment {
            color: #ffffff;
            font-size: 18px;
            position: absolute;
            right: 15px;
            bottom: 70px;
        }
    </style>
</head>
<body>

    <div class="post_generate_wrapp">
        <img src="{{asset('frontend/assets/image/Photo-fream.png')}}" class="frame_img" alt="frame image">
        <span class="date">{{ bangla_date_from_iso($post->publishing_date??null) }}</span>
        <div class="post_thumbnail">
            <img src="{{asset('storage')}}/{{$post->media->image??null}}" class="post_thumbnail_img" alt="thumbnail">
        </div>
        <div class="title_wrapp">
            <h3 class="title">{{$post->title??null}}</h3>
        </div>
        <h5 class="check_in_comment">বিস্তারিত কমেন্টে দেখুন</h5>
    </div>
{{--use this image--}}

{{--user this title--}}

{{--use this date--}}

</body>
</html>
