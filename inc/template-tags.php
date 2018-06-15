<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Dutchtown
 */

if ( ! function_exists( 'dutchtown_posted_on' ) ) :
	/**
	 * Prints original post date wrapped in a permalink.
	 */
	function dutchtown_posted_on( $args = array() )
	{
		$defaults = array(
			'before_posted_on'	=> '',
			'after_posted_on'	=> ''
		);

		$args = wp_parse_args( $args, $defaults );

		$time_string = '<time datetime="%1$s">%2$s</time>';
		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( '%s', 'post date', 'dutchtown' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo  $args['before_posted_on'] . $posted_on. $args['after_posted_on'];
	}
endif;

if ( ! function_exists( 'dutchtown_updated_on' ) ) : 
	/**
	 * Prints date of most recent update to post.
	 */
	function dutchtown_updated_on( $args = array() )
	{
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) )
		{
			$defaults = array(
				'before_updated_on'	=> '',
				'after_updated_on'	=> ''
			);

			$args = wp_parse_args( $args, $defaults );

			$time_string = '<time class="updated" datetime="%1$s">%2$s</time>';

			$time_string = sprintf( $time_string,
				esc_attr( get_the_modified_date( 'c' ) ),
				esc_html( get_the_modified_date() )
			);

			$updated_on = sprintf(
				/* translators: %s: post date. */
				esc_html_x( '%s', 'post date', 'dutchtown' ), $time_string
			);

			echo $args['before_updated_on'] . $updated_on . $args['after_updated_on'];
		}
	}
endif;

