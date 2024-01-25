<?php
get_header();
if ( have_posts() ) :
    while ( have_posts() ) : the_post();
        // The Loop
    endwhile;
endif;
get_footer();
