'use strict';

var buffer = require('vinyl-buffer');
var gulp = require('gulp');
var uglify = require('gulp-uglify');

var config = require('../config/scripts');

gulp.task('scripts:production', function (done) {
  return gulp.src(config.source)
    .pipe(uglify())
    .pipe(buffer())
    .pipe(gulp.dest(config.dest));
});
