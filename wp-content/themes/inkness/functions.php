<?php
/**
 * Inkness functions and definitions
 *
 * @package Inkness
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

/**
 * Initialize Options Panel
 */
if ( !function_exists( 'optionsframework_init' ) ) {
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
	require_once dirname( __FILE__ ) . '/inc/options-framework.php';
}

if ( ! function_exists( 'inkness_setup' ) ) :

function inkness_setup() {

	load_theme_textdomain( 'inkness', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_image_size('homepage-banner',750,450,true);

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'inkness' ),
	) );

	add_theme_support( 'custom-background', apply_filters( 'inkness_custom_background_args', array(
		'default-color' => 'f7f7f7',
		'default-image' => '',
	) ) );
	
	add_editor_style();
}
endif; // inkness_setup
add_action( 'after_setup_theme', 'inkness_setup' );

function inkness_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'inkness' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Left', 'inkness' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Center', 'inkness' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Right', 'inkness' ),
		'id'            => 'sidebar-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'inkness_widgets_init' );

add_action('optionsframework_custom_scripts', 'inkness_custom_scripts');

function inkness_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function() {

	jQuery('#example_showhidden').click(function() {
  		jQuery('#section-example_text_hidden').fadeToggle(400);
	});
	
	if (jQuery('#example_showhidden:checked').val() !== undefined) {
		jQuery('#section-example_text_hidden').show();
	}
	
});
</script>
 
<?php
}

function inkness_scripts() {
//	wp_enqueue_style( 'inkness-fonts', '//fonts.googleapis.com/css?family=Open+Sans:300,400,700,600' );
	wp_enqueue_style( 'inkness-basic-style', get_stylesheet_uri() );
	if ( (function_exists( 'of_get_option' )) && (of_get_option('sidebar-layout', true) != 1) ) {
		if (of_get_option('sidebar-layout', true) ==  'right') {
			wp_enqueue_style( 'inkness-layout', get_template_directory_uri()."/css/layouts/content-sidebar.css" );
		}
		else {
			wp_enqueue_style( 'inkness-layout', get_template_directory_uri()."/css/layouts/sidebar-content.css" );
		}	
	}
	else {
		wp_enqueue_style( 'inkness-layout', get_template_directory_uri()."/css/layouts/content-sidebar.css" );
	}
			
	wp_enqueue_style( 'inkness-bootstrap-style', get_template_directory_uri()."/css/bootstrap/bootstrap.min.css", array('inkness-layout') );
		
	wp_enqueue_style( 'inkness-main-style', get_template_directory_uri()."/css/skins/main.css", array('inkness-layout','inkness-bootstrap-style') );
	
	wp_enqueue_script( 'inkness-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'inkness-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	if ( (function_exists( 'of_get_option' )) && (of_get_option('slider_enabled') != 0) ) {
		wp_enqueue_style( 'inkness-nivo-slider-default-theme', get_template_directory_uri()."/css/nivo/slider/themes/default/default.css" );
	
		wp_enqueue_style( 'inkness-nivo-slider-style', get_template_directory_uri()."/css/nivo/slider/nivo.css" );
	}	
	
	if ( (function_exists( 'of_get_option' )) && (of_get_option('slider_enabled') != 0) ) {
		wp_enqueue_script( 'inkness-nivo-slider', get_template_directory_uri() . '/js/nivo.slider.js', array('jquery') );
	}
	wp_enqueue_script( 'inkness-superfish', get_template_directory_uri() . '/js/superfish.js', array('jquery','hoverIntent') );	
	
	wp_enqueue_script( 'inkness-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery') );	
	
	wp_enqueue_script( 'inkness-custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery') );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'inkness-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'inkness_scripts' );
