<?php
/**
 * Template part for displaying archives
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
            
            <ul>
            <?php
                if ( tribe_is_event() )
                {
                    dutchtown_event_date( array(
                        'before_event_date'	=> '<li><i class="fas fa-fw fa-calendar"></i> Event on ',
                        'after_event_date'	=> '</li> '
                        )
                    );
                }
                else
                {
                    dutchtown_posted_on( array(
                        'before_posted_on'	=> '<li><i class="fas fa-fw fa-bookmark"></i> Posted on ',
                        'after_posted_on'	=> '</li> '
                        )
                    );
                }

                dutchtown_comment_link( array(
                    'before_list'	=> '<li class="cap"><i class="fas fa-fw fa-comments"></i> ',
                    'after_list'	=> '</li> ',
                    'list_or_form'  => 'list',
                    'count_args'	=> array(
                        'cap'		=> true,
                        'there'		=> false
                        )
                    )
                );
            ?>
            </ul>
        
        </div><!-- .article-posted -->

    </header><!-- .article-header -->

	<section class="article-content">
		<?php
			the_excerpt( sprintf(
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

	<footer class="article-footer">
		
		<p>
        <?php
            dutchtown_updated_on( array(
                'before_updated_on' => 'This post was updated on ',
                'after_updated_on'  => '. '
                )
            );
            if ( tribe_is_event() )
            {
                dutchtown_oxford_categories( array(
                    'before_categories'    => 'View more ',
                    'after_categories'     => ' events.'
                    )
                );
            }
            else
            {
                dutchtown_oxford_categories( array(
                    'before_categories'     => 'Read more news about ',
                    'after_categories'      => '.'
                    )
                );
            }
        ?></p>

		
	
	</footer><!-- .article-footer -->

</article><!-- #post-<?php the_ID(); ?> -->