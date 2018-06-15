<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dutchtown
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="article-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="article-title">', '</h1>' );
		else :
			the_title( '<h2 class="article-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="article-meta">
			<?php dutchtown_posted_on(); ?>
		</div><!-- .article-meta -->
		<?php
		endif; ?>
	</header><!-- .article-header -->

	<?php dutchtown_post_thumbnail(); ?>

	<div class="article-content">
		<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'dutchtown' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'dutchtown' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .article-content -->

	<footer class="article-footer">
		<?php dutchtown_entry_footer(); ?>
	</footer><!-- .article-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
