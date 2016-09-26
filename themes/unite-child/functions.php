<?php

add_action( 'init', 'true_register_movies' );

function true_register_movies() {
    $labels = array(
        'name' => 'Movie',
        'singular_name' => 'Movie',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Movie',
        'edit' => 'Edit',
        'edit_item' => 'Edit Movie',
        'new_item' => 'New Movie',
        'view' => 'View',
        'view_item' => 'View Movie',
        'search_items' => 'Search Movie',
        'not_found' => 'No Movie found',
        'not_found_in_trash' => 'No Movie found in Trash',
        'parent' => 'Parent Movie'
    );

    $args = array(
        'labels' => $labels,
        'public' => true, // благодаря этому некоторые параметры можно пропустить
        'menu_icon' => 'dashicons-format-video',
        'menu_position' => 5,
        'has_archive' => true,
        'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments'),
        'taxonomies' => array('Genres', 'Countries', 'Year', 'Actor')
    );
    register_post_type('movie', $args);
}

function create_taxonomy(){
    // заголовки
    $labels = array(
        'name'              => 'Genres',
        'singular_name'     => 'Genre',
        'search_items'      => 'Search Genres',
        'all_items'         => 'All Genres',
        'parent_item'       => 'Parent Genre',
        'parent_item_colon' => 'Parent Genre:',
        'edit_item'         => 'Edit Genre',
        'update_item'       => 'Update Genre',
        'add_new_item'      => 'Add New Genre',
        'new_item_name'     => 'New Genre Name',
        'menu_name'         => 'Genre',
    );
    // параметры
    $args = array(
        'label'                 => '',
        'labels'                => $labels,
        'description'           => '',
        'public'                => true,
        'publicly_queryable'    => null,
        'show_in_nav_menus'     => true,
        'show_ui'               => true,
        'show_tagcloud'         => true,
        'hierarchical'          => false,
        'update_count_callback' => '',
        'rewrite'               => true,
        'capabilities'          => array(),
        'meta_box_cb'           => null,
        'show_admin_column'     => false,
        '_builtin'              => false,
        'show_in_quick_edit'    => null,
    );
    register_taxonomy('taxonomy_genre', array('movie'), $args );

    $labels1 = array(
        'name'              => 'Countries',
        'singular_name'     => 'Country',
        'search_items'      => 'Search Countries',
        'all_items'         => 'All Countries',
        'parent_item'       => 'Parent Country',
        'parent_item_colon' => 'Parent Country:',
        'edit_item'         => 'Edit Country',
        'update_item'       => 'Update Country',
        'add_new_item'      => 'Add New Country',
        'new_item_name'     => 'New Country Name',
        'menu_name'         => 'Country',
    );
    $args1 = array(
        'label'                 => '',
        'labels'                => $labels1,
        'description'           => '',
        'public'                => true,
        'publicly_queryable'    => null,
        'show_in_nav_menus'     => true,
        'show_ui'               => true,
        'show_tagcloud'         => true,
        'hierarchical'          => false,
        'update_count_callback' => '',
        'rewrite'               => true,
        'capabilities'          => array(),
        'meta_box_cb'           => null,
        'show_admin_column'     => false,
        '_builtin'              => false,
        'show_in_quick_edit'    => null,
    );
    register_taxonomy('taxonomy_country', array('movie'), $args1 );

    $labels2 = array(
        'name'              => 'Years',
        'singular_name'     => 'Year',
        'search_items'      => 'Search Years',
        'all_items'         => 'All Years',
        'parent_item'       => 'Parent Year',
        'parent_item_colon' => 'Parent Year:',
        'edit_item'         => 'Edit Year',
        'update_item'       => 'Update Year',
        'add_new_item'      => 'Add New Year',
        'new_item_name'     => 'New Year Name',
        'menu_name'         => 'Year',
    );
    $args2 = array(
        'label'                 => '',
        'labels'                => $labels2,
        'description'           => '',
        'public'                => true,
        'publicly_queryable'    => null,
        'show_in_nav_menus'     => true,
        'show_ui'               => true,
        'show_tagcloud'         => true,
        'hierarchical'          => false,
        'update_count_callback' => '',
        'rewrite'               => true,
        'capabilities'          => array(),
        'meta_box_cb'           => null,
        'show_admin_column'     => false,
        '_builtin'              => false,
        'show_in_quick_edit'    => null,
    );
    register_taxonomy('taxonomy_year', array('movie'), $args2 );

    $labels3 = array(
        'name'              => 'Actors',
        'singular_name'     => 'Actor',
        'search_items'      => 'Search Actors',
        'all_items'         => 'All Actors',
        'parent_item'       => 'Parent Actor',
        'parent_item_colon' => 'Parent Actor:',
        'edit_item'         => 'Edit Actor',
        'update_item'       => 'Update Actor',
        'add_new_item'      => 'Add New Actor',
        'new_item_name'     => 'New Actor Name',
        'menu_name'         => 'Actor',
    );
    $args3 = array(
        'label'                 => '',
        'labels'                => $labels3,
        'description'           => '',
        'public'                => true,
        'publicly_queryable'    => null,
        'show_in_nav_menus'     => true,
        'show_ui'               => true,
        'show_tagcloud'         => true,
        'hierarchical'          => false,
        'update_count_callback' => '',
        'rewrite'               => true,
        'capabilities'          => array(),
        'meta_box_cb'           => null,
        'show_admin_column'     => false,
        '_builtin'              => false,
        'show_in_quick_edit'    => null,
    );
    register_taxonomy('taxonomy_actor', array('movie'), $args3 );
}

