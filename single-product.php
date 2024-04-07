
<?php
    get_header();
?>
<article class="content">
    <?php
        if ( have_posts() ) {
            $shop_page_url = get_permalink( wc_get_page_id( 'shop' ) );
            echo '<a class="return-to-page" href="'. $shop_page_url .'"><< Zpět na všechny produkty</a>';
            while ( have_posts() ) {
                the_post();
                get_template_part( 'template-parts/content', 'product' );
            }
        }
    ?>
</article>
<?php
    get_footer();
?>
