<?php
/**
 * @package Inkness
 */
$categoryId = wp_get_post_categories(get_post()->ID);
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

    default:
        # code...
        $tmp = '';
        break;
}
?>
