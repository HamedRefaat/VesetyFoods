
<?php
	/**
	*Funtion to add the custom styles
	*Added by @Hamed
	*In 5, 02, 18
	**/
ini_set("include_path", '/home/om3rsw2z7zq3/php:' . ini_get("include_path") );
	function mon_styles() {
		wp_enqueue_style( 'bootstrap.min', get_template_directory_uri() . '/css/bootstrap.min.css' );
		wp_enqueue_style( 'materialdesignicons.min', get_template_directory_uri() . '/css/materialdesignicons.min.css' );
		wp_enqueue_style( 'reset', get_template_directory_uri() . '/css/reset.css' );
        wp_enqueue_style( 'mainstyle', get_template_directory_uri() . '/css/mainstyle.css' );
	

        //scss files
        
        wp_enqueue_style( '_kcal', get_template_directory_uri() . '/sass/_kcal.sass' );
		wp_enqueue_style( '_login', get_template_directory_uri() . '/sass/mainstyle.sass' );
		wp_enqueue_style( '_menu', get_template_directory_uri() . '/sass/materialdesignicons.min.sass' );
		wp_enqueue_style( '_nav', get_template_directory_uri() . '/sass/reset.css' );
        wp_enqueue_style( '_productdetails', get_template_directory_uri() . '/sass/reset.sass' );
        wp_enqueue_style( '_productdetails', get_template_directory_uri() . '/sass/reset.sass' );
		
	}

add_filter( 'manage_posts_columns', 'revealid_add_id_column');
add_action( 'manage_posts_custom_column', 'revealid_id_column_content', 1, 2 );




function revealid_add_id_column( $columns) {
    
   $columns['im'] = 'Image';
    $columns['mt'] = 'Meal Type';
    $columns['si'] = 'Size';
    $columns['pr']= 'Products';
   return $columns;
}

function revealid_id_column_content( $column, $id ) {
    if(get_post_type($id) == 'product'){
  if( 'si' == $column ) {
    echo get_field('size',$id)." g";
  }
  if( 'mt' == $column ){ 
    echo get_field('choose_meal_type',$id);
    }
    if('im' == $column)
    {
        
         echo   '<img src="'. get_the_post_thumbnail_url($id).'" alt="NO Image" height="42" width="42">';
    }
    }
    else {
        
         if( 'si' == $column ) {
            
$products = get_field('mealproducts', $id);
if($products)
{
 $echo_comma = false;   
    foreach($products as $p)
   {
        if($echo_comma){
            echo ',  ';
        }
   echo get_field('size',$p)." g";
        $echo_comma = true;
   } 
}
    
  }
if('pr'==$column &&(get_post_type($id) == '1300kcal_meals'|| get_post_type($id) == '3600kcal_meal' )){
    $productsids = array();
 $productsids= get_field('mealproducts',$id);
    if($productsids)
    {
        $pr= false;
        foreach($productsids as $pid){
            if($pr){
                echo ', ';
            }
            echo '<a href="'.get_edit_post_link($pid).'">'. get_the_title($pid) .'</a>';
            $pr = true;
        }
    }
    
    
    
}        
        
  if( 'mt' == $column ){ 
      $echo_comma1= false;
    $types= get_field('meal_type',$id);
       foreach($types as $p)
   {
        if($echo_comma1){
            echo ',  ';
        }
   echo $p;
        $echo_comma1 = true;
   } 
    
  }
        
    if('im' == $column)
    {
    echo   '<img src="'.the_post_thumbnail_url($id).'" alt="Smiley face" height="42" width="42">';
    }
        
    }
  
}
add_action('init', 'checkkey');
function checkkey(){
   
}

