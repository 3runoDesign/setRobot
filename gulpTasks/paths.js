'use strict';

var path           = require('path');
var pathToThisFile = __dirname;
var root           = path.dirname(pathToThisFile);

var finder         = require('graceful-fs');
var bowerrc        = JSON.parse(finder.readFileSync(root + '/.bowerrc'));

var destination    = root + '/assets';
var resources      = root + '/resources';
var bowerDirectory = bowerrc.directory;

module.exports = {
  to: {
    destination: destination,
    bowerDirectory: bowerDirectory,

    sass: {
      source: resources + '/sass/**/{*, *-app}.scss',
      main: resources + '/sass/main.scss',
      destination: destination + '/css',
      includes: [
        bowerDirectory + '/bourbon/app/assets/stylesheets/',
        bowerDirectory + '/neat/app/assets/stylesheets/',
        bowerDirectory + '/family.scss/source/src/'
      ]
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
