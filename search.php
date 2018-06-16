<?php
/**
 * The template for displaying search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dutchtown
 */

get_header(); ?>

	<div class="search-container">
		
		<main class="search-main">

		<?php
			global $query_string;

            parse_str( $query_string, $args );

            $args['posts_per_page'] = 10;

			//query_posts( $args );
		?>
			<header class="page-header">
				
				<h1 class="page-title"><?php
					/* translators: %s: search query. */
					$search_query = wptexturize( html_entity_decode( get_search_query() ) );
					printf( esc_html__( 'Search Results for %s', 'dutchtown' ), '<span>' . $search_query . '</span>' );
				?></h1>
				
			</header><!-- .page-header -->

		<?php
            while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/content', 'search' );

                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;

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

        </main><!-- .search-main -->
        
        <section class="sidebar search-sidebar">

            <?php get_sidebar(); ?>

        </section><!-- .sidebar -->

    </div><!-- .search-container -->

<?php get_footer(); ?>