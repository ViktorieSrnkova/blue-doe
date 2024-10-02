        <button id="scrollToTopBtn" class="scroll-to-top-btn">▲</button>
        </main>
        <footer class = "vert-f">
            <div class="actual-footer">
                 <img class= "wawe"src='<?php echo get_template_directory_uri(); ?>/assets/images/b_wawe.svg' alt="wawe-blue" />
                 <img class= "wawe_d"src='<?php echo get_template_directory_uri(); ?>/assets/images/b_wawe_d.png' alt="wawe-blue-desktop" />
                <?php
                    wp_footer();

                    // Get the current locale
                    $locale = get_locale();

                    // Display the shortcode based on the locale
                    if ($locale === 'en_GB') {
                        ?>
                        <div class="start-footer">
                            <?php
                        echo apply_shortcodes('[contact-form-7 id="0014045" title="Footer Contact"]');
                ?>
                        </div>
                        <div class="middle-footer">
                            <h2>Follow us!</h2>
                            <div class="ikonky">
                                <a class ="iconss" href="https://www.facebook.com/CanarexReal" target="_blank" rel="noreferrer noopener">
                                    <img src='<?php echo get_template_directory_uri(); ?>/assets/images/facebookF.svg' alt="facebook" height="20"  /> 
                                </a>
                                <a class ="iconss" href="https://www.instagram.com/canarexreal/" target="_blank" rel="noreferrer noopener" >
                                    <img src='<?php echo get_template_directory_uri(); ?>/assets/images/instagramF.svg' alt="instagram" height="20"  />
                                </a>
                            </div>
                            <h2>Contacts</h2>
                            <div class="phone">
                                <img src='<?php echo get_template_directory_uri(); ?>/assets/images/phoneO.svg' alt="phone" height="16"  />
                                <p class ="number">+420 603 257 021</p>
                            </div>
                            <div class="mail">
                                <img  src='<?php echo get_template_directory_uri(); ?>/assets/images/emailO.svg' alt="email" height="14" />
                                <a data-auto-recognition="true" href="mailto:info@canarexreal.com" class = "number">info@canarexreal.com</a>
                            </div>
                            <div class="phone">
                                <img  src='<?php echo get_template_directory_uri(); ?>/assets/images/WhatsApp.svg' alt="wapp" height="14" />
                                <p class ="number">+34 604 198 470</p>
                            </div>
                        </div>
                        <div class="end-footer">
                <?php
                        echo apply_shortcodes('[contact-form-7 id="8dd4a3f" title="Footer Newsletter"]');
                        ?>
                        </div>
                        
                        <div class="mobile">
                            <div class="ikonky">
                                <a class ="iconss" href="https://www.facebook.com/CanarexReal" target="_blank" rel="noreferrer noopener">
                                    <img src='<?php echo get_template_directory_uri(); ?>/assets/images/facebookF.svg' alt="facebook" height="20"  /> 
                                </a>
                                <a class ="iconss" href="https://www.instagram.com/canarexreal/" target="_blank" rel="noreferrer noopener" >
                                    <img src='<?php echo get_template_directory_uri(); ?>/assets/images/instagramF.svg' alt="instagram" height="20"  />
                                </a>
                            </div>
                            <hr class="line">
                            <a href="https://canarexreal-rentals.lodgify.com/">Personal data policy</a>
                            <p>© 2022-2024 CanarexReal</p>
                        </div>
                        <div class="fixed-container">
                            <div class="mobile-fixed">
                                <img src='<?php echo get_template_directory_uri(); ?>/assets/images/standa(1).png' alt="standa-img" height="40" />
                                <div class="vert-line"></div>
                                <div class="footer-fixed-texts">
                                    <p>I'm here for You!</p>
                                    <p class="standa">Stan</p>
                                </div>
                                <div class="spacer"></div>
                                <a href="tel:+1234567890" class="phone-link">
                                    <img src='<?php echo get_template_directory_uri(); ?>/assets/images/phoneO.svg' alt="phone" height="24"  /> 
                                </a>
                                <a href="https://wa.me/+34604198470"  target="_blank" class="phone-link pl10">
                                    <img alt="Chat on WhatsApp" src='<?php echo get_template_directory_uri(); ?>/assets/images/WhatsApp.svg' alt="wapp" height="24" />
                                </a>
                                <a data-auto-recognition="true" href="mailto:info@canarexreal.com" class="fixed-phone">
                                    <img  src='<?php echo get_template_directory_uri(); ?>/assets/images/email-mobile.svg' alt="email" height="30" />
                                </a>

                            </div>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="start-footer">
                        <?php
                        echo apply_shortcodes('[contact-form-7 id="6a29749" title="Zápatí Kontakt"]');
                ?>
                        </div>
                        <div class="middle-footer">
                            <h2>Sledujte nás!</h2>
                            <div class="ikonky">
                                <a class ="iconss" href="https://www.facebook.com/CanarexReal" target="_blank" rel="noreferrer noopener">
                                    <img src='<?php echo get_template_directory_uri(); ?>/assets/images/facebookF.svg' alt="facebook" height="20"  /> 
                                </a>
                                <a class ="iconss" href="https://www.instagram.com/canarexreal/" target="_blank" rel="noreferrer noopener" >
                                    <img src='<?php echo get_template_directory_uri(); ?>/assets/images/instagramF.svg' alt="instagram" height="20"  />
                                </a>
                            </div>
                            <h2>Kontakty</h2>
                            <div class="phone">
                                <img src='<?php echo get_template_directory_uri(); ?>/assets/images/phoneO.svg' alt="phone" height="16"  />
                                <p class ="number">+420 603 257 021</p>
                            </div>
                            <div class="mail">
                                <img  src='<?php echo get_template_directory_uri(); ?>/assets/images/emailO.svg' alt="email" height="14" />
                                <a data-auto-recognition="true" href="mailto:info@canarexreal.com" class = "number">info@canarexreal.com</a>
                            </div>
                            <div class="phone">
                                <img  src='<?php echo get_template_directory_uri(); ?>/assets/images/WhatsApp.svg' alt="wapp" height="14" />
                                <p class ="number">+34 604 198 470</p>
                            </div>
                        </div>
                        <div class="end-footer">

                <?php
                        echo apply_shortcodes('[contact-form-7 id="f7ff0dc" title="Footer Newsletter"]');
                    
                ?>
                        </div>

                        <div class="mobile">
                            <div class="ikonky">
                                <a class ="iconss" href="https://www.facebook.com/CanarexReal" target="_blank" rel="noreferrer noopener">
                                    <img src='<?php echo get_template_directory_uri(); ?>/assets/images/facebookF.svg' alt="facebook" height="20"  /> 
                                </a>
                                <a class ="iconss" href="https://www.instagram.com/canarexreal/" target="_blank" rel="noreferrer noopener" >
                                    <img src='<?php echo get_template_directory_uri(); ?>/assets/images/instagramF.svg' alt="instagram" height="20"  />
                                </a>
                            </div>
                            <hr class="line">
                            <a href="https://canarexreal-rentals.lodgify.com/">Zpracování osobních údajů</a>
                            <p>© 2022-2024 CanarexReal</p>
                        </div>
                        <div class="fixed-container">
                            <div class="mobile-fixed">
                                <img src='<?php echo get_template_directory_uri(); ?>/assets/images/standa(1).png' alt="standa-img" height="40" />
                                <div class="vert-line"></div>
                                <div class="footer-fixed-texts">
                                    <p>Jsem tu pro Vás!</p>
                                    <p class="standa">Standa</p>
                                </div>
                                <div class="spacer"></div>
                                <a href="tel:+1234567890" class="phone-link">
                                    <img src='<?php echo get_template_directory_uri(); ?>/assets/images/phoneO.svg' alt="phone" height="24"  /> 
                                </a>
                                <a href="https://wa.me/+34604198470" target="_blank" class="phone-link pl10">
                                    <img alt="Chat on WhatsApp" src='<?php echo get_template_directory_uri(); ?>/assets/images/WhatsApp.svg' alt="wapp" height="24" />
                                </a>
                                <a data-auto-recognition="true" href="mailto:info@canarexreal.com" class="fixed-phone">
                                    <img  src='<?php echo get_template_directory_uri(); ?>/assets/images/email-mobile.svg' alt="email" height="30" />
                                </a>


                            </div>
                        </div>
                        <?php
                            }
                ?>
            </div>
            <?php 
             $locale = get_locale();

            // Display the shortcode based on the locale
            if ($locale === 'en_GB') {
            ?>
                <div class="bottom-info">
                    <p>© 2022-2024 CanarexReal</p>
                    <hr class="vert-line">
                    <a href="https://canarexreal-rentals.lodgify.com/">Personal data policy</a>
                </div>
            <?php } else { ?> 
                <div class="bottom-info">
                    <p>© 2022-2024 CanarexReal</p>
                    <hr class="vert-line">
                    <a href="https://canarexreal-rentals.lodgify.com/">Zpracování osobních údajů</a>
                </div>
            <?php } ?>
        </footer>
    </body>
</html>