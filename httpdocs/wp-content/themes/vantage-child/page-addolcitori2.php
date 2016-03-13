<?php

get_header(); ?>

    <div id="primary" class="content-area">
        <div id="content" class="site-content" role="main">

            <?php while ( have_posts() ) : the_post(); ?>

                <?php get_template_part( 'content', 'page' ); ?>

                <?php comments_template( '', true ); ?>

            <?php endwhile; // end of the loop. ?>
            <?php


            $id_parent = get_the_ID();

            $categories = get_terms( 'location', array(
                'orderby'    => 'count',
                'hide_empty' => 0,
                'child_of' => 11
                //'child_of' => $id_parent
            ) );
            //echo get_query_var( 'filtri' );
            //$categories = wp_tag_cloud( array( 'taxonomy' => 'filtri', format => 'list' ) );
                var_dump($categories);
            ?>

        </div><!-- #content .site-content -->
    </div><!-- #primary .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
