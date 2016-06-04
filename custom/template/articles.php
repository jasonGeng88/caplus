<?php
/*
Template Name: Latest
*/

get_header();

$catId = $_REQUEST['cat_id'];
$data = [];
$args = array(
    'numberposts' => 100,
    'category' => $catId,
    'orderby' => 'post_date',
    'order' => 'DESC',
    'post_type' => 'post',
    'post_status' => 'publish',
    'suppress_filters' => true
);
$data['data'] = wp_get_recent_posts($args);

?>
<div class="col-lg-12 articles ca-block">
    <div class="col-lg-12 title ca-block">
        <div class="icon"><i class="fa fa-angle-right"></i></div>
        <div class="name"><?=get_cat_name($catId);?></div>
    </div>
    <div class="col-lg-12 article-items ca-block">
        <?php foreach ($data['data'] as $d) { ?>
            <div class="col-lg-4 item">
                <div class="content">
                    <div class="pic">
                        <a href="<?=$d['guid'];?>">
                            <img src="<?=get_the_post_thumbnail_url($d['ID']);?>" alt="">
                        </a>
                        <div class="name">
                            <a href="<?=$d['guid'];?>"><span><?=$d['post_title'];?></span></a>
                        </div>
                        <div class="tag">
                            <?php
                            $tags = [];
                            foreach (wp_get_post_tags($d['ID']) as $t) {
                                $tags[] = $t->name;
                            }
                            ?>
                            <?=implode('，', $tags);?>
                        </div>
                        <div class="time">
                            <?=get_post_meta($d['ID'], '_create_time_value', true);?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php get_footer(); ?>