add_action('after_setup_theme', 'remove_admin_bar');

 
function remove_admin_bar() 
{

    if (!current_user_can('administrator') && !is_admin())
    {
        show_admin_bar(false);
    }
    
    if (!current_user_can('administrator') && is_admin()) 
    {
        wp_redirect(home_url());
        exit;

    }
    if($GLOBALS['pagenow'] === 'wp-login.php' && is_user_logged_in())
    {
          wp_redirect(home_url());
    }
    

    
    if($GLOBALS['pagenow'] === 'wp-login.php' && !is_user_logged_in())

    {
    
        if(!(isset($_GET['action'])) ){
      
          
    wp_redirect(home_url());
    exit;
        }
        else if($_GET['action']=='rp')  {
            $key=$_GET['key'];
            $login =$_GET['login'];
            
           $url= add_query_arg( array(
    'key' => $key,
    'login' => $login,
), get_permalink( get_page_by_title( 'resetpassword' ) ) );
            
        wp_redirect($url); exit;
        }
        //action=lostpassword&error=invalidkey
        else if($_GET['action']=='lostpassword')
        {
               $url= add_query_arg( array(
    'key' => 'invalied',
), get_permalink( get_page_by_title( 'lostpassword' ) ) );
            
    wp_redirect($url); exit;
        }
     
            

    }
    
    
    
   

    
}




add_action( 'wp_enqueue_scripts', 'mon_styles' );
	/**
	*Funtion to add the custom scripts
	*Added by @Hamed
	*In 5, 02, 18
    	**/


	function mon_scripts() {
        
        
        wp_enqueue_script( 'jquery-3.2.1.min', get_template_directory_uri() . '/js/jquery-3.2.1.min.js', array('jquery'), false, true );
		wp_enqueue_script( 'jquery.nicescroll.min', get_template_directory_uri() . '/js/jquery.nicescroll.min.js', array('jquery'), false, true );
       
        wp_enqueue_script( 'popper.min', get_template_directory_uri() . '/js/popper.min.js', array(), false, true);
		wp_enqueue_script( 'bootstrap.min', get_template_directory_uri() . '/js/bootstrap.min.js', array(), false, true );
		wp_enqueue_script( 'mainjs', get_template_directory_uri() . '/js/mainjs.js', array(), false, true );
		
	}

add_action( 'wp_enqueue_scripts', 'mon_scripts' );

function theme_prefix_setup() {
	
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 400,
		'flex-width' => true,
	) );

}
add_action( 'after_setup_theme', 'theme_prefix_setup' );


function remove_menus(){
  
    remove_menu_page( 'edit.php' );                   //Posts 
    remove_menu_page( 'edit-comments.php' );          //Comments
//    remove_menu_page( 'edit.php?post_type=page' );    //Pages
  //  remove_menu_page( 'themes.php' );                 //Appearance
    //remove_menu_page( 'plugins.php' );                //Plugin
    //remove_menu_page( 'tools.php' );                  //Tools
  
}
add_action( 'admin_menu', 'remove_menus' );

add_theme_support( 'post-thumbnails' ); 


