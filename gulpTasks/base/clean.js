'use strict';

var gulp = require('gulp');
var del = require('del');
var cache = require('gulp-cached');
var path = require('../paths.js');

gulp.task('clean-all', function () {
  cache.caches = {};
  del.sync([path.to.destination, './.tmp/']);
});
