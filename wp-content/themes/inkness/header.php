<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Inkness
 */
require_once(APP_ROOT.'/custom/config/global.php');
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
<link rel="stylesheet" href="../../../custom/css/ca-main.css">
<!--custom-main.js-->
<script src="../custom/js/ca-main.js"></script>
<script>
	var api = '<?=APP_URL ?>/?page_id=146';
</script>

</head>

<body <?php body_class(); ?>>
<!--<div id="parallax-bg"></div>-->
<div id="page" class="hfeed site">
	<?php do_action( 'inkness_before' ); ?>
	<!--pc header-->
	<div id="header-top" class="ca-pc">
		<header id="masthead" class="site-header row container" role="banner">
			<div class="site-branding col-md-1 col-xs-12">

				<?php if((of_get_option('logo', true) != "") && (of_get_option('logo', true) != 1) ) { ?>

				<h1 class="site-title logo-container"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<?php
				echo "<img class='main_logo' src='".of_get_option('logo', true)."' title='".esc_attr(get_bloginfo( 'name','display' ) )."'></a></h1>";	
				}
			else { ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1> 
			<?php	
			}
			?>
			</div>
			<div class="default-nav-wrapper col-md-7 col-md-offset-1 col-xs-12">
				<nav id="site-navigation" class="main-navigation col-md-12" role="navigation">
					<div id="nav-container">
						<h1 class="menu-toggle"></h1>
						<div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'inkness' ); ?>"><?php _e( 'Skip to content', 'inkness' ); ?></a></div>

						<?php wp_nav_menu( array( 'theme_location' => 'primary') ); ?>
					</div>
				</nav><!-- #site-navigation -->
			</div>

			<div id="top-search" class="col-md-3 col-xs-12 ca-pc">
				<a href="javascript:search();" class="thumbnail-search">
					<img src="/custom/images/search.png" alt="">
				</a>
				<?php get_search_form(); ?>
			</div>

		</header><!-- #masthead -->
	</div>
	<!--pc header end-->

	<!--mobile header-->
	<div id="header-top" class="ca-mobile">
		<header id="masthead" class="ca-mobile col-xs-12" role="banner">
			<div class="site-branding col-xs-12">

				<?php if((of_get_option('logo', true) != "") && (of_get_option('logo', true) != 1) ) { ?>

				<div class="menu-logo col-xs-2">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<?php
						echo "<img src='".of_get_option('logo', true)."' title='".esc_attr(get_bloginfo( 'name','display' ) )."'>";
						}
						?>
					</a>
				</div>
				<div class="col-xs-8 menu-content"></div>
				<div class="col-xs-2 menu-btn">
					<a onclick="javascript:openMaskMenu();">
						<span class="icon-menu"></span>
					</a>
				</div>
		</header><!-- #masthead -->
	</div>
	<!--mobile header end-->

	<!--		search mobile-->
	<div id="header-search" class="mobile-search ca-mobile">
		<a onclick="javascript:openMaskSearch();">
			<span class="icon-search"></span>
		</a>
	</div>

	<?php
	if ( (function_exists( 'of_get_option' )) && (of_get_option('slidetitle5',true) !=1) ) {
	if ( ( of_get_option('slider_enabled') != 0 ) && (is_home())  )  
		{ ?>
	<div class="slider-wrapper theme-default"> 
    	<div class="ribbon"></div>    
    		<div id="slider" class="nivoSlider">
    			<?php
		  		$slider_flag = false;
		  		for ($i=1;$i<6;$i++) {
		  			$caption = ((of_get_option('slidetitle'.$i, true)=="")?"":"#caption_".$i);
					if ( of_get_option('slide'.$i, true) != "" ) {
						echo "<a href='".esc_url(of_get_option('slideurl'.$i, true))."'><img src='".of_get_option('slide'.$i, true)."' title='".$caption."'></a>"; 
						$slider_flag = true;
					}
				}
				?>  
    		</div><!--#slider-->
    		<?php for ($i=1;$i<6;$i++) {
    				$caption = ((of_get_option('slidetitle'.$i, true)=="")?"":"#caption_".$i);
    				if ($caption != "")
    				{
	    				echo "<div id='caption_".$i."' class='nivo-html-caption'><div class='nivocapper'>";
	    				echo "<a href='".esc_url(of_get_option('slideurl'.$i, true))."'><div class='slide-title'>".of_get_option('slidetitle'.$i, true)."</div></a>";
	    				echo "<div class='slide-description'>".of_get_option('slidedesc'.$i, true)."</div>";
	    				echo "</div></div>";
    				}
    			}	
    	    
			?>
    </div>	
	<?php 
			}
		}
		?>
		<div id="content" class="site-content row clearfix clear">
		<div class="container col-md-12">

<script>
	function initMenu(){
		var num = jQuery("ul#menu-menu-1 li").length;
		var i = 12/num;
		jQuery("ul#menu-menu-1 li").addClass("col-md-"+i);
	}
	initMenu();
</script>