function cptui_register_my_cpts() {

	/**
	 * Post Type: 1300kcal Meals.
	 */

	$labels = array(
		"name" => __( "1300kcal Meals", "" ),
		"singular_name" => __( "1300kcal", "" ),
	);

	$args = array(
		"label" => __( "1300kcal Meals", "" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "1300kcal_meals", "with_front" => true ),
		"query_var" => true,
		"menu_icon" => "http://localhost:8085/VestyFood/wp-content/uploads/2018/05/calories-2.png",
		"supports" => array( "title" ),
		"taxonomies" => array( "category" ),
	);

	register_post_type( "1300kcal_meals", $args );

	/**
	 * Post Type: 3600kcal Meals.
	 */

	$labels = array(
		"name" => __( "3600kcal Meals", "" ),
		"singular_name" => __( "3600kcal Meals", "" ),
	);

	$args = array(
		"label" => __( "3600kcal Meals", "" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "3600kcal_meal", "with_front" => true ),
		"query_var" => true,
		"menu_icon" => "http://localhost:8085/VestyFood/wp-content/uploads/2018/05/calories-2.png",
		"supports" => array( "title" ),
		"taxonomies" => array( "category" ),
	);

	register_post_type( "3600kcal_meal", $args );

	/**
	 * Post Type: Products.
	 */

	$labels = array(
		"name" => __( "Products", "" ),
		"singular_name" => __( "Product", "" ),
		"menu_name" => __( "Products", "" ),
		"all_items" => __( "All Products", "" ),
		"add_new" => __( "Add new", "" ),
		"add_new_item" => __( "Add New Product", "" ),
		"edit_item" => __( "Edit Product", "" ),
		"new_item" => __( "New Product", "" ),
		"view_item" => __( "View Product", "" ),
		"view_items" => __( "View Products", "" ),
		"search_items" => __( "Search Product", "" ),
		"not_found" => __( "No Product Found", "" ),
		"not_found_in_trash" => __( "Not Found in Trash", "" ),
		"featured_image" => __( "Featured Image for this product", "" ),
		"set_featured_image" => __( "Set Featured Image for this product", "" ),
		"remove_featured_image" => __( "Remove Featured Image for this product", "" ),
		"use_featured_image" => __( "Use Featured Image for this product", "" ),
		"archives" => __( "Products Archives", "" ),
		"insert_into_item" => __( "Insert int Product", "" ),
		"uploaded_to_this_item" => __( "Uploaded to this Product", "" ),
		"filter_items_list" => __( "Filter Product List", "" ),
		"items_list_navigation" => __( "Products List Navigation", "" ),
		"items_list" => __( "Products List", "" ),
		"attributes" => __( "Product Attributes", "" ),
	);

	$args = array(
		"label" => __( "Products", "" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "product", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 5,
		"menu_icon" =>  get_template_directory_uri(). "/img/p1.png",
		"supports" => array( "title", "thumbnail" ),
	);

	register_post_type( "product", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );

function removrole()
{
    if( get_role('mprm_manager') )
    {
      remove_role( 'mprm_manager' );

    }
    
    if( get_role('mprm_customer') )
    {
      remove_role( 'mprm_customer' );

    }
     if( get_role('editor') )
    {
      remove_role( 'editor' );

    }
     if( get_role('author') )
    {
      remove_role( 'author' );

    }
    
if( get_role('contributor') )
    {
      remove_role( 'contributor' );

    }

}
add_action('init','removrole');

/**
 * Handles sending password retrieval email to user.
 *
 * @uses $wpdb WordPress Database object
 * @param string $user_login User Login or Email
 * @return bool true on success false on error
 */


function myretrieve_password($user_login){
    global $wpdb, $wp_hasher;

    $user_login = sanitize_text_field($user_login);

    if ( empty( $user_login) ) {
        return false;
    } else if ( strpos( $user_login, '@' ) ) {
        $user_data = get_user_by( 'email', trim( $user_login ) );
        if ( empty( $user_data ) )
           return false;
    } else {
        $login = trim($user_login);
        $user_data = get_user_by('login', $login);
    }

    do_action('lostpassword_post');


    if ( !$user_data ) return false;

    // redefining user_login ensures we return the right case in the email
    $user_login = $user_data->user_login;
    $user_email = $user_data->user_email;

    do_action('retreive_password', $user_login);  // Misspelled and deprecated
    do_action('retrieve_password', $user_login);

    $allow = apply_filters('allow_password_reset', true, $user_data->ID);

    if ( ! $allow )
        return false;
    else if ( is_wp_error($allow) )
        return false;

    $key = wp_generate_password( 20, false );
    do_action( 'retrieve_password_key', $user_login, $key );

    if ( empty( $wp_hasher ) ) {
        require_once ABSPATH . 'wp-includes/class-phpass.php';
        $wp_hasher = new PasswordHash( 8, true );
    }
    $hashed = time() . ':' . $wp_hasher->HashPassword( $key );
    $wpdb->update( $wpdb->users, array( 'user_activation_key' => $hashed ), array( 'user_login' => $user_login ) );

    $message = __('Someone requested that the password be reset for the following account:') . "\r\n\r\n";
    $message .= network_home_url( '/' ) . "\r\n\r\n";
    $message .= sprintf(__('Username: %s'), $user_login) . "\r\n\r\n";
    $message .= __('If this was a mistake, just ignore this email and nothing will happen.') . "\r\n\r\n";
    $message .= __('To reset your password, visit the following address:') . "\r\n\r\n";
    $message .= '<' . network_site_url("wp-login.php?action=rp&key=$key&login=" . rawurlencode($user_login), 'login') . ">\r\n";

    if ( is_multisite() )
        $blogname = $GLOBALS['current_site']->site_name;
    else
        $blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);

    $title = sprintf( __('[%s] Password Reset'), $blogname );

    $title = apply_filters('retrieve_password_title', $title);
    $message = apply_filters('retrieve_password_message', $message, $key);

    if ( $message && !wp_mail($user_email, $title, $message) )
        wp_die( __('The e-mail could not be sent.') . "<br />\n" . __('Possible reason: your host may have disabled the mail() function...') );

    return true;
}
//check if role exist before removing it
