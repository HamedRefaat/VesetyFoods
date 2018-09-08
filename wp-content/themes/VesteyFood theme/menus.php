



<?php /* Template Name:Menus */ ?>
<?php get_header(); ?>
<?php get_header('pages');?>


	<!--   Start The Menu  -->
	<div class="container">
		<div class="page-title">
			<h3>Choose menu</h3>
		</div>


		<div class="space-30"></div>

		<div class="menu">
			<div class="row">
				<div class="col-12 col-sm-6">
					<div class="img">
						<img src="<?php echo get_template_directory_uri() ?>/img/food1.jpg" alt="1300 Kcal" class="img-fluid">
						<a href="<?php echo get_permalink( get_page_by_title( 'kcal1300' ) )?>">1300 Kcal </a>
					</div>
				</div>
				<div class="col-12 col-sm-6">
					<div class="img">
						<img src="<?php echo get_template_directory_uri() ?>/img/food2.jpg" alt="3600 Kcal" class="img-fluid">
						<a href="<?php echo get_permalink( get_page_by_title( 'kcal3600' ) )?>">3600 Kcal </a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--    End  The Menu  -->

	

	<!-- Start The Copy right -->

	<div class="copy-right text-center">
		<p>© <?php echo date("Y"); ?> Vesty Foods Ltd. All Rights Reserved.<br> Powered by Raqamiyat.com</p>
	</div>
    <?php get_footer(); ?>
