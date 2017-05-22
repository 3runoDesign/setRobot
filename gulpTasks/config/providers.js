'use strict';

var config = require('./');

module.exports = {
  bowerrc: config.bowerDirectory,
  filter: ['**/*.js', '!**/jquery.js'],
  dest: {
    js: config.buildPath + 'assets/js/',
    css: config.buildPath + 'assets/css/',
    font: config.buildPath + 'assets/fonts/'
  },
  fonts: {
    vendor: config.bowerDirectory + '/**/*.{eot,svg,ttf,woff,woff2}',
    default: config.buildPath + '/fonts/**/*.{eot,svg,ttf,woff,woff2}'
  }
};
