<?php require_once(APP_ROOT.'/custom/function/article.php'); ?>
<div id="primary" class="content-area col-md-12 latest-japan">
    <div class="ca-container title">
        <p>日本新銳設計賞
            <span>
                <a href="?page_id=62"><i class="fa fa-angle-right"></i></a>
            </span>
        </p>
    </div>
    <div class="ca-container line">
    </div>
    <div class="ca-container list">
        <?php
        $tag = '日本新銳設計賞'; //标签名
        $args=array(
            'category__in' => ARTICLE_JAPAN,
		    'showposts'=>6,  //输出的文章数量
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
                        <a class="yellow" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
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