<?php
/**
 * List View Single Event
 * This file contains one event in the list view
 *
 * @version 4.6.3
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$venue_details = tribe_get_venue_details();
$venue_address = tribe_get_address();
$has_venue_address = ( ! empty( $venue_details['address'] ) ) ? ' location' : '';
$organizer = tribe_get_organizer();

if ( has_post_thumbnail() ) :
	$has_img = 'article-has-img';
else :
	$has_img = 'article-has-no-img';
endif;
?>

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

	<header class="article-header">

	<?php if ( has_post_thumbnail() ) : ?>
		<div class="article-header-img">
			<?php dutchtown_post_thumbnail(); ?>
			
			<div class="article-title">
				<h2><a class="url" href="<?php echo esc_url( tribe_get_event_link() ); ?>" title="<?php the_title_attribute() ?>" rel="bookmark">
					<?php the_title() ?>
				</a></h2>
			</div>
		</div>
	
	<?php else: ?>

		<h2 class="article-title">
			<a class="url" href="<?php echo esc_url( tribe_get_event_link() ); ?>" title="<?php the_title_attribute() ?>" rel="bookmark">
				<?php the_title() ?>
			</a>
		</h2>

	<?php endif; ?>

		<!-- Event Meta -->
		<?php do_action( 'tribe_events_before_the_meta' ) ?>
		
		<div class="article-meta <?php echo esc_attr( $has_venue . $has_venue_address ); ?>">

			<!-- Schedule & Recurrence Details -->
			<div class="tribe-updated published time-details">
				
				<?php echo tribe_events_event_schedule_details(); ?>
			
			</div>

			<?php if ( $venue_details ) : ?>
				
			<!-- Venue Display Info -->
			<div class="article-venue-details">
			
			<?php
				$address_delimiter = empty( $venue_address ) ? ' ' : ', ';

				// These details are already escaped in various ways earlier in the code.
				echo implode( $address_delimiter, $venue_details );
			?>
			
			</div> <!-- .article-venue-details -->

			<?php endif; ?>

		</div><!-- .article-meta -->

		<?php if ( tribe_get_cost() ) : ?>
			
		<div class="article-cost">
			
			<span class="ticket-cost"><?php echo tribe_get_cost( null, true ); ?></span>
			<?php
			/** This action is documented in the-events-calendar/src/views/list/single-event.php */
			do_action( 'tribe_events_inside_cost' )
			?>
			
		</div>

		<?php endif; ?>

		<?php do_action( 'tribe_events_after_the_meta' ) ?>

	</header><!-- .article-header -->


	<!-- Event Content -->
	<?php do_action( 'tribe_events_before_the_content' ) ?>
	<div class="events-list-content">
		<?php echo get_the_excerpt(); ?>
	</div><!-- .events-list-content -->
	
	<?php do_action( 'tribe_events_after_the_content' ); ?>

</article>