<section class="front-news">
    <header class="section-header">
        
        <h2><a href="/news/">The Latest Dutchtown News</a></h2>

    </header>

    <?php
        $args = array(
            'posts_per_page'    => 2
        );

        $news_query = new WP_Query( $args );

        if ( $news_query->have_posts() )
        {
            while ( $news_query->have_posts() )
            {
                $news_query->the_post(); ?>
                
                <?php if ( has_post_thumbnail() ) : ?>

                <article class="article-has-img">

                    <section class="article-content">
                        
                        <header class="article-title">

                            <h3><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>

                            <div class="article-posted">
            
                                <ul>
                                <?php
                                    dutchtown_posted_on( array(
                                            'before_posted_on'	=> '<li><i class="fas fa-fw fa-bookmark"></i> Posted on ',
                                            'after_posted_on'	=> '</li> '
                                            )
                                        );

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
                            
                            </div>
                        
                        </header>
                        
                        <?php echo get_the_excerpt(); ?>
                    
                    </section>

                    <div class="article-img">
                        
                        <?php dutchtown_post_thumbnail(); ?>
                    
                    </div>

                <?php else : ?>

                <article class="article-has-no-img">

                    <header class="article-header">

                        <div class="article-title">
                            <h3><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
                        </div>

                        <div class="article-posted">
            
                            <ul>
                            <?php
                                dutchtown_posted_on( array(
                                        'before_posted_on'	=> '<li><i class="fas fa-fw fa-bookmark"></i> Posted on ',
                                        'after_posted_on'	=> '</li> '
                                        )
                                    );

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
                        
                        </div>

                    </header>

                    <section class="article-content">

                        <?php echo get_the_excerpt(); ?>
                    
                    </section>
                
                <?php endif; ?>

                </article><?php

                wp_reset_postdata();
            }
        }
    ?>
</section>