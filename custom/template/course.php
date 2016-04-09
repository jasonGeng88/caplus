<?php require_once(APP_ROOT.'/custom/function/post.php'); ?>
<div id="primary" class="content-area col-md-12 course">
    <div class="col-md-12 info">
        <?php
            $post =get_post();
            $tag = wp_get_post_tags($post->ID);
            $imageUrl = get_the_post_thumbnail_url($post->ID);
            $catId = get_cat_ID($post->post_title);
        ?>
        <p class="title"><?=$post->post_title ?></p>
        <p class="second-title"><?=$tag[0]->name ?></p>
        <p class="pic"><img src="<?=$imageUrl ?>" alt=""></p>
        <p class="content"><?=$post->post_content ?></p>
    </div>

    <div class="col-md-12 exam-list">
        <?php
        $posts = getAll($catId);
        echo $html;
        ?>
    </div>

    <div class="col-md-12 study-question-list">
        <input type="hidden" name="cat_id" value="<?= QUESTION ?>">
        <p>本科相關資訊</p>
        <ul>
            <?php
            getAll(QUESTION, false, 1);
            ?>
        </ul>
    </div>
    <div class="add-more">
        <button onclick="addMore()" class="btn-more">more</button>
    </div>
</div><!-- #primary -->
<script>
    var i = 1;
    function addMore(){
        i++;
        var cat_id = jQuery("input[name='cat_id']").val();
        var url = api + '&func='+questionApi+'&cat_id='+cat_id+'&offset='+i;
        jQuery.get(url, function(result){
            if(result == '')
                jQuery(".btn-more").css("display", "none");
            jQuery(".study-question-list ul").append(result);
        });
    };
</script>