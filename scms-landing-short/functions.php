<?php
/**
 * Twenty Seventeen functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function schoocms_setup() {

	load_theme_textdomain( 'twentyseventeen' );
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'banner'	, 1560, 585, true );
	add_image_size( 'medium-thumbnail'	, 300, 300, true );
	add_image_size( 'large-thumbnail'	, 768, 768, true );
  	add_image_size( 'landscape', 1024, 768,true ); 
  	add_image_size( 'portrait', 768, 1024,true ); 

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'top'    => 'Top Links',
		'main'    => 'Main Menu',
		'footer' => 'Useful Links',
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

}
add_action( 'after_setup_theme', 'schoocms_setup' );



function my_image_sizes($sizes) {
        $addsizes = array(
                "medium-thumbnail" => __( "Medium Square"),
                "large-thumbnail" => __( "Large Square"),
                "landscape" => __( "Landscape"),
                "portrait" => __( "Portrait")
                );
        $newsizes = array_merge($sizes, $addsizes);
        return $newsizes;
}
add_filter('image_size_names_choose', 'my_image_sizes');

function schoocms_widgets_init() {
	register_sidebar( array(
		'name'          => 'News Sidebar',
		'id'            => 'news-sidebar',
		'description'   => 'Add widgets here to appear in your news sidebar.',
		'before_widget' => '<div class="sidebarSec">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="its">',
		'after_title'   => '</div>',
	) );
}
add_action( 'widgets_init', 'schoocms_widgets_init' );
	
	
	
/**
 * Enqueue scripts and styles.
 */
function twentyseventeen_scripts() {
	wp_enqueue_style( 'main-font', 'https://use.typekit.net/rov4kkj.css' );	
	wp_enqueue_style( 'lato-font', 'https://fonts.google.com/specimen/Lato?selection.family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i' );
	wp_enqueue_style( 'Trirong-font', 'https://fonts.googleapis.com/css?family=Trirong:300,300i,400,500' );	
	
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css' , array(), '4.3.1' );
	wp_enqueue_style( 'owl-style', get_template_directory_uri() . '/css/owl.carousel.min.css' );
	wp_enqueue_style( 'fancybox-style', get_template_directory_uri() . '/css/jquery.fancybox.min.css' );
	wp_enqueue_style( 'fontawesome', 'https://use.fontawesome.com/releases/v5.7.1/css/all.css');
	wp_enqueue_style( 'sc-style', get_stylesheet_uri() );
	
	wp_enqueue_script( 'cookie', get_template_directory_uri() . '/js/jquery.cookie.js', array(), '', true );
	wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', array(), '1.12.4', true );
	wp_enqueue_script( 'cycle2', get_template_directory_uri() . '/js/jquery.cycle2.min.js', array('jquery'), '2.1.6', true );
	wp_enqueue_script( 'imagesloaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array('jquery'), '4.1.1', true );
	wp_enqueue_script( 'owl', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '2.2.1', true );
	wp_enqueue_script( 'masonry', get_template_directory_uri() . '/js/masonry.pkgd.min.js', array(), '4.2.2' );	
	wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/js/jquery.fancybox.min.js', array('jquery'), '3', true );	
	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1', true );
}
add_action( 'wp_enqueue_scripts', 'twentyseventeen_scripts' );



// FIX FOR MANUAL IMAGE CROP PLUGIN
add_action('admin_head', 'azrPluginFix');
function azrPluginFix() {
  echo '<style>
	.mic-left-col {
	  width:400px !important;
	} 
	.mic-editor-wrapper .nav-tab-wrapper {
		margin-bottom:20px !important;
	}
  </style>';
}



 
// Change title for login screen
add_filter('login_headertitle', create_function(false,"return 'SchooCMS by Innermedia';"));
 
// change url for login screen
add_filter('login_headerurl', create_function(false,"return home_url();"));

// disable default dashboard widgets
function remove_dashboard_widgets() {

	global $wp_meta_boxes;

	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);

	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
}
add_action('wp_dashboard_setup', 'remove_dashboard_widgets');




// **************************************
// remove page formats options
// **************************************
add_action('after_setup_theme', 'remove_post_formats', 11);
function remove_post_formats() {
    remove_theme_support('post-formats');
}




// **************************************
// remove comments
// **************************************
function remove_comments(){
  remove_post_type_support( 'page', 'comments' );
  remove_post_type_support( 'post', 'comments' ); 
}
add_action('init', 'remove_comments');


