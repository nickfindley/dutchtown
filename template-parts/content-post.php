<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dutchtown
 */

?>

<article id="post-<?php the_ID(); ?>" class="<?php if ( has_post_thumbnail() ) : ?>article-has-img<?php else : ?>article-has-no-img<?php endif; ?>">
    
    <header class="article-header">

    <?php if ( has_post_thumbnail() ) : ?>
        <div class="article-header-img">   
    
            <?php dutchtown_post_thumbnail(); ?>
    
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
				
				<ul class="fa-ul">
					<?php
						dutchtown_posted_on( array(
							'before_posted_on'	=> '<li><span class="fa-li"><i class="fas fa-fw fa-bookmark"></i></span>Posted on ',
							'after_posted_on'	=> '</li>'
							)
						); ?>
					
					<?php
						dutchtown_byline( array(
							'before_byline'	=> '<li><span class="fa-li"><i class="fas fa-fw fa-user"></i></span>Written by ',
							'after_byline'	=> '</li>'
							)
						); ?>
					
					<?php
						dutchtown_comment_link( array(
							'before_list'	=> '<li><span class="fa-li"><i class="fas fa-fw fa-comments"></i></span>',
							'after_list'	=> '</li>',
							'before_form'	=> '<li><span class="fa-li"><i class="fas fa-fw fa-flip-horizontal fa-comment-alt"></i></span>',
							'after_form'	=> '</li>',
							'list_or_form'	=> 'both',
							'count_args'	=> array(
								'show_zero'	=> false
								)
							)
						);
					?>
				</ul>
			
			</div><!-- .article-posted -->
		
		</div><!-- .article-posted-container -->
    
    </header><!-- .article-header -->

	<div class="article-content-container">

		<section class="article-content">
			<?php
				the_content( sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'dutchtown' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				) );
			?>
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
					'before_updated_on'	=> 'This post was updated on ',
					'after_updated_on'	=> '. '
					)
				);
				dutchtown_oxford_categories( array(
					'before_categories'	=> 'Read more news about ',
					'after_categories'	=> '.'
				));
			?>
			</p>

		</footer><!-- .article-footer -->

		<nav class="article-nav">

			<ul>
			<?php
				previous_post_link( '<li class="article-nav-previous"><i class="fa fa-arrow-circle-left"></i> Previous post<br>%link</li>' );

				next_post_link( '<li class="article-nav-next">Next post <i class="fa fa-arrow-circle-right"></i><br>%link</li>' );
			?>
			</ul>
			
		</nav>
	
	</div><!-- .article-footer-container -->

</article><!-- #post-<?php the_ID(); ?> -->
