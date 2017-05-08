'use strict';

var path = require('path');
var pathToThisFile = __dirname;
var root = path.dirname(pathToThisFile);
var files = require('graceful-fs');
var bowerrc = JSON.parse(files.readFileSync(root + '/.bowerrc'));
var destination = root + '/dist';
var resources = root + '/resources/assets';
var bowerDirectory = bowerrc.directory;

module.exports = {
  to: {
    destination: destination,
    bowerDirectory: bowerDirectory,
    manifest: 'assets.json',
    proxyURL: '3runo.dev',

    sass: {
      source: resources + '/sass/**/*.scss',
      main: resources + '/sass/main.scss',
      destination: destination + '/css',
      includes: [
        bowerDirectory + '/bourbon/app/assets/stylesheets/',
        bowerDirectory + '/bootstrap-sass-grid/sass/',
        bowerDirectory + '/family.scss/source/src/'
      ]
    },

    pug: {
      source: resources + '/views/**/*.pug',
      pages: resources + '/views/*.pug',
      destination: destination
    },

    php: {
      source: './**/*.php'
    },

    scripts: {
      source: resources + '/scripts/**/*.js',
      partials: resources + '/scripts/partials/**/*.js',
      main: resources + '/scripts/main.js',
      destination: destination + '/scripts'
    },

    fonts: {
      source: resources + '/fonts/**/*.{eot,svg,ttf,woff,woff2}',
      vendor: bowerDirectory + '/**/*.{eot,svg,ttf,woff,woff2}',
      destination: destination + '/fonts'
    },

    images: {
      source: resources + '/images/**/*.*',
      sprite: resources + '/images/sprite/*.png',
      destination: destination + '/images'
    }
  }
};
