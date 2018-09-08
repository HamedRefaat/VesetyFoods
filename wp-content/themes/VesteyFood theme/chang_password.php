<?php /* Template Name: change pasword */ ?>
<?php get_header(); ?>

<body class="bg">
	<div class="overlay"></div>
	<!-- logain page -->
	<div class="login">
		<div class="container">
			<div class="row">
				<div class="col col-sm-10 offset-sm-1 col-lg-5 m-auto">
					<div class="login-form">
                   
        <script type="application/javascript">
            var mysubmit = function(){
                
                if (/\s/.test(document.getElementById('password').value)) {
     document.getElementById('message').innerHTML = 'Pasword must have no spaces';
                document.getElementById('message').style.color = 'red';    
}
                else if(document.getElementById('password').value.length <6)
                    {
                         document.getElementById('message').innerHTML = 'You must type at least 6 charachters password';
                document.getElementById('message').style.color = 'red';    
                    }
                
                else if (document.getElementById('password').value!='' && document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
                    document.theForm.submit();
                }
        
                else if(!document.getElementById('password').value.replace(/\s/g, '').length)
                    {
     document.getElementById('message').style.color = 'red';
      document.getElementById("confirm_password").style.border="1px solid red";
         document.getElementById("password").style.border="1px solid red";
    document.getElementById('message').innerHTML = 'Enter a valied password'; 
                    }
               
                
            }
            
            var makeblack= function(){
                 document.getElementById("password").style.border="1px solid black";
            }
            
            var check = function() {
                

  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
    document.getElementById("confirm_password").style.border="1px solid green";
      document.getElementById("password").style.border="1px solid green";
    
  } else {
    document.getElementById('message').style.color = 'red';
      document.getElementById("confirm_password").style.border="1px solid red";
    document.getElementById('message').innerHTML = 'not matching';
    
  }
}
            function hideform()
            {
                document.getElementById("mydiv").style.display="none";
            }
            
        </script>
                        <?php
                        $errormessage="";
                     if(isset($_GET['status']) && $_GET['status']=='faield' )
                         $errormessage = "Please make sure that password do not contains any spaces, and is 6 characters or more and password is matches the Confirm Password";
                        ?>
                        
                       
                       <div id='mydiv'>
						<form id="login-form rest" method="post" name="theForm" >
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
                                <?php echo $errormessage; ?>
                                <div>
									<label class="d-block">New Password</label>
									<input type="password" class="d-block w-100 custon-input" id="password" name="password" required onkeyup="makeblack();">
								</div>
                                <div>
                                    <div class="space"></div>
                                <label class="d-block">Confirm Password</label>
									<input type="password" class="d-block w-100 custon-input" id="confirm_password" name="confirm_password" onkeyup='check();' required>
                                     <span id='message'></span>
                                
                                </div>
								
								<div class="space"></div>
								
				
							
                             
								<div class="d-block d-sm-flex justify-content-between">
								
									<div>
                                        
                                        <input type="button" onclick="mysubmit();"  class="login-btn" value="Set New Password" >
									
                                    </div>
								</div>
								
								
							</div>
						</form>
                           </div>
					</div>
				</div>
			</div>
		</div>
	</div>



<?php get_footer(); ?>
