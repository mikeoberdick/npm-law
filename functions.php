
<?php

// *** Theme Setup *** \\

function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

// Get the theme data
    $the_theme = wp_get_theme();
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );

// Shortcodes in text widgets
add_filter('widget_text', 'do_shortcode');


// *** Theme Styles *** \\
function d4tw_enqueue_styles () {
    wp_enqueue_style( 'Google Fonts', 'https://fonts.googleapis.com/css?family=Merriweather|Muli:400,600&display=swap' );
    wp_enqueue_style( 'Slick CSS', get_stylesheet_directory_uri() . '/slick/slick.css' );
    wp_enqueue_style( 'Slick Theme CSS', get_stylesheet_directory_uri() . '/slick/slick-theme.css' );
}
add_action('wp_enqueue_scripts', 'd4tw_enqueue_styles');


// *** Theme Scripts *** \\
function d4tw_enqueue_scripts () {
   wp_enqueue_script( 'D4TW Theme JS', get_stylesheet_directory_uri() . '/js/d4tw.js', array('jquery'), '1.0.0', true );
   wp_enqueue_script( 'Slick JS', get_stylesheet_directory_uri() . '/slick/slick.min.js', array('jquery'), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'd4tw_enqueue_scripts' );


// *** Advanced Custom Fields *** \\

//Add the ACF options page
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Company Profile',
		'menu_title'	=> 'Company Profile',
		'menu_slug' 	=> 'company-profile'
	));
    
}

// *** D4TW Custom Dashboard *** \\
function d4tw_add_dashboard_widget() {
	add_meta_box('wp_dashboard_widget_1', 'Theme Details', 'd4tw_theme_info', 'dashboard', 'side', 'high');
  //wp_add_dashboard_widget('wp_dashboard_widget', 'Theme Details', 'd4tw_theme_info');
}
add_action('wp_dashboard_setup', 'd4tw_add_dashboard_widget' );
 
function d4tw_theme_info() {
  echo "<ul>
  <li><strong>Developed By:</strong> Designs 4 The Web</li>
  <li><strong>Website:</strong> <a href='http://www.designs4theweb.com'>www.designs4theweb.com</a></li>
  <li><strong>Contact:</strong> <a href='mailto:mike@designs4theweb.com'>mike@designs4theweb.com</a></li>
  </ul>";
}

//Remove the tools menu option for editors
function d4tw_remove_menus(){
if ( current_user_can( 'editor' ) ) {
remove_menu_page( 'tools.php' );
	}
}
add_action( 'admin_menu', 'd4tw_remove_menus' );

//Remove widgets from dashboard
function d4tw_remove_dash_meta() {
        remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');//since 3.8
}
add_action( 'admin_init', 'd4tw_remove_dash_meta' );

//Filter the WordPress branding in the dashboard footer
function d4tw_filter_admin_footer () {
    echo '<span id="dashFooter">Website developed by <a style = "color: #ff0000; text-decoration: none;" href="http://www.designs4theweb.com" target="_blank">Designs 4 The Web</a></span>';
}
add_filter('admin_footer_text', 'd4tw_filter_admin_footer');

//Add custom logo to wp-login
function d4tw_custom_logo_css () {
    wp_enqueue_style('login-styles', get_stylesheet_directory_uri() . '/login/login_styles.css');
}
add_action('login_enqueue_scripts', 'd4tw_custom_logo_css');

//Change the wp-login logo url
function d4tw_login_url(){
    return get_bloginfo( 'wpurl' );
}
add_filter('login_headerurl', 'd4tw_login_url');

//Replace the WordPress dashboard logo
function d4tw_admin_css() {
	wp_enqueue_style('dashboard-styles', get_stylesheet_directory_uri() . '/dashboard/dashboard.css');
}

add_action('admin_head', 'd4tw_admin_css');

// *** User Tweaks & Permissions *** \\
// Hide the admin toolbar for non-admins
add_action('admin_init', 'd4tw_disable_admin_bar');

function d4tw_disable_admin_bar() {
    if ( !current_user_can ( 'administrator' ) ) {
        show_admin_bar(false);
    }
}


// *** Widgets *** \\
// Deregister Sidebars
function d4tw_remove_sidebars () {
	unregister_sidebar( 'statichero' );
	unregister_sidebar( 'hero' );
	unregister_sidebar( 'footerfull' );
	unregister_sidebar( 'left-sidebar' );

}

add_action( 'widgets_init', 'd4tw_remove_sidebars', 11 );

//News CPT
add_action( 'init', 'news_post_type', 0 );

