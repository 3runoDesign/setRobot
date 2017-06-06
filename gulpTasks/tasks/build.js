'use strict';

var gulp = require('gulp');
var gulpSequence = require('gulp-sequence');
var argv = require('yargs').argv;

gulp.task('build', function (cb) {
  if (argv.p === true || argv.production === true) {
    return gulpSequence('clean',
    ['sprite', 'images'],
    'styles:production',
    'scripts:production',
    'fonts',
    'providers',
    'templates',
    'rev', cb);
  } else {
    return gulpSequence('default', cb);
  }
});
