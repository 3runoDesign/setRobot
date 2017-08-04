'use strict';

var gulp = require('gulp');
var mainBowerFiles = require('main-bower-files');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var flatten = require('gulp-flatten');
var filter = require('gulp-filter');
var cssnano = require('gulp-cssnano');
var merge = require('merge-stream');
var gulpIgnore = require('gulp-ignore');

var config = require('../config/providers');

var filterIndex = ['**/*.less', '**/*.scss'];

gulp.task('providers', function () {
  var vendorjs = gulp.src(mainBowerFiles(), { base: config.bowerrc })
    .pipe(filter(config.filter, { restore: true }))
    .pipe(concat('vendor.js'))
    .pipe(uglify({ preserveComments: 'license' }))
    .pipe(gulp.dest(config.dest.js));

  var vendorcss = gulp.src(mainBowerFiles(), { base: config.bowerrc })
    .pipe(gulpIgnore.exclude(filterIndex))
    .pipe(filter(['**/*.css'], { restore: true }))
    .pipe(flatten())
    .pipe(concat('vendor.css'))
    .pipe(cssnano())
    .pipe(gulp.dest(config.dest.css));

  var vendorfonts = gulp.src(config.fonts.vendor)
    .pipe(flatten())
    .pipe(gulp.dest(config.dest.font));

  return merge(vendorjs, vendorcss, vendorfonts);
});
