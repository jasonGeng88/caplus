<div id="primary" class="content-area col-md-12 article-tokyo article">
    <div class="col-md-12 title">
        <p>
            <a href="/">
                <img class="arrow-back" src="/custom/images/arrow.png" alt="">
            </a>
        </p>
        <p class="content">東京展覽進行時</p>
    </div>

    <div class="ca-container list">
        <input type="hidden" name="cat_id" value="<?= ARTICLE_TOKYO ?>">
        <?php include_once(APP_ROOT.'/custom/template/timeline.php'); ?>
    </div>

    <div class="add-more">
        <p><button onclick="addMoreForTag('tokyo')" class="btn-more">more</button></p>
    </div>
</div><!-- #primary -->

<script>
    var i = 0 - articlePage;
    addMoreForTag("tokyo");
</script>