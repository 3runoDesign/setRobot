'use strict';

var gulp = require('gulp');
var pug = require('gulp-pug');
var filter = require('gulp-filter');

var config = require('../config/templates');

gulp.task('templates', function () {
  return gulp.src(config.source)
    .pipe(filter(file => {
      return !/\/_/.test(file.path) && !/^_/.test(file.relative);
    }))
    .pipe(pug({
      pretty: true
    }))
    .pipe(gulp.dest(config.dest));
});
