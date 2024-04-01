<?php get_header(); ?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
            var title = document.querySelector('.heading');
            if (title) {
               if (window.location.href.includes("en")) {
                title.textContent = "Search results";
              } else {
                title.textContent = "Výsledky hledání";
            }}
    });
</script>


<article class="content">
  <?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
      <?php get_template_part( 'template-parts/content', 'archive' ); ?>
    <?php endwhile; ?>
    <?php the_posts_pagination(); ?>
  <?php else : ?>
    <p style="text-align: center;">Nebyly nalezeny žádné výsledky.</p>
  <?php endif; ?>
</article>

<?php get_footer(); ?>
