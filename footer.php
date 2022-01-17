<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer">

	<div class="container-fluid">

		<div class="row">

			<div class="col-md-12">

				<footer class="site-footer" id="colophon">

				<div class="row">
					<div class="col-md-5">
						<h2>CONTACT US</h2>
					</div>
					<div class="col-md-7">
						<?php get_search_form();?>
						<p class="lands">The ResiliencebyDesign (RbD) Research Innovation Lab at Royal Roads University rests on the 
							traditional and ancestral lands of the Xwsepsum (Esquimalt) and Lkwungen (Songhees) families, 
							now known as Victoria, British Columbia, Canada.<p>
						<div class="credit">
							<img class="footer-rr" src="<?php echo get_template_directory_uri();?>/imgs/rr-logo.png" alt="Royal Roads University Logo.">
							<img class="footer-rbd" src="<?php echo get_template_directory_uri();?>/imgs/rbd-logo-simple.png" alt="Resilience by Design Lab logo.">
						</div>
					</div>
				</div>

				</footer><!-- #colophon -->

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

