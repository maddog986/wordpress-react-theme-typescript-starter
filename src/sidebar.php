<?php
/**
 * Copyright (C) 2020. Drew Gauderman
 *
 * This source code is licensed under the MIT license found in the
 * README.md file in the root directory of this source tree.
 */

/**
 * The sidebar containing the main widget area
 *
 */

if (! is_active_sidebar('sidebar-1')) {
    return;
}
?>

<aside>
    <?php dynamic_sidebar('sidebar-1'); ?>
</aside>