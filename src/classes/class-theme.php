<?php
/**
 * Copyright (C) 2020. Drew Gauderman
 *
 * This source code is licensed under the MIT license found in the
 * README.md file in the root directory of this source tree.
 */

/**
 * wordpress_theme.
 *
 * @author	Drew Gauderman <drew@dpg.host>
 * @since	v1.0.0
 * @version	v1.0.0	Friday, May 1st, 2020.
 * @see		wordpress_theme_base
 * @global
 */
new class('wordpress_theme', filemtime(__FILE__)) extends wordpress_theme_base {
    /**
     * Loads all the frontend css styles & javascripts
     *
     * @author	Drew Gauderman <drew@dpg.host>
     * @since	v1.0.0
     * @version	v1.0.0	Saturday, October 27th, 2018.
     * @access	public
     * @return	void
     */
    public function wp_enqueue_scripts_styles()
    {
        // our CSS file
        $this->wp_enqueue_style($this->name, 'theme-public.min.css');

        // our JavaScript file
        $this->wp_enqueue_script($this->name, 'theme-public.min.js', ['jquery']);
    }
};
