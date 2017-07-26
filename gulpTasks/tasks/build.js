'use strict';

var gulp = require('gulp');
var gulpSequence = require('gulp-sequence');
var argv = require('yargs').argv;

gulp.task('build', function (cb) {
  if (argv.p === true || argv.production === true) {
    process.env.NODE_ENV = 'production';

    return gulpSequence('clean',
    ['sprite', 'images'],
    'styles:production',
    'scripts:production',
    'fonts',
    'providers',
    'rev',
    'sourcemaps', cb);
  } else {
    return gulpSequence('default', cb);
  }
});
