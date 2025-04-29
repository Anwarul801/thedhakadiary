<?php

use App\Models\Media;
use App\Models\Option;

function getOptionData($title)
{
    $option = Option::where('title', $title)->first();
    return $option->value;
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
        $c_s = "<i>{$media->caption} </i>";
        return "<div>$img <br> $c_s</div>";
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
        ['publishing_date', '<=', date('Y-m-d')],
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
