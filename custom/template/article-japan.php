<div id="primary" class="content-area col-md-12 article-japan article">
    <div class="col-md-12 title">
        <p>
            <a href="/">
                <img class="arrow-back" src="/custom/images/arrow.png" alt="">
            </a>
        </p>
        <p class="content">日本新銳設計賞</p>
    </div>

    <div class="col-md-10 col-md-offset-1 list">
        <input type="hidden" name="cat_id" value="<?= ARTICLE_JAPAN ?>">
        <?php include_once(APP_ROOT.'/custom/template/timeline.php'); ?>
    </div>

    <div class="add-more">
        <p><button onclick="addMoreForTag('japan')" class="btn-more">more</button></p>
    </div>

</div><!-- #primary -->

<script>
    var i = 0 - articlePage;
    addMoreForTag("japan");
</script>