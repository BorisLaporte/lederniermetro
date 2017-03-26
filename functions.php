<?php

add_theme_support('post-thumbnails');
add_image_size('social_icons', 35, 35, false);
add_image_size('suggestion', 370, 370, false);
add_image_size('gallerie', 424, 424, true);
add_image_size('prez', 580, 580, true);
add_image_size('header', 1160, 1160, true);
// Add javascript  
add_action('wp_footer', 'init_js');
function init_js() {
	wp_enqueue_script( 'vendor', get_template_directory_uri().'/js/vendor-min.js');
    wp_enqueue_script( 'custom', get_template_directory_uri().'/js/theme-min.js');
    wp_enqueue_script( 'main', get_template_directory_uri().'/js/main-min.js');
    wp_enqueue_script( 'google map', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBLVcba346dKYE54u4JCgfei66oZ60Jb4k');
    wp_enqueue_script('scroll magic', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js');
    wp_enqueue_script('scroll magic indicator', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/debug.addIndicators.min.js');

	// pass Ajax Url to script.js
    wp_localize_script('custom', 'ajaxurl', admin_url( 'admin-ajax.php' ) );
	wp_localize_script('main', 'ajaxurl', admin_url( 'admin-ajax.php' ) );
}
// add_action('wp_enqueue_scripts', 'add_js_scripts');


function remove_menus(){
    remove_menu_page( 'edit-comments.php' );
    remove_menu_page('edit.php');
}
add_action( 'admin_menu', 'remove_menus' );

function wpc_acf_init() {
acf_update_setting('google_api_key', 'AIzaSyBLVcba346dKYE54u4JCgfei66oZ60Jb4k');
}
add_action('acf/init', 'wpc_acf_init');

function create_post_type(){ 

    register_post_type( 'adresses',
        array(
            'labels' => array(
                'name' => __('Adresses'),
                'singular_name' => __('Adresse')
            ),
            'public' => true,
            'supports' => array('title', 'editor','thumbnail'),
            'has_archive' => true
        )
    );


    /* Custom taxonomy */
    register_taxonomy(
        'type_bon_plan',
        'adresses',
        array(
            'label' => __('Type bon plan'),
            'hierarchical' => true,
        )
    );

    /* Custom taxonomy */
    register_taxonomy(
        'arrondissement',
        array('adresses','culture'),
        array(
            'label' => __('Arrondissement'),
            'hierarchical' => true,
        )
    );

    /* Custom taxonomy */
    register_taxonomy(
        'pays',
        'adresses',
        array(
            'label' => __('Pays'),
            'hierarchical' => true,
        )
    );

    /* Custom taxonomy */
    register_taxonomy(
        'prix',
        'adresses',
        array(
            'label' => __('Prix'),
            'hierarchical' => true,
        )
    );

    register_post_type( 'culture',
        array(
            'labels' => array(
                'name' => __('Culture'),
                'singular_name' => __('Culture')
            ),
            'public' => true,
            'supports' => array('title', 'editor','page-attributes' ,'thumbnail'),
            'has_archive' => true
        )
    );

    /* Custom taxonomy */
    register_taxonomy(
        'rubrique',
        'culture',
        array(
            'label' => __('Rubrique'),
            'hierarchical' => true,
        )
    );

    register_post_type( 'portraits',
        array(
            'labels' => array(
                'name' => __('Portrait'),
                'singular_name' => __('Portraits')
            ),
            'public' => true,
            'supports' => array('title', 'editor','page-attributes' ,'thumbnail'),
            'has_archive' => true
        )
    );
}
//Custom post
add_action( 'init', 'create_post_type');



add_action( 'wp_ajax_nopriv_get_more_results', 'get_more_results' );
add_action( 'wp_ajax_get_more_results', 'get_more_results' );

function get_more_results() {
    $args = json_decode(stripslashes($_POST['arguments']), true);
    $type = $_POST['type'];
    global $index;
    $index = $offset = $_POST['offset'];
    global $mobile;
    $mobile = $_POST['mobile'];

    $args['offset'] = $offset;

    global $template;
    $template = null;
    if ( $type == 'adresses'){
        global $template;
        $template = 'templates/template_archive_adresse';
    } else if ( $type == 'culture') {
        global $template;
        $template = 'templates/template-archive-culture';
    } else if ( $type == 'portraits') {
        global $template;
        $template = 'templates/template-archive-portraits';
    } else {
        echo null;
        die();
    }

    $ajax_query = new WP_Query($args);
    if ( $ajax_query->have_posts() ) : while ( $ajax_query->have_posts() ) : $ajax_query->the_post();
        global $index;
        global $mobile;
        global $template;
        get_template_part($template);
        $index ++;
    endwhile;
    else :
        echo null;
    endif;


    die();
}

?>