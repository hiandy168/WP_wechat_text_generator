<div class="wechat-post" style="background-color: transparent; width: 50%; margin: 0 auto; float: left;">

<?php

foreach ($_POST as $wechat_post_id) {

    // Title
    $wechat_post = get_post($wechat_post_id);
    echo "<h2 style=\"background:transparent;font-size:24px;font-weight:600;text-align:center;line-height:28px;\">".$wechat_post->post_title."</h2>";

    // If have video, prints video url
    $wechat_post_meta = get_post_meta($wechat_post_id);
    if (array_key_exists("wpcf-qq_video", $wechat_post_meta)) {
        echo "<span style=\"background:transparent;\">".$wechat_post_meta["wpcf-qq_video"][0]."</span>";
    }

    // Featured Image
    $wechat_post_thumbnails = get_the_post_thumbnail( $wechat_post_id );
    echo "<p style=\"text-align:center\">".get_the_post_thumbnail( $wechat_post_id )."</p>";

    // Split post content into lines and wrap each with <p>
    $wechat_post_content = explode("\n", $wechat_post->post_content);
    foreach ($wechat_post_content as $line) {
        if (!ctype_space($line) and $line != "") {
            echo "<p style=\"background: transparent; color: #333; font-size: 16px;\">" . $line . "</p>";
        }
    }

    // Reply ID to get link
    echo "<p style=\"background: transparent; color: #333; font-size: 16px;\">回复 <span style=\"font-weight:bold;background-color:yellow;\">".$wechat_post->ID."</span> 可以获得直达链接</p>";
    echo "<hr>";
}

?>

</div>

<script>
    var replaceClassName = (function () {
        var images = document.getElementsByClassName('attachment-post-thumbnail wp-post-image');
        for (var i=0; i<images.length; i++) {
            images[i].style.background = "transparent";
            images[i].style.border = "1px solid rgba(0, 0, 0, 0.3)";
            images[i].className = "";
        }
    }) ();
</script>
</div>