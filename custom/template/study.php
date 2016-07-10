<div id="primary" class="content-area col-md-12 study">
    <div class="col-md-10 col-md-offset-1 study-head">
        <p><img src="/custom/images/location.png" alt=""></p>
        <p class="content">University</p>
    </div>
    <div class="col-md-10 col-md-offset-1 study-university-list">
        <ul class="ca-container">
            <?php
            require_once(APP_ROOT.'/custom/function/post.php');
            getAll(UNIVERSITY, "university");
            ?>
        </ul>
    </div>

    <div class="col-md-10 col-md-offset-1 study-head">
        <p><img src="/custom/images/location.png" alt=""></p>
        <p class="content">Question</p>
    </div>
    <div class="col-md-10 col-md-offset-1 study-question-list">
        <input type="hidden" name="cat_id" value="<?= QUESTION ?>">
        <ul class="ca-container">
            <?php
            getAll(QUESTION, "question", false, 1);
            ?>
        </ul>
    </div>
    <div class="add-more">
        <p><button onclick="addMore()" class="btn-more">more</button></p>
    </div>
</div><!-- #primary -->
<script>
    var i = 1;
    function addMore(){
        i++;
        var cat_id = jQuery("input[name='cat_id']").val();
        var url = api + '&func='+questionApi+'&cat_id='+cat_id+'&offset='+i;
        jQuery.get(url, function(result){
            if(result == '')
                jQuery(".btn-more").css("display", "none");
            jQuery(".study-question-list ul").append(result);
        });
    };
</script>