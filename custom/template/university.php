<?php require_once(APP_ROOT.'/custom/function/post.php'); ?>
<div id="primary" class="content-area col-lg-12 university">
    <div class="col-lg-12 info  ca-block">
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

    <div class="col-lg-12 ca-container course-list  ca-block">
        <p class="title">学科</p>
        <ul>
        <?php
        $posts = getIntersect([$catId, COURSE]);
        $html = joinHtmlForList($posts, "course");
        echo $html;
        ?>
        </ul>
    </div>

    <div class="col-lg-12 requirement  ca-block">
        <?php
            $requirement = getIntersect([$catId, REQUIREMENT]);
        ?>
        <p class="title"><?=$requirement[0]->post_title ?></p>
        <div class="content"><?=$requirement[0]->post_content ?></div>
        <?php
        $requirementTag = wp_get_post_tags($requirement[0]->ID);
            if (!empty($requirementTag)) {
                $html = '<div class="requirement-link"><a href="'.$requirementTag[0]->name.'" target="_blank"><p>相關頁面</p></a></div>';
                echo $html;
            }
        ?>
    </div>

    <div class="col-lg-12 schoolmate ca-block">
        <div class="col-lg-12">
            <p class="title">前輩たち</p>
        </div>
        <?php
        $schoolmates = getIntersect([$catId, SCHOOLMATE]);
        if (!empty($schoolmates)) {
            $html = '<div class="col-lg-10 col-lg-offset-1"><ul>';
            foreach ($schoolmates as $key => $mate) {
                $html .= '<li class="col-lg-2">';
                $html .= '<a href="'.$mate->guid.'"><img src="'.get_the_post_thumbnail_url($mate->ID).'" alt=""></a>';
                $html .= '</li>';
            }
            $html .= '</ul></div>';
            echo $html;
        }
        ?>

    </div>

    <div class="col-lg-12 university-url">
        <a href="<?=$tag[0]->name ?>">
            <span>Official Site</span>
        </a>
    </div>

    <div class="col-lg-12 study-university-list ca-block">
        <ul class="ca-container">
            <?php
            getAll(UNIVERSITY, "university");
            ?>
        </ul>
    </div>

</div><!-- #primary -->