<section class="front-events">
    <header class="section-header">
        
        <h2><a href="/calendar/">Upcoming Events in Dutchtown</a></h2>

        <p><a href="/calendar/">View our full calendar</a>, and follow us on <a href="https://facebook.com/dutchtownstl">Facebook</a> and <a href="https://twitter.com/dutchtownstl">Twitter</a> for more updates.</p>
    
    </header>

    <ul>
    <?php
        global $post;

        $events = tribe_get_events( array(
            'posts_per_page'    => '4',
            'start_date'        => date( 'Y-m-d H:i:s' )
        ));

        foreach ( $events as $post )
        {
            setup_postdata( $post ); ?>

            <li>

                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                
                <div class="event-date"><?php echo tribe_get_start_date(); ?></div>
                
                <div class="event-content">
                    <?php the_excerpt(); ?>
                </div>
            
            </li><?php

            wp_reset_postdata();
        }
    ?>
    </ul>

    <div class="front-mailing-list">

        <p>Sign up for our mailing list to receive occasional updates on events around the neighborhood.</p>

        <!-- Begin MailChimp Signup Form -->
        <link href="//cdn-images.mailchimp.com/embedcode/slim-10_7.css" rel="stylesheet" type="text/css">
        <style type="text/css">
            #mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
            /* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
            We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
        </style>
        <div id="mc_embed_signup">
        <form action="https://dutchtownstl.us13.list-manage.com/subscribe/post?u=68ee3a7a24ce3a469ba2192b7&amp;id=4cfe45fa69" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
            <div id="mc_embed_signup_scroll">
            <label for="mce-EMAIL">Subscribe to our mailing list</label>
            <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
            <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
            <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_68ee3a7a24ce3a469ba2192b7_4cfe45fa69" tabindex="-1" value=""></div>
            <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
            </div>
        </form>
        </div>

        <!--End mc_embed_signup-->
    </div>

</section>