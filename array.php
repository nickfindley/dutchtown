<?php

$args = array (
    'var1' => 'replaced variable one',
    'var3' => array(
        'subvar1' => 'replaced sub var 1'
    )
);

function array_test( $args )
{
    $defaults = array (
        'var1' => 'variable one',
        'var2' => 'variable two',
        'var3' => array(
            'subvar1' => 'sub var one',
            'subvar2' => 'sub var two'
        )
    );

    $args = array_replace_recursive( $defaults, $args );

    echo '<pre>';
    print_r( $args );
    echo '</pre>';
}

array_test( $args );

echo '<hr>';

$args = array(
    'before_list'   => 'Before text',
    'after_list'    => 'after text',
    'count_args'    => array(
        'term_singular' => 'response',
        'term_plural'   => 'responses'
    )
);

function get_comment_link( $args = array() )
{	
    $defaults = array(
        'before_list'	=> '',
        'after_list'	=> '',
        'before_form'	=> '',
        'after_form'	=> '',
        'list_or_form'	=> 'both',
        'separator'		=> '',
        'count_args'	=> array(
            'show_zero'		=> false,
            'term_singular'	=> 'comment',
            'term_plural'	=> 'comments',
            'cap'			=> false,
            'there'			=> false,
            'phrase'		=> true,
            'max'			=> 20,
            'before_output'	=> '',
            'after_output'	=> '',
            'before_phrase'	=> '<a href="#comments">',
            'after_phrase'	=> '</a>'
        )
    );

    $args = array_replace_recursive( $defaults, $args );

    return $args;
}

echo '<pre>get_comment_link():';
print_r( $args );
echo '</pre>';

function comment_link( $args = array() )
{
    $args = get_comment_link( $args );

    echo '<pre>comment_link():';
    print_r( $args );
    echo '</pre>';
}

comment_link( $args );
?>