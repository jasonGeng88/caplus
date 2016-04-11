<?php
/**
 * The template for displaying search forms in Inkness
 *
 * @package Inkness
 */
?>
<form role="search" method="get" class="row search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="search-form">
	<label>
		<span class="screen-reader-text"><?php _ex( 'Search for:', 'label', 'inkness' ); ?></span>
		<input type="text" class="search-field" placeholder="<?php echo esc_attr_x( 'Search...', 'placeholder', 'inkness' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
	</label>
	<button type="button" onclick="javascript:search_close();" class="btn btn-default search-submit"><i class="fa fa-times"> </i></button>
	<button type="submit" class="btn btn-default search-submit"><i class="fa fa-times"> </i></button>
	</div>
</form>
<script>
	jQuery("#top-search form label input").keypress(function(e) {
		// 回车键事件
		if(e.which == 13) {
			jQuery(".search-submit").click();
		}
	});
</script>