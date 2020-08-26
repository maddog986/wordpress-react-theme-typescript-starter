<?php
/**
 * Copyright (C) 2020. Drew Gauderman
 *
 * This source code is licensed under the MIT license found in the
 * README.md file in the root directory of this source tree.
 */

/**
 * The main template file
 */

get_header();
?>

<main role="main mb-auto mt-auto">
  <div class="container pt-3 pb-3">
    <div class="jumbotron">
      <h1 class="display-4">Hello, world!</h1>
      <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to
        featured content or information.</p>
      <hr class="my-4">
      <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
      <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
    </div>

    <div class="container">
      <?php
if (have_posts()) : while (have_posts()) : the_post();

        get_template_part('template-parts/content', get_post_type());

    endwhile;

    the_posts_pagination(array(
        'prev_text' => __('Previous page'),
        'next_text' => __('Next page'),
    ));

endif;
?>
    </div>
  </div>
</main>

<?php
get_sidebar();
get_footer();
