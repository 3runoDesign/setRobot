'use strict';

var gulp = require('gulp');
var rigger = require('gulp-rigger');

var config = require('../config/scripts');

gulp.task('scripts', function () {
  return gulp.src(config.source)
    .pipe(rigger())
    .pipe(gulp.dest(config.dest));
});
