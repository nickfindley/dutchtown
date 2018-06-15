<?php
/**
 * Single Event Meta (Organizer) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/organizer.php
 *
 * @package TribeEventsCalendar
 * @version 4.4
 */

$organizer_ids = tribe_get_organizer_ids();
$multiple = count( $organizer_ids ) > 1;

$phone = tribe_get_organizer_phone();
$email = tribe_get_organizer_email();
$website = tribe_get_organizer_website_url();
$website_parse = parse_url( $website );
$website_host = str_ireplace('www.', '', parse_url($website, PHP_URL_HOST));
?>


	<dl class="tribe-events-organizer">
		<dt>&nbsp;</dt><dd></dd>
		<?php
		do_action( 'tribe_events_single_meta_organizer_section_start' );

		foreach ( $organizer_ids as $organizer ) {
			if ( ! $organizer ) {
				continue;
			}

			?>
			<dt><i class="fas fa-fw fa-users"></i> Organizer</dt>
			<dd class="tribe-organizer">
				<?php echo tribe_get_organizer_link( $organizer ) ?>
			</dd>
			<?php
		}

		if ( ! $multiple ) { // only show organizer details if there is one
			if ( ! empty( $phone ) ) {
				?>
				<dt><i class="fas fa-fw fa-phone-square"></i> <?php esc_html_e( 'Phone', 'the-events-calendar' ) ?></dt>
				<dd class="tribe-organizer-tel">
					<?php echo esc_html( $phone ); ?>
				</dd>
				<?php
			}//end if

			if ( ! empty( $email ) ) {
				?>
				<dt><i class="fas fa-fw fa-envelope"></i> <?php esc_html_e( 'Email', 'the-events-calendar' ) ?>
				</dt>
				<dd class="tribe-organizer-email">
					<?php echo esc_html( $email ); ?>
				</dd>
				<?php
			}//end if

			if ( ! empty( $website ) ) {
				?>
				<dt><i class="fas fa-fw fa-external-link-square-alt"></i> <?php esc_html_e( 'Website', 'the-events-calendar' ) ?>
				</dt>
				<dd class="tribe-organizer-url">
					<a href="<?php echo $website; ?>"><?php echo $website_host; ?></a
				</dd>
				<?php
			}//end if
		}//end if

		do_action( 'tribe_events_single_meta_organizer_section_end' );
		?>
	</dl>
