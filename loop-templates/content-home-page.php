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
		<div class="row project cream-row" id="logo-row">
			<div class="col-md-12" id="logo-col">				
				<img class="home-logo-big" src="<?php echo get_template_directory_uri();?>/imgs/home_logo.jpg" alt="Resilience by Design Lab logo.">				
				<div class="rbd-statement">
					The ResiliencebyDesign Lab inspires climate action through research, innovation, and connections.
				</div>
			</div>
		</div>
		<div class="row project purple-row projects">
			<div class="project-list col-md-12">
				<h1>Projects</h1>
				<?php rbd_home_projects();?>
				<div class="see-more blue">
					<a href="projects">See more projects <?php get_template_part( 'loop-templates/content', 'right-arrow.svg' );?></a>
				</div>
			</div>
		</div>
		<div class="row news cream-row">
			<div class="col-md-8">				
				<?php rbd_home_news();?>				
				<div class="see-more orange">
						<a href="news">See more news <?php get_template_part( 'loop-templates/content', 'right-arrow.svg' );?></a>
				</div>
			</div>
				<div class="col-md-4">
					<img src="<?php echo get_template_directory_uri();?>/imgs/news.svg" alt="News icon.">
				</div>
			</div>
		</div>
		<div class="row purple-row links home-trio">
			<div class="col-md-4">
				<?php echo rbd_circle_maker('Story','story')?>
			</div>
			<div class="col-md-4">
				<?php echo rbd_circle_maker('Resources','resources')?>
			</div>
			<div class="col-md-4">
				<?php echo rbd_circle_maker('Partners','partners')?>
			</div>
		</div>
		<?php
		//the_content();
		//understrap_link_pages();
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_edit_post_link(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
