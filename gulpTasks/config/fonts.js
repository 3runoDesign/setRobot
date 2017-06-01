'use strict';

var config = require('./');

module.exports = {
  source: config.assetsPath + 'fonts/**/*.{eot,svg,ttf,woff,woff2}',
  dest: config.buildPath + 'assets/fonts/'
};
