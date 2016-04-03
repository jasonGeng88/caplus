<div id="primary" class="content-area col-md-12 article-tokyo">
    <div class="col-md-12 title">
        <p>
            <a href="/">
                <i class="fa fa-chevron-circle-left"></i>
            </a>
        </p>
        <p>東京展覽進行時</p>
    </div>

    <div class="col-md-10 col-md-offset-1 list">
        <input type="hidden" name="cat_id" value="<?= ARTICLE_TOKYO ?>">
        <?php
        require_once(APP_ROOT.'/custom/function/article.php');
        get_recent_article_for_tag(ARTICLE_TOKYO, 0, ARTICLE_PAGE);
        ?>
    </div>

    <div class="addMore">
        <button onclick="addMore()" class="btn-more">more</button>
    </div>
</div><!-- #primary -->

<script>
    var i = 0;
    function addMore(){
        i+=articlePage;
        var cat_id = jQuery("input[name='cat_id']").val();
        var url = api + '&func='+articleApi+'&cat_id='+cat_id+'&offset='+i+'&page='+articlePage;
        jQuery.get(url, function(result){
            if(result == '')
                jQuery(".btn-more").css("display", "none");
            jQuery(".article-tokyo .list").append(result);
        });
    };
</script>