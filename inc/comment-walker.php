<?php
//  http://justintadlock.com/archives/2016/11/16/designing-better-nested-comments
//  Create a link to the parent comment.
if ( ! function_exists ( 'dutchtown_comment_parent_link' ) ) :
    function dutchtown_comment_parent_link( $args = array() ) 
    {

        echo dutchtown_get_comment_parent_link( $args );
    }
endif;

if ( ! function_exists( 'dutchtown_get_comment_parent_link' ) ) :
    function dutchtown_get_comment_parent_link( $args = array() )
    {

        $link = '';

        $defaults = array(
            'text'   => '%s', // Defaults to comment author.
            'depth'  => 2,    // At what level should the link show.
            'before' => '',   // String to output before link.
            'after'  => ''    // String to output after link.
        );

        $args = wp_parse_args( $args, $defaults );

        if ( $args['depth'] <= $GLOBALS['comment_depth'] ) {

            $parent = get_comment()->comment_parent;

            if ( 0 < $parent ) {

                $url  = esc_url( get_comment_link( $parent ) );
                $text = sprintf( $args['text'], get_comment_author( $parent ) );

                $link = sprintf( '%s<a class="comment-parent-link" href="%s">%s</a>%s', $args['before'], $url, $text, $args['after'] );
            }
        }

        return $link;
    }
endif;

//  Custom comment walker to output comments in <dl> tags
//	https://gist.github.com/georgiecel/9445357

class Dutchtown_Walker_Comment extends Walker_Comment
{
	var $tree_type = 'comment';
	var $db_fields = array( 'parent' => 'comment_parent', 'id' => 'comment_ID' );
 
	// constructor – wrapper for the comments list
	function __construct()
	{
		if ( $args['style'] = 'ol-article' || $args['style'] = 'ol' )
		{
			?><ol class="comments-list"><?php
		}
		else if ( $args['style'] = 'ul-article' || $args['style'] = 'ul' )
		{
			?><ul class="comments-list"><?php
		}
	}

	// start_lvl – wrapper for child comments list
	function start_lvl( &$output, $depth = 0, $args = array() )
	{
		$GLOBALS['comment_depth'] = $depth + 2;
		
		if ( 'ol-article' == $args['style'] || 'ol' == $args['style'] )
		{
			?><ol class="comments-child"><?php
		}
		else if ( 'ul-article' == $args['style'] || 'ul' == $args['style'] )
		{
			?><ul class="comments-child"><?php
		}
	}
	
	// end_lvl – closing wrapper for child comments list
	function end_lvl( &$output, $depth = 0, $args = array() )
	{
		$GLOBALS['comment_depth'] = $depth + 2;

		if ( 'ol-article' == $args['style'] || 'ol' == $args['style'] )
		{
			?></ol><?php
		}
		else if ( 'ul-article' == $args['style'] || 'ul' == $args['style'] )
		{
			?></ul><?php
		}
	}

	// start_el – HTML for comment template
	function start_el( &$output, $comment, $depth = 0, $args = array(), $id = 0 )
	{
		$depth++;
		$GLOBALS['comment_depth'] = $depth;
		$GLOBALS['comment'] = $comment;
		$parent_class = ( empty( $args['has_children'] ) ? '' : 'parent' ); 

		if ( 'ol-article' == $args['style'] || 'ol' == $args['style'] )
		{
			$tag = 'ol';
			$add_below = 'comment';
		}
		else if ( 'ul-article' == $args['style'] || 'ul' == $args['style'] )
		{
			$tag = 'ul';
			$add_below = 'comment';
		}?>

		<li <?php comment_class(empty( $args['has_children'] ) ? '' :'parent') ?> id="comment-<?php comment_ID() ?>" itemprop="comment" itemscope itemtype="http://schema.org/Comment">
			<?php
			if ( $args['style'] == 'ul-article' || $args['style'] = 'ol-article' )
			{
				?><article><?php
			} ?>
				<header class="comment-header">
					<h4>
						<i class="fas fa-fw fa-comment fa-flip-horizontal"></i> 
						<?php if ( get_comment_author_url() !== '' ) : ?>
						<a class="comment-author-link" href="<?php comment_author_url(); ?>" itemprop="author">
						<?php comment_author(); ?>
						</a>
						<?php else : ?>
						<?php comment_author(); ?>
						<?php endif; ?> 
						on <time class="comment-meta-item" datetime="<?php comment_date('Y-m-d') ?>T<?php comment_time('H:iP') ?>" itemprop="datePublished"><a href="#comment-<?php comment_ID() ?>" itemprop="url" title="Permanent link to this comment"><?php comment_date('F jS, Y \a\t g:ia') ?></a></time> <?php edit_comment_link( __( '(Edit this comment)', 'dutchtown' ) ); ?>
					</h4>

					<?php dutchtown_comment_parent_link( array(
						'before'	=> '<p class="comment-in-reply-to"><i class="fas fa-fw fa-reply fa-flip-horizontal fa-flip-vertical reply-icon"></i> ',
						'after'		=> '</p>',
						'text'		=> 'In reply to %s&apos;s comment'
						)
					); ?>
				</header>

				<section class="comment-content post-content" itemprop="text">
				<?php
					if ( $comment->comment_approved == '0' ) :
						?><p class="comment-awaiting-moderation">This comment is awaiting moderation.</p><?php
					else : 
						comment_text();
					endif;
				?>
				</section>

				<?php if ( $comment->comment_approved == '1' ) : ?>
				<footer class="comment-footer">
					<p>
					<?php comment_reply_link( array_merge( $args, array(
						'add_below'		=> $add_below,
						'before'		=> '<i class="fas fa-reply reply-icon"></i> ',
						'reply_text'	=> 'Reply to this comment',
						'depth'			=> $depth,
						'max_depth' 	=> $args['max_depth']
						)
					)); ?>
					</p>
				</footer>
				<?php endif; ?>
				
			<?php if ( $args['style'] == 'ul-article' || $args['style'] = 'ol-article' ) : ?>
			</article>
			<?php endif;
	}

	// end_el – closing HTML for comment template
	function end_el(&$output, $comment, $depth = 0, $args = array() )
	{
		?></li><?php
	}

	// destructor – closing wrapper for the comments list
	function __destruct()
	{
		if ( 'ol-article' == $args['style'] || 'ol' == $args['style'] )
		{
			?></ol><?php
		}
		else if ( 'ul-article' == $args['style'] || 'ul' == $args['style'] )
		{
			?></ul><?php
		} 
	}
}
?>