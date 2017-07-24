'use strict';

var gulp = require('gulp');
var uglify = require('gulp-uglify');
var browserify = require('browserify');
var streamify = require('gulp-streamify');
var buffer = require('vinyl-buffer');

var config = require('../config/scripts');

gulp.task('scripts:production', ['scripts'], function () {
  return gulp.src(config.dest + '/*.js')
    .pipe(streamify(uglify()))
    .pipe(buffer())
    .pipe(gulp.dest(config.dest));
});
