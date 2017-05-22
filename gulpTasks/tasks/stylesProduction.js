'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var prefix = require('gulp-autoprefixer');
var cssnano = require('gulp-cssnano');

var config = require('../config/styles');

gulp.task('styles:production', function () {
  return gulp.src(config.source)
    .pipe(sass(config.settings))
    .pipe(prefix(config.autoprefixe))
    .pipe(cssnano())
    .pipe(gulp.dest(config.dest));
});
