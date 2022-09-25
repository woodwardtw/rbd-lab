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
		<div class="story">
			<?php the_content();?>
		</div>
		<?php		
        $vision_content = get_field('vision');
        $do_content = get_field('what_we_do');
        $weaving_content = get_field('weaving_connections');
        $innovation_content = get_field('inspiring_innovation');
        $research_content = get_field('reimagining_research');
        echo rbd_collapser('Vision',$vision_content, 'purple');
        //echo rbd_collapser('What We Do',$do_content, 'cream');
        // echo rbd_collapser('Weaving Connections',$weaving_content, 'purple');
        // echo rbd_collapser('Inspiring Innovation',$innovation_content, 'cream');
        // echo rbd_collapser('Reimagining Research',$research_content, 'purple');
		//understrap_link_pages();
		?>
		 <div class="row purple-row wwd">
            <div class="col-md-12">
                <h1 id="what-we-do">What We Do</h1>
            </div>
            <div id="methods-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
            <div class="carousel-inner" role="listbox">
                <?php echo rbd_wwd_carousel();?>                
               
            </div>
            <a class="carousel-control-prev w-aut" href="#methods-carousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next w-aut" href="#methods-carousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </a>
            </div>
            
        </div>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<div class="modal fade" id="methodModal" tabindex="-1" aria-labelledby="methodDetailLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h2 class="modal-title" id="methodDetailLabel"></h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                
              </div>
            </div>
          </div>
        </div>

		<?php understrap_edit_post_link(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
