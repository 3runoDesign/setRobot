'use strict';

var gulp = require('gulp');
var browserSync = require('browser-sync');
var path = require('../paths.js');

gulp.task('serve', function () {
  browserSync.init([
    path.to.sass.destination,
    path.to.scripts.destination,
    path.to.images.destination,
    path.to.fonts.destination,
    './**/*.php'
  ], {
    proxy: path.to.proxyURL
  });
});
