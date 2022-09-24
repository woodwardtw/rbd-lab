<?php
/**
 * Single post partial template
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
    <div class="row">
        <div class="col-md-3">
            	<?php echo get_the_post_thumbnail( $post->ID, 'large', array('class' => 'project-thumb') ); ?>
        </div>
        <div class="col-md-9">
            <div class="project-summary">
                <?php the_field('summary');?>
            </div>
        </div>
    </div>

	<div class="entry-content">
        <?php 
        $vision_content = get_field('vision');
        echo rbd_collapser('Vision',$vision_content, 'purple');
        
        $process_content = get_field('process');
        echo rbd_collapser('Process',$process_content, 'cream');
        
        $partners_content = rbd_proj_partner_builder();
        echo rbd_collapser('Partners',$partners_content, 'purple');
        
        $impact_content = get_field('impact');
        echo rbd_collapser('Impact',$impact_content, 'cream');
        
        $reports_content = get_field('reports');
        echo rbd_collapser('Reports & Publications',$reports_content, 'purple');
        ?>
		<?php
		the_content();
		understrap_link_pages();
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
