'use strict';

var config = require('./');

module.exports = {
  server: false,
  files: [
    config.buildPath + 'assets/',
    './**/*.php'
  ],
  open: true,
  proxy: 'setrobot.dev'
};
