<?php
/**
 * The template for displaying search forms in Inkness
 *
 * @package Inkness
 */
?>
<div class="row search-form form">
	<div class="search-form">
	<label>
		<span class="screen-reader-text"><?php _ex( 'Search for:', 'label', 'inkness' ); ?></span>
		<input type="text" class="search-field" placeholder="<?php echo esc_attr_x( 'Search...', 'placeholder', 'inkness' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
	</label>
	<button type="button" onclick="javascript:search_close();" class="btn btn-default"><i class="fa fa-times"> </i></button>
</div>
<div class="search-result">
</div>
<script>
	jQuery("#top-search .form label input").keyup(function(e) {
		// 回车键事件
//		if(e.which == 13) {
			console.log(1);
			var s = jQuery("input[name='s']").val();
			search_posts(s);
			console.log(2);
//		}
	});
</script>