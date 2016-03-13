<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package adamos
 * @since adamos 1.0
 */

get_header(); ?>
		<div id="primary" class="content-area">
			<div id="content" class="site-content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' );


                $termsByCurrentPost = wp_get_post_terms( get_the_ID(), 'location');

                $childrenTermIds = get_term_children( reset($termsByCurrentPost)->term_id, 'location' );

                foreach($childrenTermIds as $item){
                    $childTerm = get_term( $item, 'location' );

                    echo "<h3>".$childTerm->name."</h3>";
                    $ids = get_objects_in_term( reset($childTerm)->term_id, 'location');
                        wp_reset_query();
                        $args = array('post_type' => 'job',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'location',
                                    'field' => 'slug',
                                    'terms' => $childTerm->slug,
                                ),
                            ),
                        );

                        $loop = new WP_Query($args);
                        if($loop->have_posts()) {


                            while($loop->have_posts()) : $loop->the_post();
                                echo "<div class='article row'><div class='col-xs-3'>";
                                echo get_the_post_thumbnail($post->ID, 'thumbnail');
                                echo "</div><div class='description col-xs-9'>";
                                echo '<a href="'.get_permalink().'"><h4>'.get_the_title().'</h4></a>&nbsp;';
                                echo get_the_content().' <br/>';
                                echo "</div></div>";
                            endwhile;
                        }
                }


                ?>
                <?php endwhile; // end of the loop. ?>
			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>