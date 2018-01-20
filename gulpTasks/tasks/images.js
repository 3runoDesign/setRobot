'use strict';

var config = require('../config/images');

var gulp = require('gulp');
var flatten = require('gulp-flatten');
var imagemin = require('gulp-imagemin');
var svgmin = require('gulp-svgmin');

gulp.task('images', ['images-svg'], function () {
  return gulp.src(config.source)
    .pipe(imagemin(config.imagemin))
    .pipe(flatten())
    .pipe(gulp.dest(config.dest));
});
gulp.task('images-svg', function () {
  return gulp.src(config.source + '.svg')
    .pipe(svgmin())
    .pipe(flatten())
    .pipe(gulp.dest(config.dest));
});