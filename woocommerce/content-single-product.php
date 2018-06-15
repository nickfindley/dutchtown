<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<article>

	<?php
	/**
	 * Hook Woocommerce_before_single_product.
	 *
	 * @hooked wc_print_notices - 10
	 */
	do_action( 'woocommerce_before_single_product' );

	if ( post_password_required() ) {
		echo get_the_password_form(); // WPCS: XSS ok.
		return;
	}

	global $product;
	?>

	<header class="woo-header">

		<h1><?php the_title(); ?></h1>

	</header>

	<div class="woo-content">
	<?php
		/**
		 * Hook: woocommerce_before_single_product_summary.
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
	?>
		<div class="woo-summary">
			<div class="woo-business summary entry-summary">
				<?php
					/**
					 * Hook: Woocommerce_single_product_summary.
					 *
					 * @hooked woocommerce_template_single_title - 5
					 * @hooked woocommerce_template_single_rating - 10
					 * @hooked woocommerce_template_single_price - 10
					 * @hooked woocommerce_template_single_excerpt - 20
					 * @hooked woocommerce_template_single_add_to_cart - 30
					 * @hooked woocommerce_template_single_meta - 40
					 * @hooked woocommerce_template_single_sharing - 50
					 * @hooked WC_Structured_Data::generate_product_data() - 60
					 */
					remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
					remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
					remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 50);
					do_action( 'woocommerce_single_product_summary' );
				?>
			</div><!-- .woo-business -->

			<div class="product-description">
				<?php the_content(); ?>
			</div>

			<?php woocommerce_template_single_meta(); ?>

			<?php woocommerce_template_single_sharing(); ?>

			<?php
				/**
				 * Hook: woocommerce_after_single_product_summary.
				 *
				 * @hooked woocommerce_output_product_data_tabs - 10
				 * @hooked woocommerce_upsell_display - 15
				 * @hooked woocommerce_output_related_products - 20
				 */
				remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
				remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
				do_action( 'woocommerce_after_single_product_summary' );
			?>
		</div><!-- .woo-summary -->

		<div class="woo-related">
			<?php echo do_shortcode('[yith_wc_productslider id=2292]'); ?>
		</div>

	</div><!-- .woo-content -->

	<footer class="woo-footer article-footer">
					
		<nav>
		<?php
			woocommerce_breadcrumb();
		?>
		</nav>
		
	</footer>
	
</article>

<?php do_action( 'woocommerce_after_single_product' ); ?>
