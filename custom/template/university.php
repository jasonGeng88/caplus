<?php require_once(APP_ROOT.'/custom/function/post.php'); ?>
<div id="primary" class="content-area col-md-12 university">
    <div class="col-md-12 info">
        <?php
            $post =get_post();
            $tag = wp_get_post_tags($post->ID);
            $imageUrl = get_the_post_thumbnail_url($post->ID);
            $catId = get_cat_ID($post->post_title);
        ?>
        <p class="title"><?=$post->post_title ?></p>
        <p class="second-title"><?=$tag[1]->name ?></p>
        <p class="pic"><img src="<?=$imageUrl ?>" alt=""></p>
        <div class="content ca-container"><?=$post->post_content ?></div>
    </div>

    <div class="col-md-12 ca-container course-list">
        <p class="title">学科</p>
        <ul>
        <?php
        $posts = getIntersect([$catId, COURSE]);
        $html = joinHtmlForList($posts, "course");
        echo $html;
        ?>
        </ul>
    </div>

    <div class="col-md-12 requirement">
        <?php
            $requirement = getIntersect([$catId, REQUIREMENT]);
        ?>
        <p class="title"><?=$requirement[0]->post_title ?></p>
        <div class="content"><?=$requirement[0]->post_content ?></div>
        <?php
        $requirementTag = wp_get_post_tags($requirement[0]->ID);
            if (!empty($requirementTag)) {
                $html = '<p class="requirement-link"><a href="'.$requirementTag[0]->name.'">相關頁面</a></p>';
                echo $html;
            }
        ?>
    </div>

    <div class="col-md-12 schoolmate">
        <p class="title">前輩たち</p>
        <?php
        $schoolmates = getIntersect([$catId, SCHOOLMATE]);
        if (!empty($schoolmates)) {
            $html = '<ul class="col-md-12">';
            foreach ($schoolmates as $key => $mate) {
                if($key%5 == 0){
                    $html .= '<li class="col-md-2 col-md-offset-1">';
                }else{
                    $html .= '<li class="col-md-2">';
                }
                $html .= '<a href="'.$mate->guid.'"><img src="'.get_the_post_thumbnail_url($mate->ID).'" alt=""></a>';
                $html .= '</li>';
            }
            $html .= '</ul>';
            echo $html;
        }
        ?>

    </div>

    <div class="col-md-12 university-url">
        <a href="<?=$tag[0]->name ?>">Official Site</a>
    </div>

    <div class="col-md-12 study-university-list">
        <ul class="ca-container">
            <?php
            getAll(UNIVERSITY, "university");
            ?>
        </ul>
    </div>

</div><!-- #primary -->