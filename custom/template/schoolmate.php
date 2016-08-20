<?php require_once(APP_ROOT.'/custom/function/post.php'); ?>
<div id="primary" class="content-area col-md-12 schoolmate">
    <div class="col-md-12 info ca-container">
        <?php
            $post =get_post();
            $tag = wp_get_post_tags($post->ID);
            $catId = get_cat_ID($post->post_title);

            $contact = getIntersect([$catId, CONTACT]);
            $contact = $contact[0];
            $contactUrl = get_the_post_thumbnail_url($contact->ID);
        ?>
        <p class="avatar"><img src="<?=$contactUrl ?>" alt=""></p>
        <p class="title"><?=$post->post_title ?></p>
        <p class="second-title"><?=$tag[0]->name ?></p>
        <div class="content ca-container"><?=$post->post_content ?></div>
    </div>

    <div class="col-md-12 contact ca-container">
        <p class="title"><?=$contact->post_title ?></p>
        <div class="content"><?=$contact->post_content ?></div>
        <div class="col-md-2 col-md-offset-5 links ca-pc">
            <div class="col-md-4 col-xs-4">
                <a href="<?=get_post_meta($post->ID, '_author_weibo_value', true);?>">
                    <span class="icon-weibo"></span>
                </a>
            </div>
            <div class="col-md-4 col-xs-4">
                <a href="<?=get_post_meta($post->ID, '_author_facebook_value', true);?>">
                    <span class="icon-facebook"></span>
                </a>
            </div>
            <div class="col-md-4 col-xs-4">
                <a href="<?=get_post_meta($post->ID, '_author_instagram_value', true);?>">
                    <span class="icon-instagram"></span>
                </a>
            </div>
        </div>

        <div class="col-xs-12 links ca-mobile">
            <div class="col-xs-3"></div>
            <div class="col-xs-2">
                <a href="<?=get_post_meta($post->ID, '_author_weibo_value', true);?>">
                    <span class="icon-weibo"></span>
                </a>
            </div>
            <div class="col-xs-2">
                <a href="<?=get_post_meta($post->ID, '_author_facebook_value', true);?>">
                    <span class="icon-facebook"></span>
                </a>
            </div>
            <div class="col-xs-2">
                <a href="<?=get_post_meta($post->ID, '_author_instagram_value', true);?>">
                    <span class="icon-instagram"></span>
                </a>
            </div>
            <div class="col-xs-3"></div>
        </div>
    </div>

    <div class="col-md-12 arts ca-container">
        <?php
        $arts = getIntersect([$catId, ARTS]);
        $arts = $arts[0];

        echo $arts->post_content;
        ?>
    </div>

</div><!-- #primary -->