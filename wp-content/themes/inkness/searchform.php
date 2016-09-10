<?php
/**
 * The template for displaying search forms in Inkness
 *
 * @package Inkness
 */
?>
<div class="row search-form form ca-pc">
<!--	<div class="search-form">-->
<!--		<label class="col-md-10">-->
<!--			<span class="screen-reader-text">--><?php //_ex( 'Search for:', 'label', 'inkness' ); ?><!--</span>-->
<!--			<input type="text" class="search-field" placeholder="--><?php //echo esc_attr_x( '搜索...', 'placeholder', 'inkness' ); ?><!--" value="--><?php //echo esc_attr( get_search_query() ); ?><!--" name="s">-->
<!--		</label>-->
<!--		<button type="button" onclick="javascript:search_close();" class="btn btn-default col-md-2"><span class="icon-close"></span></button>-->
<!--	</div>-->
<!--	<div class="search-result"></div>-->
</div>

<div class="form ca-mobile">
	<div class="search-form">
		<label class="col-xs-12">
			<input type="text" class="search-field" placeholder="<?php echo esc_attr_x( '| 搜索...', 'placeholder', 'inkness' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
		</label>
	</div>
	<div class="search-result"></div>
</div>
<script>
//	mobile
	jQuery("#top-search.ca-mobile .ca-mobile label input").focus(function(e) {
		jQuery("#top-search.ca-mobile .ca-mobile input[name='s']").removeAttr('placeholder');
		var target = jQuery("#top-search.ca-mobile .ca-mobile input[name='s']");
	});

	jQuery("#top-search.ca-mobile .ca-mobile label input").focusout(function(e) {
		var s = jQuery("#top-search.ca-mobile .ca-mobile input[name='s']").val();
		if (s.trim() == '')
			jQuery("#top-search.ca-mobile .ca-mobile input[name='s']").attr('placeholder', '| 搜索...');
	});

	jQuery("#top-search.ca-mobile .ca-mobile label input").keyup(function(e) {
		var s = jQuery("#top-search.ca-mobile .ca-mobile input[name='s']").val();
		createApi('<?=SEARCH_ACT;?>', {search: s}, function (result) {
			result = JSON.parse(result);
			if (result.code == 200){
	//				console.log(result);
				var html = '';
				var data = result.data;
				jQuery("#top-search.ca-mobile .ca-mobile .search-result").html(html);
				if(data.length > 0 )
					jQuery("#top-search.ca-mobile .ca-mobile .search-result").css("display", "block");
				else
					jQuery("#top-search.ca-mobile .ca-mobile .search-result").css("display", "none");

				for(var x=0; x < data.length; x++){
					console.log(x);
					if(x >= 5)
						break;
					html += '<a href="'+data[x].guid+'"><p>'+ data[x].post_title + '</p></a>';
				}
				jQuery("#top-search.ca-mobile .ca-mobile .search-result").append(html);
	//				console.log(result);
			}
		});
	});

//pc
	jQuery("#top-search.ca-pc .search-container input").keyup(function(e) {
		var s = jQuery("#top-search.ca-pc .search-container input[name='q']").val();
		createApi('<?=SEARCH_ACT;?>', {search: s}, function (result) {
			result = JSON.parse(result);
			if (result.code == 200){
//				console.log(result);
				var html = '';
				var data = result.data;
				jQuery("#top-search.ca-pc .search-result").html(html);
				if(data.length > 0 ){
					jQuery("#top-search.ca-pc .search-result").css("display", "block");
				}
				else{
					jQuery("#top-search.ca-pc .search-result").css("display", "none");
				}

				for(var x=0; x < data.length; x++){
					console.log(x);
					if(x >= 5)
						break;
					html += '<a href="'+data[x].guid+'"><p>'+ data[x].post_title + '</p></a>';
				}
				jQuery("#top-search.ca-pc .search-result").append(html);
//				console.log(result);
			}
		});
	});
	jQuery("#top-search.ca-pc .search-container input[name='q']").blur(function () {
		window.timer = setTimeout(function () {
			jQuery("#top-search.ca-pc .search-result").css("display", "none");
			jQuery("#top-search.ca-pc .search-container input[name='q']").val("");
		}, 500);
	});
</script>