function news_post_type() {
// Set UI labels
  $labels = array(
    'name'                => 'News',
    'singular_name'       => 'News',
    'menu_name'           => 'News',
    'parent_item_colon'   => 'Parent News',
    'all_items'           => 'All News',
    'view_item'           => 'View News',
    'add_new_item'        => 'Add New News',
    'add_new'             => 'Add News',
    'edit_item'           => 'Edit News',
    'update_item'         => 'Update News',
    'search_items'        => 'Search News',
    'not_found'           => 'No News Found',
    'not_found_in_trash'  => 'No News Found in Trash',
  );
  
// Set other options
  $args = array(
    'label'               => 'news',
    'description'         => 'news',
    'labels'              => $labels,
    // Features this CPT supports in Post Editor
    'supports'            => array( 'title', 'editor', 'author' ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 5,
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'page',
  );
  
//Register the CPT
  register_post_type( 'News', $args );
}

//Article CPT
add_action( 'init', 'article_post_type', 0 );

function article_post_type() {
// Set UI labels
  $labels = array(
    'name'                => 'Articles',
    'singular_name'       => 'Article',
    'menu_name'           => 'Articles',
    'parent_item_colon'   => 'Parent Article',
    'all_items'           => 'All Articles',
    'view_item'           => 'View Articles',
    'add_new_item'        => 'Add New Article',
    'add_new'             => 'Add Article',
    'edit_item'           => 'Edit Article',
    'update_item'         => 'Update Article',
    'search_items'        => 'Search Articles',
    'not_found'           => 'No Articles Found',
    'not_found_in_trash'  => 'No Articles Found in Trash',
  );
  
// Set other options
  $args = array(
    'label'               => 'articles',
    'description'         => 'articles',
    'labels'              => $labels,
    // Features this CPT supports in Post Editor
    'supports'            => array( 'title', 'editor', 'author' ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 5,
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'page',
  );
  
//Register the CPT
  register_post_type( 'Article', $args );
}

//Attorney CPT
add_action( 'init', 'attorney_post_type', 0 );

function attorney_post_type() {
// Set UI labels
  $labels = array(
    'name'                => 'Attorneys',
    'singular_name'       => 'Attorney',
    'menu_name'           => 'Attorneys',
    'parent_item_colon'   => 'Parent Attorneys',
    'all_items'           => 'All Attorneys',
    'view_item'           => 'View Attorney',
    'add_new_item'        => 'Add New Attorney',
    'add_new'             => 'Add Attorney',
    'edit_item'           => 'Edit Attorney',
    'update_item'         => 'Update Attorneys',
    'search_items'        => 'Search Attorneys',
    'not_found'           => 'No Attorneys Found',
    'not_found_in_trash'  => 'No Attorneys Found in Trash',
  );
  
// Set other options
  $args = array(
    'label'               => 'attorneys',
    'description'         => 'attorneys',
    'labels'              => $labels,
    // Features this CPT supports in Post Editor
    'supports'            => array( 'title', 'editor', 'author' ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 5,
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'page',
  );
  
//Register the CPT
  register_post_type( 'Attorney', $args );
}

//Paralegel CPT
add_action( 'init', 'paralegal_post_type', 0 );

function paralegal_post_type() {
// Set UI labels
  $labels = array(
    'name'                => 'Paralegals',
    'singular_name'       => 'Paralegal',
    'menu_name'           => 'Paralegals',
    'parent_item_colon'   => 'Parent Paralegal',
    'all_items'           => 'All Paralegals',
    'view_item'           => 'View Paralegals',
    'add_new_item'        => 'Add New Paralegal',
    'add_new'             => 'Add Paralegal',
    'edit_item'           => 'Edit Paralegal',
    'update_item'         => 'Update Paralegal',
    'search_items'        => 'Search Paralegals',
    'not_found'           => 'No Paralegals Found',
    'not_found_in_trash'  => 'No Paralegals Found in Trash',
  );
  
// Set other options
  $args = array(
    'label'               => 'paralegals',
    'description'         => 'paralegals',
    'labels'              => $labels,
    // Features this CPT supports in Post Editor
    'supports'            => array( 'title', 'editor', 'author' ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 5,
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'page',
  );
  
//Register the CPT
  register_post_type( 'Paralegal', $args );
}

//Allow vCard Uploads
function d4tw_enable_vcard_upload( $mime_types ){
  $mime_types['vcf'] = 'text/x-vcard';
  return $mime_types;
}
add_filter('upload_mimes', 'd4tw_enable_vcard_upload' );

//Filter the pages returned in the ACF link field to only show children of 'Services' parent

function d4tw_relationship_query( $args, $field, $post_id ) {
    
    // only show children of the current post being edited
    $args['post_parent'] = 145;
    
    // return
    return $args;
    
}

// filter for a specific field based on it's name
add_filter('acf/fields/relationship/query/name=practice_areas', 'd4tw_relationship_query', 10, 3);

//filter the attorneys and paralegals by last name
function posts_orderby_lastname ($orderby_statement) 
{
  $orderby_statement = "RIGHT(post_title, LOCATE(' ', REVERSE(post_title)) - 1) ASC";
    return $orderby_statement;
}

//Add the avatar image size for professionals
add_image_size( 'badge', 150, 150, true );