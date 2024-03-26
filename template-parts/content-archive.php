
<div class="container">
  <div class="post">
    <div class="post-thumb-container">
      <a href='<?php the_permalink();?>'>
        <img class="post-thumbs" src="<?php the_post_thumbnail_url( 'thumbnail' );?>" alt="image" />
      </a>
    </div>
    <div class="post-body">
      <h3 class="post-title">
        <a href='<?php the_permalink();?>'><?php the_title();?></a>
      </h3>
      <div class="post-meta">
        <span class="post-date"><?php echo get_the_date();?></span>
        <span class="post-comment"><a href="#"><?php comments_number();?></a></span>
      </div>
      <div class="post-intro">
        <?php
          the_excerpt();
        ?>
      </div>
      <a class="more-link" href='<?php the_permalink();?>'>Číst dál &rarr;</a>
      <div class="tags-archive">
        
      </div>
    </div>
  </div>
</div>