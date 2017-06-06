'use strict';

var gulp = require('gulp');
var buffer = require('vinyl-buffer');
var imagemin = require('gulp-imagemin');
var merge = require('merge-stream');
var spritesmith = require('gulp.spritesmith');

var config = require('../config/sprite');

gulp.task('sprite', function () {
  var spriteData = gulp.src(config.source)
    .pipe(spritesmith(config.spritesmith));

  var imgStream = spriteData.img
    .pipe(buffer())
    .pipe(imagemin())
    .pipe(gulp.dest(config.baseImg));

  var cssStream = spriteData.css
    .pipe(gulp.dest(config.baseScss));

  return merge(imgStream, cssStream);
});
