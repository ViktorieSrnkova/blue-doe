<!DOCTYPE html>
  <html data-theme="light" lang="cs">
    <head>
      <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <?php
        wp_head();
      ?>
    </head>
    <body>
      <header>
        <div class="top-line-content">
          <a href="<?php echo esc_url( home_url() ); ?>">
            <?php 
              if ( function_exists( 'the_custom_logo' ) ) {
                $custom_logo_id = get_theme_mod( 'custom_logo' );
                $logo = wp_get_attachment_image_src( $custom_logo_id );
                if ($logo) {
                  echo '<img src="' . esc_url( $logo[0] ) . '" alt="logo" width="120" />';
                }
              }
            ?>
          </a>
          <div class="hamburger-menu">
            <button
              class="dark-mode-switch"
              type="button"
              aria-label="toggle dark mode"
            >
              <img src='<?php echo get_template_directory_uri(); ?>/assets/images/sun.svg' alt="sun" height="17" class="filter-w" />
            </button>
            <div class="search-items-b">
              <?php 
                dynamic_sidebar( 'header-1' );
              ?>
            </div>
            <div class="bottom-line-burger">
              <div class="bottom-line-content-burger">
                <div class="bottom-line-anchors-burger">
                  <?php
                    wp_nav_menu( array(
                      'menu'            => 'primary', 
                      'container'       => '', 
                      'theme_location'  => 'primary', 
                      'items_wrap'      => '<ul id="" class="bottom-line-anchors-burger">%3$s</ul>', 
                    ) );
                  ?>
                </div>
              </div>
            </div>
          </div>
          <div class="search-items">
            <?php 
              dynamic_sidebar( 'header-2' );
            ?>
          </div>
          <div class="end-items">
            <div class="hamburger-icon">
              <div class="bar"></div>
              <div class="bar"></div>
              <div class="bar"></div>
            </div>
            <div class="user-drop" id="userDropdown" onclick="toggleDropdown()">
              <button type="button" class="user-button">
                  <?php
                  if ( is_user_logged_in() ) {
                      $current_user = wp_get_current_user();
                      $avatar_url = get_avatar_url( $current_user->ID );
                      echo '<img src="' . esc_url( $avatar_url ) . '" alt="' . esc_attr( $current_user->display_name ) . ' height="40" class="gravatar" />';
                  } else {
                      echo '<img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/user.svg" alt="user" height="23" class="filter-w" />';
                  }
                  ?>     
              </button>
              <img src='<?php echo get_template_directory_uri(); ?>/assets/images/arrow.svg' alt="arrow" height="15" class="filter-w" />
              <div id="userDropdownContent" class="dropdown-content">
                  <?php        
                  if ( class_exists( 'WooCommerce' ) ) {
                      if ( is_user_logged_in() ) {
                          wp_nav_menu( array(
                              'menu'            => 'secondary', 
                              'container'       => '', 
                              'theme_location'  => 'secondary', 
                              'items_wrap'      => '<ul id="" class="show">%3$s</ul>', 
                          ) );
                      } else {
                           echo '<a href="' . esc_url( wc_get_account_endpoint_url( 'dashboard' ) ) . '">Přihlášení/Registrace</a>';
                      }
                  } else {
                       if ( is_user_logged_in() ) {
                              wp_nav_menu( array(
                                'menu'            => 'secondary', 
                                'container'       => '', 
                                'theme_location'  => 'secondary', 
                                'items_wrap'      => '<ul id="" class="show">%3$s</ul>', 
                              ) );
                            } else {
                              echo '<a href="' . esc_url( wp_login_url() ) . '">Přihlášení</a>';
                              echo '<a href="' . esc_url( wp_registration_url() ) . '">Registrace</a>';
                            }
                  }
                  ?>
              </div>
            </div>
          </div>
        </div>
        <div class="bottom-line">
          <div class="bottom-line-content">
            <div class="bottom-line-anchors">
              <?php
                wp_nav_menu( array(
                  'menu'            => 'primary', 
                  'container'       => '', 
                  'theme_location'  => 'primary', 
                  'items_wrap'      => '<ul id="" class="bottom-line-anchors">%3$s</ul>', 
                ) );
              ?>
            </div>
            <div class="end-items-bottom">
              <button
                class="dark-mode-switch"
                type="button"
                data-theme-toggle
                aria-label="toggle dark mode"
              >
                <img src='<?php echo get_template_directory_uri(); ?>/assets/images/sun.svg' alt="sun" height="17" class="filter-w" />
              </button>
            </div>
          </div>
        </div>
      </header>
      <main>
        <header class="page-title">
          <h1 class="heading" id="main-page-title"><?php the_title();?></h1>
        </header>
       