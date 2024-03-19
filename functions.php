<?php

    function bluedoe_theme_support() {
        add_theme_support( 'title-tag');
        add_theme_support( 'custom-logo' );
        add_theme_support( 'post-thumbnails' );
    }

    add_action( 'after_setup_theme','bluedoe_theme_support' );

    function bluedoe_menus() {
        $locations=array(
            'primary'   => "Desktop Primary Top bar", 
            'secondary' => "User Logged In Menu", 
            'footer'    => "Footer Menu Items", 
        );
        register_nav_menus( $locations );
    }

    add_action( 'init', 'bluedoe_menus' );

    function add_username_to_menu( $items, $args ) {
        if ( is_user_logged_in() && $args->theme_location == 'secondary' ) {
            $current_user = wp_get_current_user();
            $username = $current_user->user_login;
            $items = '<li class="menu-username">' . $username . '</li>' . $items;
        }
        return $items;
    }

    add_filter( 'wp_nav_menu_items', 'add_username_to_menu', 10, 2 );

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

    function bluedoe_register_styles() {
        $version = wp_get_theme()->get( 'Version' );
        wp_enqueue_style( 'bluedoe-googlefonts',"https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap", array(), '1.0', 'all' );
        wp_enqueue_style( 'bluedoe-fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css", array(), '4.7.0', 'all' );
        wp_enqueue_style( 'bluedoe-css', get_template_directory_uri(). "/style.css", array(), $version, 'all' );
    }

    add_action( 'wp_enqueue_scripts', 'bluedoe_register_styles' );

    function bluedoe_register_scripts() {
    wp_enqueue_script( 'bluedoe-main', get_template_directory_uri() . "/assets/js/main.js", array(), '1.0', true );
    wp_localize_script( 'bluedoe-main', 'wpData', array( 'baseUrl' => esc_url( home_url() ) ) );
    }

    add_action( 'wp_enqueue_scripts', 'bluedoe_register_scripts' );

    function bluedoe_widget_areas() {
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
    }

    add_action( 'widgets_init', 'bluedoe_widget_areas' );

    function add_custom_role() {
        $subscriber_role = get_role( 'subscriber' );
        $customer_role = get_role( 'customer' );
        $custom_capabilities = array_merge( $subscriber_role->capabilities, $customer_role->capabilities );
        add_role( 'custom_role', 'Subscriber and Customer', $custom_capabilities );
        global $wp_roles;
        $wp_roles->roles['custom_role']['name'] = 'Subscriber and Customer'; 
        $wp_roles->role_names['custom_role'] = 'Subscriber and Customer'; 
    }

    add_action( 'init', 'add_custom_role' );

?>



