'use strict';

var config = require('../../config');
var gulp = require('gulp');
var path = require('path');
var revReplace = require('gulp-rev-replace');

// 2) Update asset references with reved filenames in compiled css + js
gulp.task('rev-update-references', function () {
  var manifest = gulp.src(path.join(config.buildPath, config.manifestFile));

  return gulp.src(path.join(config.buildPath, '**/**.{css,js}'))
    .pipe(revReplace({manifest: manifest}))
    .pipe(gulp.dest(config.buildPath));
});
