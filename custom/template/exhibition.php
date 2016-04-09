<div id="primary" class="content-area col-md-12 exhibition article">

    <div class="ca-container list">
        <input type="hidden" name="cat_id" value="<?= EXHIBITION ?>">
        <?php include_once(APP_ROOT.'/custom/template/timeline.php'); ?>
    </div>

    <div class="add-more">
        <p><button onclick="addMoreForTag('exhibition')" class="btn-more">more</button></p>
    </div>
</div><!-- #primary -->
<script>
    var i = 0 - articlePage;
    addMoreForTag("exhibition");
</script>