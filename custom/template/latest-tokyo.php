<div id="primary" class="content-area col-md-12 latest-tokyo">
    <div class="col-md-10 col-md-offset-1 title">
        <p>東京展覽進行時
             <span>
                <a href="?page_id=65"><i class="fa fa-angle-right"></i></a>
            </span>
        </p>
    </div>
    <div class="col-md-10 col-md-offset-1 line">
    </div>
    <div class="col-md-10 col-md-offset-1 list">
        <?php
        $args=array(
            'category__in' => ARTICLE_TOKYO,
		    'showposts'=>4,  //输出的文章数量
            'caller_get_posts'=>1
        );
        $my_query = new WP_Query($args);
        $i = 1;
        if( $my_query->have_posts() ) {
            while ($my_query->have_posts()) : $my_query->the_post();
            if (($i % 2) == 1) {
        ?>
                <div class="col-md-6 item odd">
        <?php
            } else {
        ?>
                <div class="col-md-6 item even">
        <?php
            }
        ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail(); ?>
                        <div class="post-title col-md-12">
                            <a class="yellow" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                            <div class="post-content col-md-12">
                                <?php
                                $span = '</span>';
                                $tmp = get_the_content();
                                $arr = explode($span, $tmp);
                                $content = '';
                                if (isset($arr[0])) {
                                    $content .= $arr[0].$span;
                                }
                                if (isset($arr[1])) {
                                    $content .= $arr[1].$span;
                                }
                                $content .= '...';
                                $content = apply_filters( 'the_content', $content );
                                $content = str_replace( ']]>', ']]&gt;', $content );
                                echo $content;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $i++;
            endwhile;
        }
        wp_reset_query();
        ?>
    </div>
<!--    <main id="main" class="site-main" role="main">-->




<!--    </main><!-- #main -->
</div><!-- #primary -->