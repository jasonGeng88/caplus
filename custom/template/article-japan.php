<div id="primary" class="content-area col-md-12 article-japan">
    <div class="col-md-12 title">
        <p>
            <a href="/">
                <i class="fa fa-chevron-circle-left"></i>
            </a>
        </p>
        <p>日本新銳設計賞</p>
    </div>

    <div class="col-md-10 col-md-offset-1 list">
        <input type="hidden" name="cat_id" value="<?= ARTICLE_JAPAN ?>">
        <?php include_once(APP_ROOT.'/custom/template/timeline.php'); ?>
    </div>

    <div class="add-more">
        <button onclick="addMoreForTag()" class="btn-more">more</button>
    </div>

</div><!-- #primary -->

<script>
    var i = 0 - articlePage;
    addMoreForTag();
</script>