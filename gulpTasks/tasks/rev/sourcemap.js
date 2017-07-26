'use strict';

var gulp = require('gulp');
var sourcemaps = require('gulp-sourcemaps');

var config = require('../../config/scripts');

gulp.task('sourcemaps', function () {
  return gulp.src(config.dest + '/*.js')
    .pipe(sourcemaps.init())
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest(config.dest));
});
