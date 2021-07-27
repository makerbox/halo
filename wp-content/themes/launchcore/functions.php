<?php
add_action( 'after_setup_theme', 'launchcore_setup' );
function launchcore_setup() {
load_theme_textdomain( 'launchcore', get_template_directory() . '/languages' );
add_theme_support( 'title-tag' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'html5', array( 'search-form' ) );
global $content_width;
if ( ! isset( $content_width ) ) { $content_width = 1920; }
register_nav_menus( array( 'main-menu' => esc_html__( 'Main Menu', 'launchcore' ) ) );
}
add_action( 'wp_enqueue_scripts', 'launchcore_load_scripts' );
function launchcore_load_scripts() {
wp_enqueue_style( 'launchcore-style', get_stylesheet_uri() );
wp_enqueue_script( 'jquery' );
}
add_action( 'wp_footer', 'launchcore_footer_scripts' );
function launchcore_footer_scripts() {
?>
<script>
jQuery(document).ready(function ($) {
var deviceAgent = navigator.userAgent.toLowerCase();
if (deviceAgent.match(/(iphone|ipod|ipad)/)) {
$("html").addClass("ios");
$("html").addClass("mobile");
}
if (navigator.userAgent.search("MSIE") >= 0) {
$("html").addClass("ie");
}
else if (navigator.userAgent.search("Chrome") >= 0) {
$("html").addClass("chrome");
}
else if (navigator.userAgent.search("Firefox") >= 0) {
$("html").addClass("firefox");
}
else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
$("html").addClass("safari");
}
else if (navigator.userAgent.search("Opera") >= 0) {
$("html").addClass("opera");
}
});
</script>
<?php
}
add_filter( 'document_title_separator', 'launchcore_document_title_separator' );
function launchcore_document_title_separator( $sep ) {
$sep = '|';
return $sep;
}
add_filter( 'the_title', 'launchcore_title' );
function launchcore_title( $title ) {
if ( $title == '' ) {
return '...';
} else {
return $title;
}
}
add_filter( 'the_content_more_link', 'launchcore_read_more_link' );
function launchcore_read_more_link() {
if ( ! is_admin() ) {
return ' <a href="' . esc_url( get_permalink() ) . '" class="o-button__read-more">...</a>';
}
}
add_filter( 'excerpt_more', 'launchcore_excerpt_read_more_link' );
function launchcore_excerpt_read_more_link( $more ) {
if ( ! is_admin() ) {
global $post;
return ' <a href="' . esc_url( get_permalink( $post->ID ) ) . '" class="o-button__read-more">...</a>';
}
}
add_filter( 'intermediate_image_sizes_advanced', 'launchcore_image_insert_override' );
function launchcore_image_insert_override( $sizes ) {
unset( $sizes['medium_large'] );
return $sizes;
}
add_action( 'widgets_init', 'launchcore_widgets_init' );
function launchcore_widgets_init() {
register_sidebar( array(
'name' => esc_html__( 'Sidebar Widget Area', 'launchcore' ),
'id' => 'primary-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => '</li>',
'before_title' => '<h3 class="c-widget__title">',
'after_title' => '</h3>',
) );
}
add_action( 'wp_head', 'launchcore_pingback_header' );
function launchcore_pingback_header() {
if ( is_singular() && pings_open() ) {
printf( '<link rel="pingback" href="%s" />' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
}
}
add_action( 'comment_form_before', 'launchcore_enqueue_comment_reply_script' );
function launchcore_enqueue_comment_reply_script() {
if ( get_option( 'thread_comments' ) ) {
wp_enqueue_script( 'comment-reply' );
}
}
function launchcore_custom_pings( $comment ) {
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php
}
add_filter( 'get_comments_number', 'launchcore_comment_count', 0 );
function launchcore_comment_count( $count ) {
if ( ! is_admin() ) {
global $id;
$get_comments = get_comments( 'status=approve&post_id=' . $id );
$comments_by_type = separate_comments( $get_comments );
return count( $comments_by_type['comment'] );
} else {
return $count;
}
}

// insert favicon
function blog_favicon() { 
	$favicon = get_template_directory_uri() . '/src/assets/FbF_Favicon.jpg';
	?>
	<link rel="shortcut icon" href="<?php echo $favicon; ?>" > 
<?php }
add_action('wp_head', 'blog_favicon');

// get Bootstrap
// function get_bootstrap(){
// 	wp_enqueue_script('bootstrapjs', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js');
// 	wp_enqueue_style('bootstrapcss', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
// }
// add_action('wp_enqueue_scripts', 'get_bootstrap');

// get Green Sock
// function get_greensock(){
// 	wp_enqueue_script('greensock', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js');
// }
// add_action('wp_enqueue_scripts', 'get_greensock');

// get Slick
// function get_slick(){
// 	wp_enqueue_script('slickjs', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js');
// 	wp_enqueue_style('slickcss', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
// }
// add_action('wp_enqueue_scripts', 'get_slick');

// get Scroll Magic
// function get_scrollmagic(){
// 	wp_enqueue_script('scrollmagicjs', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js');
// 	wp_enqueue_script('scrollmagicdebug', '//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/debug.addIndicators.min.js');
// }
// add_action('wp_enqueue_scripts', 'get_scrollmagic');

// load webpack bundles
function load_bundled_js(){
	wp_enqueue_script('bundled_js', get_template_directory_uri() . '/dist/bundle.min.js');
	wp_enqueue_style('bundled_css', get_template_directory_uri() . '/dist/bundle.css');
}
add_action( 'wp_enqueue_scripts', 'load_bundled_js' );

// to carry our custom styles into the WYSIWYG editor
add_theme_support( 'editor-styles' );    //enable custom styleet for WordPress editors
add_editor_style( get_template_directory_uri() . '/dist/bundle.css' );  //load the CSS file from your template directory

// auto update plugins
add_filter( 'auto_update_plugin', '__return_true' );

// remove welcome block in dashboard
remove_action('welcome_panel', 'wp_welcome_panel');

// allow svg upload 
function my_myme_types($mime_types){
    $mime_types['svg'] = 'image/svg+xml'; //Adding svg extension
    return $mime_types;
};
add_filter('upload_mimes', 'my_myme_types', 1, 1);

// interpret svg without media library
function svg($name) {
	$contents = wp_remote_request(get_stylesheet_directory_uri().'/svg/'.$name.'.svg', array(
		'Authorization' => 'Basic ' . base64_encode( 'demo:915c1bba677c' )
    ));
	$contents = wp_remote_retrieve_body($contents);
    $svg = str_replace(["\n", "\r", "\t"], ['', '', ''], $contents);
    $svg = explode('<svg', $svg);
    if (count($svg) === 2) {
        $svg = '<svg' . $svg[1];
    } else {
        $svg = $svg[0];
    }
    echo $svg;
}

// custom logo support
add_theme_support( 'custom-logo' );

// get template parts
function part($partName){
	get_template_part( 'parts/part', $partName ); 
}

// image helper
function imageHelper($imgId, $imgAlt){
	$image_url  = wp_get_attachment_url( $imgId );
	$file_ext   = pathinfo( $image_url, PATHINFO_EXTENSION );
	if($file_ext == 'svg'){
		echo file_get_contents($image_url);
	}else{
		echo "<img src='".wp_get_attachment_image_src( $imgId , 'full' )[0]."' 
		srcset='".wp_get_attachment_image_srcset($imgId)."' 
		sizes='(min-width: 75rem) 60rem,
		           (min-width: 50rem) 40rem,
		           (min-width: 40rem) calc(100vw - 10rem),
		           100vw' alt='".$imgAlt."'>";
	}
}