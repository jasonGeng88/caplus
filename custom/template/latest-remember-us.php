<div id="primary" class="content-area col-md-12 latest-remember-us">
    <div class="col-md-10 col-md-offset-1 title">
        <p>記住我們，我們是未來</p>
    </div>
    <div class="col-md-10 col-md-offset-1 line">
    </div>
    <div class="col-md-10 col-md-offset-1 list">
        <input type="hidden" name="cat_id" value="<?= ARTICLE ?>">
        <?php
        require_once(APP_ROOT.'/custom/function/article.php');
        get_recent_article_for_remember(ARTICLE, 0, LATEST_PAGE);
        $page = 1;
        ?>
    </div>
    <div class="addMore">
        <button onclick="addMore()" class="btn-more">more</button>
    </div>
<!--    <main id="main" class="site-main" role="main">-->




<!--    </main><!-- #main -->
</div><!-- #primary -->

<script>
    var i = 0;
    function addMore(){
        i+=latestPage;
        var cat_id = jQuery("input[name='cat_id']").val();
        var url = api + '&func='+rememberApi+'&cat_id='+cat_id+'&offset='+i+'&page='+latestPage;
        jQuery.get(url, function(result){
            if(result == '')
                jQuery(".btn-more").css("display", "none");
            jQuery(".latest-remember-us .list").append(result);
        });
    };
</script>