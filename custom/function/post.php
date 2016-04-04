<?php
/**
 * Created by PhpStorm.
 * User: jason-geng
 * Date: 3/28/16
 * Time: 01:01
 */

function getAll($category, $noPaging=true, $offset=1 )
{
    $posts = query_posts(array(
        'category__in' => array($category),
//        'showposts' => 2,
        'posts_per_page' => QUESTION_PAGE,
        'paged' => $offset,
        'nopaging' => $noPaging
    ));
    echo joinHtmlForList($posts);
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

function joinHtmlForList($posts){
    $html = '';
    foreach ($posts as $item) {
        $html .= '<li>';
        $html .= '<span class="item-name">'.$item->post_title.'</span>';
        $html .= '<span class="item-link"><a href="'.$item->guid.'"><i class="fa fa-caret-right"></i></a></span>';
        $html .= '</li>';
    }
    return $html;
}



