'use strict';

var gulp = require('gulp');
var sizereport = require('gulp-sizereport');

var repeatString = require('../../lib/repeatString');
var config = require('../../config');

// 6) Report sizes
gulp.task('size-report', function () {
  var hashedFiles = '/**/*-' + repeatString('[a-z,0-9]', 8) + '*.*';

  return gulp.src([config.buildPath + hashedFiles, '*!' + config.manifestFile])
    .pipe(sizereport({
      gzip: true
    }));
});
