'use strict';

var gulp = require('gulp');
var browserify = require('browserify');
var tap = require('gulp-tap');
var babel = require('babelify');
var buffer = require('vinyl-buffer');
var source = require('vinyl-source-stream');

var config = require('../config/scripts');

gulp.task('scripts', function () {
  return gulp.src(config.source, { read: false })
    .pipe(tap(function(file) {
      file.contents = browserify(file.path, {
        debug: true
      }).transform(babel).bundle();
    }))
    .pipe(buffer())
    .pipe(gulp.dest(config.dest));
});
