<?php
get_header();

$current_term = get_queried_object();
if ($current_term instanceof WP_Term) {
    $title = ucwords($current_term->name);
} else {
    $title = __("Archiv tutoriálů", "your-text-domain");
}
?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var title = document.querySelector('.heading');
        if (title) {
            // Pass the translated title to Weglot for translation
            var translatedTitle = "<?php echo esc_js(apply_filters('weglot_translate_html_element', $title, 'title')); ?>";
            title.textContent = translatedTitle;
        }
    });
</script>

<article class="content">
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
</article>

<?php
  get_footer();
?>
