<?php

use App\Models\Media;
use App\Models\Option;
use Carbon\Carbon;

function getOptionData($title)
{
    $option = Option::where('title', $title)->first();
    return $option->value??null;
}

if (!function_exists('isEnglish')) {
    function isEnglish()
    {
        return app()->getLocale() === 'en';
    }
}

function formatBanglaDate($date) {
    $months = [
        'January' => 'জানুয়ারি',
        'February' => 'ফেব্রুয়ারি',
        'March' => 'মার্চ',
        'April' => 'এপ্রিল',
        'May' => 'মে',
        'June' => 'জুন',
        'July' => 'জুলাই',
        'August' => 'আগস্ট',
        'September' => 'সেপ্টেম্বর',
        'October' => 'অক্টোবর',
        'November' => 'নভেম্বর',
        'December' => 'ডিসেম্বর'
    ];

    $banglaDigits = ['0','1','2','3','4','5','6','7','8','9'];
    $banglaDigitsConverted = ['০','১','২','৩','৪','৫','৬','৭','৮','৯'];

    $formatted = \Carbon\Carbon::parse($date)->format('d F Y');
    $formatted = str_replace(array_keys($months), array_values($months), $formatted);
    return str_replace($banglaDigits, $banglaDigitsConverted, $formatted);
}


if (!function_exists('format_publishing_date')) {
    function format_publishing_date($date)
    {
        $carbonDate = Carbon::parse($date);
        $now = Carbon::now();
        $diffInHours = $now->diffInHours($carbonDate);

        $isEnglish = app()->getLocale() === 'en';

        if ($diffInHours < 24) {
            return $isEnglish ? $carbonDate->diffForHumans() : bangla_relative_time($carbonDate);
        } else {
            return $isEnglish ? $carbonDate->format('d F Y') : format_bangla_date($carbonDate);
        }
    }
}

if (!function_exists('format_bangla_date')) {
    function format_bangla_date($date)
    {
        $months = [
            'January' => 'জানুয়ারি',
            'February' => 'ফেব্রুয়ারি',
            'March' => 'মার্চ',
            'April' => 'এপ্রিল',
            'May' => 'মে',
            'June' => 'জুন',
            'July' => 'জুলাই',
            'August' => 'আগস্ট',
            'September' => 'সেপ্টেম্বর',
            'October' => 'অক্টোবর',
            'November' => 'নভেম্বর',
            'December' => 'ডিসেম্বর'
        ];

        $banglaDigits = ['0','1','2','3','4','5','6','7','8','9'];
        $banglaDigitsConverted = ['০','১','২','৩','৪','৫','৬','৭','৮','৯'];

        $formatted = $date->format('d F Y');
        $formatted = str_replace(array_keys($months), array_values($months), $formatted);
        return str_replace($banglaDigits, $banglaDigitsConverted, $formatted);
    }
}


if (!function_exists('bangla_relative_time')) {
    function bangla_relative_time($date)
    {
        $now = Carbon::now();
        $diffInSeconds = $now->diffInSeconds($date);
        $diff = $now->diff($date);

        if ($date->isFuture()) {
            return 'এইমাত্র';
        }

        if ($diffInSeconds < 60) {
            return convert_to_bangla($diffInSeconds) . ' সেকেন্ড আগে';
        }

        if ($diff->i > 0 && $diff->h === 0) {
            return convert_to_bangla($diff->i) . ' মিনিট আগে';
        }

        if ($diff->h > 0 && $diff->d === 0) {
            return convert_to_bangla($diff->h) . ' ঘন্টা আগে';
        }

        if ($diff->d > 0) {
            return convert_to_bangla($diff->d) . ' দিন আগে';
        }

        return 'এইমাত্র';
    }
}

if (!function_exists('convert_to_bangla')) {
    function convert_to_bangla($number)
    {
        $banglaDigits = ['0','1','2','3','4','5','6','7','8','9'];
        $banglaDigitsConverted = ['০','১','২','৩','৪','৫','৬','৭','৮','৯'];
        return str_replace($banglaDigits, $banglaDigitsConverted, $number);
    }
}





function getImageTag($id, $true = false){
    $media = Media::find($id);
    if($media){
        if ($true){
            $media_image = $media->xs_thumbnail;
        }else{
            $media_image = $media->image;
        }
        $returning_img = asset('storage/'. $media_image);
        $img = "<img class='img_full_image' src='$returning_img' alt='Media Image'>";
        $c_s = "<i class='img_full_image_caption'>{$media->caption} </i>";
        return "<div class='text-center'>$img $c_s</div>";
    }
}

function date_maker($date, $format, $bangla = false, $day_name = false){
//    return bangla_number(date_format(date_create($date), $format));


    if ($bangla){
        if ($day_name){
            $english_day_name = date_maker($date, "l");
            return get_bangla_day_name($english_day_name) . ", ". bangla_date(strtotime($date), "en", $format);
        }else{
            return bangla_date(strtotime($date), "en", $format);
        }
    }else{
        return date_format(date_create($date), $format);
    }
}

function get_bangla_day_name($english_day){
    switch ($english_day){
        case "Saturday":
            return "শনিবার";
            break;
        case "Sunday":
            return "রবিবার";
            break;
        case "Monday":
            return "সোমবার";
            break;
        case "Tuesday":
            return "মঙ্গলবার";
            break;
        case "Wednesday":
            return "বুধবার";
            break;
        case "Thursday":
            return "বৃহস্পতিবার";
            break;
        case "Friday":
            return "শুক্রবার";
            break;
    }
}

function checkPost(){
    return [
        ['status', 'Published']
    ];
}

function getRandomBgColor(){
    $colors = ["#000000", "#120044", "#0072b1", "#c50000", "#008723"];
    $ran_color_index = mt_rand(0, 4);
    return $colors[$ran_color_index];
}

function bangla_number($int)
{
    $engNumber = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 0, "PM", "AM");
    $bangNumber = array('১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০', "পিএম", "এএম");

    $converted = str_replace($engNumber, $bangNumber, $int);
    return $converted;
}

//socialshare
function fb_share($link){
    return "https://www.facebook.com/sharer.php?u={$link}";
}
function twitter_share($link){
    return "https://twitter.com/share?ref_src={$link}";
}
function linkedin_share($link){
    return "https://www.linkedin.com/shareArticle?url={$link}";
}
function whatsapp_share($link){
    return "https://api.whatsapp.com/send?text={$link}";
}
