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

if ($_REQUEST['func'] == 'rememberAct') {
    get_recent_article_for_remember($_REQUEST['cat_id'], $_REQUEST['offset'], $_REQUEST['page']);
}
elseif ($_REQUEST['func'] == 'articleAct') {
    get_recent_article_for_tag($_REQUEST['cat_id'], $_REQUEST['offset'], $_REQUEST['page']);
}
elseif ($_REQUEST['func'] == 'questionAct') {
    getAll($_REQUEST['cat_id'], "question", false, $_REQUEST['offset']);
}
