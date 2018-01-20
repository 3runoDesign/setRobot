'use strict';

var config = require('./');

module.exports = {
  autoprefixer: {
    browsers: ['last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4']
  },
  source: config.assetsPath + 'sass/main.scss',
  dest: config.buildPath + 'assets/css/',
  base: config.assetsPath + 'sass/**/*',
  settings: {
    outputStyle: 'nested',
    sourceComments: true,
    includePaths: [
      config.bowerDirectory + '/bourbon/core',
      config.bowerDirectory + '/flexboxgrid-sass/dist/',
      config.bowerDirectory + '/family.scss/source/src/'
    ]
  }
};
