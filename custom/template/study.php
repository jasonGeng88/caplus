<div id="primary" class="content-area col-md-12 study">
    <div class="col-md-12 study-university-head">
        <p><i class="fa fa-map-marker"></i></p>
        <p>University</p>
    </div>
    <div class="col-md-12 study-university-list">
        <ul>
            <?php
            require_once(APP_ROOT.'/custom/function/post.php');
            getAll(UNIVERSITY);
            ?>
        </ul>
    </div>

    <div class="col-md-12 study-question-head">
        <p><i class="fa fa-map-marker"></i></p>
        <p>Question</p>
    </div>
    <div class="col-md-12 study-question-list">
        <input type="hidden" name="cat_id" value="<?= QUESTION ?>">
        <ul>
            <?php
            getAll(QUESTION, false, 1);
            ?>
        </ul>
    </div>
    <div class="add-more">
        <button onclick="addMore()" class="btn-more">more</button>
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