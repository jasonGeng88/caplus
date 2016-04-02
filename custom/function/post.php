<?php
/**
 * Created by PhpStorm.
 * User: jason-geng
 * Date: 3/28/16
 * Time: 01:01
 */

function getAll($category)
{
    $posts = query_posts(array('category__in' => array($category)));
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
    $html = '<ul>';
    foreach ($posts as $item) {
        $html .= '<li>';
        $html .= '<span class="item-name">'.$item->post_title.'</span>';
        $html .= '<span class="item-link"><a href="'.$item->guid.'"><i class="fa fa-caret-right"></i></a></span>';
        $html .= '</li>';
    }
    $html .= '</ul>';
    return $html;
}



