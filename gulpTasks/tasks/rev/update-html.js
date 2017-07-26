'use strict';

var gulp = require('gulp');
var revReplace = require('gulp-rev-replace');
var path = require('path');

var config = require('../../config');

// 5) Update asset references in HTML
gulp.task('update-html', function () {
  var manifest = gulp.src(path.join(config.buildPath, config.manifestFile));
  return gulp.src(path.join(config.buildPath, '**/*.html'))
    .pipe(revReplace({manifest: manifest}))
    .pipe(gulp.dest(config.buildPath));
});
