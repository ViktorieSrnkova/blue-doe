<div class="comments-wrapper">
  <div class="comments" id="comments">
    <div class="comments-header">
      <h2 class="comment-reply-title">
        <?php
          if ( ! have_comments() ) {
            echo "Zanechte Komentář";
          } else {
            echo comments_number();
          }
        ?>
      </h2>
    </div>
    <div class="comments-inner">
      <?php 
        wp_list_comments( array( 
          'avatar_size' => 120, 
          'style'       =>'div', 
          'max_depth'   => 3, 
        ) );
      ?>
    </div>
  </div>
  <?php 
    if ( comments_open() ) {
      comment_form( array(
        'class_form'          => '', 
        'title_reply_before'  => '<h2 id="reply-title" class="comment-reply-title">', 
        'title_reply_after'   => '</h2>', 
      ) );
    }
  ?>
</div>