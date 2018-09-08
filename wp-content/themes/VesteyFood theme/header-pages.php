
	<!-- Start The Navbar-->
<body class="body-bg">
	<nav class="navbar navbar-expand-lg custom-nav">
		<div class="container">
			<a class="navbar-brand" href="<?php echo get_permalink( get_page_by_title( 'Menus' ) ) ?>"><img src="<?php echo get_template_directory_uri() ?>/img/logo.png" width="140px" height="50px"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mynav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"><i class="mdi mdi-menu"></i></span>
			</button>

			<div class="collapse navbar-collapse" id="mynav">
                <?php 
                if ( is_page_template( 'kcal1300.php' ) || is_page_template( 'kcal3600.php' )  )
                {
          
                    get_template_part('kcal');
                }
                ?>
                
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a class="nav-link" href="<?php echo get_permalink( get_page_by_title( 'About' ) )?>">About <span class="sr-only">(current)</span></a>
						<span class="border-bottom d-none d-lg-inline-block"></span>
					</li>
					<li class="nav-item">
						<a class="nav-link text-uppercase" href="<?php echo get_permalink( get_page_by_title( 'FAQ' ) )?>">faq</a>
						<span class="border-bottom d-none d-lg-inline-block"></span>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo get_permalink( get_page_by_title( 'ContactUs' ) )?>">contact us</a>
						<span class="border-bottom d-none d-lg-inline-block"></span>
					</li>
                        <?php 
        if ( is_user_logged_in() ):
            $current_user = wp_get_current_user();

    
            ?>
           
                    
                    <?php $width= strlen($current_user->display_name);
                           $width=($width)*8.9;
                    $width+=103;
                           $width = ($width < 160)? 160:$width;
                
                    ?>
                    
					<li class="nav-item user" style="width:<?php echo $width ?> ">
                    
        
      
						<a href="#"> <img src="<?php  echo get_avatar_url( $current_user->user_email, 32 ) ?>" width="35" height="35" alt="usre-info"> </a>
						<span id="user-name"><?php echo $current_user->display_name?></span>
						<span class="log-out"> <a href="<?php echo home_url()?>?stat=logout"> log out </a></span>
						
				
						
                        <?php endif;?>
					</li>
				</ul>
			</div>
		</div>
	</nav>
  <div class="space-30"></div>
	<!--  End  The Navbar-->
