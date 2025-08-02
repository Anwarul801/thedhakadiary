<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Generate Photo Cut</title>
</head>
<body>
{{--use this image--}}
<img src="{{asset('storage')}}/{{$post->media->image??null}}" alt="">
{{--user this title--}}
<h3>{{$post->title??null}}</h3>
{{--use this date--}}
<p>{{ bangla_date_from_iso($post->publishing_date??null) }}
</p>
</body>
</html>
