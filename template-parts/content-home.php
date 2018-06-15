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

    <?php dutchtown_title_component(); ?>
    
		<div class="article-posted">
			
			<ul><?php
				dutchtown_posted_on( array(
					'before_posted_on'	=> '<li><i class="fas fa-fw fa-bookmark"></i> Posted on ',
					'after_posted_on'	=> '</li> '
					)
				);
				dutchtown_byline( array(
					'before_byline' => '<li><i class="fas fa-fw fa-user"></i> By ',
					'after_byline'	=> '</li> '
					)
				);
				dutchtown_comment_link( array(
					'before_list'	=> '<li class="cap"><i class="fas fa-fw fa-comments"></i> ',
					'after_list'	=> '</li> ',
					'before_form'	=> '<li><i class="fas fa-fw fa-flip-horizontal fa-comment-alt"></i> ',
					'after_form'	=> '</li>',
					'count_args'	=> array(
						'cap'		=> true,
						'there'		=> false
						)
					)
				);
			?></ul>
		
		</div>
    
    </header><!-- .article-header -->

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

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'dutchtown' ),
				'after'  => '</div>',
			) );
		?>
	</section><!-- .article-content -->

	<footer class="article-footer">
		
		<p>
		<?php
			dutchtown_updated_on( array(
				'before_updated_on'	=> 'This post was updated on ',
				'after_updated_on'	=> '. '
			));
			dutchtown_oxford_categories( array(
				'before_categories'	=> 'Read more news about ',
				'after_categories'	=> '.'
			));
		?>
		</p>	
	
	</footer><!-- .article-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
