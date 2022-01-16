<?php
/**
 * UnderStrap functions and definitions
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// UnderStrap's includes directory.
$understrap_inc_dir = 'inc';

// Array of files to include.
$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567.
	'/editor.php',                          // Load Editor functions.
	'/block-editor.php',                    // Load Block Editor functions.
	'/acf.php',								// Load ACF functions
	'/custom-data.php',						// Load custom post types and taxonomy functions
	'/deprecated.php',                      // Load deprecated functions.
);

// Load WooCommerce functions if WooCommerce is activated.
if ( class_exists( 'WooCommerce' ) ) {
	$understrap_includes[] = '/woocommerce.php';
}

// Load Jetpack compatibility file if Jetpack is activiated.
if ( class_exists( 'Jetpack' ) ) {
	$understrap_includes[] = '/jetpack.php';
}

// Include files.
foreach ( $understrap_includes as $file ) {
	require_once get_theme_file_path( $understrap_inc_dir . $file );
}


//HOME PAGE FUNCTIONS
function rbd_home_projects(){
	$args = array(
		'post_type' => array('project'),
		'posts_per_page' => 3,
    	'nopaging' => true, 
	);
	$the_query = new WP_Query( $args );

	// The Loop
	if ( $the_query->have_posts() ) :
	while ( $the_query->have_posts() ) : $the_query->the_post();
	// Do Stuff
		$title = get_the_title();
		$link = get_the_permalink();
		echo "<div class='home-project'><a class='project-link' href='{$link}'>{$title}</a></div>";
	endwhile;
	endif;

	// Reset Post Data
	wp_reset_postdata();
}

function rbd_home_news(){
	$args = array(
		'post_type' => array('post'),
		'category_name' => 'news',
		'posts_per_page' => 1,
    	'nopaging' => true, 
	);
	$news_query = new WP_Query( $args );
	//var_dump($the_query);

	// The Loop
	if ( $news_query->have_posts() ) :
		while ( $news_query->have_posts() ) : $news_query->the_post();
		// Do Stuff
			$title = get_the_title();
			$link = get_the_permalink();
			$body = rbd_get_first_paragraph();
			$id = get_the_id();
			$author =  get_the_author();
			echo "<a class='news-link' href='{$link}'><h1>{$title}</h1></a>
				<div class='news-author'>By {$author}</div>
				<div class='home-article'>{$body}</div>		
			";
		endwhile;
	endif;

	// Reset Post Data
	wp_reset_postdata();
}


function rbd_get_first_paragraph(){
    global $post;
    $str = wpautop( get_the_content() );
    $str = substr( $str, 0, strpos( $str, '</p>' ) + 4 );
    $str = strip_tags($str, '<a><strong><em>');
    return '<p>' . $str . '</p>';
}

function rbd_circle_maker($title,$link){	
	return "
	<div class='circle'>
		<div class='circle__inner'>
	  		<div class='circle__wrapper'>	  			
				<div class='circle__content'>
					<a href='{$link}'>{$title}</a>
				</div>				
	  		</div>
		</div>
  </div>";
}


//PROJECTS PAGE
function rbd_all_projects(){
	$args = array(
		'post_type' => array('project'),
		'posts_per_page' => -1,
    	'nopaging' => true, 
	);
	$the_query = new WP_Query( $args );

	// The Loop
	if ( $the_query->have_posts() ) :
	while ( $the_query->have_posts() ) : $the_query->the_post();
	// Do Stuff
		$title = get_the_title();
		$link = get_the_permalink();
		$html = '<div class="col-md-4">' . rbd_circle_maker($title,$link) . "</div>";
		echo $html;
	endwhile;
	endif;

	// Reset Post Data
	wp_reset_postdata();
}