'use strict';

var gulp = require('gulp');
var del = require('del');
var cache = require('gulp-cached');
var config = require('../config/index');

gulp.task('clean', function () {
  cache.caches = { };
  return del.sync(config.buildPath);
});
