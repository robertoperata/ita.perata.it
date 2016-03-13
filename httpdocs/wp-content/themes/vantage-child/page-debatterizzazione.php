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
            $termsByCurrentPost = wp_get_post_terms( get_the_ID(), 'location');

            $args = array('post_type' => 'job',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'location',
                        'field' => 'slug',
                        'terms' => $termsByCurrentPost[0]->slug,
                    ),
                ),
            );
            $loop = new WP_Query($args);
            if($loop->have_posts()) {
              while($loop->have_posts()) : $loop->the_post();
                  echo "<div class='article row'><div class='col-xs-3'>";
                  echo get_the_post_thumbnail($post->ID, 'thumbnail');
                  echo "</div><div class='description col-xs-9'>";
                  echo '<h4><a href="'.get_permalink().'">'.get_the_title().'</a></h4>&nbsp;';
                  echo get_the_content().' <br/>';
                  echo "</div></div>";
              endwhile;
            }

            $categories = get_terms( 'location', array(
                'orderby'    => 'count',
                'hide_empty' => 0,
                'child_of' => 11
                //'child_of' => $id_parent
            ) );
            //echo get_query_var( 'filtri' );
            //$categories = wp_tag_cloud( array( 'taxonomy' => 'filtri', format => 'list' ) );
            ?>

        </div><!-- #content .site-content -->
    </div><!-- #primary .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
