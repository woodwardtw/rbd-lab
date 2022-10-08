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
		'posts_per_page' => 4,
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
		$html = '<div class="col-md-4 all-projects">' . rbd_circle_maker($title,$link) . "</div>";
		echo $html;
	endwhile;
	endif;

	// Reset Post Data
	wp_reset_postdata();
}


function rbd_collapser($title, $content, $color){
	$id = sanitize_title($title);
	return "
	<div class='row {$color}-row expander'>
		<button class='btn btn-expand collapsed' id='btn-{$id}' type='button' data-bs-toggle='collapse' data-bs-target='#{$id}' aria-expanded='false' aria-controls='{$id}'>
			 {$title}
		</button>
		<div class='collapse' id='{$id}'>
			<div class='collapse-body {$id}'>
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

function rbd_proj_partner_builder(){
    if(get_field('partners')){
    	$html = '';
        $partners = get_field('partners');
        foreach ($partners as $key => $partner) {
        		$post_id = $partner->ID;
        		$title = $partner->post_name;
				$link = get_field('partner_link',$post_id);
        	// code...
						$html .= '<div class="col-md-3 partner-box">' . rbd_circle_maker($title,$link) . '</div>';
        }
        	return '<div class="row">' . $html . '</div>';
    }
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
			$content =  htmlspecialchars(wpautop(get_the_content()),ENT_QUOTES);
			$excerpt = get_the_excerpt();
			$clean_excerpt = substr($excerpt, 0, 320);
			$post_id = get_the_ID();
			$item = "
				<div class='carousel-item {$active}'>
					<div class='col-md-4'>
						<div class='card method'>
							<h2>{$title}</h2>
							<div class='method-content'>
								{$clean_excerpt} . . .								
							</div>
							<button type='button' class='btn btn-primary method-button' data-bs-toggle='modal' data-bs-target='#methodModal' aria-label='Method details for {$title}.' data-bs-method='{$title}' data-bs-content='{$content}'>Method Details</button>
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

//resources page

function rbd_all_resources(){
	if(get_field('add_a_resource')){
		$resources = get_field('add_a_resource');
		//var_dump($resources);
		foreach ($resources as $key => $resource) {
			$post_id = $resource->ID;
			$title = get_the_title($post_id);
			$link = get_the_permalink($post_id);
			$html = '<div class="col-md-4 all-projects">' . rbd_circle_maker($title,$link) . "</div>";
			echo $html;
		}	
	}		
}

//news page
function rbd_all_news(){

	if( have_rows('news_content_links') ):

		// Loop through rows.
		while( have_rows('news_content_links') ) : the_row();

			// Load sub field value.
			$title = get_sub_field('title');
			$link = get_sub_field('news_url');
			// Do something...			
			$html = '<div class="col-md-4 all-projects">' . rbd_circle_maker($title,$link) . "</div>";
		echo $html;
		// End loop.
		endwhile;

	// No value.
	else :
		// Do something...
	endif;

}


//partners
function rbd_all_partners($partner_type){
	if(get_field($partner_type)){
		$html = '';
		$partners = get_field($partner_type);
		foreach ($partners as $key => $partner) {
			$post_id = $partner;
			$title = get_the_title($post_id);
			$link = get_field('partner_link', $post_id);
			$html .= "<div class='col-md-3 all-projects'>" . rbd_circle_maker($title,$link) . "</div>";
		
			// code...
		}
		return "<div class='row all-{$partner_type}-row'>{$html}</div>";
	}

}
//story page

function rbd_wwd_carousel(){
	$html = '';
	if( have_rows('what_we_do') ):
	$active = 'active';
	    // Loop through rows.
	    while( have_rows('what_we_do') ) : the_row();

	        // Load sub field value.
	        $title = get_sub_field('title');
	        $content = get_sub_field('content');
	        $content_data =  htmlspecialchars(wpautop($content),ENT_QUOTES);
					$clean_excerpt = substr($content, 0, 320);
					$post_id = get_the_ID();
					$item = "
						<div class='carousel-item {$active}'>
							<div class='col-md-4'>
								<div class='card method'>
									<h2>{$title}</h2>
									<div class='method-content'>
										{$clean_excerpt} . . .								
									</div>
									<button type='button' class='btn btn-primary method-button' data-bs-toggle='modal' data-bs-target='#methodModal' aria-label='Read more about {$title}.' data-bs-method='{$title}' data-bs-content='{$content_data}'>Read more</button>
								</div>
							</div>
						</div>";
				$html .= $item;
				$active = '';
	        // Do something...

	    // End loop.
	    endwhile;
	    return $html;
	// No value.
	else :
	    // Do something...
	endif;


}

add_image_size( 'bio', '400', '400', array('center','center'));


function rbd_current_team(){
	$html = '';
	$members = get_field('current_members');
	if($members) {
		foreach($members as $member){
			$post_id = $member->ID;
			$name = $member->post_title;
            $position = get_field('title', $post_id);
            $content = $member->post_content;
            $img = get_the_post_thumbnail_url($post_id,'bio');
            $html .= "
            <div class='row active-members'>
            			<div class='col-md-4'>
            				<img class='bio-image' src='{$img}' alt='Biography image for {$name}.'>
            			</div>
            			<div class='col-md-8'>
            				<h2 class='bio-title'>{$name}</h2>
            				<div class='position'>{$position}</div>
            				<div class='bio-text'>{$content}</div>
            			</div>
            </div>
            ";             
		}
	}
	return $html;

}

//deprecated with move to control order rather than sort by date***************
// function rbd_current_team(){

// 	// WP QUERY LOOP
// 	$html = "";
// 		 $args = array(
// 		      'posts_per_page' => 11,
// 		      'post_type'   => 'member', 
// 		      'post_status' => 'publish', 
// 		      'nopaging' => false,
// 		       'tax_query' => array( // (array) - use taxonomy parameters (available with Version 3.1).
// 						    array(
// 						      'taxonomy' => 'Status', // (string) - Taxonomy.
// 						      'field' => 'slug', // (string) - Select taxonomy term by Possible values are 'term_id', 'name', 'slug' or 'term_taxonomy_id'. Default value is 'term_id'.
// 						      'terms' => array( 'active' ), // (int/string/array) - Taxonomy term(s).
// 						      'operator' => 'IN' // (string) - Operator to test. Possible values are 'IN', 'NOT IN', 'AND', 'EXISTS' and 'NOT EXISTS'. Default value is 'IN'.
// 						    ),						   
// 						  ),  
// 		    );
// 		  $the_query = new WP_Query( $args );
// 		                    if( $the_query->have_posts() ): 
// 		                      while ( $the_query->have_posts() ) : $the_query->the_post();
// 		                       //DO YOUR THING
// 		                        $name = get_the_title();
// 		                        $post_id = get_the_ID();
// 		                        $content = get_the_content();
// 		                        $img = get_the_post_thumbnail_url($post_id,'bio');
// 		                        $html .= "
// 		                        <div class='row active-members'>
// 		                        			<div class='col-md-4'>
// 		                        				<img class='bio-image' src='{$img}' alt='Biography image for {$name}.'>
// 		                        			</div>
// 		                        			<div class='col-md-8'>
// 		                        				<h2 class='bio-title'>{$name}</h2>
// 		                        				<div class='bio-text'>{$content}</div>
// 		                        			</div>
// 		                        </div>
// 		                        ";
// 		                         endwhile;
// 		                  endif;
// 		            wp_reset_query();  // Restore global post data stomped by the_post().
// 		   return  $html;
// }                    

function rbd_former_team(){
	$html = "<div class='former-team-block'><h1 class='former-title'>Former Lab Team</h1><div class='row former-members'>";
	$members = get_field('former_members');
	if($members) {
		foreach($members as $member){
			$post_id = $member->ID;
			$name = $member->post_title;
            $position = get_field('title', $post_id);
            $content = $member->post_content;
            $img = get_the_post_thumbnail_url($post_id,'bio');
            $html .= "
            <div class='col-md-3'>
    			<div class='former-block'>
        				<img class='bio-image' src='{$img}' alt='Biography image for {$name}.'>
        				<h2 class='bio-title-former'>{$name}</h2>
        				<div class='position'>{$position}</div>
        			</div>
    			</div>
            ";             
		}
	}
	return $html . "</div></div>";

}
	

// 	function rbd_former_team(){

// 	// WP QUERY LOOP
// 	$html = "";
// 		 $args = array(
// 		      'posts_per_page' => 11,
// 		      'post_type'   => 'member', 
// 		      'post_status' => 'publish', 
// 		      'nopaging' => false,
// 		       'tax_query' => array( // (array) - use taxonomy parameters (available with Version 3.1).
// 						    array(
// 						      'taxonomy' => 'Status', // (string) - Taxonomy.
// 						      'field' => 'slug', // (string) - Select taxonomy term by Possible values are 'term_id', 'name', 'slug' or 'term_taxonomy_id'. Default value is 'term_id'.
// 						      'terms' => array( 'former' ), // (int/string/array) - Taxonomy term(s).
// 						      'operator' => 'IN' // (string) - Operator to test. Possible values are 'IN', 'NOT IN', 'AND', 'EXISTS' and 'NOT EXISTS'. Default value is 'IN'.
// 						    ),						   
// 						  ),  
// 		    );
// 		  $the_query = new WP_Query( $args );
// 		                    if( $the_query->have_posts() ): 
// 		                    	$html .= "<div class='former-team-block'><h1 class='former-title'>Former Lab Team</h1><div class='row former-members'>";
// 		                      while ( $the_query->have_posts() ) : $the_query->the_post();
// 		                       //DO YOUR THING
// 		                        $name = get_the_title();
// 		                        $post_id = get_the_ID();
// 		                        $content = get_the_content();
// 		                        $img = get_the_post_thumbnail_url($post_id,'bio');
// 		                        $html .= "
		                        
// 		                        			<div class='col-md-3'>
// 		                        			<div class='former-block'>
// 			                        				<img class='bio-image' src='{$img}' alt='Biography image for {$name}.'>
// 			                        				<h2 class='bio-title-former'>{$name}</h2>
// 			                        			</div>
// 		                        			</div>
		          
// 		                        ";
// 		                         endwhile;
// 		                  endif;
// 		            wp_reset_query();  // Restore global post data stomped by the_post().
// 		   return  $html . "</div></div>";
// }  


//allow svg**doesn't seem to work
function allow_svg_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'allow_svg_mime_types');