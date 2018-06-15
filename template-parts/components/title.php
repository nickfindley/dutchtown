<?php
if ( ! function_exists( 'dutchtown_title_component' ) ) :
    function dutchtown_title_component( $type = 'article', $tag = 'h2', $args = array() )
    {
        $defaults = array (
            'before_title'  => '',
            'after_title'   => ''
        );

        $args = wp_parse_args( $args, $defaults );

        $before_title   = $args['before_title'];
        $after_title    = $args['after_title'];
        $title          = '<' . $tag . '>' . $before_title . '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . get_the_title() . '</a>' . $after_title . '</' . $tag . '>';

        if ( has_post_thumbnail() )
        {
        ?>
            <div class="<?php echo $type; ?>-header-img">

                <?php dutchtown_post_thumbnail(); ?>

                <div class="<?php echo $type; ?>-title">
                
                    <?php echo $title; ?>
                
                </div>
            
            </div>
        <?php
        }
            
        else
        {
        ?>
            <div class="<?php echo $type; ?>-title">
                
                <?php echo $title; ?>
            
            </div>
        <?php
        }
    }
endif;

if ( ! function_exists( 'dutchtown_archive_title_component' ) ) :
    function dutchtown_archive_title_component( $type = 'page', $tag = 'h1', $args = array() )
    {
        $defaults = array (
            'before_title'  => '',
            'after_title'   => ''
        );

        $args = wp_parse_args( $args, $defaults );

        $before_title   = $args['before_title'];
        $after_title    = $args['after_title'];
        $title          = '<' . $tag . '>' . $before_title . get_the_archive_title() . $after_title . '</' . $tag . '>';

        if ( is_category() )
        {
            if ( category_image() )
            {
            ?>
                <header class="<?php echo $type; ?>-header <?php echo $type; ?>-has-img">
                
                    <div class="<?php echo $type; ?>-header-img">

                        <?php echo category_image(); ?>

                        <div class="<?php echo $type; ?>-title">
                        
                            <?php echo $title; ?>
                        
                        </div>
                    
                    </div>
                
                </header>
            <?php
            }
            
            else
            {
            ?>
                <header class="<?php echo $type; ?>-header <?php echo $type; ?>-has-no-img">
                
                    <div class="<?php echo $type; ?>-title">
                        
                        <?php echo $title; ?>
                    
                    </div>
                
                </header>
            <?php
            }
        }

        else
        {
        ?>
            <header class="<?php echo $type; ?>-header <?php echo $type; ?>-has-no-img">

                <div class="<?php echo $type; ?>-title">
                    
                    <?php echo $title; ?>
                
                </div>
            
            </header>
        <?php
        }
    }
endif;
?>