<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dutchtown
 */

get_header(); ?>

	<div class="page-container">
		
		<main class="page-main 404-main">

			<article class="article-has-no-img">
    
                <header class="article-header">

                    <div class="article-title">
                        <h1><?php esc_html_e( 'Sorry, that page can&rsquo;t be found.', 'dutchtown' ); ?></h1>
                    </div><!-- .article-title -->
                
                </header><!-- .article-header -->

                <div class="article-content-container">

                    <section class="article-content">

                        <p>It looks like nothing was found at this location. You can try searching for the page below. If you&rsquo;re still having trouble, please feel free to <a href="/contact/">contact us</a> and let us know about the problem.</p>

                        <section class="fourohfour-search">

                            <h2>Search DutchtownSTL.org</h2>
                            
                            <?php get_search_form(); ?>
                        
                        </section>

                    </section><!-- .article-content -->
                
                </div><!-- .article-content-container -->
                
                <div class="article-footer-container">
                    <footer class="article-footer">
                        <p>
                        <?php
                            if ( function_exists('yoast_breadcrumb') ) {
                                yoast_breadcrumb();
                            }
                        ?>
                        </p>
                    </footer><!-- .article-footer -->
                
                </div><!-- .article-footer-container -->

            </article>

		</main>
	
	</div>

<?php get_footer(); ?>