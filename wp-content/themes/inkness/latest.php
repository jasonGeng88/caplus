<?php
/*
Template Name: Latest
*/

get_header(); ?>

	<div id="primary" class="content-area col-md-12">
		<main id="main" class="site-main" role="main">

			<p>
				<?php echo of_get_option('slide1', true); ?>
			</p>

		</main><!-- #main -->
	</div><!-- #primary -->

<style>
	body {
		background: #eee;
		font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
		font-size: 14px;
		color:#000;
		margin: 0;
		padding: 0;
	}
	.swiper-container {
		width: 100%;
		height: 300px;
		margin: 20px auto;
	}
	.swiper-slide {
		text-align: center;
		font-size: 18px;
		background: #fff;

		/* Center slide text vertically */
		display: -webkit-box;
		display: -ms-flexbox;
		display: -webkit-flex;
		display: flex;
		-webkit-box-pack: center;
		-ms-flex-pack: center;
		-webkit-justify-content: center;
		justify-content: center;
		-webkit-box-align: center;
		-ms-flex-align: center;
		-webkit-align-items: center;
		align-items: center;
	}
</style>
<!-- Swiper -->
<div class="swiper-container">
	<div class="swiper-wrapper">
		<div class="swiper-slide">Slide 1</div>
		<div class="swiper-slide">Slide 2</div>
		<div class="swiper-slide">Slide 3</div>
		<div class="swiper-slide">Slide 4</div>
	</div>
	<!-- Add Pagination -->
	<div class="swiper-pagination"></div>
	<!-- Add Arrows -->
	<div class="swiper-button-next"></div>
	<div class="swiper-button-prev"></div>
</div>

<!-- Swiper JS -->
<script src="../dist/js/swiper.min.js"></script>

<!-- Initialize Swiper -->
<script>
	var appendNumber = 4;
	var prependNumber = 1;
	var swiper = new Swiper('.swiper-container', {
		pagination: '.swiper-pagination',
		nextButton: '.swiper-button-next',
		prevButton: '.swiper-button-prev',
		slidesPerView: 3,
		centeredSlides: true,
		paginationClickable: true,
		spaceBetween: 30,
	});
</script>


<?php get_footer(); ?>
