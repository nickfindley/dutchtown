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

<div class="events-day-time-slot">

<?php while ( have_posts() ) : the_post(); ?>
	
	<?php do_action( 'tribe_events_inside_before_loop' ); ?>

	<?php if ( $current_timeslot != $post->timeslot ) : $current_timeslot = $post->timeslot; ?>

</div><!-- .events-day-time-slot -->

	<?php $has_img = ( has_post_thumbnail() ) ? 'article-has-img' : 'article-has-no-img'; ?>

<div class="events-day-time-slot">
	
	<h5><?php echo $current_timeslot; ?></h5>
	<?php endif; ?>

	<?php
		$event_type = tribe( 'tec.featured_events' )->is_featured( $post->ID ) ? 'featured' : 'event';

		/**
		 * Filters the event type used when selecting a template to render
		 *
		 * @param $event_type
		 */
		$event_type = apply_filters( 'tribe_events_day_view_event_type', $event_type );

		tribe_get_template_part( 'day/single', $event_type );
	?>

	<?php do_action( 'tribe_events_inside_after_loop' ); ?>

<?php endwhile; ?>

</div><!-- .events-day-time-slot -->