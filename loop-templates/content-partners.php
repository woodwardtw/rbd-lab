<?php
/**
 * Partial template for content in partners.php
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
        $partner_content = rbd_all_partners('partners');
        $funder_content = rbd_all_partners('funders');
        $collab_content = rbd_get_collab();
        $join_content = rbd_get_join();
        echo rbd_collapser('Partnered Organizations', $partner_content, 'cream');
        echo rbd_collapser('Funders', $funder_content, 'purple');
        echo rbd_collapser('Collaborate with Us', $collab_content, 'cream');
        echo rbd_collapser('Join the Adaptation Learning Network', $join_content, 'purple');
		//understrap_link_pages();
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_edit_post_link(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
