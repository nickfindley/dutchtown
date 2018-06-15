<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dutchtown
 */

get_header();
?>

	<div class="archive-container">

        <?php
            dutchtown_archive_title_component( 'page', 'h1', $args = array(
                'before_title' => '<span>Archives: </span>'
            ));
        ?>
		
		<main class="archive-main">

		<?php
			global $query_string;

            parse_str( $query_string, $args );

            $args['posts_per_page'] = 10;

			query_posts( $args );

            while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/content', 'archive' );

            endwhile; // End of the loop.
		?>
            <nav class="pages-nav">
            <?php
                echo paginate_links( array(
                    'format'	=> 'page/%#%',
                    'type'		=> 'list',
                    'prev_text'	=> '<i class="fa fa-arrow-circle-left"></i> Previous Page',
                    'next_text'	=> 'Next Page <i class="fa fa-arrow-circle-right"></i> '
                ));
            ?>
            </nav>

        </main><!-- .archive-main -->
        
        <section class="sidebar archive-sidebar">

            <?php get_sidebar(); ?>

        </section><!-- .sidebar -->

    </div><!-- .archive-container -->

<?php get_footer(); ?>