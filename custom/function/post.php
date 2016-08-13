<?php
/**
 * Created by PhpStorm.
 * User: jason-geng
 * Date: 3/28/16
 * Time: 01:01
 */

function getAll($category, $type, $noPaging=true, $offset=1 )
{
    $posts = query_posts(array(
        'category__in' => array($category),
//        'showposts' => 2,
        'posts_per_page' => QUESTION_PAGE,
        'paged' => $offset,
        'nopaging' => $noPaging
    ));
    echo joinHtmlForList($posts, $type);
}

function queryPosts($query)
{
//    var_dump($query);die;
    $posts = query_posts($query);
    $arr = [];
    foreach ($posts as $key => $item) {
        if (strpos($item->post_title, $query['s']) != false) {
            $arr[$key] = $item->post_title;
        }
    }
    echo json_encode($posts);
}

/**
 * 根据category 获取交集信息
 * @param $catArr
 */
function getIntersect($catArr){
    $tmp = $postArr = $postCompare = [];
    foreach ($catArr as $item) {
        $tmp[] = query_posts(array('category__in' => array($item)));
    }
    foreach ($tmp as $item) {
        $compare = [];
        foreach ($item as $i) {
            $postArr[$i->ID] = $i;
            $compare[] = $i->ID;
        }
        $postCompare[] = $compare;
    }

    $postIds = $postCompare[0];
    if (!empty($postCompare)) {
        $len = count($postCompare);
        for ($i=1; $i < $len; $i++) {
            $postIds = array_intersect($postIds, $postCompare[$i]);
        }
    }

    $res = [];
    if (!empty($postIds)) {
        foreach ($postIds as $item) {
            $res[] = $postArr[$item];
        }
    }

    return $res;
}

function joinHtmlForList($posts, $type){
    $html = '';
    if ($type == "university") {
        foreach ($posts as $item) {
            $html .= '<li class="col-md-3 col-xs-6"><a href="'.$item->guid.'">';
            $html .= '<p class="item-name">'.$item->post_title.'</p>';
            $html .= '<p class="item-link"><span class="icon-more"></span></p>';
            $html .= '</a></li>';
        }
    }elseif($type == "question"){
        foreach ($posts as $item) {
            $html .= '<li class="col-md-6 col-xs-12"><a href="' . $item->guid . '">';
            $html .= '<p class="item-name">' . $item->post_title . '</p>';
            $html .= '<p class="item-link"><span class="icon-arrow-right"></span></p>';
            $html .= '</a></li>';
        }
    }elseif($type == "course"){
        foreach ($posts as $item) {
            $html .= '<li class="col-md-12"><a href="' . $item->guid . '">';
            $html .= '<p class="item-name">' . $item->post_title . '</p>';
            $html .= '<p class="item-link"><span class="icon-arrow-right"></span></p>';
            $html .= '</a></li>';
        }
    }

    return $html;
}


//mobile css is select option
function getAllBySelect($category, $type, $noPaging=true, $offset=1){
    $posts = query_posts(array(
        'category__in' => array($category),
//        'showposts' => 2,
        'posts_per_page' => QUESTION_PAGE,
        'paged' => $offset,
        'nopaging' => $noPaging
    ));
    echo joinHtmlForSelect($posts, $type);
}

function joinHtmlForSelect($posts, $type){
    $html = '';
    if ($type == "university") {
        $html .= '<select class="col-xs-10 mobile-select">';
        $html .= '<option value="0">選擇其他美術大学</option>';
        foreach ($posts as $item) {
            $html .= '<option value="'.$item->guid.'">'.$item->post_title.'</option>';
        }
        $html .= '</select>';
        $html .= '<div class="col-xs-2 mobile-select-arrow"><span class="icon-switch"></div>';
    }elseif($type == "question"){
        foreach ($posts as $item) {
            $html .= '<li class="col-md-6 col-xs-12"><a href="' . $item->guid . '">';
            $html .= '<p class="item-name">' . $item->post_title . '</p>';
            $html .= '<p class="item-link"><span class="icon-arrow-right"></span></p>';
            $html .= '</a></li>';
        }
    }elseif($type == "course"){
        $html .= '<select class="col-xs-10 mobile-select">';
        $html .= '<option value="0">選擇其他學科</option>';
        foreach ($posts as $item) {
            $html .= '<option value="'.$item->guid.'">'.$item->post_title.'</option>';
        }
        $html .= '</select>';
        $html .= '<div class="col-xs-2 mobile-select-arrow"><span class="icon-switch"></div>';
    }

    return $html;
}



