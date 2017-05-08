'use strict';

var gulp = require('gulp');
var gulpSequence = require('gulp-sequence');
var cssnano = require('gulp-cssnano');
var concat = require('gulp-concat');
var path = require('../paths.js');

gulp.task('css-min', function () {
  return gulp.src(path.to.sass.destination + '/*.css')
    .pipe(cssnano())
    .pipe(gulp.dest(path.to.sass.destination));
});

gulp.task('css-build', function () {
  return gulp.src('./.tmp/css/*.css')
    .pipe(concat('main.css'))
    .pipe(gulp.dest(path.to.sass.destination));
});

gulp.task('basic-sass', function (callback) {
  gulpSequence('sass', ['css-build'], callback);
});
