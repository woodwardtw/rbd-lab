<?php
/**
 * Partial template for content in project.php
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

	<?php //echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content">
        <div class="all-projects-row row">
            <?php
            rbd_all_projects();
            //the_content();
            //understrap_link_pages();
            ?>
        </div>
        <div class="row purple-row methods">
            <div class="col-md-12">
                <h1 id="methods">Methods</h1>
            </div>
            <div id="methods-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
            <div class="carousel-inner" role="listbox">
                <?php echo rbd_methods_carousel();?>                
               
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