if ( ! function_exists( 'dutchtown_event_date' ) ) :
	/**
	 * Prints start date of event from Modern Tribe events calendar wrapped in a permalink.
	 */
	function dutchtown_event_date( $args = array() )
	{
		$defaults = array(
			'before_event_date'	=> '',
			'after_event_date'	=> ''
		);

		$args = wp_parse_args( $args, $defaults );

		$time_string = '<time datetime="%1$s">%2$s</time>';
		$time_string = sprintf( $time_string,
			esc_attr( tribe_get_start_date( 'c' ) ),
			esc_html( tribe_get_start_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( '%s', 'post date', 'dutchtown' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo  $args['before_event_date'] . $posted_on. $args['after_event_date'];
	}
endif;

if ( ! function_exists( 'dutchtown_byline') ) :
	/**
	 * Prints author's public display name wrapped ina a link to author archive.
	 */
	function dutchtown_byline( $args = array() )
	{
		$defaults = array(
			'before_byline'	=> '',
			'after_byline'	=> ''
		);

		$args = wp_parse_args( $args, $defaults );

		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( '%s', 'post author', 'dutchtown' ),
			$args['before_byline'] . '<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>' . $args['after_byline']
		);

		echo $byline;
	}
endif;

if ( ! function_exists ( 'dutchtown_get_comment_count' ) ) :
	/**
	 * Returns the number of comments as a word or phrase.
	 * Default output: '[number] comments'
	 * Options:
	 * 	$show_zero: echo the string even if there are no comments
	 * 	$term_singular: the word for one comment (reply, response, etc.)
	 *	$term_plural: the word for multiple comments (replies, responses, etc.)
	 * 	$cap: capitalize the first letter of the string, default false
	 *	$there: include 'there is/there are' before the number
	 *	$phrase: return a phrase ('one comment') or just the number ('one')
	 *	$max: the highest number to convert to a word
	 *	$before: text/HTML to echo before the phrase
	 *	$before: text/HTML to echo after the phrase
	 */
	
	function dutchtown_get_comment_count( $args = array() )
	{
		$defaults = array(
			'show_zero'		=> false,
			'term_singular'	=> 'comment',
			'term_plural'	=> 'comments',
			'cap'			=> false,
			'there'			=> false,
			'phrase'		=> true,
			'max'			=> 20,
			'before_output'	=> '',
			'after_output'	=> '',
			'before_phrase'	=> '',
			'after_phrase'	=> ''
		);

		$args = wp_parse_args( $args, $defaults );

		$count = get_comments_number();

		if ( $count == 1 )
		{
			$count_print = 'one';
			$count_phrase = 'one ' . $args['term_singular'];
			$count_there = 'there is';
		}
		else if ( $count == 0 || $count > 1 && $count <= $args['max'] )
		{	
			require get_template_directory() . '/inc/numbers-to-words.php';
			$nw = new NumbersToWords();
			$count_print = $nw->convert($count);
			$count_phrase = $count_print . ' ' . $args['term_plural'];
			$count_there = 'there are';
		}
		else
		{
			$count_print = $count;
			$count_phrase = $count . ' ' . $args['term_plural'];
			$count_there = 'there are';
		}

		if ( $args['phrase'] == true )
		{
			$output = $args['before_phrase'] . $count_phrase . $args['after_phrase'];
		}
		else
		{
			$output = $args['before_phrase'] . $count_print . $args['after_phrase'];
		}

		if ( $args['there'] == true )
		{
			$output = $count_there . ' ' . $output;
		}

		if ( $args['cap'] == true )
		{
			$stripped = strip_tags( $output );
			$capped = ucfirst( $stripped );
			$output = str_replace( $stripped, $capped, $output );
		}

		if ( $count > 0 )
		{
			return $args['before_output'] . $output . $args['after_output'];
		}
		else if ( $count == 0 )
		{
			if ( $args['show_zero'] == true && comments_open() )
			{
				return $args['before_output'] . $output . $args['after_output'];
			}
		}
		else
		{
			return;
		}
	}
endif;

if ( ! function_exists ( 'dutchtown_comment_count' ) ) :
	function dutchtown_comment_count( $args = array() )
	{
		echo dutchtown_get_comment_count( $args );
	}
endif;

if ( ! function_exists( 'dutchtown_get_comment_link_args' ) ) :
	function dutchtown_get_comment_link_args( $args = array() )
	{	
		$defaults = array(
			'before_list'	=> '',
			'after_list'	=> '',
			'before_form'	=> '',
			'after_form'	=> '',
			'list_or_form'	=> 'both',
			'separator'		=> '',
			'list_output'	=> '',
			'form_output'	=> '',
			'count_args'	=> array(
				'show_zero'		=> false,
				'term_singular'	=> 'comment',
				'term_plural'	=> 'comments',
				'cap'			=> true,
				'there'			=> false,
				'phrase'		=> true,
				'max'			=> 20,
				'before_output'	=> '',
				'after_output'	=> '',
				'before_phrase'	=> '<a href="' . get_the_permalink() . '#comments">',
				'after_phrase'	=> '</a>'
			)
		);

		$args = array_replace_recursive( $defaults, $args );
		return $args;
	}
endif;

if ( ! function_exists( 'dutchtown_get_comment_link' ) ) :
	function dutchtown_get_comment_link ( $args = array() )
	{
		$count = get_comments_number();

		if ( $count > 0 || $args['show_zero'] == true )
		{
			$args = dutchtown_get_comment_link_args( $args );
			
			$list_link = dutchtown_get_comment_count( $args['count_args'] );
			$list_output = $args['before_list'] . $list_link . $args['after_list'];

			if ( comments_open() )
			{
				$form_link = '<a href="#leave-comment">Leave a comment</a>';
				$form_output = $args['before_form'] . $form_link . $args['after_form'];
			}

			if ( $args['list_or_form'] == 'both' )
			{
				$output = $list_output . $args['separator'] . $form_output;
			}
			else if ( $args['list_or_form'] == 'list' )
			{
				$output = $list_output;
			}
			else if ( $args['list_or_form'] == 'form' )
			{
				$output = $form_output;
			}

			return $output;
		}
	}
endif;

if ( ! function_exists ( 'dutchtown_comment_link' ) ) :
	function dutchtown_comment_link( $args )
	{
		echo dutchtown_get_comment_link( $args );
	}
endif;

if ( ! function_exists( 'dutchtown_oxford_categories' ) ) :
	/**
	 * Prints list of categories with links, comma separated,
	 * and with ', and' as the final separator.
	 */
	function dutchtown_oxford_categories( $args = array() )
	{
		$defaults = array(
			'before_categories'		=> '',
			'after_categories'		=> '',
			'before_link'			=> '',
			'after_link'			=> '',
		);

		$args = wp_parse_args( $args, $defaults );

		if ( tribe_is_event() )
		{
			$cats = get_the_terms( get_the_ID(), 'tribe_events_cat' );	
		}
		else
		{
			$cats = get_the_category();
		}
		
		for ( $i = 0; $i < count($cats); $i++ )
		{
			$output[$i] = $args['before_link'] . '<a href="'.get_term_link( $cats[$i]->term_id).'">'.$cats[$i]->name.'</a>' . $args['after_link'];
		}

		echo $args['before_categories'] . wp_sprintf_l('%l', $output) . $args['after_categories'];
	}
endif;

if ( ! function_exists( 'dutchtown_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function dutchtown_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
		?>

			<?php the_post_thumbnail(); ?>

		<?php else : ?>

			<a href="<?php the_permalink(); ?>" aria-hidden="true">
			<?php
				the_post_thumbnail( 'post-thumbnail', array(
					'alt' => the_title_attribute( array(
						'echo' => false,
					) ),
				) );
			?>
			</a>

		<?php endif; // End is_singular().
	}
endif;

//	Title component
require get_template_directory() . '/template-parts/components/title.php';
?>