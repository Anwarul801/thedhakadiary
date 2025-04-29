$(document).ready(function() {
    function load_images() {

        $("img.img_thumb").each(function() {
            var currentSrc = $(this).attr("src");
            var newSrc = currentSrc.replace("media_xs", "media_thumbnail");
            $(this).attr("src", newSrc);
        });
        $("img.img_full_image").each(function() {
            var currentSrc = $(this).attr("src");
            var newSrc = currentSrc.replace("media_xs", "media_image");
            $(this).attr("src", newSrc);
        });

    }
    setTimeout(load_images, 500);
});
