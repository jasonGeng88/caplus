<?php require_once(APP_ROOT.'/custom/function/post.php'); ?>
<div id="primary" class="content-area col-md-12 schoolmate">
    <div class="col-md-12 info">
        <?php
            $post =get_post();
            $tag = wp_get_post_tags($post->ID);
            $catId = get_cat_ID($post->post_title);

            $contact = getIntersect([$catId, CONTACT]);
            $contact = $contact[0];
            $contactUrl = get_the_post_thumbnail_url($contact->ID);
        ?>
        <p><img src="<?=$contactUrl ?>" alt=""></p>
        <p class="title"><?=$post->post_title ?></p>
        <p class="second-title"><?=$tag[0]->name ?></p>
        <p class="content"><?=$post->post_content ?></p>
    </div>

    <div class="col-md-12 contact">
        <p class="title"><?=$contact->post_title ?></p>
        <p class="content"><?=$contact->post_content ?></p>
        <p>
            <span><a href=""><img src="wp-content/uploads/2016/04/weibo.png" alt=""></a></span>
            <span><a href=""><img src="wp-content/uploads/2016/04/facebook.png" alt=""></a></span>
            <span><a href=""><img src="wp-content/uploads/2016/04/instagram.png" alt=""></a></span>
        </p>
    </div>

    <div class="col-md-12 arts">
        <?php
        $arts = getIntersect([$catId, ARTS]);
        $arts = $arts[0];

        echo $arts->post_content;
        ?>
    </div>

</div><!-- #primary -->