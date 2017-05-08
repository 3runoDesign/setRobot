'use strict';

var gulp = require('gulp');
var rigger = require('gulp-rigger');
var path = require('../paths.js');

gulp.task('scripts', function () {
  return gulp.src([path.to.scripts.source, '!' + path.to.scripts.partials])
    .pipe(rigger())
    .pipe(gulp.dest(path.to.scripts.destination));
});
