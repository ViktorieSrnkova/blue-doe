<div class="container">
  <div class="single-top">
    <header class="single-content-header">
      <div class="single-meta">
        <span class="single-date">Zveřejněno: <?php the_date(); ?></span>
        <div class="tags">
          <?php 
            the_tags( '<span class="single-tag"><i class="fa fa-tag"></i>', '</span><span class="single-tag"><i class="fa fa-tag"></i>', '</span>' )
          ?>
        </div>
        <span class="single-comment"><a href="#comments"><i class="fa fa-comment"></i><?php  comments_number();?></a></span>
      </div>
    </header>
    <img class="img-fluid-single" src='<?php the_post_thumbnail_url( 'thumbnail' );?>' alt="image" />
  </div>
  <div class="hidden-content-links">
    <div class="front">
      <div class="triangle1"></div>
      <div class="triangle2"></div>
    </div>
    <div class="rectangle">
      <div id="open-the-list">
       <i class="fa fa-list" ></i>
       </div>
    </div>
  </div>
  <div class="header-shortcuts">
    <div class="close">
      <div id="close-the-list">
      <i class="fa fa-close"></i>
      </div>
    </div>
    <h3>Obsah</h3>
    <ul class="heading-list">
      <?php
      $content = get_the_content();
      preg_match_all('/<h([1-3])[^>]*>(.*?)<\/h[1-3]>/i', $content, $headings);
      if ( !empty( $headings[0] ) ) {
          foreach ( $headings[0] as $index => $heading ) {
              $level = $headings[1][ $index ];
              $title = strip_tags( $headings[2][ $index ] );
              $id = sanitize_title( $title );
              $heading_with_id = str_replace('<h' . $level, '<h' . $level . ' id="' . $id . '"', $heading );
              $content = str_replace( $heading, $heading_with_id, $content );
              echo '<li class="level' . $level . '"><a class="smooth-scroll" href="#' . $id . '">' . $title . '</a></li>';
          }
          update_post_meta( get_the_ID(), '_content', $content );
      }
      ?>
    </ul>
  </div>
  <div class="article-body">
    <?php 
      echo apply_filters( 'the_content', $content );
    ?>
  </div>
  <?php 
    comments_template();
  ?>
</div>
<script>
  var OpenIcon = document.getElementById("open-the-list");
var CloseIcon = document.getElementById("close-the-list");
OpenIcon.addEventListener("click", function () {
  toggleHeaderShortcuts();
});
CloseIcon.addEventListener("click", function () {
  console.log("yes i noticed you clicked the button");
  toggleHeaderShortcuts();
});
function toggleHeaderShortcuts() {
  var headerShortcuts = document.querySelector(".header-shortcuts");
  if (headerShortcuts) {
    if (headerShortcuts.classList.contains("hidden")) {
      headerShortcuts.classList.remove("hidden");
    } else {
      headerShortcuts.classList.add("hidden");
    }
  }
}
  </script>