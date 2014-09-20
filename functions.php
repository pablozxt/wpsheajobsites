<?php
add_action( 'after_setup_theme', 'blankslate_setup' );
function blankslate_setup()
{
load_theme_textdomain( 'blankslate', get_template_directory() . '/languages' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
global $content_width;
if ( ! isset( $content_width ) ) $content_width = 640;
register_nav_menus(
array( 'main-menu' => __( 'Main Menu', 'blankslate' ) )
);
}
add_action( 'wp_enqueue_scripts', 'blankslate_load_scripts' );
function blankslate_load_scripts()
{
wp_enqueue_script( 'jquery' );
}
add_action( 'comment_form_before', 'blankslate_enqueue_comment_reply_script' );
function blankslate_enqueue_comment_reply_script()
{
if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
add_filter( 'the_title', 'blankslate_title' );
function blankslate_title( $title ) {
if ( $title == '' ) {
return '&rarr;';
} else {
return $title;
}
}
add_filter( 'wp_title', 'blankslate_filter_wp_title' );
function blankslate_filter_wp_title( $title )
{
return $title . esc_attr( get_bloginfo( 'name' ) );
}
add_action( 'widgets_init', 'blankslate_widgets_init' );


function blankslate_widgets_init()
{
register_sidebar( array (
'name' => __( 'Sidebar Widget Area', 'blankslate' ),
'id' => 'primary-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}

//Create footer widgets
function create_widget($name,$id,$description,$div_id){
	$args = array(
	'name'          => __( $name ),
	'id'            => $id,
	'description'   => $description,
	'class'         => 'nav categories',
	'before_widget' => '',
	'after_widget'  => '',
	'before_title'  => '<h4 class="footer-title center-block">',
	'after_title'   => '<button type="button" data-toggle="collapse" class="navbar-toggle"	 data-target="#'.$div_id.'">
							<span class="glyphicon glyphicon-chevron-down pull-right"></span>
						</button>
						</h4><div id="'.$div_id.'" class="collapse navbar-collapse">' );
	
	register_sidebar( $args );
}

create_widget('Left Footer','footer_left','Displays in the left of the footer','left-footer');
create_widget('Middle Footer','footer_middle','Displays in the middle of the footer','middle-footer');
create_widget('Right Footer','footer_right','Displays in the right of the footer','right-footer');

function blankslate_custom_pings( $comment )
{
$GLOBALS['comment'] = $comment;
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php 
}
add_filter( 'get_comments_number', 'blankslate_comments_number' );
function blankslate_comments_number( $count )
{
if ( !is_admin() ) {
global $id;
$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
return count( $comments_by_type['comment'] );
} else {
return $count;
}
}

//Enable custom menus
add_theme_support( 'menus');

//Load the theme CSS
function theme_styles(){
	wp_enqueue_style('bootstrap', get_template_directory_uri().'/css/bootstrap.min.css');
	wp_enqueue_style('custom-styles', get_template_directory_uri().'/css/custom-styles.css');
}


//Load the theme javascript
function theme_js(){
	wp_enqueue_script( 'jquerymobile',get_template_directory_uri().'/js/jquery.mobile.custom.min.js',array('jquery'), '', true );
	wp_enqueue_script( 'bootstrap',get_template_directory_uri().'/js/bootstrap.min.js',array('jquery'), '', true );
	wp_enqueue_script( 'custom_javascript',get_template_directory_uri().'/js/custom_javascript.js',array('jquery'), '', true );
}

add_action( 'wp_enqueue_scripts', 'theme_js'); 
add_action( 'wp_enqueue_scripts', 'theme_styles'); 


//Add class .active to wp_nav_menu
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
     if( in_array('current-menu-item', $classes) ){
             $classes[] = 'active ';
     }
     return $classes;
}

//Remove width and height inline attributes to images uploaded through Wordpress
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 50 );

function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}

//Remove <p> tags around post images
function filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'filter_ptags_on_images');

//Attach a class to linked images' parent anchors
function give_linked_images_class($html, $id, $caption, $title, $align, $url, $size, $alt = '' ){
  $classes = 'single-post-img center-block'; // separated by spaces, e.g. 'img image-link'

  // check if there are already classes assigned to the anchor
  if ( preg_match('/<a.*? class=".*?">/', $html) ) {
    $html = preg_replace('/(<a.*? class=".*?)(".*?>)/', '$1 ' . $classes . '$2', $html);
  } else {
    $html = preg_replace('/(<a.*?)>/', '$1 class="' . $classes . '" >', $html);
  }
  return $html;
}
add_filter('image_send_to_editor','give_linked_images_class',10,8);

//Add class to post images
function add_image_responsive_class($content) {
   global $post;
   $pattern ="/<img(.*?)class=\"(.*?)\"(.*?)>/i";
   $replacement = '<img$1class="$2 img-responsive img-thumbnail"$3>';
   $content = preg_replace($pattern, $replacement, $content);
   return $content;
}
add_filter('the_content', 'add_image_responsive_class');

//Hide Wordpress bar for subscribers
add_action('set_current_user', 'cc_hide_admin_bar');
function cc_hide_admin_bar() {
  if (!current_user_can('edit_posts')) {
    show_admin_bar(false);
  }
}

//Redirect subscribers to home page after profile update
add_action( 'profile_update', 'tgm_custom_profile_redirect', 12 );
/**
 * This function redirects users to the site's home page after they update their profiles.
 * The function wp_redirect() must always be followed by exit.
 */
function tgm_custom_profile_redirect() {
	if (!current_user_can('edit_posts')){
		wp_redirect( trailingslashit( home_url() ) );
	}
	exit;
}

//Redirect subscribers to home page after log in
add_action('login_redirect','redirect_subscriber');
function redirect_subscriber(){
  if(!current_user_can('edit_posts')){
    return home_url();
  }
}

//add a capability to the contributor role
function add_theme_caps() {
		//get contributor role
		$role = get_role( 'contributor' );
		//set $cap as the capability to add
		$cap = 'upload_files';
		//check if the capability has already been set. Capabilities get written to the database
		//this avoids writing to the database every time if the capability already exists
		if(!array_key_exists ($cap , $role->capabilities)){
			//add capability
			$role->add_cap( 'upload_files' );
		}
}
add_action( 'admin_init', 'add_theme_caps');
