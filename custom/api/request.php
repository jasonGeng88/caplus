<?php
/**
 * Created by PhpStorm.
 * User: jason-geng
 * Date: 4/3/16
 * Time: 23:17
 */
require_once(__DIR__.'/../config/global.php');
require_once(__DIR__.'/../function/article.php');
require_once(__DIR__.'/../function/post.php');

call_user_func($_REQUEST['func']);

if ($_REQUEST['func'] == 'recentPostAct') {
//    get_recent_article_for_remember($_REQUEST['cat_id'], $_REQUEST['offset'], $_REQUEST['page']);
}
elseif ($_REQUEST['func'] == 'articleAct') {
    get_recent_article_for_tag($_REQUEST['cat_id'], $_REQUEST['offset'], $_REQUEST['page']);
}
elseif ($_REQUEST['func'] == 'questionAct') {
    getAll($_REQUEST['cat_id'], "question", false, $_REQUEST['offset']);
}
elseif ($_REQUEST['func'] == 'searchAct') {
    queryPosts([
        's'=>$_REQUEST['search'],
        'category__in' => [EXHIBITION, ARTICLE]
    ]);
}
elseif ($_REQUEST['func'] == 'emailAct') {
    emailAct();
}

/**
 * 根据分类ID获取最近的文章
 * @param $category
 * @param int $offset
 * @param int $num
 */
function recentPostAct(){
    $catId = $_REQUEST['cat_id'];
    $offset = isset($_REQUEST['offset']) ? $_REQUEST['offset'] : 0;
    $num = isset($_REQUEST['num']) ? $_REQUEST['num'] : 0;
    $args = array(
        'numberposts' => $num,
        'offset' => $offset,
        'category' => $catId,
        'orderby' => 'post_date',
        'order' => 'DESC',
        'post_type' => 'post',
        'post_status' => 'publish',
        'suppress_filters' => true
    );
    $recent_posts = wp_get_recent_posts($args);
    success($recent_posts);
}

/**
 * 获取文章分类下的二级分类及最近文章
 */
function articleRecentPostAct(){
    $res = [];
    $cats = get_term_children(ARTICLE, 'category');
    foreach ($cats as $item) {
        $data = [];
        $args = array(
            'numberposts' => 6,
            'category' => $item,
            'orderby' => 'post_date',
            'order' => 'DESC',
            'post_type' => 'post',
            'post_status' => 'publish',
            'suppress_filters' => true
        );
        $data['data'] = wp_get_recent_posts($args);
        if (!empty($data['data'])) {
            $data['name'] = get_cat_name($item);
            foreach ($data['data'] as &$d) {
                $d['_create_time'] = get_post_meta($d['ID'], '_create_time_value', true);
                $d['thumbnail'] = get_the_post_thumbnail($d['ID']);
            }
            $res[] = $data;
        }
    }
    success($res);
}

function emailAct(){
    $name = $_REQUEST['eName'];
    $phone = $_REQUEST['ePhone'];
    $address = $_REQUEST['eAddress'];
    $content = $_REQUEST['eContent'];
    $str = "名字:$name\n聯係電話:$phone\n地址:$address\n內容:$content";
    $res = wp_mail(EMAIL_ADDRESS, "website反饋", $str);
    if ($res)
        success($res);
    error($res);
}

function success($data){
    echo json_encode([
        'code' =>200,
        'data' => $data
    ]);die;
}

function error($data){
    echo json_encode([
        'code' =>400,
        'data' => $data
    ]);die;
}