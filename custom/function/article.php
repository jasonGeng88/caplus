<?php
/**
 * Created by PhpStorm.
 * User: jason-geng
 * Date: 3/28/16
 * Time: 01:01
 */

function ca_get_recent_article($category)
{
    $args = array(
        'numberposts' => 10,
        'offset' => 0,
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
        $tmp = jointHtml($todayArr, 'today');
        $html .= $tmp;
    }
    if (!empty($yesterdayArr)) {
        $tmp = jointHtml($yesterdayArr, 'yesterday');
        $html .= $tmp;
    }
    if (!empty($weekArr)) {
        $tmp = jointHtml($weekArr, 'in week ago');
        $html .= $tmp;
    }
    if (!empty($longArr)) {
        $tmp = jointHtml($longArr, 'one week ago');
        $html .= $tmp;
    }
    echo $html;
}

function jointHtml($dayArr, $dayDes){
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
