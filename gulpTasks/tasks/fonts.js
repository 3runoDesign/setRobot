'use strict';

var gulp = require('gulp');
var flatten = require('gulp-flatten');

var config = require('../config/fonts');

gulp.task('fonts', function () {
  return gulp.src(config.source)
    .pipe(flatten())
    .pipe(gulp.dest(config.dest));
});
