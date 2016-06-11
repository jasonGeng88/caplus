<?php
get_header();

$post = get_post();
$args = array(
    'numberposts' => 1,
    'category' => OFFLINE_ARTICLE_ID,
    'orderby' => 'post_date',
    'order' => 'DESC',
    'post_type' => 'post',
    'post_status' => 'publish',
    'suppress_filters' => true
);

$tmp = wp_get_recent_posts($args);
$articleUrl = $tmp[0]['guid'];
?>
<div class="col-lg-12 offline ca-block">
    <!--offline pic-->
    <div class="col-lg-5 col-lg-offset-1 offline-pic ca-block">
        <img src="<?=get_the_post_thumbnail_url($post->ID);?>" alt="">
    </div>
    <!--offline pic end-->

    <!--content-->
    <div class="col-lg-5 offline-content ca-block">
        <div class="name">
            <?=$post->post_title;?>
        </div>
        <div class="text">
            <?=$post->post_content;?>
        </div>
        <div class="see-more">
            <button onclick="location.href='<?=$articleUrl;?>'">SEE MORE</button>
        </div>
        <div class="time">
            <?=get_post_meta($post->ID, '_create_time_value', true);?>
        </div>
        <div class="address">
            <?=get_post_meta($post->ID, '_author_name_value', true);?>
        </div>
    </div>
    <!--content end-->

</div>
