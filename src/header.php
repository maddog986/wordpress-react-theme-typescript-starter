<?php
/**
 * Copyright (C) 2020. Drew Gauderman
 *
 * This source code is licensed under the MIT license found in the
 * README.md file in the root directory of this source tree.
 */

/**
 * The header for the theme
 *
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta
		charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div class="d-flex h-100 p-0 mx-auto flex-column">

		<a class="sr-only" href="#content">Skip to content</a>

		<header class="bg-dark">
			<div class="container">
				<nav class="navbar navbar-expand-md navbar-dark">
					<a class="navbar-brand" href="#"><?php bloginfo('name'); ?></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
						aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarCollapse">
						<!-- <ul class="navbar-nav mr-auto"> -->
						<?php
        wp_nav_menu([
            'container' => 'ul',
            'menu_class' => 'navbar-nav mr-auto',
            'theme_location' => 'header-menu',
        ]);
?>
						<!-- </ul> -->
						<form class="form-inline mt-2 mt-md-0">
							<input class="form-control form-control-sm mr-sm-2" type="text" placeholder="Search"
								aria-label="Search">
							<button class="btn btn-outline-success btn-sm my-2 my-sm-0" type="submit">Search</button>
						</form>
					</div>
				</nav>
			</div>
		</header>