function inkness_custom_head_codes() {
 if ( (function_exists( 'of_get_option' )) && (of_get_option('style2', true) != 1) ) {
	echo "<style>".of_get_option('style2', true)."</style>";
 }
 if ( (function_exists( 'of_get_option' )) && (of_get_option('slider_enabled') != 0) ) {
	echo "<script>jQuery(window).load(function() { jQuery('#slider').nivoSlider({effect:'fade', pauseTime: 4500}); });</script>";
 }
}	
add_action('wp_head', 'inkness_custom_head_codes');

function inkness_nav_menu_args( $args = '' )
{
    $args['container'] = false;
    return $args;
} // function
add_filter( 'wp_page_menu_args', 'inkness_nav_menu_args' );

function inkness_pagination() {
	global $wp_query;
	$big = 12345678;
	$page_format = paginate_links( array(
	    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	    'format' => '?paged=%#%',
	    'current' => max( 1, get_query_var('paged') ),
	    'total' => $wp_query->max_num_pages,
	    'type'  => 'array'
	) );
	if( is_array($page_format) ) {
	            $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
	            echo '<div class="pagination"><div><ul>';
	            echo '<li><span>'. $paged . ' of ' . $wp_query->max_num_pages .'</span></li>';
	            foreach ( $page_format as $page ) {
	                    echo "<li>$page</li>";
	            }
	           echo '</ul></div></div>';
	 }
}

/**
 * Implement the Custom Header feature.
 */
// require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates. Import Widgets
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * 自定义字段
 */
$new_meta_boxes =
	array(
			"create_time" => array(
					"name" => "_create_time",
					"std" => "分类为文章时需填写",
					"title" => "创作时间:"),

			"author_name" => array(
					"name" => "_author_name",
					"std" => "CHEN PENG",
//					"std" => "分类为文章时需填写",
					"title" => "作者名称:"),

			"author_education" => array(
					"name" => "_author_education",
					"std" => "Science of Design Musashino Art University",
//					"std" => "分类为文章时需填写",
					"title" => "作者学历:"),
			"author_weibo" => array(
					"name" => "_author_weibo",
					"std" => "http://weibo.com",
//					"std" => "分类为文章时需填写",
					"title" => "作者微博:"),
			"author_facebook" => array(
					"name" => "_author_facebook",
					"std" => "http://facebook.com",
//					"std" => "分类为文章时需填写",
					"title" => "作者Facebook:"),
			"author_instagram" => array(
					"name" => "_author_instagram",
					"std" => "http://instagram.com",
//					"std" => "分类为文章时需填写",
					"title" => "作者Instagram:"),
	);

function new_meta_boxes() {
	global $post, $new_meta_boxes;
	foreach($new_meta_boxes as $meta_box) {
		$meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);
		if($meta_box_value == "")
			$meta_box_value = $meta_box['std'];
		// 自定义字段标题
		echo'<h4>'.$meta_box['title'].'</h4>';
		// 自定义字段输入框
		echo '<textarea cols="60" rows="3" name="'.$meta_box['name'].'_value">'.$meta_box_value.'</textarea><br />';
	}
	echo '<input type="hidden" name="ludou_metaboxes_nonce" id="ludou_metaboxes_nonce" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
}

function create_meta_box() {
	global $theme_name;
	if ( function_exists('add_meta_box') ) {
		add_meta_box( 'new-meta-boxes', '自定义模块', 'new_meta_boxes', 'post', 'normal', 'high' );
	}
}

function save_postdata( $post_id ) {
	global $new_meta_boxes;
	if ( !wp_verify_nonce( $_POST['ludou_metaboxes_nonce'], plugin_basename(__FILE__) ))
		return;
	if ( !current_user_can( 'edit_posts', $post_id ))
		return;
	foreach($new_meta_boxes as $meta_box) {
		$data = $_POST[$meta_box['name'].'_value'];
		if($data == "")
			delete_post_meta($post_id, $meta_box['name'].'_value', get_post_meta($post_id, $meta_box['name'].'_value', true));
		else
			update_post_meta($post_id, $meta_box['name'].'_value', $data);
	}
}

add_action('admin_menu', 'create_meta_box');
add_action('save_post', 'save_postdata');
