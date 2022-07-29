<?php
add_action( 'wp_enqueue_scripts', 'laruzparvaz' );
function laruzparvaz() {
	wp_enqueue_style( 'Bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), '4.0.0' );
	wp_enqueue_style( 'BootstrapRTL', get_template_directory_uri() . '/css/bootstrap-rtl.min.css', array(), '4.0.0' );
	wp_enqueue_style( 'FontAwesome', get_template_directory_uri() . '/css/font-awesome.css', array(), '4.0.0' );
// 	wp_enqueue_style( 'FontAwesomeNew', get_template_directory_uri() . '/css/fontawesome.css', array(), '4.0.0' );
	wp_enqueue_style( 'SuperSlides', get_template_directory_uri() . '/css/superslides.css', array(), '4.0.0' );
	wp_enqueue_style( 'Animate', get_template_directory_uri() . '/css/animate.css', array(), '4.0.0' );
	wp_enqueue_style( 'Select2', get_template_directory_uri() . '/css/select2.css', array(), '4.0.0' );
	wp_enqueue_style( 'UI', get_template_directory_uri() . '/css/smoothness/jquery-ui-1.10.0.custom.css', array(), '4.0.0' );
	wp_enqueue_style( 'FancyBox', get_template_directory_uri() . '/css/jquery.fancybox.min.css', array(), '5.0.0' );
	wp_enqueue_style( 'Style', get_template_directory_uri() . '/style.css', array(), '4.0.0' );
// 	wp_enqueue_style( 'Style1', get_template_directory_uri() . '/css/style1.css', array(), '4.0.0' );
	  
	// Scripts
	wp_enqueue_script( 'Jquery', get_template_directory_uri() . '/js/jquery.js', array( 'jquery' ), '1.4.1', true );
	wp_enqueue_script( 'UIjs', get_template_directory_uri() . '/js/jquery-ui.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'Migratejs', get_template_directory_uri() . '/js/jquery-migrate-1.2.1.min.js', array( 'jquery' ), '2.3.2', true );
	wp_enqueue_script( 'Easingjs', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array( 'jquery' ), '1.4.1', true );
	wp_enqueue_script( 'SuperFishjs', get_template_directory_uri() . '/js/superfish.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'Select2js', get_template_directory_uri() . '/js/select2.js', array( 'jquery' ), '2.3.2', true );
	wp_enqueue_script( 'SuperSlidesjs', get_template_directory_uri() . '/js/jquery.superslides.js', array( 'jquery' ), '1.4.1', true );
	wp_enqueue_script( 'Parallaxjs', get_template_directory_uri() . '/js/jquery.parallax-1.1.3.resize.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'SmoothScrolljs', get_template_directory_uri() . '/js/SmoothScroll.js', array( 'jquery' ), '2.3.2', true );
	wp_enqueue_script( 'Appearjs', get_template_directory_uri() . '/js/jquery.appear.js', array( 'jquery' ), '1.4.1', true );
	wp_enqueue_script( 'Caroufredseljs', get_template_directory_uri() . '/js/jquery.caroufredsel.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'TouchSwipejs', get_template_directory_uri() . '/js/jquery.touchSwipe.min.js', array( 'jquery' ), '2.3.2', true );
	wp_enqueue_script( 'Totopjs', get_template_directory_uri() . '/js/jquery.ui.totop.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'FancyBoxjs', get_template_directory_uri() . '/js/jquery.fancybox.min.js', array( 'jquery' ), '2.3.2', true );
	wp_enqueue_script( 'Scriptjs', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '2.3.2', true );
	wp_enqueue_script( 'Bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '2.3.2', true );
}

//second DB
function seconddb()
{
	global $seconddb;
	$seconddb = new wpdb('baharir2_User', 'bahar360!', 'baharir2_DB', 'localhost');
}
add_action('init', 'seconddb');



//menu
add_theme_support('menus');
add_action( 'init', 'theme_setup' );
function theme_setup() {
	register_nav_menus(
		array(
			'header' => __( 'منوی اصلی'),
			'top-lan' => __( 'منوی بالایی'),
			'top-login' => __( 'منو برای عضویت'),
			)
	);
}

//widget
if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name' => 'sidebar',
		'id'   => 'leftside',
		'description'   => 'shahcode widget sidebar',
		'before_widget' => '<div class="widgetbox"><div class="contentarea">',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
		'after_widget'  => '</div></div>'
	));
}





// Register Custom Post Type
function custom_post_type() {

	$labels = array(
		'name'                  => _x( 'اسلایدر', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'اسلایدر', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'اسلایدر', 'text_domain' ),
		'name_admin_bar'        => __( 'اسلایدر', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'اسلایدر', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'slider', $args );
	
	
	
	
	
	
	
	
	
	
	
	
	$labels = array(
		'name'                  => _x( 'تورها', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'تورها', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'تورها', 'text_domain' ),
		'name_admin_bar'        => __( 'تورها', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'تورها', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'tours', $args );
	
	
	
	
	
	
	$labels = array(
		'name'                  => _x( 'اخبار', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'اخبار', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'اخبار', 'text_domain' ),
		'name_admin_bar'        => __( 'اخبار', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'اخبار', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'news', $args );

}
add_action( 'init', 'custom_post_type', 0 );









//thumbnail
if ( function_exists( 'add_theme_support' ) )
	add_theme_support( 'post-thumbnails' );

if ( function_exists( 'add_image_size' ) ){
	// add_image_size( 'imgindex', 340, 310, true );
	add_image_size( 'imgsingle', 850, 500, true );
	add_image_size( 'archive', 450, 230, true );
	add_image_size( 'tours', 1000, 590, true );
	add_image_size( 'news', 180, 180, true );
	add_image_size( 'slider', 2114, 490, true );
}

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name' => 'footer column 1',
		'id'   => 'footercolumn1',
		'description'   => 'footer column 1',
		'before_widget' => '<div class="widgetfooter">',
		'before_title'  => '<div class="bot1_title">',
		'after_title'   => '</div><div class="widfootcontent">',
		'after_widget'  => '</div></div>'
	));

	register_sidebar(array(
		'name' => 'footer column 2',
		'id'   => 'footercolumn2',
		'description'   => 'footer column 2',
		'before_widget' => '<div class="widgetfooter">',
		'before_title'  => '<div class="bot1_title">',
		'after_title'   => '</div><div class="widfootcontent">',
		'after_widget'  => '</div></div>'
	));

	register_sidebar(array(
		'name' => 'footer column 3',
		'id'   => 'footercolumn3',
		'description'   => 'footer column 3',
		'before_widget' => '<div class="widgetfooter">',
		'before_title'  => '<div class="bot1_title">',
		'after_title'   => '</div><div class="widfootcontent">',
		'after_widget'  => '</div></div>'
	));

	register_sidebar(array(
		'name' => 'footer column 4',
		'id'   => 'footercolumn4',
		'description'   => 'footer column 4',
		'before_widget' => '<div class="widgetfooter">',
		'before_title'  => '<div class="bot1_title">',
		'after_title'   => '</div><div class="widfootcontent">',
		'after_widget'  => '</div></div>'
	));

	register_sidebar(array(
		'name' => 'footer copyright',
		'id'   => 'footercopyright',
		'description'   => 'footer copyright',
		'before_widget' => '<div class="col-xs-12 copyrightfooter"><div class="row">',
		'before_title'  => '<div class="col-xs-12 col-sm-6 textcopyright">',
		'after_title'   => '</div>',
		'after_widget'  => '</div></div>'
	));

}




// function patoghwp_change_number($num)
 
// {
//   $eng = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
//   $per = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
//   return str_replace($eng, $per, $num);
 
// }



if (!session_id()) {
    session_start();
}




if(isset($_POST['insert'])){
       
    // echo 'function';
       
    // $amount = $_REQUEST['price'] ? $_REQUEST['price'] : "1000";
    // header("Location: http://bahar360.ir/payment/")
       
    // require_once "nusoap/nusoap.php";
    // ini_set("soap.wsdl_cache_enabled", "0");
    
    
    // $PIN = '07YH1ul3621hdrbfU5M2';
    // $wsdl_url = "https://pec.shaparak.ir/NewIPGServices/Sale/SaleService.asmx?WSDL";
    // $site_call_back_url = "http://bahar360.ir/confirm";
    
    // $amount = $_POST['price'] ? $_POST['price'] : "1000";
    // // $order_id = $_POST['OrderId'] ? $_POST['OrderId'] : "500";
    // $order_id = $now = time().mt_rand(1234,9876);
    
    
    // $params = array(
    // 	"LoginAccount" => $PIN,
    // 	"Amount" => $amount,
    // 	"OrderId" => $order_id,
    // 	"CallBackUrl" => $site_call_back_url
    // );
    
    // $client = new SoapClient($wsdl_url);
    // // print_r($client);
    
    // try {
    // 	$result = $client->SalePaymentRequest(array(
    // 		"requestData" => $params
    // 	));
    // 	if ($result->SalePaymentRequestResult->Token && $result->SalePaymentRequestResult->Status === 0) {
    // 		header("Location: https://pec.shaparak.ir/NewIPG/?Token=" . $result->SalePaymentRequestResult->Token); /* Redirect browser */
    // 	    exit();
    // 	} elseif ($result->SalePaymentRequestResult->Status  != '0') {
    // 		$err_msg = "(<strong> کد خطا : " . $result->SalePaymentRequestResult->Status . "</strong>) " .
    // 			$result->SalePaymentRequestResult->Message;
    // 	}
    	
    // } catch (Exception $ex) {
    // 	$err_msg =  $ex->getMessage();
    // }


    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

    // global $wpdb;
    // include_once( 'jdf.php' );
    // $date = date("Y-m-d H:i:s");
    // $array = explode(' ', $date);
    // list($year, $month, $day) = explode("-", $array[0]);
    // list($hour, $minute, $second) = explode(':', $array[1]);
    // $timestamp = mktime($hour, $minute, $second, $month, $day, $year);
    // $jalali_date = tr_num(jdate("Y/m/d H:i:s", $timestamp));
    // $rand = (jdate('Ymd', '', '', '', 'en') . rand(10000, 99999));
    // $vcr_Peygiri_ID = rand(1000000000, 9999999999);
    // $txt_Json = $_POST['json'];
    // $vcr_Name_Bank = $_POST['Name_Bank'];
    // $mon_Price = $_POST['Price'];
    // 	if($wpdb->insert( 
    //     'tbBuyInfo', 
    //         array( 
    //             'vcr_Peygiri_ID'     => $vcr_Peygiri_ID,
    //             'txt_Json'    =>    $txt_Json,
    //             'vcr_Name_Bank' => $vcr_Name_Bank,
    //             'int_Buy' => 0,
    //             'mon_Price'   => $mon_Price,
    //             'vcr_date_buy'  => $date,
    //             'int_mirbostani_status'  => 0
    //         )
    //     ) == false) wp_die('Daatbase Insertion Failed');
    //     else echo 'Database Insertion Successful';
    	
    //     // $wpdb->insert(
    //     //     'tbtest',
    //     //     array(
    //     //         'name' => 'safa'
    //     //     ),
    //     //     array(
    //     //         '%s'
    //     //     )
    //     // );
    
    
}
