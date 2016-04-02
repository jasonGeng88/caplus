<div id="primary" class="content-area col-md-12 study">
    <div class="col-md-12 study-university-head">
        <p><i class="fa fa-map-marker"></i></p>
        <p>University</p>
    </div>
    <div class="col-md-12 study-university-list">

        <?php
            require_once(APP_ROOT.'/custom/function/post.php');
            getAll(UNIVERSITY);
        ?>
    </div>

    <div class="col-md-12 study-question-head">
        <p><i class="fa fa-map-marker"></i></p>
        <p>Question</p>
    </div>
    <div class="col-md-12 study-question-list">

        <?php
        getAll(QUESTION);
        ?>
    </div>
</div><!-- #primary -->