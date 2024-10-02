<!DOCTYPE html>
  <html lang="cs">
    <head>
      <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <?php
        wp_head();
      ?>
    </head>
    <body>
      <header>
        <div class="main-menu_burger"  id="menu">
          <div class="main-menu-burger_content">
            <?php
              wp_nav_menu( array(
                'menu'            => 'primary', 
                'container'       => '', 
                'theme_location'  => 'primary', 
                'items_wrap'      => '<ul id="" class="main-menu-burger_content">%3$s</ul>', 
              ) );
            ?>
          </div>
        </div>
        <div class = "info-line"> <!-- TU CHYBI LANGUAGE SWITCHER -->
          <div class="info-line-content">
            <div class = "info-line-left">
              <img src='<?php echo get_template_directory_uri(); ?>/assets/images/phone.svg' alt="phone" height="16"  />
              <p class ="number">+420 603 257 021</p>
              <img class = "hidy" src='<?php echo get_template_directory_uri(); ?>/assets/images/email.svg' alt="email" height="14" />
              <a data-auto-recognition="true" href="mailto:info@canarexreal.com" class = "number hidy">info@canarexreal.com</a>
            </div>
            <div class = "info-line-right">
              <a class ="iconss hidy" href="https://www.facebook.com/CanarexReal" target="_blank" rel="noreferrer noopener">
                <img src='<?php echo get_template_directory_uri(); ?>/assets/images/facebook.svg' alt="facebook" height="16"  /> 
              </a>
              <a class ="iconss hidy" href="https://www.instagram.com/canarexreal/" target="_blank" rel="noreferrer noopener" >
                <img src='<?php echo get_template_directory_uri(); ?>/assets/images/instagram.svg' alt="instagram" height="16"  />
              </a>
              <?php
              wp_nav_menu( array(
                'menu'            => 'language', 
                'container'       => '', 
                'theme_location'  => 'language', 
                'items_wrap'      => '<ul id="" class="language-switch">%3$s</ul>', 
              ) );
            ?>
            </div>
          </div>
        </div>
        <div class ="color-line">
          <div class="top-line-content">
            <a class = "logo-link" href="<?php echo esc_url( home_url() ); ?>">
              <?php 
                if ( function_exists( 'the_custom_logo' ) ) {
                  $custom_logo_id = get_theme_mod( 'custom_logo' );
                  $logo = wp_get_attachment_image_src( $custom_logo_id );
                  if ($logo) {
                    echo '<img src="' . esc_url( $logo[0] ) . '" alt="logo" height="50" />';
                  }
                }
              ?>
            </a> 
            <div class="main-menu">
              <div class="main-menu-anchors">
                <?php
                  wp_nav_menu( array(
                    'menu'            => 'primary', 
                    'container'       => '', 
                    'theme_location'  => 'primary', 
                    'items_wrap'      => '<ul id="" class="main-menu-anchors">%3$s</ul>', 
                  ) );
                ?>
              </div>
            </div>
            <div class="menu-icon">
              <div class="menu-icon_burger">
              </div>
            </div>
          </div>
        </div>
        <?php 
        $locale = get_locale();
        if ($locale === 'en_GB') {
          echo apply_shortcodes('[alg_back_button label="◄ BACK " class="back"]');
        } else{
        echo apply_shortcodes('[alg_back_button label="◄ ZPĚT " class="back"]');
        }
        ?>
        
      </header>
    <main>
      
       