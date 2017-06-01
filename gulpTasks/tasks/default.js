'use strict';

var gulp = require('gulp');
var gulpSequence = require('gulp-sequence');

gulp.task('default', function (cb) {
  return gulpSequence('clean',
  ['sprite', 'images'],
  'styles',
  'scripts',
  'fonts',
  'providers'
  , cb);
});
