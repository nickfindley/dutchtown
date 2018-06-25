<?php
/**
 * Single Venue Template
 * The template for a venue. By default it displays venue information and lists
 * events that occur at the specified venue.
 *
 * This view contains the filters required to create an effective single venue view.
 *
 * @package TribeEventsCalendarPro
 *
 * @version 4.4.24
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

if ( ! $wp_query = tribe_get_global_query_object() ) {
    return;
}

$venue_id     = get_the_ID();
$full_address = tribe_get_full_address();
$telephone    = tribe_get_phone();
$website_link = tribe_get_venue_website_link();

while ( have_posts() ) : the_post(); ?>

<div class="venue-container <?php if ( has_post_thumbnail() ) : ?>venue-has-img<?php else : ?>venue-has-no-img<?php endif; ?>">
    
    <header class="venue-header">

    	<?php if ( has_post_thumbnail($venue_id) ) : ?>
			
		<div class="venue-header-img">   

			<?php dutchtown_post_thumbnail(); ?>

			<div class="venue-title">
				<h1 class="venue-name"><a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php echo tribe_get_venue( $venue_id ); ?></a></h1>
			</div><!-- .venue-title -->
		
		</div><!-- .venue-header-img -->
		
		<?php else: ?>
		
			<div class="venue-title">
				<h1 class="venue-name"><a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php echo tribe_get_venue( $venue_id ); ?></a></h1>
			</div><!-- .venue-title -->
		
		<?php endif; ?>
    
    </header><!-- .venue-header -->

	<div class="venue-content-container">

		<section class="venue-content">

			<?php if ( tribe_embed_google_map() && tribe_address_exists() ) : ?>
			
			<!-- Venue Map -->
			<div class="venue-map-wrap">
				<?php echo tribe_get_embedded_map( $venue_id, '100%', '200px' ); ?>
			</div><!-- .tribe-events-map-wrap -->
		
			<?php endif; ?>

			<div class="venue-meta">

				<?php if ( tribe_show_google_map_link() && tribe_address_exists() ) : ?>
				
				<!-- Google Map Link -->
				<?php echo tribe_get_map_link_html(); ?>
			
				<?php endif; ?>

				<!-- Venue Meta -->
				<?php do_action( 'tribe_events_single_venue_before_the_meta' ) ?>

				<div class="venue-address">

					<?php if ( $full_address ) : ?>
					<address class="tribe-events-address">
						<span class="location">
							<?php echo $full_address; ?>
						</span>
					</address>
					<?php endif; ?>

					<?php if ( $telephone ): ?>
					<span class="tel">
						<?php echo $telephone; ?>
					</span>
					<?php endif; ?>

					<?php if ( $website_link ): ?>
					<span class="url">
						<?php echo $website_link; ?>
					</span>
					<?php endif; ?>

				</div><!-- .venue-address -->

				<?php do_action( 'tribe_events_single_venue_after_the_meta' ) ?>

			</div><!-- .venue-meta -->

			<!-- Venue Description -->
			<?php if ( get_the_content() ) : ?>
			<div class="venue-description">
				
				<?php the_content(); ?>
			
			</div>
			<?php endif; ?>

		</section><!-- .venue-content -->

		<!-- Upcoming event list -->
		<section class="venue-events-list">
			
			<?php echo tribe_venue_upcoming_events( $venue_id, $wp_query->query_vars ); ?>

		</section><!-- .venue-events-list -->
	
	</div><!-- .venue-content-container -->
	
	<div class="venue-footer-container">

		<footer class="venue-footer">

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

		</footer><!-- .venue-footer -->

	</div><!-- .venue-footer-container -->

</div><!--  -->

<?php endwhile; ?>