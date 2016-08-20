<?php require_once(APP_ROOT.'/custom/function/post.php'); ?>
<div id="primary" class="content-area col-md-12 normal-post">
    <div class="col-md-12 info ca-container">
        <?php
        $post =get_post();
        ?>
        <div class="title col-md-12"><?=$post->post_title ?></div>
        <div class="content col-md-12  ca-line"><?=$post->post_content ?></div>
        <div class="contact col-md-12">
            <div class="name col-md-12">
                <?=get_post_meta($post->ID, '_author_name_value', true);?>
            </div>
            <div class="col-md-12 education">
                <?=get_post_meta($post->ID, '_author_education_value', true);?>
            </div>
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
    </div>

</div><!-- #primary -->
