# setRobot WP
setRobot is a WordPress starter theme with a modern development workflow.

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
```
|-- repositories
    |-- .bowerrc
    |-- .codeclimate.yml
    |-- .csscomb.json
    |-- .editorconfig
    |-- .gitignore
    |-- .scss-lint.yml
    |-- .travis.yml
    |-- Gulpfile.js
    |-- README.md
    |-- bower.json
    |-- composer.json
    |-- composer.lock
    |-- package.json
    |-- yarn.lock
    |-- app
    |   |-- activation.php
    |   |-- admin.php
    |   |-- filters.php
    |   |-- helpers.php
    |   |-- nav.php
    |   |-- post_types.php
    |   |-- setup.php
    |   |-- lib
    |       |-- SetRobot
    |           |-- Config.php
    |           |-- Container.php
    |           |-- PostCreateProject.php
    |           |-- Assets
    |           |   |-- JsonManifest.php
    |           |   |-- ManifestInterface.php
    |           |-- Template
    |               |-- Blade.php
    |               |-- BladeProvider.php
    |               |-- FileViewFinder.php
    |-- dist
    |   |-- assets.json
    |   |-- assets
    |       |-- css
    |       |   |-- main-68d0513de1.css
    |       |   |-- vendor-1e2d5d9e42.css
    |       |-- fonts
    |       |   |-- OpenSans-Light.ttf
    |       |   |-- OpenSans-Regular.ttf
    |       |   |-- OpenSans-Semibold.ttf
    |       |   |-- slick.eot
    |       |   |-- slick.svg
    |       |   |-- slick.ttf
    |       |   |-- slick.woff
    |       |   |-- twitter-icon.svg
    |       |-- js
    |           |-- customizer-0d6c07ff13.js
    |           |-- main-3fd84aa285.js
    |           |-- vendor-cebf6880ee.js
    |-- gulpTasks
    |   |-- config
    |   |   |-- browserSync.js
    |   |   |-- images.js
    |   |   |-- index.js
    |   |   |-- providers.js
    |   |   |-- scripts.js
    |   |   |-- scriptsStandalone.js
    |   |   |-- sprite.js
    |   |   |-- styles.js
    |   |   |-- svgSprite.js
    |   |   |-- templates.js
    |   |-- lib
    |   |   |-- repeatString.js
    |   |-- tasks
    |       |-- browsersync.js
    |       |-- build.js
    |       |-- clean.js
    |       |-- default.js
    |       |-- images.js
    |       |-- providers.js
    |       |-- scripts.js
    |       |-- scriptsProduction.js
    |       |-- sprite.js
    |       |-- styles.js
    |       |-- stylesProduction.js
    |       |-- svgSprite.js
    |       |-- templates.js
    |       |-- templatesWatch.js
    |       |-- watch.js
    |       |-- rev
    |           |-- index.js
    |           |-- rev-assets.js
    |           |-- rev-css.js
    |           |-- rev-js.js
    |           |-- rev-update-references.js
    |           |-- sizereport.js
    |           |-- update-html.js
    |-- post_types
    |   |-- .gitkeep
    |-- resources
    |   |-- functions.php
    |   |-- index.php
    |   |-- screenshot.png
    |   |-- style.css
    |   |-- assets
    |   |   |-- images
    |   |   |   |-- .gitkeep
    |   |   |-- js
    |   |   |   |-- customizer.js
    |   |   |   |-- main.js
    |   |   |   |-- partials
    |   |   |       |-- .gitkeep
    |   |   |-- sass
    |   |   |   |-- _breakpoints.scss
    |   |   |   |-- _setting-grid.scss
    |   |   |   |-- _variables.scss
    |   |   |   |-- main.scss
    |   |   |   |-- base
    |   |   |   |   |-- _base.scss
    |   |   |   |   |-- _buttons.scss
    |   |   |   |   |-- _forms.scss
    |   |   |   |   |-- _layout.scss
    |   |   |   |   |-- _lists.scss
    |   |   |   |   |-- _media.scss
    |   |   |   |   |-- _tables.scss
    |   |   |   |   |-- _typography.scss
    |   |   |   |   |-- _variables.scss
    |   |   |   |-- core
    |   |   |   |   |-- reset.scss
    |   |   |   |   |-- wordpress.scss
    |   |   |   |-- helper
    |   |   |   |   |-- _align.scss
    |   |   |   |   |-- _bottons.scss
    |   |   |   |   |-- _common.scss
    |   |   |   |   |-- _grid.scss
    |   |   |   |   |-- _image.scss
    |   |   |   |   |-- _select.scss
    |   |   |   |-- modules
    |   |   |   |   |-- burger-menu.scss
    |   |   |   |   |-- footer.scss
    |   |   |   |   |-- geral.scss
    |   |   |   |   |-- header.scss
    |   |   |   |   |-- navigation.scss
    |   |   |   |-- vendor
    |   |   |       |-- .gitkeep
    |   |   |-- sprite
    |   |       |-- .gitkeep
    |   |-- views
    |       |-- 404.blade.php
    |       |-- front-page.blade.php
    |       |-- home.blade.php
    |       |-- index.blade.php
    |       |-- page.blade.php
    |       |-- layouts
    |       |   |-- app.blade.php
    |       |-- partials
    |           |-- comments.blade.php
    |           |-- content-page.blade.php
    |           |-- content-search.blade.php
    |           |-- content-single.blade.php
    |           |-- content.blade.php
    |           |-- entry-meta.blade.php
    |           |-- footer-script.blade.php
    |           |-- footer.blade.php
    |           |-- head.blade.php
    |           |-- header.blade.php
    |           |-- nav-menu.blade.php
    |           |-- page-header.blade.php
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
