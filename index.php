<?php
  get_header();

?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var title = document.querySelector('.heading');
        if (title) {
            title.textContent = "Archiv tutoriálů";
        }
    });
</script>
<article class="content">
    <?php
    $page = get_queried_object();
    echo apply_filters('the_content', $page->post_content);
      if ( have_posts() ) {
          while ( have_posts() ) {
              the_post();
              get_template_part('template-parts/content', 'archive');
          }
      } else {
          echo 'Momentálně tu nic není.';
      }
      the_posts_pagination();
    ?>
</article>

<?php
  get_footer();
?>