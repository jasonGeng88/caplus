<?php
/**
 * @package Inkness
 */

$GLOBALS['ca-index']++;
$categoryId = wp_get_post_categories(get_post()->ID);
if ($GLOBALS['ca-index'] == 1) {
    switch ($categoryId[0]) {
        case UNIVERSITY:
            include_once(APP_ROOT.'/custom/template/university.php');
            break;

        case COURSE:
            include_once(APP_ROOT.'/custom/template/course.php');
            break;

        case SCHOOLMATE:
            include_once(APP_ROOT.'/custom/template/schoolmate.php');
            break;
        case HUNDRED_ID:
            include_once(APP_ROOT.'/custom/template/schoolmate.php');
            break;
        case OFFLINE_INTRO_ID:
            include_once(APP_ROOT.'/custom/template/offline.php');
            break;

        default:
            include_once(APP_ROOT.'/custom/template/normal-post.php');
            break;
    }
}

?>
