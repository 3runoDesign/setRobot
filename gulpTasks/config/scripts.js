'use strict';

var config = require('./');

module.exports = {
  source: config.assetsPath + 'js/*.js',
  entries: {
    'script': [config.assetsPath + 'js/main.js']
  },
  dest: config.buildPath + 'assets/js',
  base: config.assetsPath + 'assets/js',
  extractSharedJs: true,
  concat: 'scripts.js',
  rename: {
    suffix: '.min'
  }
};
