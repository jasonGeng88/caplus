<?php
/*
Template Name: Latest
*/

get_header();
?>
<!--分類文章-->
<div class="col-lg-12 home-articles">
<?php
$cats = get_term_children(ARTICLE, 'category');
foreach ($cats as $item) {
    $data = [];
    $args = array(
        'numberposts' => 6,
        'category' => $item,
        'orderby' => 'post_date',
        'order' => 'DESC',
        'post_type' => 'post',
        'post_status' => 'publish',
        'suppress_filters' => true
    );
    $data['data'] = wp_get_recent_posts($args);
    if (!empty($data['data'])) {
?>
<div class="col-lg-12 column">
    <div class="col-lg-12 title">
        <a href="<?=ARTICLE_LIST_URL;?>&cat_id=<?=$item;?>">
            <?=get_cat_name($item);?>
        </a>
    </div>
    <div class="col-lg-12 items">
<?php foreach ($data['data'] as $d) { ?>
        <div class="col-lg-12 item">
            <div class="col-lg-4">
                <a href="<?=$d['guid'];?>">
                    <img src="<?=get_the_post_thumbnail_url($d['ID']);?>" alt="">
                </a>
                <p>
                    <a href="<?=$d['guid'];?>"><span><?=$d['post_title'];?></span></a>
                </p>
                <?php
                    $tags = [];
                    foreach (wp_get_post_tags($d['ID']) as $t) {
                        $tags[] = $t->name;
                    }
                ?>
                <p><?=implode('，', $tags);?></p>
                <p><?=get_post_meta($d['ID'], '_create_time_value', true);?></p>
            </div>
        </div>
<?php } ?>
    </div>
</div>
<?php
    }
}
?>
</div>
<!--分類文章 end-->

<!--百人計劃-->
<div class="col-lg-12 home-hundred">
<?php
    $data = [];
    $args = array(
        'numberposts' => 100,
        'category' => HUNDRED_ID,
        'orderby' => 'post_date',
        'order' => 'DESC',
        'post_type' => 'post',
        'post_status' => 'publish',
        'suppress_filters' => true
    );
    $data['data'] = wp_get_recent_posts($args);
    if (!empty($data['data'])) {
        foreach ($data['data'] as $k => $d){
            if ($k%5 ==0) {
?>
                <div class="col-lg-2 item col-lg-offset-1">
<?php
            }else{
?>
                <div class="col-lg-2 item">
<?php
            }
?>
        <a href="<?=$d['guid'];?>">
            <img src="<?=get_the_post_thumbnail_url($d['ID']);?>" alt="">
        </a>
    </div>
<?php
        }
    }
?>

</div>
<script>
//    init();
//    function init(){
//        createApi('<?//=ARTICLE_RECENT_POST_ACT?>//', {}, function (result) {
//            result = JSON.parse(result);
//            if (result.code == 200){
//                console.log(result);
//            }
//        });
//    }

</script>

<?php get_footer(); ?>
