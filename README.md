# setRobot WP
setRobot is a WordPress starter theme with a modern development workflow.
> Note: This is currently an unstable version of setRobot, use it at your own risk, we are working hard on a fix for some common problems that are causing a bad developer experience.

## Features:
* **Sass/CSS**:
  * Blazing fast Node Sass(libsass) parser
  * CSS prefixing with [autoprefixer](https://github.com/postcss/autoprefixer)
  * CSS minifying with [cssnano](http://cssnano.co/)
  * CSS code beautiful [csscomb](http://csscomb.com/)
* **Javascript**:
  * Browserify
* **Templating**:
  * [Laravel's Blade](https://laravel.com/docs/5.3/blade) as a templating engine
* **Development**:
  * File watching and livereloading synchronized across multiple browsers/devices with [BrowserSync](https://www.browsersync.io/)
* **Sass Packages**:
  * Includes the following Sass packages by default:
    * [Bourbon]( http://bourbon.io/ )
    * [Bitters](http://bitters.bourbon.io/)
    * [Bootstrap - GRID]( https://github.com/jojoee/bootstrap-sass-grid )
* **Images**:
  * Image minifying with imagemin
  * Compiles sprites from all files in the `assets/sprite` directory
* **Revisioning/cache busting**:
  Cache busting static assets for production with [gulp-rev](https://github.com/sindresorhus/gulp-rev)
  
## Requirements
Make sure all dependencies have been installed before moving on:

* WordPress >= 4.7
* PHP >= 5.6.4
* Composer
* Node.js >= 6.9.x
* Yarn

# Theme structure
The setRobot folder structure is optimized to give you the best experience when you are developing or migrating themes to wordpress.
```
|-- root
    |-- app
    |   |-- lib
    |       |-- SetRobot
    |           |-- Assets
    |           |-- Template
    |-- dist
    |   |-- assets
    |       |-- css
    |       |-- fonts
    |       |-- js
    |-- gulpTasks
    |   |-- config
    |   |-- lib
    |   |-- tasks
    |       |-- rev
    |-- post_types
    |-- resources
    |   |-- assets
    |   |   |-- images
    |   |   |-- js
    |   |   |   |-- partials
    |   |   |-- sass
    |   |   |   |-- base
    |   |   |   |-- core
    |   |   |   |-- helper
    |   |   |   |-- modules
    |   |   |   |-- vendor
    |   |   |-- sprite
    |   |-- views
    |       |-- layouts
    |       |-- partials
    |-- vendor
```

# Theme setup
Coming Soon

# Theme development
Coming Soon

# Contributing
Coming Soon

# Licensing
Copyright (c) 2016 - 2017 Bruno Fernando. Licensed under the MIT license(MIT)
