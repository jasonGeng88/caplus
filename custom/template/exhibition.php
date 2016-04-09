<div id="primary" class="content-area col-md-12 exhibition">

    <div class="col-md-10 col-md-offset-1 list">
        <input type="hidden" name="cat_id" value="<?= EXHIBITION ?>">
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