<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All News Print</title>
    <style>
        body *{
            font-family: SolaimanLipi;
            font-size: 14px;
        }
        body h1{
            font-size: 26px;
        }
        body h2{
            font-size: 20px;
            font-weight: normal;
        }
        .feature_img img{
            width: 100%;
        }
        .content img{
            width: 100%;
        }
        @media print {
    .content {
        page-break-after: always;
        page-break-inside: avoid;
    }
}
    </style>
</head>
<body>
    <img src="{{ asset('storage') }}/{{ getOptionData('logo') }}" alt="">
<br>
<br >
@forelse ($posts as $news)
<div class="content">
    <p style="margin: 0">{{ $news->shoulder }}</p>
<h1>{{ $news->title }}</h1>
<h2>{{ $news->subtitle }}</h2>
<p style="margin: 0">{{ $news->source }}</p>
<br><br>
<div class="content">
    {!! $news->news_details !!}
</div>
</div>
@empty
<P>No data found</P>
@endforelse

<script>
    window.print();
</script>
</body>
</html>
