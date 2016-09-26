<?php
/**
 * Plugin Name: films
 * Description: view for films page
 * Version: 1.0
 * Author: Pari
 * Date: 25.09.2016
 * Time: 21:44
 */

function my_the_content_filter( $content ){//for page films
    if( $GLOBALS['post']->post_name != 'films' )
        return $content;
    $films = get_posts( array(
        'numberposts'     => -1,
        'offset'          => 0,
        'category'        => '',
        'orderby'         => 'post_date',
        'order'           => 'DESC',
        'include'         => '',
        'exclude'         => '',
        'meta_key'        => '',
        'meta_value'      => '',
        'post_type'       => 'movie',
        'post_mime_type'  => '',
        'post_parent'     => '',
        'post_status'     => 'any'
    ) );

    foreach($films as $film)
    {
        $genre = get_the_terms($film->ID, 'taxonomy_genre');
        $genre_string = "";
        foreach ($genre as $g)
        {
            $genre_string = $genre_string.' '. $g->name;
        }
        $country = get_the_terms($film->ID, 'taxonomy_country');
        $country_string = "";
        foreach ($country as $c)
        {
            $country_string = $country_string.' '. $c->name;
        }
        $year = get_the_terms($film->ID, 'taxonomy_year');
        $year_string = "";
        foreach ($year as $y)
        {
            $year_string = $year_string.' '. $y->name;
        }
        $pic = get_post_meta( $film->ID, 'poster');
        $pic_str = wp_get_attachment_image($pic[0]);
        $url_desc = get_page_link( 33 );
        $url_desc = substr($url_desc, 0, -1);
        
   echo "
        <div style='margin-bottom: 15px'>
            <div class=\"row\">
                <div class=\"col-md-3\">$pic_str</div>
                <div class=\"col-md-2\"><a href=\"$url_desc?id=$film->ID\">$film->post_title</a></div>
                <div class=\"col-md-2\">$genre_string</div>
                <div class=\"col-md-3\">$country_string</div>
                <div class=\"col-md-2\">$year_string</div>
            </div>
        </div>
        ";
    }
}
add_filter( 'the_content', 'my_the_content_filter' );

