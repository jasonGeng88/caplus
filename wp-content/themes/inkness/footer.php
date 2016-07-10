<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Inkness
 */
?>
	</div>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer row ca-pc" role="contentinfo">
		<div class="ca-container container">
			<div class="footer-menu">
				<?php
				wp_nav_menu( [
					'menu' => 'menu2', // Do not fall back to first non-empty menu.
				]);
				?>
			</div>
			<div class="site-info col-md-12">
				<p class="co-name">旅日青年设计师创造</p>
				<p class="co-date">© 2015 CAplus</p>
			</div>
		</div>
	</footer><!-- #colophon -->

	<footer id="colophon" class="site-footer row ca-mobile" role="contentinfo">
		<div class="ca-container container">
			<div class="co-name col-xs-12">旅日青年设计师创造</div>
			<div class="co-date col-xs-12">© 2015 CAplus</div>
		</div>
	</footer><!-- #colophon -->
	
</div><!-- #page -->

<!--mask mobile-->
<div class="col-xs-12 ca-mask ca-block">
	<div class="col-xs-12 m-header ca-block">
		<div class="col-xs-6 m-logo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<img src="<?=APP_URL;?>/custom/images/logo-white.png" alt="">
			</a>
		</div>
		<div class="col-xs-6 m-close">
			<a onclick="javascript:closeMask()">
				<span class="icon-close"></span>
			</a>
		</div>
	</div>

	<div class="m-menu-contain">
		<div class="col-xs-12 m-primary-menu ca-block">
			<?php wp_nav_menu( array( 'theme_location' => 'primary') ); ?>
		</div>
		<div class="col-xs-12 m-footer-menu ca-block">
			<?php wp_nav_menu( array( 'menu' => 'menu2') ); ?>
		</div>
		<div class="col-xs-12 m-language">
			CHINESE
		</div>
	</div>

	<div class="m-search-contain">
		<div id="top-search" class="ca-mobile">
			<?php get_search_form(); ?>
		</div>
	</div>
</div>

<?php		
	if ( (function_exists( 'of_get_option' ) && (of_get_option('footercode1', true) != 1) ) ) {
			 	echo of_get_option('footercode1', true); } ?>
<?php wp_footer(); ?>
</body>
</html>