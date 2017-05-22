'use strict';

var config = require('./');

module.exports = {
  source: config.sourcePath + 'assets/sprite/**/*.svg',
  dest: config.buildPath + 'assets/images/'
};
