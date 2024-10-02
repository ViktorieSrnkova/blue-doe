<?php
  get_header();

?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
            var title = document.querySelector('.heading');
            if (title) {
               if (window.location.href.includes("en")) {
                title.textContent = "Tutorials archive";
              } else {
                title.textContent = "Knihovna tutoriálů";
            }}
    });
</script>
<article class="content">
  <div class="gray-bg">
   <div class="new-posts">
    <?php
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
    </div>
    </div>
</article>

<?php
  get_footer();
?>