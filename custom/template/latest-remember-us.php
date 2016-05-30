<div id="primary" class="content-area col-md-12">
    <div class="col-md-12 line-combo">
        <p class="title-line"></p>
        <p class="title-content">記住我們，我們是未來</p>
    </div>
    <div class="col-md-12 list">
        <input type="hidden" name="cat_id" value="<?= ARTICLE ?>">
        <ul class="ca-container">
            <?php
            require_once(APP_ROOT.'/custom/function/article.php');
            get_recent_article_for_remember(ARTICLE, 0, LATEST_PAGE);
            $page = 1;
            ?>
        </ul>

    </div>
    <div class="add-more">
        <p><button onclick="addMore()" class="btn-more">more</button></p>
    </div>
<!--    <main id="main" class="site-main" role="main">-->




<!--    </main><!-- #main -->
</div><!-- #primary -->

<script>
    var data = {
        cat_id : <?=ARTICLE?>,
    };
    createApi('<?=RECENT_POST_ACT?>', data, function (result) {
        console.log("receive " + result);
    });

</script>