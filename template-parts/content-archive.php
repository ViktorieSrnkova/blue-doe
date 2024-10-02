<?php 
$price =get_field('price');
?>
<a class="clickable-post" href="<?php the_permalink(); ?>">
  <div class="container">
    <div class="new-red">
      <?php $locale = get_locale();
        if ($locale === 'en_GB') {
          ?> <p>NEW</p> <?php
        } else{
          ?> <p>NOVÉ</p> <?php
        }
        ?>
    </div>
    <div class="post-thumb-container">
      <img
        class="post-thumbs"
        src="<?php the_post_thumbnail_url('thumbnail'); ?>"
        alt="image" />
    </div>
    <div class="hori-meta">
      <div class="start-meta">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Location.svg"  style="height:20px">
        <p class="type"> <?php the_field('location'); ?></p>
      </div>
      <div class="end-meta">
        <p class="type">
        <?php the_field('type');?> </p>
        <hr class="thumb-line">
        <p class= "price number"><?php echo number_format($price, 0, '.', ' ');?>€</p>
      </div>
    </div>
    <p class="post-title">
      <?php the_title(); ?>
    </p>
    <div class="b-row">
     <img class="icc" src="<?php echo get_template_directory_uri(); ?>/assets/images/pokoj.svg"  style="height:20px">
     <p class= "number b-meta"><?php the_field('bedrooms'); ?></p>
     <img class="icc" src="<?php echo get_template_directory_uri(); ?>/assets/images/koupelna.svg" style="height:20px" >
     <p class= "number b-meta"><?php the_field('bathrooms'); ?></p>
     <img class="icc" src="<?php echo get_template_directory_uri(); ?>/assets/images/velikost.svg" style="height:20px" >
     <p class= "number b-meta"><?php the_field('size'); ?> m²</p>
    </div>
  </div>
</a>