// **************************************
// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 14;
}
// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
    return 40;
}
function html5_footer_length($length)
{
    return 20;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function html5_blank_view_article($more)
{
    global $post;
    return '... ';
}
add_filter('excerpt_more', 'html5_blank_view_article'); 
/*add sub_menu functionality to wp_nav_menu*/




// TinyMCE styles...
// Callback function to insert 'styleselect' into the $buttons array
function my_mce_buttons_2( $buttons ) {
	array_unshift( $buttons, 'styleselect' );
	return $buttons;
}
// Register our callback to the appropriate filter
add_filter('mce_buttons_2', 'my_mce_buttons_2');


// Callback function to filter the MCE settings
function my_mce_before_init_insert_formats( $init_array ) {  
	// Define the style_formats array
	$style_formats = array(  
		// Each array child is a format with it's own settings				
		array(  
			'title' => 'Button Link',  
			'block' => 'span',  
			'classes' => 'linkbutton',
			'wrapper' => true
		),
		array(  
			'title' => 'Quick Link',  
			'block' => 'span',  
			'classes' => 'quicklink',
			'wrapper' => true
		)
	); 
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );  
	
	return $init_array;  
  
} 

// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );  




if( function_exists('acf_add_options_page') ) {
 
	$option_page = acf_add_options_page(array(
		'page_title' 	=> 'General Settings',
		'menu_title' 	=> 'General Settings',
		'menu_slug' 	=> 'general-settings',
		'capability' 	=> 'edit_posts',
		'redirect' 	=> false
	));
	

 
}



//Run front page check for polylang for acf fields

class ACF_Page_Type_Polylang {

    // Whether we hooked page_on_front
    private $filtered = false;

    public function __construct() {

        add_filter( 'acf/location/rule_match/page_type', array( $this, 'hook_page_on_front' ) );
    }

    public function hook_page_on_front( $match ) {

        if ( ! $this->filtered ) {
            add_filter( 'option_page_on_front', array( $this, 'translate_page_on_front' ) );
            // Prevent second hooking
            $this->filtered = true;
        }

        return $match;
    }

    public function translate_page_on_front( $value ) {

        if ( function_exists( 'pll_get_post' ) ) {
            $value = pll_get_post( $value );
        }

        return $value;
    }
}

new ACF_Page_Type_Polylang();



function cycle_start( $atts ) {
	return '<div class="cycle-slideshow" data-cycle-pager=".tb-pager" data-cycle-log="false" data-cycle-fx="fadeout" data-cycle-timeout="6000" data-cycle-slides=">.slide"><div class="slide">';
}
add_shortcode( 'cycle-start', 'cycle_start' );

function cycle_slide( $atts ) {
	return '</div><div class="slide">';
}
add_shortcode( 'cycle-slide', 'cycle_slide' );

function cycle_end( $atts ) {
	return '</div><div class="tb-pager"></div>';
}
add_shortcode( 'cycle-end', 'cycle_end' );





function boxed_items_start( $atts ) {
	return '<div class="boxed-items"><div class="boxed-item">';
}
add_shortcode( 'boxed-items-start', 'boxed_items_start' );

function boxed_item( $atts ) {
	return '</div><div class="boxed-item">';
}
add_shortcode( 'boxed-item', 'boxed_item' );

function boxed_items_end( $atts ) {
	return '</div></div>';
}
add_shortcode( 'boxed-items-end', 'boxed_items_end' );


/*
remove_filter('the_content', 'wpautop');
add_filter('the_content', 'wpautop', 12);
*/

function tel_shortcode_link($atts , $content = null){
	$a = shortcode_atts( array(
		'no' => '',
	), $atts );

	$tel = $a['no'];
	return '<span class="linkbutton telephoneLink"><a href="tel:'.$tel.'"><span class="cont">'.$content.'</span><span class="number">'.$tel.'</span></a></span>';
}
add_shortcode('tel' ,'tel_shortcode_link');

function wpforms_custom_capability( $cap ) {
 
    // unfiltered_html by default means Editors and up.
    // See more about WordPress roles and capabilities
    // https://codex.wordpress.org/Roles_and_Capabilities
    return 'unfiltered_html';
}
add_filter( 'wpforms_manage_cap', 'wpforms_custom_capability' );
