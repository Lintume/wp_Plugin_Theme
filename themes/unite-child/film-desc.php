<?php
/*
Template Name: film-desc
*/
get_header(); ?>

    <div id="primary" class="content-area col-sm-12 col-md-8 <?php echo of_get_option( 'site_layout' ); ?>">
        <main id="main" class="site-main" role="main">

            <?php while ( have_posts() ) : the_post(); ?>
                <?php

                $genre = get_the_terms($_GET['id'], 'taxonomy_genre');
                $genre_string = "";
                foreach ($genre as $g)
                {
                $genre_string = $genre_string.' '. $g->name;
                }

                $country = get_the_terms($_GET['id'], 'taxonomy_country');
                $country_string = "";
                foreach ($country as $c)
                {
                $country_string = $country_string.' '. $c->name;
                }

                $year = get_the_terms($_GET['id'], 'taxonomy_year');
                $year_string = "";
                foreach ($year as $y)
                {
                $year_string = $year_string.' '. $y->name;
                }

                $actor = get_the_terms($_GET['id'], 'taxonomy_actor');
                $actor_string = "";
                foreach ($actor as $a)
                {
                    $actor_string = $actor_string.' '. $a->name;
                }

                $pic = get_post_meta( $_GET['id'], 'poster');
                $pic_str = wp_get_attachment_image($pic[0], 'large');
                $post = get_post($_GET['id']);
                $rental_release_date = get_post_meta($_GET['id'], 'rental_release_date', true);
                $link_on_trailer = get_post_meta($_GET['id'], 'link_on_trailer', true);
                echo "
                    <div>
                        <div class=\"row\">
                            <div class=\"col-md-6\">$pic_str</div>
                            <div class=\"col-md-6\">
                                <div class=\"row\">
                                    <h1>
                                        $post->post_title
                                    </h1>
                                </div>
                                <div class=\"row\">
                                    <b>
                                        Genre:</b>  $genre_string
                                </div>
                                <div class=\"row\">
                                    <b>
                                        Country:</b> $country_string
                                </div>
                                <div class=\"row\">
                                    <b>
                                        Year:</b>  $year_string
                                </div>
                                <div class=\"row\">
                                    <b>
                                        Actors:</b> $actor_string
                                </div>
                                <div class=\"row\">
                                    <b>
                                        Rental release date:</b> $rental_release_date
                                </div>
                                <div class=\"row\">
                                    <b>
                                        Link on trailer:</b> $link_on_trailer
                                </div>
                            </div>
                        </div>
                        <div class=\"row\" style=\"text-align: justify\">
                            <div class=\"col-md-12\">
                                <h2>
                                    Description
                                </h2>
                            <p>
                            $post->post_content
                            </div>
                        </div>
                    </div>
                ";
                ?>
                
                <?php
                // If comments are open or we have at least one comment, load up the comment template
                if ( comments_open() || '0' != get_comments_number() ) :
                    comments_template();
                endif;
                ?>

            <?php endwhile; // end of the loop. ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>