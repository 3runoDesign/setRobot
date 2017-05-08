'use strict';

var gulp = require('gulp');
var revision = require('gulp-rev');
var path = require('../paths.js');

gulp.task('rev', function () {
  return gulp.src([path.to.destination + '/**/*.{css,js}'])
    .pipe(gulp.dest(path.to.destination))
    .pipe(revision())
    .pipe(gulp.dest(path.to.destination))
    .pipe(revision.manifest(path.to.manifest))
    .pipe(gulp.dest(path.to.destination));
});
