<?php
/**
 * Partial template for content in story.php
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	</header><!-- .entry-header -->

	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content">

		<?php
		the_content();
        $vision_content = get_field('vision');
        $do_content = get_field('what_we_do');
        $weaving_content = get_field('weaving_connections');
        $innovation_content = get_field('inspiring_innovation');
        $research_content = get_field('reimagining_research');
        echo rbd_collapser('Vision',$vision_content, 'purple');
        echo rbd_collapser('What We Do',$do_content, 'cream');
        echo rbd_collapser('Weaving Connections',$weaving_content, 'purple');
        echo rbd_collapser('Inspiring Innovation',$innovation_content, 'cream');
        echo rbd_collapser('Reimagining Research',$research_content, 'purple');
		//understrap_link_pages();
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_edit_post_link(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
