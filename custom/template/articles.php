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
if (isset($_REQUEST['cat_id']) && $_REQUEST['cat_id'] == RECORD_ID)
    $iconStr = '<span class="icon-video">';
else
    $iconStr = '<span class="icon-media">';
?>
<div class="col-md-12 col-xs-12 articles ca-block">
    <div class="col-md-12 col-xs-12 title ca-block ca-pc">
        <div class="icon"><?=$iconStr;?></div>
        <div class="name"><?=get_cat_name($catId);?></div>
    </div>
    <div class="col-md-10 col-xs-12 col-md-offset-1 article-items ca-block">
        <?php foreach ($data['data'] as $d) { ?>
            <div class="col-md-4 col-xs-12 item">
                <div class="content">
                    <div class="ca-portfolio">
                        <div class="pic">
                            <a href="<?=$d['guid'];?>">
                                <img src="<?=get_the_post_thumbnail_url($d['ID']);?>" alt="">
                            </a>
                        </div>
                        <div class="name">
                            <a href="<?=$d['guid'];?>"><span><?=$d['post_title'];?></span></a>
                        </div>
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
                    <div class="time ca-pc">
                        <?=get_post_meta($d['ID'], '_create_time_value', true);?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<script>
    ca_portfolio();
</script>

<?php get_footer(); ?>
