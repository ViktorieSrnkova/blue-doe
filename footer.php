        <button id="scrollToTopBtn" class="scroll-to-top-btn"><i class="fa fa-angle-up"></i></button>
        </main>
        <footer class="actual-footer">
            <?php
                wp_nav_menu( array(
                    'menu'              => 'footer', 
                    'container'         => '', 
                    'theme_location'    => 'footer', 
                    'items_wrap'        => '<ul id="" class="actual-footer">%3$s</ul>', 
                ) );
                wp_footer();
            ?>
        </footer>
    </body>
</html>