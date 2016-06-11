<?php
get_header();
//$tmp = the_attachment_link(227);
$attachments = get_attached_media( 'image', 247 );
$tmp = get_post()->post_content;
preg_match_all("/\<img(.*)src\=\"(.*)\.png(.*)\/\>/", $tmp, $matches);
$urls = $matches[2];
foreach ($urls as &$item) {
    $item = substr($item, 0, strpos($item, '-300')).'.png';
}
?>

<div class="col-lg-12 studio-detail ca-block">
    <div class="col-lg-12 tab-title ca-block">
        <div class="col-lg-10 col-lg-offset-1">
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
    </div>
    <div class="col-lg-10 col-lg-offset-1 tab-content item-1">
        <div class="part-1 col-lg-12 ca-block">
            <p class="title">SOHO 設計事務所兼畫室<br>美大零距離體驗 coffee & music 和聚餐 一個不能少</p>
            <p class="content">我們将为每一位真心想来日本完成艺术梦想的孩子提供最专业的日本美术大学的个性化进学指导课 程。号称“东京五美”的武藏野美术大学、多摩美術大学、女子美術大学、東京造形大学、日本大学芸術学部，远至京都方面的美术院校都有CAplus的成员。丰富的成员资源也为我们提供个性化培训提供 了强有力的基础。我们没有后台也没有分红合作的机构，只是一群在日本学美术的年轻人聚集在一起，如果你要来留学，请先来CAplus工作室瞧瞧</p>
        </div>
        <div class="part-2 col-lg-12 ca-block">
            <img src="<?=APP_URL.'/custom/images/studio-item-011.png';?>" alt="">
        </div>
        <div class="part-3 col-lg-12 ca-block">
            <div class="col-lg-2 left">
                <img src="<?=APP_URL.'/custom/images/studio-item-012.png';?>" alt="">
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
        <div class="part-1 col-lg-12 ca-block">
            <p class="title">漂亮話不多說<br>找老師還是靠譜得好</p>
            <p class="content">我們将为每一位真心想来日本完成艺术梦想的孩子提供最专业的日本美术大学的个性化进学指导课 程。号称“东京五美”的武藏野美术大学、多摩美術大学、女子美術大学、東京造形大学、日本大学芸術 学部,远至京都方面的美术院校都有 CAplus 的成员。丰富的成员资源也为我们提供个性化培训提供 了强有力的基础。我们没有后台也没有分红合作的机构，只是一群在日本学美术的年轻人聚集在一起，如果你要来留学，请先來 CAplus 工作室瞧瞧。</p>
        </div>
        <div class="part-2 col-lg-12 ca-block">
            <div class="col-lg-12 ca-block">
                <div class="col-lg-6 brief">
                    <div class="head ca-block">
                        <div class="pic">
                            <img src="<?=APP_URL.'/custom/images/studio-item-021.png';?>" alt="">
                        </div>
                        <div class="title">
                            <div class="name">陳 芃</div>
                            <div class="line"></div>
                            <div class="study">
                                <span>武藏野美術大学</span><br>
                                造形学部<br>
                                基礎デザイン学科
                            </div>
                        </div>
                    </div>
                    <div class="content">
                        CAplus 對於我來說不僅僅是壹個夢想的開始，<br>
                        並且是我向著這個所謂的現實世界的一種抵抗，我一向認為年輕人就該有自己的夢想並且去實現它。<br>
                        特別對於學習藝術的我們。創意、激情這些美好的詞匯全部源於年輕這個詞匯，這個美好的時間卻只占了我們人生的1/7，為什麽我們不能好好利用這個時間來做一些能改變的事情呢？<br>
                        幾年前我來到東京的時候感覺到了這個遠東國家的強大的文化吸引力，文化是在撞擊和融合下產生的產物，沒有新的文化的生成世界也就不會變得更有趣，我們作為留學生這個異文化體來到日本，並且在這個國家的學習過程中產生了產生奇妙的化學效應，我將之宣傳出來並且將所有和我有一樣想法的人聚集在一起，形成了 CAplus 這個團體。
                    </div>
                </div>
                <div class="col-lg-6 brief">
                    <div class="head ca-block">
                        <div class="pic">
                            <img src="<?=APP_URL.'/custom/images/studio-item-022.png';?>" alt="">
                        </div>
                        <div class="title">
                            <div class="name">徐澤渝 </div>
                            <div class="line"></div>
                            <div class="study">
                                <span>武藏野美術大学</span><br>
                                造形学部<br>
                                基礎デザイン学科
                            </div>
                        </div>
                    </div>
                    <div class="content">
                        夢想 現實 一步之遙<br>
                        那麽這一步就是 CAplus<br>
                        在我更年輕一點的高中時代<br>
                        常因為把夢想理解的遙不可及而讓自己生活的非常消極<br>
                        直到我決定來到日本 邁向了新生活 邁向了走上實踐的道路<br>
                        如果夢想只是停留在想 那麽永遠都是個夢<br>
                        現在的我非常感謝當年自己的付出 在往返三小時的電車上補覺 在大家都回<br>
                        家休息的時候我選擇去畫室 在大家都質疑我的時候堅持了下來<br>
                        我所遇見的 我將毫無保留的分享<br>
                        有著同樣夢想的我們成為了 CAplus 有著不同經歷的我們成為了不同的絢爛 。
                    </div>
                </div>
            </div>
            <div class="col-lg-12 ca-blocl">
                <div class="col-lg-6 brief">
                    <div class="head ca-block">
                        <div class="pic">
                            <img src="<?=APP_URL.'/custom/images/studio-item-021.png';?>" alt="">
                        </div>
                        <div class="title">
                            <div class="name">陳 芃</div>
                            <div class="line"></div>
                            <div class="study">
                                <span>武藏野美術大学</span><br>
                                造形学部<br>
                                基礎デザイン学科
                            </div>
                        </div>
                    </div>
                    <div class="content">
                        CAplus 對於我來說不僅僅是壹個夢想的開始，<br>
                        並且是我向著這個所謂的現實世界的一種抵抗，我一向認為年輕人就該有自己的夢想並且去實現它。<br>
                        特別對於學習藝術的我們。創意、激情這些美好的詞匯全部源於年輕這個詞匯，這個美好的時間卻只占了我們人生的1/7，為什麽我們不能好好利用這個時間來做一些能改變的事情呢？<br>
                        幾年前我來到東京的時候感覺到了這個遠東國家的強大的文化吸引力，文化是在撞擊和融合下產生的產物，沒有新的文化的生成世界也就不會變得更有趣，我們作為留學生這個異文化體來到日本，並且在這個國家的學習過程中產生了產生奇妙的化學效應，我將之宣傳出來並且將所有和我有一樣想法的人聚集在一起，形成了 CAplus 這個團體。
                    </div>
                </div>
                <div class="col-lg-6 brief">
                    <div class="head ca-block">
                        <div class="pic">
                            <img src="<?=APP_URL.'/custom/images/studio-item-022.png';?>" alt="">
                        </div>
                        <div class="title">
                            <div class="name">徐澤渝 </div>
                            <div class="line"></div>
                            <div class="study">
                                <span>武藏野美術大学</span><br>
                                造形学部<br>
                                基礎デザイン学科
                            </div>
                        </div>
                    </div>
                    <div class="content">
                        夢想 現實 一步之遙<br>
                        那麽這一步就是 CAplus<br>
                        在我更年輕一點的高中時代<br>
                        常因為把夢想理解的遙不可及而讓自己生活的非常消極<br>
                        直到我決定來到日本 邁向了新生活 邁向了走上實踐的道路<br>
                        如果夢想只是停留在想 那麽永遠都是個夢<br>
                        現在的我非常感謝當年自己的付出 在往返三小時的電車上補覺 在大家都回<br>
                        家休息的時候我選擇去畫室 在大家都質疑我的時候堅持了下來<br>
                        我所遇見的 我將毫無保留的分享<br>
                        有著同樣夢想的我們成為了 CAplus 有著不同經歷的我們成為了不同的絢爛 。
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-10 col-lg-offset-1 tab-content item-3">
        <div class="part-1 col-lg-12 ca-block">
            <p class="title">日本各大美術大學學部年日程</p>
            <p class="content">我們将为每一位真心想来日本完成艺术梦想的孩子提供最专业的日本美术大学的个性化进学指导课程。号称“东京五美”的武藏野美术大学、多摩美術大学、女子美術大学、東京造形大学、日本大学芸術学部，远至京都方面的美术院校都有 CAplus 的成员。丰富的成员资源也为我们提供个性化培训提供了强有力的基础。我们没有后台也没有分红合作的机构，只是一群在日本学美术的年轻人聚集在一起，如果你要来留学，请先来CAplus工作室瞧瞧。</p>
        </div>
        <div class="part-2 col-lg-12 ca-block">
            <div class="col-lg-7">
                <img class="pic-1" src="<?=$urls[0];?>" alt="">
            </div>
            <div class="col-lg-12">
                <img class="pic-2" src="<?=$urls[1];?>" alt="">
            </div>
            <div class="col-lg-10">
                <img class="pic-3" src="<?=$urls[2];?>" alt="">
                <p class="annotation">＊  此表格為 2015 年數據，實際情況請參考官方網站</p>
            </div>
        </div>
        <div class="part-3 col-lg-12 ca-block">
            <p class="title">CA+ 工作室美術進學班日程表</p>
            <div class="course">
                <p class="name">春 季 課 程</p>
                <img src="<?=$urls[3];?>" alt="">
                <p class="annotation">＊  美術用語：由前新宿美術學院講師來教大家美術日語<br>藝術概論：和學生一起分享設計經驗和設計思維</p>
            </div>
            <div class="course">
                <p class="name">夏 季 特 別 課 程</p>
                <img src="<?=$urls[4];?>" alt="">
                <p class="annotation">＊  夏季特別課程：根據情況各種日本美術大學生來給大家帶來日本美大第一體驗</p>
            </div>
            <div class="course">
                <p class="name">考 試 季 課 程</p>
                <img src="<?=$urls[5];?>" alt="">
                <p class="annotation">＊  僅為參考，具體詳情請聯繫我們</p>
            </div>
        </div>
    </div>
    <div class="col-lg-12 tab-content item-4 ca-block">
        <div class="part-1 col-lg-12 ca-block">
            <div class="col-lg-10 col-lg-offset-1">
                <p class="title">ok 先來找我們玩呀!<br>一日無料體驗課 </p>
                <p class="content">我們将为每一位真心想来日本完成艺术梦想的孩子提供最专业的日本美术大学的个性化进学指导课程。号称“东京五美”的武藏野美术大学、多摩美術大学、女子美術大学、東京造形大学、日本大学芸術学部，远至京都方面的美术院校都有CAplus的成员。丰富的成员资源也为我们提供个性化培训提供了强有力的基础。我们没有后台也没有分红合作的机构，只是一群在日本学美术的年轻人聚集在一起如果你要来留学，请先来CAplus工作室瞧瞧。</p>
            </div>
        </div>
        <div class="part-2 col-lg-12 ca-block">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="input-group">
                    <input type="text" class="email_name" name="email_name" placeholder="名字">
                </div>
                <div class="input-group">
                    <input type="text" class="email_phone" name="email_phone" placeholder="聯係電話">
                </div>
                <div class="input-group">
                    <input type="text" class="email_address" name="email_address" placeholder="郵件地址">
                </div>
                <div class="input-group">
                    <textarea class="email_content" name="email_content" id="" cols="30" rows="10" placeholder="親愛的 CAplus 團隊："></textarea>
                </div>
                <div class="input-group">
                    <button onclick="email()" class="btn-email">送信</button>
                </div>
                <div class="contact-info ca-block">
                    <p>電話我們：M O N A : 080-3710-6088</p>
                    <p>私信我們：微博/微信 CA-plus</p>
                    <p>
                        <span class="icon-weibo"></span>
                        <span class="icon-wechat"></span>
                    </p>
                </div>
            </div>
        </div>
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

    function email(){
        var name = jQuery("input[name='email_name']").val();
        var phone = jQuery("input[name='email_phone']").val();
        var address = jQuery("input[name='email_address']").val();
        var content = jQuery("textarea[name='email_content']").val();
        createApi('<?=EMAIL_ACT?>', {
                eName: name,
                ePhone: phone,
                eAddress: address,
                eContent: content
            }, function (result) {
            result = JSON.parse(result);
            if (result.code == 200){
                console.log(result);
                alert("發送成功");
            }
            else
                alert("發送失敗");
        });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAGdAkMEbjRwy8wNOKYv3qa7Lvuv9sIhKI&callback=initMap" async defer></script>
