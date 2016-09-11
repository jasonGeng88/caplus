<?php require_once(APP_ROOT.'/custom/function/post.php'); ?>
<div id="primary" class="content-area col-md-12 university">
    <div class="col-md-12 info ca-block">
        <?php
            $post =get_post();
            $tag = wp_get_post_tags($post->ID);
            $imageUrl = get_the_post_thumbnail_url($post->ID);
            $catId = get_cat_ID($post->post_title);
        ?>
        <p class="title"><?=$post->post_title ?></p>
        <p class="second-title"><?=$tag[1]->name ?></p>
        <p class="pic ca-pc"><img src="<?=$imageUrl ?>" alt=""></p>
        <p class="pic ca-mobile"><img src="<?=$imageUrl ?>" alt="" onclick="javascript:openUniversityContent()"></p>
        <div class="content col-md-10 col-md-offset-1 ca-pc"><?=$post->post_content ?></div>
    </div>

    <div class="col-md-10 col-md-offset-1 course-list  ca-block ca-pc">
        <p class="title">学科</p>
        <ul>
        <?php
        $posts = getIntersect([$catId, COURSE]);
        $html = joinHtmlForList($posts, "course");
        echo $html;
        ?>
        </ul>
    </div>

    <div class="col-md-10 col-md-offset-1 course-list  ca-block ca-mobile">
        <p class="title">学科</p>
        <ul>
            <?php
            $posts = getIntersect([$catId, COURSE]);
            $html = joinHtmlForList($posts, "course");
            echo $html;
            ?>
        </ul>
    </div>

    <div class="col-md-12 requirement  ca-block">
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

    <div class="col-md-12 schoolmate ca-block">
        <div class="col-md-12">
            <p class="title">前輩たち</p>
        </div>
        <?php
        $schoolmates = getIntersect([$catId, SCHOOLMATE]);
        if (!empty($schoolmates)) {
            $html = '<div class="col-md-10 col-md-offset-1"><ul>';
            foreach ($schoolmates as $key => $mate) {
                $html .= '<li class="col-md-2 col-xs-4">';
                $html .= '<a href="'.$mate->guid.'"><img src="'.get_the_post_thumbnail_url($mate->ID).'" alt=""></a>';
                $html .= '</li>';
            }
            $html .= '</ul></div>';
            echo $html;
        }
        ?>

    </div>

    <div class="col-md-12 university-url">
        <a href="<?=$tag[0]->name ?>">
            <span>Official Site</span>
        </a>
    </div>

    <div class="col-md-10 col-md-offset-1 study-university-list ca-block ca-pc">
        <ul class="ca-container">
            <?php
            getAll(UNIVERSITY, "university");
            ?>
        </ul>
    </div>

    <div class="col-xs-12 study-university-list ca-block ca-mobile">
        <div class="ca-container m-select-container">
            <?php
            getAllBySelect(UNIVERSITY, "university");
            ?>
        </div>
    </div>

</div><!-- #primary -->
<script>
    mobileSelect();
    function showContent(){
       jQuery(".university-des-mask").css("display", "block");
    }
</script>