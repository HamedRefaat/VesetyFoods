<?php /* Template Name:Reset password */ ?>
<?php get_header(); ?>

<body class="bg">
	<div class="overlay"></div>
	<!-- logain page -->
	<div class="login">
		<div class="container">
			<div class="row">
				<div class="col col-sm-10 offset-sm-1 col-lg-5 m-auto">
					<div class="login-form">
                   
                        <script type="text/javascript">
                            function countdown(){
                                
                               
    var timeleft = 15;
    var downloadTimer = setInterval(function(){
    timeleft--;
    document.getElementById("countdowntimer").textContent = 'You will be redirect to login page in '+timeleft+ ' Sec';
    if(timeleft <= 0)
        clearInterval(downloadTimer);
    },1000);}
</script>
                        
                        <?php
                        
                        ?>
                        <?php
                        $result="";
                        $dis="";
                         if(isset($_POST['user_login']) && $_POST['user_login'] != null && ! is_user_logged_in()){
                             $email = $_POST['user_login'];
                             if(email_exists($email)){
                                if(myretrieve_password($email))
                                    $result= 'Check Your Email, we send a link to reset your password </br> ';
                                    $dis='disabled';
                                 
                                     $color = 'black';
                                 
                                 
                                 
                             }
                             else {
                                  $result= 'Invalied Email, Please Contact Adminstrator @ '. get_option('admin_email');
                                     $color = 'Red';
                             }
                         }
                        
                        if(isset($_GET['key']) && $_GET['key'] == 'invalied' &&  !isset($_POST['user_login']))
                        {
                           $result = 'The Activation Key is not valied key or expired, So please type your email to get new key' ;
                             $color = 'Red';
                            
                        }
                        
                        
                        if(isset($_GET['sending']) && $_GET['sending'] != null)
                        
                        
                        
                        
                        ?>
						<form id="login-form rest" method="post">
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
                                 <div>
                                     <h1 style="color:<?php echo $color?>"> <?php echo $result?></h1>
                                      <?php 
                              if(isset($_POST['user_login']) && $_POST['user_login'] != null && ! is_user_logged_in()){
                             $email = $_POST['user_login'];
                             if(email_exists($email)){
                             echo '  <h1 id="countdowntimer"></h1><script type="text/javascript">',
                        
                                'countdown();',
                          '</script>'
                        ;}}
                                ?>
                            </div>
                       
								<div>
									<label class="d-block">Email Address</label>
									<input <?php echo $dis ?>  type="email" class="d-block w-100 custon-input" id="user_login" name="user_login" required>
								</div>
								
								<div class="space"></div>
								
				
							
                             
								<div class="d-block d-sm-flex justify-content-between">
								
									<div>
                                        
                                        <input <?php echo $dis ?>  id="sub" type="submit" class="login-btn" value="Get New Password" >
									
                                    </div>
								</div>
								
								
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>



<?php get_footer(); ?>
