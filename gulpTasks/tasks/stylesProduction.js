'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var prefix = require('gulp-autoprefixer');
var cssnano = require('gulp-cssnano');

var config = require('../config/styles');

gulp.task('styles:production', ['styles'], function () {
  return gulp.src(config.dest + '/*.css')
    .pipe(cssnano())
    .pipe(gulp.dest(config.dest));
});
