<div id="primary" class="content-area col-md-12 article-japan">
    <div class="col-md-12 title">
        <p>
            <i class="fa fa-chevron-circle-left"></i>
        </p>
        <p>東京展覽進行時</p>
    </div>

    <div class="col-md-10 col-md-offset-1 list">
        <?php
        $args = array(
            'numberposts' => 10,
            'offset' => 0,
            'category' => 12,
            'orderby' => 'post_date',
            'order' => 'DESC',
//            'include' => ,
//            'exclude' => ,
//            'meta_key' => ,
//            'meta_value' =>,
            'post_type' => 'post',
            'post_status' => 'publish',
            'suppress_filters' => true
            );
//        $recent_posts = get_category(8 );
        $recent_posts = wp_get_recent_posts( $args );
        var_dump($recent_posts);die;

        $tag = '日本新銳設計賞'; //标签名
        $args=array(
            'tag' => $tag,
//		'showposts'=>5,  //输出的文章数量
            'caller_get_posts'=>1
        );
        $my_query = new WP_Query($args);
        if( $my_query->have_posts() ) {
            while ($my_query->have_posts()) : $my_query->the_post(); ?>
                <div class="col-md-6 item">
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail(); ?>
                    </div>
                    <div class="post-title">
                        <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                    </div>
                </div>
                <?php
            endwhile;
        }
        wp_reset_query();
        ?>
    </div>
<!--    <main id="main" class="site-main" role="main">-->




<!--    </main><!-- #main -->
</div><!-- #primary -->