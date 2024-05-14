<?php
get_header();
?>
<article class="content page">
    <table class="category-table">
        <thead>
            <tr>
                <th class="first-col">Název</th>
                <th>Počet tutoriálů</th>
            </tr>
        </thead>
        <tbody >
            <?php
             $args = array(
                'hide_empty' => 0
            );
            $categories = get_categories($args);
            foreach ($categories as $category) {
                $category_count = $category->count;
                echo '<tr>';
                echo '<td><a class="category-items" href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></td>';
                echo '<td class="second-col">' . $category_count . '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</article>
<?php
get_footer();
?>
