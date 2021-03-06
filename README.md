# WordPress Starter Theme - React

[![License](https://img.shields.io/github/license/maddog986/wordpress-react-plugin-typescript-starter)](./LICENSE)

A WordPress Theme Starter featuring React, Webpack, Typescript and Docker for a full stack development.

## Description

This is a starting point for someone who wants to develop a new Theme for WordPress using React, Typescript and Webpack. It uses Docker for a quick and easy WordPress development stack.

What makes this so great? With a simple `docker-compose up -d --build` command, you have a full WordPress instance running, with a plugin ready to be activated through the admin dashboard, AND, you can build a public, or admin (private) pages, using React with [React Refresh enabled](https://github.com/pmmmwh/react-refresh-webpack-plugin).

**src**: Everything in this folder gets compiled into production code into a folder name that matches the package name.

### Why does this exist?

I wanted to develop a couple plugins for clients that are efficient, fast, and use the same base code functionality for easier maintainability. Using Webpack allows quicker and automatied CSS & JavaScript cleanup, minification, dynamic naming, all while keeping development code seperate from production code. Using Docker and this package, I can spin up a complete WordPress site and start coding a new plugin in a clean environment within about a minute. You can even import existing WordPress database/content by modifying the docker-compose file. See https://github.com/maddog986/php-nginx-mysql-server for more information.

### Some Notes

PHP file names and variable references by default are "wordpress_theme". This will be replaced dynamically by changing the package.json "name" field.

**package.json** Change `"name"` to the plugin name you desire, but keep it in lowercase, replace spaces with underscore, and no special characters. This is used for code output and folder name.

**docker-compose.yml**: has a few settings that can be customized for local development url. If you change ports or WEBSITE_HOSTNAME you will have to modify webpack.config.js to match. If you change the package name make sure you update the volume path to match the new package name.

## Installation

```sh
# install packages
npm install

# docker compose up to start container. can take 30 seconds to a few minutes to fully start.
docker-compose up -d --build
```

Start development via webpack-dev-server proxy (supports React Hot Loader/Refresh):

```sh
npm run dev # manually open browser to http://localhost:3000

```

To generate production ready code into the [package name] folder (default is wordpress_theme):

```sh
npm run build # copy contents of dist folder to your wordpress/wp_content/plugins/your_plugin
```
