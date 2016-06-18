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
	<button type="button" onclick="javascript:search_close();" class="btn btn-default"><span class="icon-close"></span></button>
</div>
<div class="search-result">
</div>
<script>
	jQuery("#top-search .form label input").keyup(function(e) {
		// 回车键事件
//		if(e.which == 13) {
//			console.log(1);
			var s = jQuery("input[name='s']").val();
//			var url = api + '&func='+searchApi+'&search='+query;
			createApi('<?=SEARCH_ACT;?>', {search: s}, function (result) {
				result = JSON.parse(result);
				if (result.code == 200){
					console.log(result);
					var html = '';
					var data = result.data;
					jQuery(".search-result").html(html);
					if(data.length > 0 )
						jQuery(".search-result").css("display", "block");
					else
						jQuery(".search-result").css("display", "none");

					for(var x=0; x < data.length; x++){
						console.log(x);
						if(x >= 5)
							break;
						html += '<a href="'+data[x].guid+'"><p>'+ data[x].post_title + '</p></a>';
					}
					jQuery(".search-result").append(html);
					console.log(result);
				}
			});
//			search_posts(s);
//			console.log(2);
//		}
	});
</script>