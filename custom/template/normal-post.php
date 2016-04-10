<?php require_once(APP_ROOT.'/custom/function/post.php'); ?>
<div id="primary" class="content-area col-md-12 normal-post">
    <div class="col-md-12 info ca-container">
        <?php
        $post =get_post();
        ?>
        <div class="title"><?=$post->post_title ?></div>
        <div class="content"><?=$post->post_content ?></div>
    </div>

</div><!-- #primary -->
