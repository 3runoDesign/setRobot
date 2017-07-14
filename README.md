# setRobot WP
setRobot is a WordPress starter theme with a modern development workflow.

> Note: This is currently an unstable version of setRobot, use it at your own risk, we are working hard to fix some common problems that are causing a not friendly developer experience. :wink:

# Features
*   Sass for stylesheets
    *   [Bourbon](bourbon.io/) a simple and lightweight mixin library.
*   [Rigger](https://github.com/kuzyk/gulp-rigger)
*   [Gulp](gulpjs.com) for compiling assets, optimizing images, and concatenating and minifying files
*   [Browsersync](http://www.browsersync.io/) for synchronized browser testing
*   [Laravel Blade](https://laravel.com/docs/5.3/blade) as a templating engine
*   [Controller](https://github.com/soberwp/controller) for passing data to Blade templates
*   [PostTypes](https://github.com/jjgrainger/PostTypes) for creating post types

# Requirements
Make sure all dependencies have been installed before moving on:

*   [WordPress](https://wordpress.org/) >= 4.7
*   [PHP](http://php.net/manual/en/install.php) >= 5.6.4
*   [Composer](https://getcomposer.org/download/)
*   [Node.js](http://nodejs.org/) >= 6.9.x
*   [Yarn](https://yarnpkg.com/en/docs/install)

## Theme installation

Install setRobot using Composer from your WordPress themes directory (replace `your-theme-name` below with the name of your theme):

```shell
# @ app/themes/ or wp-content/themes/
composer create-project 3runodesign/setrobot your-theme-name dev-master
```

During theme installation you will have the options to:

Configure Browsersync (path to theme, local development URL)
*   Configure Browsersync (path to theme, local development URL

# Theme structure

```
themes/your-theme-name/     # → Root of your setRobot based theme
├─┬ app/                    # → Theme PHP
│ ├── lib/SetRobot/         # → Blade implementation, asset manifest and composer events
│ ├── activation.php        # → Theme customizer pages
│ ├── admin.php             # → Theme customizer setup
│ ├── filters.php           # → Theme filters
│ ├── helpers.php           # → Helper functions
│ ├── nav.php               # → Theme customizer navigation
│ └── setup.php             # → Theme setup
├── bower.json              # → Dependency management
├── composer.json           # → Autoloading for `app/` files
├── composer.lock           # → Composer lock file (never edit)
├── dist/                   # → Built theme assets (never edit)
├── node_modules/           # → Node.js packages (never edit)
├─┬ gulpTasks/              # → Gulp Tasks config
│ ├─┬ config/               # → Settings for compiled assets
│ ├─┬ lib/                  # →Library of Tasks aids
│ └── tasks/                # →Tasks for development
├── package.json            # → Node.js dependencies and scripts
├─┬ post_types/             # → Theme CPTs
├─┬ resources/              # → Theme assets and templates
│ ├─┬ assets/               # → Front-end assets
│ │ ├── fonts/              # → Theme fonts
│ │ ├── images/             # → Theme images
│ │ ├── js/                 # → Theme JS
│ │ ├── sass/               # → Theme stylesheets
│ │ └── sprite/             # → Theme sprite
│ ├── controllers/          # → Controller files
│ ├── functions.php         # → Composer autoloader, theme includes
│ ├── index.php             # → Never manually edit
│ ├── screenshot.png        # → Theme screenshot for WP admin
│ ├── style.css             # → Theme meta information
│ └─┬ views/                # → Theme templates
│   ├── layouts/            # → Base templates
│   └──  partials/          # → Partial templates
└── vendor/                 # → Composer packages (never edit)
```

# Theme setup
Edit `app/setup.php` to enable or disable theme features, setup navigation menus, post thumbnail sizes, and sidebars.

# Theme development
Run `yarn`, `bower i` and `composer install` from the theme directory to install dependencies.

# Build commands
*   `gulp start` — Compile assets when file changes are made, start Browsersync session
*   `gulp build` — Compile and optimize the files in your assets directory
*   `gulp build --p` or `gulp build --production` — Compile assets for production

# Contributing
Thanks [@gabriellacerda](https://github.com/gabriellacerda) and [@lucasprogamer](https://github.com/lucasprogamer)

# Licensing
Copyright (c) 2016 - 2017 Bruno Fernando. Licensed under the MIT license(MIT)
