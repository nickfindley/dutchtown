<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dutchtown
 */

?>

<article id="post-<?php the_ID(); ?>" class="<?php if ( has_post_thumbnail() ) : ?>article-has-img<?php else : ?>article-has-no-img<?php endif; ?>">
    
    <header class="article-header">

    <?php if ( has_post_thumbnail() ) : ?>
        <div class="article-header-img">   
    
            <?php dutchtown_post_thumbnail(); ?>
    
            <div class="article-title">
				<?php the_title( '<h1><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' ); ?>
			</div><!-- .article-title -->
        
        </div><!-- .article-header-img -->
    <?php else: ?>
		<div class="article-title">
        <?php the_title( '<h1><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' ); ?>
		</div><!-- .article-title -->
    <?php endif; ?>
    
    </header><!-- .article-header -->

	<div class="article-content-container">

		<section class="article-content">

			<?php the_content(); ?>

		</section><!-- .article-content -->
	
	</div><!-- .article-content-container -->
	
	<div class="article-footer-container">
		<footer class="article-footer">
			<p>
			<?php
				if ( function_exists('yoast_breadcrumb') ) {
					echo '<i class="fas fa-fw fa-folder"></i> ';
					yoast_breadcrumb();
					echo '<br>';
				}

				if ( is_woocommerce() || is_cart() || is_checkout() ) :
					echo '';
				else :
					dutchtown_updated_on( array(
						'before_updated_on'	=> '<i class="fas fa-fw fa-bookmark"></i> This page was last updated on ',
						'after_updated_on'	=> '.'
						)
					);
				endif;
			?>
			</p>
		</footer><!-- .article-footer -->
	</div><!-- .article-footer-container -->

</article><!-- #post-<?php the_ID(); ?> -->
