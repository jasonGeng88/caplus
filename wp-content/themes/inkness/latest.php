<?php
/*
Template Name: Latest
*/

get_header();

//slider
include_once(APP_ROOT.'/custom/template/slider.php');

//Japan design
include_once(APP_ROOT.'/custom/template/latest-japan.php');

//Tokyo exhibition
include_once(APP_ROOT.'/custom/template/latest-tokyo.php');

?>









<?php get_footer(); ?>
