<?php
/**
 * The template for displaying the home/blog/posts/news page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dutchtown
 */

get_header(); ?>


	<div class="news-container">
        
        <main class="news-main">

        <?php
            while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/content', 'home' );

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

        </main><!-- .news-main -->
        
        <section class="sidebar news-sidebar">

            <?php get_sidebar(); ?>

        </section><!-- .sidebar -->

    </div><!-- .news-container -->

<?php get_footer(); ?>