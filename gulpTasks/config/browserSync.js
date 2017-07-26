'use strict';

var config = require('./');

module.exports = {
  server: false,
  files: [
    config.buildPath + 'assets/',
    config.sourcePath + 'views/**/*.php'
  ],
  open: true,
  proxy: 'setrobot.dev'
};
