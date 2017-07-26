'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var prefix = require('gulp-autoprefixer');
var csscomb = require('gulp-csscomb');

var config = require('../config/styles');

gulp.task('styles', function () {
  return gulp.src(config.source)
    .pipe(sass(config.settings))
    .pipe(prefix(config.autoprefixe))
    .pipe(gulp.dest(config.dest))
    .pipe(csscomb())
    .pipe(gulp.dest(config.dest));
});
