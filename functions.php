<?php

    function canarexreal_theme_support() {
        add_theme_support( 'title-tag');
        add_theme_support( 'custom-logo' );
        add_theme_support( 'post-thumbnails' );
    }

    add_action( 'after_setup_theme','canarexreal_theme_support' );

    function canarexreal_menus() {
        $locations=array(
            'primary'   => "Desktop Primary Top bar", 
            'secondary' => "User Logged In Menu", 
            'footer'    => "Footer Menu Items", 
            'language' => "Top Header For Lang Switch",
        );
        register_nav_menus( $locations );
    }

    add_action( 'init', 'canarexreal_menus' );

   function add_display_name_to_menu( $items, $args ) {
    if ( is_user_logged_in() && $args->theme_location == 'secondary' ) {
        $current_user = wp_get_current_user();
        $display_name = $current_user->display_name;
        $items = '<li class="menu-display-name">' . $display_name . '</li>' . $items;
    }
    return $items;
}

    add_filter( 'wp_nav_menu_items', 'add_display_name_to_menu', 10, 2 );


    function add_logout_link_to_menu( $items, $args ) {
        if ( is_user_logged_in() && $args->theme_location == 'secondary' ) {
            global $wp;
            $current_url = home_url( add_query_arg( array(), $wp->request ) );
            $logout_url = wp_logout_url( $current_url );
            $items .= '<li class="menu-item"><a href="' . $logout_url . '">Odhlásit se</a></li>';
        }
        return $items;
    }

    add_filter( 'wp_nav_menu_items', 'add_logout_link_to_menu', 10, 2 );

    function canarexreal_register_styles() {
        $version = wp_get_theme()->get( 'Version' );
        wp_enqueue_style( 'canarexreal-googlefonts',"https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap", array(), '1.0', 'all' );
        wp_enqueue_style( 'canarexreal-googlefonts-num',"https://fonts.googleapis.com/css2?family=Fustat:wght@200..800&display=swap", array(), '1.0', 'all' );
        wp_enqueue_style( 'canarexreal-fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css", array(), '4.7.0', 'all' );
        wp_enqueue_style( 'canarexreal-css', get_template_directory_uri(). "/style.css", array(), $version, 'all' );
    }

    add_action( 'wp_enqueue_scripts', 'canarexreal_register_styles' );

    function canarexreal_register_scripts() {
        wp_enqueue_script( 'canarex-real', get_template_directory_uri() . "/assets/js/crmain.js", array(), '1.0', true );
       
    }

    add_action( 'wp_enqueue_scripts', 'canarexreal_register_scripts' );

    function canarexreal_widget_areas() {
        register_sidebar(
            array(
                'before_title'  => '', 
                'after_title'   => '', 
                'before_widget' => '<div class="search-items-b">', 
                'after_widget'  => '</div>', 
                'name'          => 'Top Header Area Burger', 
                'id'            => 'header-1', 
                'description'   => 'Top Header Widget Area For Mobile View', 
            )
        );
        register_sidebar(
            array(
                'before_title'  => '', 
                'after_title'   => '', 
                'before_widget' => ' <div class="search-items">', 
                'after_widget'  => '</div>', 
                'name'          => 'Top Header Area', 
                'id'            => 'header-2', 
                'description'   => 'Top Header Widget Area', 
            )
        );
        register_sidebar(
            array(
                'before_title'  => '', 
                'after_title'   => '', 
                'before_widget' => ' <div class="sidebar">', 
                'after_widget'  => '</div>', 
                'name'          => 'Sidebar', 
                'id'            => 'sidebar-1', 
                'description'   => 'Side bar', 
            )
        );
    }

    add_action( 'widgets_init', 'canarexreal_widget_areas' );

    function add_custom_meta_description() {
        if ( is_single() || is_page() ) {
            $excerpt = get_the_excerpt();
            echo '<meta name="description" content="' . esc_attr( $excerpt ) . '">';
        }
    }
    add_action( 'wp_head', 'add_custom_meta_description' );


function cf7_custom_validation_script() {
    ?>
    <script type="text/javascript">
    document.addEventListener( 'wpcf7invalid', function( event ) {
        var inputs = event.detail.apiResponse.invalidFields;

        // Remove all validation messages
        document.querySelectorAll('.wpcf7-not-valid-tip').forEach(function(elem) {
            elem.remove();
        });

        // Add red border to invalid fields
        inputs.forEach(function(input) {
            input.into.querySelector('input, textarea, select').style.border = '2px solid red';
        });
    }, false );
    </script>
    <?php
}
add_action( 'wp_footer', 'cf7_custom_validation_script' );
add_filter('show_admin_bar', '__return_false');

function get_eur_to_czk_rate() {
    $api_url = 'https://api.exchangerate-api.com/v4/latest/EUR'; 
    $response = wp_remote_get($api_url);

    if (is_wp_error($response)) {
        error_log('API Error: ' . wp_remote_retrieve_response_code($response)); // Log the HTTP response code
        return false;
    }

    $data = json_decode(wp_remote_retrieve_body($response), true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        error_log('JSON Decode Error: ' . json_last_error_msg()); // Log any JSON decoding errors
        return false;
    }

    if (isset($data['rates']['CZK'])) {
        return $data['rates']['CZK'];
    }

    error_log('CZK rate not found in API response');
    return false;
}

function schedule_daily_currency_update() {
    if (!wp_next_scheduled('update_eur_to_czk_rate')) {
        wp_schedule_event(strtotime('17:00:00'), 'daily', 'update_eur_to_czk_rate');
    }
}
add_action('wp', 'schedule_daily_currency_update');

// Define the function to run on the event
function update_eur_to_czk_rate() {
    // Check if rate is already stored
    if (get_option('eur_to_czk_rate') === false) {
        $rate = get_eur_to_czk_rate();
        if ($rate) {
            update_option('eur_to_czk_rate', $rate);
        }
    }
}
add_action('after_switch_theme', 'update_eur_to_czk_rate');
add_action('update_eur_to_czk_rate', 'update_eur_to_czk_rate');

// Clear the scheduled event on theme deactivation
function unschedule_currency_update() {
    $timestamp = wp_next_scheduled('update_eur_to_czk_rate');
    if ($timestamp) {
        wp_unschedule_event($timestamp, 'update_eur_to_czk_rate');
    }
}
add_action('switch_theme', 'unschedule_currency_update');

function convert_eur_to_czk($price) {
    $rate = get_option('eur_to_czk_rate', 0);
    return $rate ? $price * $rate : null;
}
function format_large_number($number) {
    return number_format(round($number / 1_000_000, 1), 1, '.', '') . ' mil'; // Always convert to millions with one decimal
}





?>

