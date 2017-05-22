'use strict';

var gulp = require('gulp');
var gulpSequence = require('gulp-sequence');

gulp.task('rev', function (cb) {
  gulpSequence(
      // 1) Add md5 hashes to assets referenced by CSS and JS files
      'rev-assets',
      // 2) Update asset references (images, fonts, etc) with reved filenames in compiled css + js
      'rev-update-references',
      // 3) Rev and compress CSS and JS files (this is done after assets, so that if a referenced asset hash changes, the parent hash will change as well
      'rev-css',
      'rev-js',
      // 4) Update asset references in HTML
      // 'update-html',
      // 5) Report filesizes
      'size-report',
    cb);
});
