<div class="container">
  <div class="single-top">
    <img class="img-fluid-single" src='<?php the_post_thumbnail_url( 'thumbnail' );?>' alt="image" />
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
  </div>
  <div class="header-shortcuts">
    <h2>Obsah</h2>
    <ol class="heading-list">
      <?php
        $content = get_the_content();
        preg_match_all( '/<h([1-6])[^>]*>(.*?)<\/h[1-6]>/i', $content, $headings );
        if ( !empty( $headings[0] ) ) {
          foreach ( $headings[0] as $index => $heading ) {
            $level = $headings[1][ $index ];
            $title = strip_tags( $headings[2][ $index ] );
            $id = sanitize_title( $title );
            $content = str_replace( $heading, '<h' . $level . ' id="' . $id . '">' . $title . '</h' . $level . '>', $content );
            echo '<li><a class="smooth-scroll" href="#' . $id . '">' . $title . '</a></li>';
          }
        }
      ?>
    </ol>
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