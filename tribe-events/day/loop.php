<?php
/**
 * Day View Loop
 * This file sets up the structure for the day loop
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/loop.php
 *
 * @version 4.4
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} ?>

<?php

global $more, $post, $wp_query;
$more = false;
$current_timeslot = null;

?>

<div id="tribe-events-day" class="tribe-events-loop">
	
	<div class="tribe-events-day-time-slot">

	<?php while ( have_posts() ) : the_post(); ?>
		<?php do_action( 'tribe_events_inside_before_loop' ); ?>

		<?php 
			if ( $current_timeslot != $post->timeslot ) : $current_timeslot = $post->timeslot; 

			$has_img = ( has_post_thumbnail() ) ? 'article-has-img' : 'article-has-no-img';
		?>
	
	</div>
	<!-- .tribe-events-day-time-slot -->

	<div class="tribe-events-day-time-slot">
		
		<h5><?php echo $current_timeslot; ?></h5>
		<?php endif; ?>

		<!-- Event  -->
		<article id="post-<?php the_ID() ?>" class="<?php tribe_events_event_classes(); echo ' ' . $has_img; ?>">
			
		<?php
		$venue_details = tribe_get_venue_details();

		// Venue microformats
		$has_venue         = ( $venue_details ) ? ' vcard' : '';
		$has_venue_address = ( ! empty( $venue_details['address'] ) ) ? ' location' : '';

		// The address string via tribe_get_venue_details will often be populated even when there's
		// no address, so let's get the address string on its own for a couple of checks below.
		$venue_address = tribe_get_address();
		?>

			<header class="tribe-events-list-event-header">

				<!-- Event Image -->
				<?php echo tribe_event_featured_image( null, 'large' ); ?>

				<!-- Event Title -->
				<?php do_action( 'tribe_events_before_the_event_title' ) ?>
				
				<h2 class="tribe-events-list-event-title summary">
					<a class="url" href="<?php echo esc_url( tribe_get_event_link() ); ?>" title="<?php the_title_attribute() ?>" rel="bookmark">
						<?php the_title() ?>
					</a>
				</h2>
				
				<?php do_action( 'tribe_events_after_the_event_title' ) ?>

				<!-- Event Meta -->
				<?php do_action( 'tribe_events_before_the_meta' ) ?>
				
				<div class="tribe-events-list-event-meta <?php echo esc_attr( $has_venue . $has_venue_address ); ?>">

					<!-- Schedule & Recurrence Details -->
					<div class="tribe-updated published time-details">
						
						<?php echo tribe_events_event_schedule_details(); ?>
					
					</div>

					<?php if ( $venue_details ) : ?>
						
					<!-- Venue Display Info -->
					<div class="tribe-events-venue-details">
					
					<?php
						$address_delimiter = empty( $venue_address ) ? ' ' : ', ';

						// These details are already escaped in various ways earlier in the code.
						echo implode( $address_delimiter, $venue_details );
					?>
					
					</div> <!-- .tribe-events-venue-details -->

					<?php endif; ?>

				</div><!-- .tribe-events-list-event-meta -->

				<?php if ( tribe_get_cost() ) : ?>
					
				<div class="tribe-events-event-cost">
					
					<span class="ticket-cost"><?php echo tribe_get_cost( null, true ); ?></span>
					<?php
					/** This action is documented in the-events-calendar/src/views/list/single-event.php */
					do_action( 'tribe_events_inside_cost' )
					?>
					
				</div>

				<?php endif; ?>

				<?php do_action( 'tribe_events_after_the_meta' ) ?>

			</div><!-- .tribe-events-list-event-header -->


			<!-- Event Content -->
			<?php do_action( 'tribe_events_before_the_content' ) ?>
			<div class="tribe-events-list-event-description tribe-events-content description entry-summary">
				<?php echo get_the_excerpt(); ?>
			</div><!-- .tribe-events-list-event-description -->
			
			<?php do_action( 'tribe_events_after_the_content' ); ?>

		</div>

		<?php do_action( 'tribe_events_inside_after_loop' ); ?>

	<?php endwhile; ?>

	</article>
	
	<!-- .tribe-events-day-time-slot -->

</div><!-- .tribe-events-loop -->
