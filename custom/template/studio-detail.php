<?php
get_header();
?>

<div class="col-lg-12 studio-detail ca-block">
    <div class="col-lg-10 col-lg-offset-1 tab-title ca-block">
        <div class="name">
            <a href="javascript:toggleTab(1)">環境&地點</a>
        </div>
        <div class="name">
            <a href="javascript:toggleTab(2)">講師團隊</a>
        </div>
        <div class="name">
            <a href="javascript:toggleTab(3)">课程安排</a>
        </div>
        <div class="name">
            <a href="javascript:toggleTab(4)">無料體驗</a>
        </div>
    </div>
    <div class="col-lg-10 col-lg-offset-1 tab-content item-1">
        <div class="part-1 col-lg-12 ca-block">
            <p class="title">SOHO 設計事務所兼畫室<br>美大零距離體驗 coffee & music 和聚餐 一個不能少</p>
            <p class="content">我們将为每一位真心想来日本完成艺术梦想的孩子提供最专业的日本美术大学的个性化进学指导课 程。号称“东京五美”的武藏野美术大学、多摩美術大学、女子美術大学、東京造形大学、日本大学芸術学部，远至京都方面的美术院校都有CAplus的成员。丰富的成员资源也为我们提供个性化培训提供 了强有力的基础。我们没有后台也没有分红合作的机构，只是一群在日本学美术的年轻人聚集在一起，如果你要来留学，请先来CAplus工作室瞧瞧</p>
        </div>
        <div class="part-2 col-lg-12 ca-block">
            <img src="<?=APP_URL.'/custom/images/studio-item-01.png';?>" alt="">
        </div>
        <div class="part-3 col-lg-12 ca-block">
            <div class="col-lg-2 left">
                <img src="<?=APP_URL.'/custom/images/studio-item-02.png';?>" alt="">
            </div>
            <div class="col-lg-8 col-lg-offset-2 right">
                <p>
                    MONA:080-3710-6088<br>
                    地下鉄東西線高田馬場駅早稲田口 4分<br>
                    西武新宿線高田馬場駅早稲田口 5分<br>
                    JR山手線高田馬場駅早稲田口 5分<br>
                    <br>
                    <strong>新宿區高田馬場 4-17-5 東陽ビルディング7F</strong>
                </p>
            </div>
        </div>
        <div class="part-4 col-lg-12 ca-block">
            <div class="col-lg-8 col-lg-offset-4">
                <div id="map"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-10 col-lg-offset-1 tab-content item-2">
        <p>222222</p>
    </div>
</div>

<script>
    toggleTab(1);
    function toggleTab(index){
        jQuery(".tab-title .name").removeClass("active");
        jQuery(".tab-title .name").eq(index-1).addClass("active");
        jQuery(".tab-content").css("display", "none");
        jQuery(".tab-content.item-" + index).css("display", "block");
    }
    var map;
    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: -34.397, lng: 150.644},
            zoom: 8
        });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAGdAkMEbjRwy8wNOKYv3qa7Lvuv9sIhKI&callback=initMap" async defer></script>
