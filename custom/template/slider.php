<!-- Link Swiper's CSS -->
<link rel="stylesheet" href="../bower_components/swiper/dist/css/swiper.min.css">
<!-- Swiper -->
<div class="swiper-container caplus">
    <div class="swiper-wrapper">
        <?php
        for ($i=1; $i < 6; $i++) {
            $imgUrl = of_get_option('slide'.$i, true);;
            if (!empty($imgUrl)) {
                ?>
                <div class="swiper-slide">
                    <img src="<?php echo $imgUrl?>"/>
                </div>
                <?php
            }
        }

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