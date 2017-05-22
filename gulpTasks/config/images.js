'use strict';

var config = require('./');

module.exports = {
  source: config.assetsPath + 'images/**/*',
  dest: config.buildPath + 'assets/images/',
  imagemin: {
    optimizationLevel: 3,
    progressive: true,
    interlaced: true,
    svgoPlugins: [{ removeViewBox: false }]
  }
};
