<?php


  if(is_page('resetpassword') && isset($_GET['key']) && isset($_GET['login']))
    {
    
        if($_GET['key'] == null || $_GET['login'] == null )
        {
            wp_redirect(home_url()); exit;
        }
        else 
        {
            $key=$_GET['key']; $login=$_GET['login'];
            $user = check_password_reset_key($key,$login );
            if(is_wp_error($user))
            {
                 $url= add_query_arg( array(
    'key' => 'invalied',
), get_permalink( get_page_by_title( 'lostpassword' ) ) );
            
    wp_redirect($url); exit;
            }
            else {
                session_start();
                $_SESSION['usertoreset'] = $user;
                
               wp_redirect(get_permalink(get_page_by_title('resetpassword'))); exit;
            }
                
        }
    }




if(is_page('resetpassword'))
{
    session_start();
    if(!isset($_SESSION['usertoreset']) && (!isset($_GET['key']) || !isset($_GET['login'])) )
    {
    wp_redirect(home_url());exit;
    }
}

if(is_page('resetpassword') && isset($_SESSION['usertoreset']) && isset($_POST['password']) && isset($_POST['confirm_password']) && $_POST['password'] != null && $_POST['confirm_password'] != null )
                        
{
   $user = $_SESSION['usertoreset'];
  $pass = $_POST['password'];
    $cpass= $_POST['confirm_password'];
    if(strlen (str_replace(' ', '', $pass))>5 && $pass == $cpass){
        
        $userid = $user->ID;
       
        wp_set_password( $pass, $userid );
        
        unset($_SESSION['usertoreset']);
        
         $url=add_query_arg("logstatus","pr",home_url());
          wp_redirect($url); exit;
        
    }
    
     $url=add_query_arg("status","faield",get_permalink(get_page_by_title('resetpassword')));
    
wp_redirect($url); exit;
                    
                        
}
                        
                      



if((is_page('lostpassword')|| is_page('resetpassword')) && is_user_logged_in())
{
       wp_redirect(get_permalink( get_page_by_title( 'Menus' ) )); exit;
}
 if(isset($_POST['user_login']) && $_POST['user_login'] != null && ! is_user_logged_in() &&email_exists($_POST['user_login']) && is_page('lostpassword')){
       header( "refresh:15;url=".home_url() );
 
 }

if(is_404())
{
    
    header( "refresh:10;url=".home_url() );
}

if ( isset($_GET['stat']))
{
    if($_GET['stat']=='logout')
    {
         wp_logout();
    }
}
if(!is_home() && !is_user_logged_in() && !is_page('lostpassword') && !is_page('resetpassword') ) {
    
    if(!( isset($_POST['umail']) && isset($_POST['upass']) ))
       {
    wp_redirect(home_url());
    exit;
       }
       else{
           $umail = $_POST['umail'];
           $upass = $_POST['upass'];
           $uremer = $_POST['remember-me'];
            $creds = array(
        'user_login'    =>  $umail,
        'user_password' => $upass,
        'remember'      => $uremer
    );
           
             $user = wp_signon( $creds, false );
           
           if ( is_wp_error( $user ) ) 
           {
                 
              $url=add_query_arg("logstatus","faield",home_url());
                wp_redirect($url);
                         exit;
               
              
           }
           else{
                wp_redirect(get_permalink( get_page_by_title( 'Menus' ) )); exit; 
           }
           
           
              }
       
}
else if(is_home() && is_user_logged_in())
{
  wp_redirect(get_permalink( get_page_by_title( 'Menus' ) ));   
}
?>

<!DOCKTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Vestey food</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- Meta For Mobile -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<?php wp_head(); ?>
      
       
	</head>
