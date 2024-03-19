
<?php
  get_header();
?>
<article class="content">
  <?php
    if ( have_posts() ) {
      while ( have_posts() ) {
        the_post();
        get_template_part( 'template-parts/content', 'archive' );
      }
    }
    the_posts_pagination();
  ?>
</article>
<?php
 get_footer();
?>

