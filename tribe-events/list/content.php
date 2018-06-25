<?php
/**
 * List View Content Template
 * The content template for the list view. This template is also used for
 * the response that is returned on list view ajax requests.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/content.php
 *
 * @package TribeEventsCalendar
 * @version  4.3
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} ?>

<div id="tribe-events-content" class="events-list">

	<div class="events-list-container">

		<header class="events-list-header">

			<!-- List Title -->
			<h1 class="events-page-title"><?php echo tribe_get_events_title() ?></h1>

			<!-- Notices -->
			<?php tribe_the_notices() ?>
			
		</header><!-- .events-list-header -->

		<!-- Events Loop -->
		<?php if ( have_posts() ) : ?>
		<div class="events-loop">
			<?php do_action( 'tribe_events_before_loop' ); ?>
			<?php tribe_get_template_part( 'list/loop' ) ?>
			<?php do_action( 'tribe_events_after_loop' ); ?>
		</div><!-- .events-loop -->
		<?php endif; ?>

		<!-- List Footer -->
		<?php do_action( 'tribe_events_before_footer' ); ?>
		<div class="events-footer">

			<!-- Footer Navigation -->
			<?php do_action( 'tribe_events_before_footer_nav' ); ?>
			<?php tribe_get_template_part( 'list/nav', 'footer' ); ?>
			<?php do_action( 'tribe_events_after_footer_nav' ); ?>

		</div><!-- .events-footer -->
		
		<?php do_action( 'tribe_events_after_footer' ) ?>
	
	</div><!-- .events-list-container -->

</div><!-- #tribe-events-content .events-list .events-day -->