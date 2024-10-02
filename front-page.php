<?php
  get_header();
?>
<div class="slideshow-container">

  <!-- Full-width images with number and caption text -->
  <div class="mySlides fade">
    <img class="botalign" src="<?php echo get_template_directory_uri(); ?>/assets/images/home1.jpg" style="object-fit:cover">
  </div>

  <div class="mySlides fade">
    <img class="botalign" src="<?php echo get_template_directory_uri(); ?>/assets/images/home2.jpg" style="object-fit:cover">
  </div>

  <div class="mySlides fade">
    <img class="topalign" src="<?php echo get_template_directory_uri(); ?>/assets/images/home3.jpg" style="object-fit:cover" >
  </div>

  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
 
</div>

<br>
<article class="content">
  <div class="gray-bg">
  <div class="new-posts">
  <?php

$args = array(
    'posts_per_page' => 6,  
    'post_type'      => 'post',
    'post_status'    => 'publish',
);

$home_query = new WP_Query( $args );  

if ( $home_query->have_posts() ) :
    while ( $home_query->have_posts() ) : $home_query->the_post();
        
        get_template_part('template-parts/content', 'archive');
    endwhile;
    wp_reset_postdata(); 
else :
    echo '<p>No posts available.</p>';
endif;
?>
</div>
</div>
</article>
<?php
  get_footer();
?>

