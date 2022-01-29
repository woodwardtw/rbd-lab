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


function rbd_collapser($title,$content, $color){
	$id = sanitize_title($title);
	return "
	<div class='row {$color}-row expander'>
		<button class='btn btn-expand collapsed' id='btn-{$id}' type='button' data-bs-toggle='collapse' data-bs-target='#{$id}' aria-expanded='false' aria-controls='{$id}'>
			 {$title}
		</button>
		<div class='collapse' id='{$id}'>
			<div class='collapse-body'>
			{$content}
			</div>
		</div>
	</div>
	";
}

function rbd_get_partners(){
	// Check rows exists.
	if( have_rows('partners') ):
		$html = '';
		// Loop through rows.
		while( have_rows('partners') ) : the_row();

			// Load sub field value.
			$title = get_sub_field('partner_name');
			$link = get_sub_field('partner_url');
			// Do something...
		$html .= '<div class="col-md-3 partner-box">' . rbd_circle_maker($title,$link) . '</div>';
		// End loop.
		endwhile;
		return '<div class="row">' . $html . '</div>';
	// No value.
	else :
		// Do something...
	endif;
}

function rbd_get_funders(){
	// Check rows exists.
	if( have_rows('funders') ):
		$html = '';
		// Loop through rows.
		while( have_rows('funders') ) : the_row();

			// Load sub field value.
			$title = get_sub_field('funder_name');
			$link = get_sub_field('funder_url');
			// Do something...
		$html .= '<div class="col-md-3 partner-box">' . rbd_circle_maker($title,$link) . '</div>';
		// End loop.
		endwhile;
		return '<div class="row">' . $html . '</div>';
	// No value.
	else :
		// Do something...
	endif;
}

function rbd_get_collab(){
	if(get_field('collaborate')){
		return get_field('collaborate');
	}
}

function rbd_get_join(){
	if(get_field('join')){
		return get_field('join');
	}
}

function rbd_methods_carousel(){
	$html = '';
	$args = array(
		'post_type' => array('methods'),
		'posts_per_page' => 20,
    	'nopaging' => true, 
	);
	$active = 'active';
	$method_query = new WP_Query( $args );
	// The Loop
	if ( $method_query->have_posts() ) :
		while ( $method_query->have_posts() ) : $method_query->the_post();
			$title = get_the_title();
			$content = get_the_content();
			$item = "
				<div class='carousel-item {$active}'>
					<div class='col-md-4'>
						<div class='card method'>
							<h2>{$title}</h2>
							<div class='method-content'>
								{$content}
							</div>
						</div>
					</div>
				</div>";
		$html .= $item;
		$active = '';
		endwhile;
		return $html;
		// No value.
	else :
		// Do something...
	endif;

}