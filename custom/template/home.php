<?php
/*
Template Name: Latest
*/

get_header();
?>
<link rel="stylesheet" href="<?=APP_URL;?>/custom/lib/pic_effect/css/default.css">
<link rel="stylesheet" href="<?=APP_URL;?>/custom/lib/pic_effect/css/tilteffect.css">
<div class="col-md-12 home ca-block">
    <!--home pic-->
    <div class="col-md-12 home-pic ca-block">
        <ul class="grid grid--examples">
            <li class="grid__item">
                <div class="grid__img grid__img--example-1" >
                    <img src="<?=APP_URL;?>/custom/images/home.jpg" class="tilt-effect" alt="grid01" data-tilt-options='{ "opacity" : 0.3, "extraImgs" : 3, "movement": { "perspective" : 1200, "translateX" : -5, "translateY" : -5, "rotateX" : -5, "rotateY" : -5 } }' />
                </div>
            </li>
        </ul>
    </div>
    <!--home pic end-->
    <!--分類文章-->
    <div class="col-md-10 col-md-offset-1 home-articles ca-block">
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
                <div class="col-md-12 column ca-block">
                    <div class="col-md-12 title">
                        <div class="name">
                            <a href="<?=ARTICLE_LIST_URL;?>&cat_id=<?=$item;?>">
                                <?=get_cat_name($item);?>
                            </a>
                        </div>
                        <div class="line"></div>
                    </div>
                    <div class="col-xs-12 col-md-12 article-items">
                        <?php foreach ($data['data'] as $d) { ?>
                            <div class="col-xs-6 col-md-4 item">
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
                                    <div class="tag ca-pc">
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
                <?php
            }
        }
        ?>
    </div>
    <!--分類文章 end-->

    <!--百人計劃-->
    <div class="col-xs-12 col-md-10 col-md-offset-1 home-hundred ca-block">
        <div class="col-md-12 title">
            <div class="name">留日百人計劃</div>
            <div class="line"></div>
        </div>
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
        ?>
        <div class="col-xs-4 col-md-2 item">
            <a href="<?=$d['guid'];?>">
                <img src="<?=get_the_post_thumbnail_url($d['ID']);?>" alt="">
            </a>
        </div>
            <?php
            }
            }
            ?>
            <div class="col-xs-4 col-md-2 item">
                <a href="">
                    <a href="<?=ABOUT_URL;?>">
                        <div class="join-us">Join us</div>
                    </a>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    ca_portfolio();

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
<script src="<?=APP_URL;?>/custom/lib/pic_effect/js/tiltfx.js"></script>

<?php get_footer(); ?>
