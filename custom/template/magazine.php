<?php
    $posts = query_posts(array('category__in' => array(MAGAZINE)));
    if (!empty($posts)) {
        foreach ($posts as &$p) {
            $tmpUrl = get_the_post_thumbnail_url($p->ID);
            $p->img_url = $tmpUrl;
        }
    }
?>
<div id="primary" class="content-area col-md-12 magazine">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="../bower_components/swiper/dist/css/swiper.min.css">
    <!-- Swiper -->
    <div class="swiper-container caplus">
        <div class="swiper-wrapper">
            <?php
            $html = '';
            foreach ($posts as $key => $item) {
                $html .= '<div class="swiper-slide" ca-slider-index="'.$key.'">
                        <div class="pic">
                        <img src="'.$item->img_url.'"/>
                        </div>
                        <div class="title">
                        '.$item->post_title.'
                        </div>
                        </div>';
            }
            echo $html;
            ?>

        </div>

        <!-- Add Arrows -->
        <div class="swiper-button-next ca-pc"></div>
        <div class="swiper-button-prev ca-pc"></div>
    </div>

    <div class="magazine-slider-content">
        <?php
        $html = '';
        foreach ($posts as $key => $item) {
            $html .= '<div class="item magazine-item-'.$key.' ca-line">
                      '.$item->post_content.'
                        </div>';
        }
        echo $html;
        ?>
    </div>

    <!-- Swiper JS -->
    <script src="../bower_components/swiper/dist/js/swiper.min.js"></script>
    <script>
        jQuery(".swiper-button-next").append('<span class="icon-continue"></span>');
        jQuery(".swiper-button-prev").append('<span class="icon-back"></span>');
        var sliderCustomer = function(){};
        <!-- Initialize Swiper -->
        var appendNumber = 3;
        var prependNumber = 1;
        var swiper = new Swiper('.swiper-container', {
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
            slidesPerView: 3,
            centeredSlides: false,
            paginationClickable: false,
            loop: true,
            spaceBetween: 0,
            autoplay: 5000,
            onAutoplay: function(swiper){
                sliderCustomer();
            },
            onTouchMove: function(swiper){
                sliderCustomer();
            },
            onSlideChangeEnd: function(swiper){
                sliderCustomer();
            },
            onTransitionEnd: function(swiper){
                sliderCustomer();
            },
            onInit: function(swiper){
                sliderCustomer();
            },
            onLazyImageReady: function(swiper){
                sliderCustomer();
            },

        });


        sliderCustomer = function(){
            var index = jQuery(".swiper-slide-next").attr("ca-slider-index");
//            console.log(index);
            jQuery(".magazine-slider-content .item").css("display", "none");
            jQuery(".magazine-item-"+index).css("display", "block");
            adjustHeight();
        }
        jQuery(".swiper-button-next").click(function(){
//        swiper.unlockSwipes();
            sliderCustomer();
//        swiper.lockSwipes();

        });
        jQuery(".swiper-button-prev").click(function(){
            sliderCustomer();
        });

        sliderCustomer();

        /**
         * 调整slider的上下位置
         */
        function adjustHeight(){
            if (jQuery(window).width() < 992){
                var maxHeight = jQuery(".swiper-slide-next .pic img").height();
                var minHeight = jQuery(".swiper-slide-active .pic img").height();
                jQuery(".swiper-slide").css("margin-top", (maxHeight - minHeight)/2 + "px");
                jQuery(".swiper-slide.swiper-slide-next").css("margin-top", 0);
            }
        }


    </script>
</div><!-- #primary -->