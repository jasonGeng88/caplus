<?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define('WP_USE_THEMES', true);

define('APP_ROOT', __DIR__);

$GLOBALS['ca-index'] = 0;

if (php_uname('n') == 'cc-m.local') {
    define('APP_URL', 'http://www.localca.com');
}else{
    define('APP_URL', 'http://45.63.121.127');
}

require( APP_ROOT . '/custom/config/global.php' );

/** Loads the WordPress Environment and Template */
require( dirname( __FILE__ ) . '/wp-blog-header.php' );
