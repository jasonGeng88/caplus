<?php
    $posts = query_posts(array('category__in' => array(MAGAZINE)));
    if (!empty($posts)) {
        foreach ($posts as &$p) {
            $tmpUrl = get_the_post_thumbnail_url($p->ID);
            $p->img_url = $tmpUrl;
        }
    }
var_dump($posts);
?>
<div id="primary" class="content-area col-md-12 magazine">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="../bower_components/swiper/dist/css/swiper.min.css">
    <!-- Swiper -->
    <div class="swiper-container caplus">
        <div class="swiper-wrapper">
            <?php
            $html = '';
            foreach ($posts as $item) {
                $html .= '<div class="swiper-slide">
                        <img src="'.$item->img_url.'"/>
                        </div>';
            }
            echo $html;
            ?>

        </div>

        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>

    <!-- Swiper JS -->
    <script src="../bower_components/swiper/dist/js/swiper.min.js"></script>
    <script>

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
            var width = jQuery(".swiper-slide").width();
            jQuery(".swiper-slide").css("width", width);
            jQuery(".swiper-slide-next").css("width","50%");
            jQuery(".swiper-slide-active").css("width", "50%");
            jQuery(".swiper-slide-next").next().css("width", "50%");

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




    </script>
</div><!-- #primary -->