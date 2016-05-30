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
<div class="col-lg-12 column">
    <div class="col-lg-12 title"><?=get_cat_name($catId);?></div>
    <div class="col-lg-12 items">
<?php foreach ($data['data'] as $d) { ?>
        <div class="col-lg-12 item">
            <div class="col-lg-4">
                <img src="<?=get_the_post_thumbnail_url($d['ID']);?>" alt="">
                <p><?=$d['post_title'];?></p>
                <?php
                    $tags = [];
                    foreach (wp_get_post_tags($d['ID']) as $item) {
                        $tags[] = $item->name;
                    }
                ?>
                <p><?=implode('，', $tags);?></p>
                <p><?=get_post_meta($d['ID'], '_create_time_value', true);?></p>
            </div>
        </div>
<?php } ?>
    </div>
</div>

<?php get_footer(); ?>
