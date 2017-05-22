'use strict';

var gulp = require('gulp');
var browserSync = require('browser-sync');

gulp.task('templates:watch', ['templates'], browserSync.reload);
