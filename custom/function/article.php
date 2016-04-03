<?php
/**
 * Created by PhpStorm.
 * User: jason-geng
 * Date: 3/28/16
 * Time: 01:01
 */

function get_recent_article_for_tag($category, $offset=0, $page=8)
{
    $args = array(
        'numberposts' => $page,
        'offset' => $offset,
        'category' => $category,//12
        'orderby' => 'post_date',
        'order' => 'DESC',
        'post_type' => 'post',
        'post_status' => 'publish',
        'suppress_filters' => true
    );
    $recent_posts = wp_get_recent_posts($args);
    $todayArr = $yesterdayArr = $weekArr = $longArr = [];
    $today = strtotime(date('Y-m-d 00:00:00'));
    $yesterday = strtotime(date('Y-m-d 00:00:00', time() - 86400));
    $week = strtotime(date('Y-m-d 00:00:00', time() - 86400 * 7));
    if (!empty($recent_posts)) {
        foreach ($recent_posts as $key => $item) {
            $thumbnail = get_the_post_thumbnail($item['ID']);
            $tags = get_the_tags($item['ID']);
            $time = strtotime($item['post_date']);
            if ($time >= $today) {
                $todayArr[$key]['thumbnail'] = $thumbnail;
                $todayArr[$key]['post_title'] = $item['post_title'];
                $todayArr[$key]['tags'] = $tags;
                $todayArr[$key]['url'] = $item['guid'];
            } else if ($time >= $yesterday) {
                $yesterdayArr[$key]['thumbnail'] = $thumbnail;
                $yesterdayArr[$key]['post_title'] = $item['post_title'];
                $yesterdayArr[$key]['tags'] = $tags;
                $yesterdayArr[$key]['url'] = $item['guid'];
            } else if ($time >= $week) {
                $weekArr[$key]['thumbnail'] = $thumbnail;
                $weekArr[$key]['post_title'] = $item['post_title'];
                $weekArr[$key]['tags'] = $tags;
                $weekArr[$key]['url'] = $item['guid'];
            } else {
                $longArr[$key]['thumbnail'] = $thumbnail;
                $longArr[$key]['post_title'] = $item['post_title'];
                $longArr[$key]['tags'] = $tags;
                $longArr[$key]['url'] = $item['guid'];
            }
        }
    }
    $html = '';
    if (!empty($todayArr)) {
        $tmp = joinHtmlForTag($todayArr, 'today');
        $html .= $tmp;
    }
    if (!empty($yesterdayArr)) {
        $tmp = joinHtmlForTag($yesterdayArr, 'yesterday');
        $html .= $tmp;
    }
    if (!empty($weekArr)) {
        $tmp = joinHtmlForTag($weekArr, 'in week ago');
        $html .= $tmp;
    }
    if (!empty($longArr)) {
        $tmp = joinHtmlForTag($longArr, 'one week ago');
        $html .= $tmp;
    }
    echo $html;
}

function joinHtmlForTag($dayArr, $dayDes){
    $html = '
            <div class="col-md-12 time-line">
                <div class="time-package">
                    <span class="line"></span>
                    <span class="time">'.$dayDes.'</span>
                    <span class="line"></span>
                </div>
            </div>
            <div class="col-md-10 col-md-offset-1 time-list">';
    foreach ($dayArr as $item) {
        $html .= '
             <div class="col-md-12 item">
                <div class="col-md-8 item-content">
                <div class="item-thumbnail">'
            . $item['thumbnail'] .
            '</div>
                <div class="item-title">
            <a href="'.$item['url'].'">'
            . $item['post_title'] .
            '</a></div>
            </div>
            <div class="col-md-4 item-tag">';
        if (!empty($item['tags'])) {
            foreach ($item['tags'] as $v) {
                $html .= '<span>' . $v->name . '</span>';
            }
        }
        $html .= '</div></div>';
    }
    $html .= '</div>';
    return $html;
}


function get_recent_article_for_remember($category, $offset=0, $page=8){
    $args = array(
        'numberposts' => $page,
        'offset' => $offset,
        'category' => $category,//12
        'orderby' => 'post_date',
        'order' => 'DESC',
        'post_type' => 'post',
        'post_status' => 'publish',
        'suppress_filters' => true
    );
    $recent_posts = wp_get_recent_posts($args);
    if (!empty($recent_posts)) {
        foreach ($recent_posts as $key => &$item) {
            $item['thumbnail'] = get_the_post_thumbnail($item['ID']);
        }
    }
    $html = joinHtmlForRemember($recent_posts);
    echo $html;
}

function joinHtmlForRemember($recent_posts){
    $html = '';
    if (!empty($recent_posts)) {
        foreach ($recent_posts as $item) {
            $html .= '<li>';
            $html .= '<div class="pic">';
            $html .= $item['thumbnail'];
            $html .= '</div>';
            $html .= '<div class="title">';
            $html .= $item['post_title'];
            $html .= '</div>';
            $html .= '</li>';
        }
    }

    return $html;
}

