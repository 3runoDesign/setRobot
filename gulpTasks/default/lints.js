'use strict';

var gulp = require('gulp');
var semistandard = require('gulp-semistandard');
var path = require('../paths.js');

gulp.task('js-lint', function () {
  return gulp.src(path.to.scripts.source)
    .pipe(semistandard())
    .pipe(semistandard.reporter('default', {
      breakOnError: true,
      quiet: true
    }));
});
