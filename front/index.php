<?php get_header(); ?>

<body class="bg">
	<div class="overlay"></div>
	<!-- logain page -->
	<div class="login">
		<div class="container">
			<div class="row">
				<div class="col col-sm-10 offset-sm-1 col-lg-5 m-auto">
					<div class="login-form">
						<form id="login-form" method="post" action="<?php echo get_permalink( get_page_by_title( 'menus' ) )?>">
							<div class="form-header text-md-center d-md-flex d-block justify-content-between">
								<div class="logo">
									<a href="<?php echo home_url()?>"> <img src="<?php echo get_template_directory_uri() ?>/img/logo.png" alt="logo"></a>
								</div>
								<div class="contact-info">
									<h3>contact us: <br>+44(0)20 567 766 776 </h3>
								</div>
							</div>
                           
							<div class="divider"></div>
							<div class="form-content">
                                <?php if(isset($_GET['logstatus'])):
                              if($_GET['logstatus']=='faield'):
                              echo '<h1 style="color:red">Invalied Email or Password </h1>';
                              endif;
                              endif;
    
                                ?>
    
    
								<div>
									<label class="d-block">Email Address</label>
									<input type="text" class="d-block w-100 custon-input" id="uemail" name="umail" required>
								</div>
								
								<div class="space"></div>
								
								<div>
									<label class="d-block">password</label>
									<input type="password" class="d-block w-100 custon-input" id="upass" name="upass" required>
								</div>
								
								<div class="space"></div>
                             
								<div class="d-block d-sm-flex justify-content-between">
									<div class="remeber">
										<input type="checkbox" id="remember-me" name="remember-me">
										<label for="remember-me" class="pointer position-relative">remember me</label>
									</div>
									<div>
                                        
                                        <input type="submit" class="login-btn" value="Login" >
									
                                    </div>
								</div>
								
								<div class="space"></div>
								
								<div class="forget-pas">
									<h3> <a href="<?php echo wp_lostpassword_url()?>">Lost your Password?</a> </h3>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>



<?php get_footer(); ?>