add_action('init', 'create_taxonomy');

add_filter('manage_movie_posts_columns', 'add_custom_columns',8, 1 );

function add_custom_columns($columns)
{
    $columns['rental_release_date'] = 'Rental release date';
    $columns['genre'] = 'Genre';
    $columns['country'] = 'Country';
    $columns['year'] = 'Year';
    $columns['actor'] = 'Actor';
    return $columns;
}

add_action('manage_movie_posts_custom_column',  'show_custom_columns_content', 10, 3);

function show_custom_columns_content($column_name, $post_id)
{
    if ($column_name == 'rental_release_date') {
        $return_row = true;
        $rental_release_date = get_post_meta($post_id, 'rental_release_date', $return_row);
        echo $rental_release_date;
    }
    elseif ($column_name == 'genre') {
        $genre = get_the_terms($post_id, 'taxonomy_genre');
        $genre_string = "";
        foreach ($genre as $g)
        {
            $genre_string = $genre_string.' '. $g->name;
        }
        echo $genre_string;
    }

    elseif ($column_name == 'country') {
        $country = get_the_terms($post_id, 'taxonomy_country');
        $country_string = "";
        foreach ($country as $c)
        {
            $country_string = $country_string.' '. $c->name;
        }
        echo $country_string;
    }

    elseif ($column_name == 'year') {
        $year = get_the_terms($post_id, 'taxonomy_year');
        $year_string = "";
        foreach ($year as $y)
        {
            $year_string = $year_string.' '. $y->name;
        }
        echo $year_string;
    }

    elseif ($column_name == 'actor') {
        $actor = get_the_terms($post_id, 'taxonomy_actor');
        $actor_string = "";
        foreach ($actor as $a)
        {
            $actor_string = $actor_string.' '. $a->name;
        }
        echo $actor_string;
    }
}

add_shortcode ('5_last_films', 'short_code_5_last_films');

function short_code_5_last_films()
{
    $films = get_posts(array(
        'numberposts' => 5,
        'offset' => 0,
        'category' => '',
        'orderby' => 'post_date',
        'order' => 'DESC',
        'include' => '',
        'exclude' => '',
        'meta_key' => '',
        'meta_value' => '',
        'post_type' => 'movie',
        'post_mime_type' => '',
        'post_parent' => '',
        'post_status' => 'any'
    ));

    foreach ($films as $film) {
        $genre = get_the_terms($film->ID, 'taxonomy_genre');
        $genre_string = "";
        foreach ($genre as $g) {
            $genre_string = $genre_string . ' ' . $g->name;
        }
        $country = get_the_terms($film->ID, 'taxonomy_country');
        $country_string = "";
        foreach ($country as $c) {
            $country_string = $country_string . ' ' . $c->name;
        }
        $year = get_the_terms($film->ID, 'taxonomy_year');
        $year_string = "";
        foreach ($year as $y) {
            $year_string = $year_string . ' ' . $y->name;
        }
        $pic = get_post_meta($film->ID, 'poster');
        $pic_str = wp_get_attachment_image($pic[0]);
        $url_desc = get_page_link(33);
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