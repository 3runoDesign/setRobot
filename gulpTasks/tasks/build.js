'use strict';

var gulp = require('gulp');
var gulpSequence = require('gulp-sequence');
var argv = require('yargs').argv;

gulp.task('build', function (cb) {
  if (argv.p === true || argv.production === true) {
    gulpSequence('clean',
    ['sprite', 'images'],
    'styles:production',
    'scripts:production',
    'providers',
    'templates',
    'rev', cb);
  } else {
    gulpSequence('default', cb);
  }
});
