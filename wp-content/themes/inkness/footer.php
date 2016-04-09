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

	<footer id="colophon" class="site-footer row" role="contentinfo">
	<div class="ca-container container">
		<div class="footer-menu">
			<?php
			wp_nav_menu( [
				'menu' => 'menu2', // Do not fall back to first non-empty menu.
			]);
			?>
		</div>
<!--	--><?php //if ( of_get_option('credit1', true) == 0 ) { ?>
<!--		<div class="site-info col-md-4">-->
<!--			--><?php //do_action( 'inkness_credits' ); ?>
<!--			--><?php //printf( __( 'Inkness Theme by %1$s.', 'inkness' ), '<a href="http://inkhive.com/product/inkness" rel="designer">InkHive</a>' ); ?>
<!--		</div><!-- .site-info -->
<!--	--><?php //} ?><!--	-->
<!--		<div id="footertext" class="col-md-7">-->
<!--        	--><?php
//			if ( (function_exists( 'of_get_option' ) && (of_get_option('footertext2', true) != 1) ) ) {
//			 	echo of_get_option('footertext2', true); } ?>
<!--        </div>-->
		<div class="site-info col-md-12">
			<p class="co-name">日本藝術留學生創造</p>
			<p class="co-date">© 2015 CAplus</p>
		</div>
	</div>   
	</footer><!-- #colophon -->
	
</div><!-- #page -->

<?php		
	if ( (function_exists( 'of_get_option' ) && (of_get_option('footercode1', true) != 1) ) ) {
			 	echo of_get_option('footercode1', true); } ?>
<?php wp_footer(); ?>
</body>
</html>