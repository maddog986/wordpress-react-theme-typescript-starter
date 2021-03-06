<?php
/**
 * Copyright (C) 2020. Drew Gauderman
 *
 * This source code is licensed under the MIT license found in the
 * README.md file in the root directory of this source tree.
 */

/**
 * The template for displaying all single posts
 *
 */

get_header();
?>

<main role="main">
    <?php
    while (have_posts()) : the_post();

        get_template_part('template-parts/content', get_post_type());

        // If comments are open or we have at least one comment, load up the comment template.
        if (comments_open() || get_comments_number()) :
            comments_template();
        endif;

    endwhile;
    ?>
</main>

<?php
get_sidebar();
get_footer();
