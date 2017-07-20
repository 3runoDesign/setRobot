'use strict';

var gulp = require('gulp');

var config = require('../config/scripts');

gulp.task('scripts', function () {
  return gulp.src(config.source)
    .pipe(gulp.dest(config.dest));
});
