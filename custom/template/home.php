<?php
/*
Template Name: Latest
*/

get_header();
?>
<div class="col-lg-12 home ca-block">
    <!--home pic-->
    <div class="col-lg-12 home-pic ca-block">
        <img src="<?=APP_URL.'/wp-content/uploads/2016/06/home.png';?>" alt="">
    </div>
    <!--home pic end-->
    <!--分類文章-->
    <div class="col-lg-10 col-lg-offset-1 home-articles ca-block">
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
                <div class="col-lg-12 column ca-block">
                    <div class="col-lg-12 title">
                        <div class="name">
                            <a href="<?=ARTICLE_LIST_URL;?>&cat_id=<?=$item;?>">
                                <?=get_cat_name($item);?>
                            </a>
                        </div>
                        <div class="line"></div>
                    </div>
                    <div class="col-lg-12 article-items">
                        <?php foreach ($data['data'] as $d) { ?>
                            <div class="col-lg-4 item">
                                <div class="content">
                                    <div class="pic">
                                        <a href="<?=$d['guid'];?>">
                                            <img src="<?=get_the_post_thumbnail_url($d['ID']);?>" alt="">
                                        </a>
                                    </div>
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
    <div class="col-lg-10 col-lg-offset-1 home-hundred ca-block">
        <div class="col-lg-12 title">
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
            <div class="col-lg-2 item">
                <a href="">
                    <div class="join-us">
                        Join us
                    </div>
                </a>
            </div>
        </div>
    </div>
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
