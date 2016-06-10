<?php require_once(APP_ROOT.'/custom/function/post.php'); ?>
<div id="primary" class="content-area col-md-12 normal-post">
    <div class="col-md-12 info ca-container">
        <?php
        $post =get_post();
        ?>
        <div class="title col-lg-12"><?=$post->post_title ?></div>
        <div class="content col-lg-12"><?=$post->post_content ?></div>
        <div class="contact col-lg-12">
            <div class="name col-lg-12">
                <?=get_post_meta($post->ID, '_author_name_value', true);?>
            </div>
            <div class="col-lg-12 education">
                <?=get_post_meta($post->ID, '_author_education_value', true);?>
            </div>
            <div class="col-lg-2 col-lg-offset-5 links">
                <div class="col-lg-4">
                    <a href="<?=get_post_meta($post->ID, '_author_weibo_value', true);?>">
                        <span class="icon-weibo"></span>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="<?=get_post_meta($post->ID, '_author_facebook_value', true);?>">
                        <span class="icon-facebook"></span>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="<?=get_post_meta($post->ID, '_author_instagram_value', true);?>">
                        <span class="icon-instagram"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>

</div><!-- #primary -->
