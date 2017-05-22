'use strict';

var config = require('./');

module.exports = {
  source: config.sourcePath + 'views/**/*.pug',
  dest: config.buildPath,
  pugInheritance: {
    basedir: config.sourcePath + 'views/',
    skip: 'node_modules',
    extension: '.pug'
  }
};
