<?php
/**
 * Single Event Meta (Venue) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/venue.php
 *
 * @package TribeEventsCalendar
 */

if ( ! tribe_get_venue_id() ) {
	return;
}

$phone   = tribe_get_phone();
$website = tribe_get_venue_website_url();
$website_parse = parse_url( $website );
$website_host = str_ireplace('www.', '', parse_url($website, PHP_URL_HOST));
?>

	<h3 class="tribe-events-single-section-title"><?php echo tribe_get_venue() ?></h3>
	<dl class="tribe-events-venue">
		<?php do_action( 'tribe_events_single_meta_venue_section_start' ) ?>

		<?php if ( tribe_address_exists() ) : ?>
			<dt><i class="fas fa-fw fa-map-marker-alt"></i> Address</dt>
			<dd class="tribe-venue-location">
				<address class="tribe-events-address">
					<?php echo tribe_get_full_address(); ?>

					<?php if ( tribe_show_google_map_link() ) : ?>
						<?php echo '<br>' . tribe_get_map_link_html(); ?>
					<?php endif; ?>
				</address>
			</dd>
		<?php endif; ?>

		<?php if ( ! empty( $phone ) ): ?>
			<dt><i class="fas fa-fw fa-phone-square"></i>  <?php esc_html_e( 'Phone', 'the-events-calendar' ) ?> </dt>
			<dd class="tribe-venue-tel"> <?php echo $phone ?> </dd>
		<?php endif ?>

		<?php if ( ! empty( $website ) ): ?>
			<dt><i class="fas fa-fw fa-external-link-square-alt"></i>  <?php esc_html_e( 'Website', 'the-events-calendar' ) ?> </dt>
			<dd class="url"><a href="<?php echo $website; ?>"><?php echo $website_host; ?></a></dd>
		<?php endif ?>

		<?php do_action( 'tribe_events_single_meta_venue_section_end' ) ?>
	</dl>
