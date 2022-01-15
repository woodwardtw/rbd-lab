<?php
/**
 * Partial template for content in home-page.php
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php //the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	</header><!-- .entry-header -->


	<div class="entry-content">
	<div class="row project purple-row projects">
		<div class="project-list col-md-12">
			<h1>Projects</h1>
			<?php rbd_home_projects();?>
			<div class="see-more blue">
				<a href="projects">See more projects <?php get_template_part( 'loop-templates/content', 'right-arrow.svg' );?></a>
			</div>
		</div>
	</div>
		<?php
		the_content();
		understrap_link_pages();
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_edit_post_link(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
