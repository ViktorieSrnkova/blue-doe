<?php 
    get_header(); 
?>
<article class="content">
    <form id="sort-form" method="GET">
        <label for="sort-select">Řadit dle:</label>
        <select id="sort-select" name="sort">
            <option value="date" <?php selected( isset( $_GET['sort'] ) && $_GET['sort'] === 'date' ); ?>>Datum</option>
            <option value="title" <?php selected( isset( $_GET['sort'] ) && $_GET['sort'] === 'title' ); ?>>Název</option>
        </select>
        <input type="submit" value="Řadit">
    </form>
    <div id="post-container">
        <?php
            $sort_default = 'date';
            $sort = isset( $_GET['sort'] ) && in_array( $_GET['sort'], ['date', 'title'] ) ? $_GET['sort'] : $sort_default;
            $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
            $args = array(
                'post_type'         => 'post', 
                'posts_per_page'    => get_option( 'posts_per_page' ), 
                'orderby'           => $sort, 
                'order'             => 'DESC', 
                'paged'             => $paged, 
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                    $query->the_post();
                    get_template_part( 'template-parts/content', 'archive' );
                }
            }
            wp_reset_postdata();
        ?>
    </div>
    <div class="paginator">
        <?php
            echo paginate_links( array(
                'total'     => $query->max_num_pages, 
                'current'   => $paged, 
                'format'    => '?paged=%#%', 
                'prev_text' => __( '&laquo; Previous' ), 
                'next_text' => __( 'Next &raquo;' ), 
                'mid_size'  => 1, 
                'add_args'  => array( 'sort' => $sort ), 
            ) );
        ?>
    </div>
</article>
<?php 
    get_footer(); 
?>

