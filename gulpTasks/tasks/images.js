'use strict';

var config = require('../config/images');

var gulp = require('gulp');
var flatten = require('gulp-flatten');
var imagemin = require('gulp-imagemin');

gulp.task('images', function () {
  return gulp.src(config.source)
    .pipe(imagemin(config.imagemin))
    .pipe(flatten())
    .pipe(gulp.dest(config.dest));
});
