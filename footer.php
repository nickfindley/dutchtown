<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Dutchtown
 */

?>

	</div><!-- .site-content -->

	<footer class="site-footer">
		
		<section class="footer-section">
			<?php dynamic_sidebar( 'footer-1' ); ?>
		</section>

		<section class="footer-section">
			<?php dynamic_sidebar( 'footer-2' ); ?>
		</section>

		<section class="footer-section">
			<?php dynamic_sidebar( 'footer-3' ); ?>
		</section>

		<section class="footer-section">
			<?php dynamic_sidebar( 'footer-4' ); ?>
		</section>
	
	</footer><!-- .site-footer -->

	<?php wp_footer(); ?>

	<?php get_template_part( 'template-parts/footer-scripts' ); ?>

</body>
</html>
