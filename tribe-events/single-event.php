<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 * @version 4.6.3
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_singular = tribe_get_event_label_singular();
$events_label_plural   = tribe_get_event_label_plural();

$event_id = get_the_ID();

?>

<div class="post-container">
		
	<main class="post-main">

		<article id="post-<?php the_ID(); ?>" class="<?php if ( has_post_thumbnail() ) : ?>article-has-img<?php else : ?>article-has-no-img<?php endif; ?>">
			
			<header class="article-header"> 

			<?php if ( has_post_thumbnail($event_id) ) : ?>
				<div class="article-header-img">   
			
					<?php echo tribe_event_featured_image( $event_id, 'full', false ); ?>
			
					<div class="article-title">
						<?php the_title( '<h1><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' ); ?>
					</div><!-- .article-title -->
				
				</div><!-- .article-header-img -->
			<?php else: ?>
				<div class="article-title">
				<?php the_title( '<h1><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' ); ?>
				</div><!-- .article-title -->
			<?php endif; ?>
			
				<div class="article-posted-container">
					
					<div class="article-posted">
						
						<ul class="fa-ul tribe-event-details">
						<?php
							echo tribe_events_event_schedule_details( $event_id, '<li><span class="fa-li"><i class="fas fa-fw fa-clock"></i></span> ', '</li>' );
							
							if ( tribe_get_cost() ) :
								?><li><span class="fa-li"><i class="fas fa-fw fa-money-bill-alt"></i></span> <?php echo tribe_get_cost( null, true ) ?></li><?php
							endif;
						?>
						</ul>
					
					</div><!-- .article-posted -->
				
				</div><!-- .article-posted-container -->
			
			</header><!-- .article-header -->

			<div class="article-content-container">

				<section class="article-content">

					<?php tribe_the_notices() ?>

					<!-- Event content -->
					<?php while ( have_posts() ) :  the_post(); ?>
						<?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
						<div class="tribe-events-single-event-description tribe-events-content">
							<?php the_content(); ?>
						</div>
						<!-- .tribe-events-single-event-description -->
						<?php do_action( 'tribe_events_single_event_after_the_content' ) ?>

						<!-- Event meta -->
						<?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>
						<?php tribe_get_template_part( 'modules/meta' ); ?>
						<?php do_action( 'tribe_events_single_event_after_the_meta' ) ?>
					<?php endwhile; ?>

				</section><!-- .article-content -->
			
			</div><!-- .article-content-container -->

			<div class="article-footer-container">

				<footer class="article-footer">
					
					<p>
					<?php
						if ( function_exists('yoast_breadcrumb') ) {
							yoast_breadcrumb();
							echo '<br>';
						}
						dutchtown_updated_on( array(
							'before_updated_on'	=> 'This event was updated on ',
							'after_updated_on'	=> '. '
							)
						);
						dutchtown_oxford_categories( array(
							'before_categories'	=> 'See more ',
							'after_categories'	=> ' events.'
						));
					?>
					</p>

				</footer><!-- .article-footer -->

				<nav class="article-nav">

					<ul>
					

						<li class="article-nav-previous">
							<i class="fa fa-arrow-circle-left"></i> <span>Previous event</span><br><?php tribe_the_prev_event_link( '%title%' ) ?>
						</li>
						<li class="article-nav-next">
							<span>Next event </span><i class="fa fa-arrow-circle-right"></i><br><?php tribe_the_next_event_link( '%title%' ) ?>
						</li>
					</ul>
					
				</nav>
			
			</div><!-- .article-footer-container -->

		</article><!-- #post-<?php the_ID(); ?> -->
	
	</main><!-- .post-main -->
	
</div><!-- .post-container -->
