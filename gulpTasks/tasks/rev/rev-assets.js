'use strict';

var config = require('../../config');
var gulp = require('gulp');
var path = require('path');
var rev = require('gulp-rev');
var revNapkin = require('gulp-rev-napkin');

gulp.task('rev-assets', function () {
  // Ignore files that may reference assets. We'll rev them next.
  var ignoreThese = '!' + path.join(config.buildPath, '/**/*+(css|js|json|html|ttf|eot|woff|svg)');

  return gulp.src([path.join(config.buildPath, '/**/*'), ignoreThese])
    .pipe(rev())
    .pipe(gulp.dest(config.buildPath))
    .pipe(revNapkin({verbose: false}))
    .pipe(rev.manifest(path.join(config.buildPath, config.manifestFile), {merge: true}))
    .pipe(gulp.dest(''));
});
