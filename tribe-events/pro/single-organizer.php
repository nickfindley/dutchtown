<?php
/**
 * Single Organizer Template
 * The template for an organizer. By default it displays organizer information and lists
 * events that occur with the specified organizer.
 *
 * This view contains the filters required to create an effective single organizer view.
 *
 * @package TribeEventsCalendarPro
 *
 * @version 4.3
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$organizer_id = get_the_ID();
?>

<?php while ( have_posts() ) : the_post(); ?>

<div class="organizer-container <?php if ( has_post_thumbnail() ) : ?>organizer-has-img<?php else : ?>organizer-has-no-img<?php endif; ?>">

	<header class="organizer-header">

    	<?php if ( has_post_thumbnail() ) : ?>
			
		<div class="organizer-header-img">   

			<?php dutchtown_post_thumbnail(); ?>

			<div class="organizer-title">
				<h1 class="organizer-name"><a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php echo tribe_get_organizer( $organizer_id ); ?></a></h1>
			</div><!-- .organizer-title -->
		
		</div><!-- .organizer-header-img -->
		
		<?php else: ?>
		
			<div class="organizer-title">
				<h1 class="organizer-name"><a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php echo tribe_get_organizer( $organizer_id ); ?></a></h1>
			</div><!-- .organizer-title -->
		
		<?php endif; ?>
    
    </header><!-- .organizer-header -->

	<div class="organizer-content-container">

		<section class="organizer-content">

			<div class="organizer-meta">

				<?php echo tribe_get_organizer_details(); ?>
			
			</div><!-- .organizer-meta -->

			<?php if ( get_the_content() ) : ?>
			<div class="organizer-description">
				
				<?php the_content(); ?>
				
			</div><!-- .organizer-description -->
			<?php endif; ?>

		</section><!-- .organizer-content -->

		<!-- Upcoming event list -->
		<section class="organizer-events-list">
			
			<?php echo tribe_organizer_upcoming_events( $organizer_id ); ?>

		</section><!-- .organizer-events-list -->

	</div><!-- .organizer-content-container -->

	<div class="organizer-footer-container">

		<footer class="organizer-footer">

			<p>
			<?php
				if ( function_exists('yoast_breadcrumb') ) {
					echo '<i class="fas fa-fw fa-map-marker"></i> ';
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

		</footer><!-- .organizer-footer -->

	</div><!-- .organizer-footer-container -->

</div><!-- -->

<?php endwhile; ?>