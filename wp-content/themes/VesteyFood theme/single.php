<?php /* Template Name: Product */ ?>
<?php get_header()?>
<?php get_header('pages')?>


<div class="product-details">
		<div class="container">
			<div class="back">
				<a href="<?php echo get_permalink( get_page_by_title( 'kcal1300' ) )?>"> <i class="mdi mdi-chevron-left"></i> Back </a>
			</div>
			<div class="space"></div>
			<div class="menu-title">
				<h3><?php the_title()?></h3>
			</div>

			<div class="space-50"></div>
			<div class="row">
				<div class="col-12">
					<div class="row">
						<div class="col-12 col-md-9">
							<div class="row">
								<div class="col-12">
									<div class="pannel">
										<div class="title">
											<h3>Product Name & Size</h3>
										</div>
										<div class="divider"></div>
										<div class="details">
											<p><?php  echo get_field('product_name',get_the_ID()).' '.get_field('size').' g'; ?></p>
										</div>
									</div>
								</div>


								<div class="col-12">
									<div class="pannel">
										<div class="title">
											<h3>Product Description</h3>
										</div>
										<div class="divider"></div>
										<div class="details">
                                            
											<p><?php echo get_field('description',get_the_ID())?></p>
										</div>
									</div>
								</div>

								<div class="col-12">
									<div class="pannel">
										<div class="title">
											<h3>Nutritional Declaration (per 100g)</h3>
										</div>
										<div class="divider"></div>
										<div class="details">

											<div class="row">

												<div class="col-12 col-sm-6 col-lg-2">
													<ul>
														<li>Energy</li>
														<li>Fat</li>
														<li>Carbohydrate</li>
													</ul>
												</div>

												<div class="col-12 col-sm-6 col-lg-4">
													<ul>
														<li><?php echo get_field('energy',get_the_ID())?></li>
														<li><?php echo get_field('fat',get_the_ID())?></li>
														<li><?php echo get_field('carbohydrate',get_the_ID())?></li>
													</ul>
												</div>


												<div class="col-12 col-sm-6 col-lg-2">
													<ul>
														<li>Protein</li>
														<li>Salt</li>
                                                        <?php 
                                        
                                              $vitamin = get_field('vitamin',get_the_ID());
                                                $vtrim = trim($vitamin);
                                              $fibre = get_field('fibre', get_the_ID());
                                                $ftrim = trim($fibre);
                                                $echo_vitamin = !(isset($vtrim) === true && $vtrim === '');
                                                $echo_fibre = !(isset($ftrim) === true && $ftrim === '');
    
    
                                                        
                                                        if($echo_fibre){
														echo '<li>Fibre</li>';
                                                        }
                                                
                                                 if($echo_vitamin){
														echo '<li>Vitamin</li>';
                                                        }
                                                
                                                            ?>
													</ul>
												</div>



												<div class="col-12 col-sm-6 col-lg-4">
													<ul>
                                                        <li><?php echo get_field('protein',get_the_ID())?></li>
												        <li><?php echo get_field('salt',get_the_ID())?></li>
												        <?php if($echo_fibre) echo '<li>'.get_field('fibre',get_the_ID()).'</li'?>
                                                         <?php if($echo_vitamin) echo '<li>'.get_field('vitamin',get_the_ID()).'</li'?>
													</ul>
												</div>
												<div class="space"></div>
												<div class="col-12">
													<h3><?php echo get_field('addition_info',get_the_ID())?></h3>
												</div>

											</div>

										</div>
									</div>
								</div>

								<div class="col-12">
									<div class="pannel">
										<div class="title">
											<h3>Product Ingredients </h3>
										</div>
										<div class="divider"></div>
										<div class="details">
											<p><?php get_field('ingredients', get_the_ID())?></p>
										</div>
									</div>
								</div>

							</div>
						</div>


						<div class="col-12 col-md-3">
							<div class="row">
								<div class="col-12">
									<div class="product-img">
                                        
<img src="<?php echo get_the_post_thumbnail_url()?>" alt="product-img" class="img-fluid">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


<?php
get_footer()
?>