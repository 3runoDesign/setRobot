'use strict';

var gulp = require('gulp');
var mainBowerFiles = require('main-bower-files');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var flatten = require('gulp-flatten');
var filter = require('gulp-filter');
var cssnano = require('gulp-cssnano');

var config = require('../config/providers');

gulp.task('providers', function () {
  gulp.src(mainBowerFiles(), { base: config.bowerrc })
    .pipe(filter(config.filter, { restore: true }))
    .pipe(concat('vendor.js'))
    .pipe(uglify())
    .pipe(gulp.dest(config.dest.js));

  gulp.src(mainBowerFiles(), { base: config.bowerrc })
    .pipe(filter(['**/*.css'], { restore: true }))
    .pipe(flatten())
    .pipe(concat('vendor.css'))
    .pipe(cssnano())
    .pipe(gulp.dest(config.dest.css));

  gulp.src(config.fonts.vendor)
    .pipe(flatten())
    .pipe(gulp.dest(config.dest.font));
});
