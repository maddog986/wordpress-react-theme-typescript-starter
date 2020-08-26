<?php
/**
 * Copyright (C) 2020. Drew Gauderman
 *
 * This source code is licensed under the MIT license found in the
 * README.md file in the root directory of this source tree.
 */

/**
 * Template part for displaying posts
 */

?>

<article id="post-<?php the_ID(); ?>" class="entry">
    <header class="entry-header">
        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
    </header>

    <div class="entry-content">
        <?php the_content(); ?>
    </div>
</article>