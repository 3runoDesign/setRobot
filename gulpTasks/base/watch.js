'use strict';

var gulp = require('gulp');
var path = require('../paths.js');

gulp.task('watch', function () {
  gulp.watch(path.to.sass.source, ['basic-sass']);
  gulp.watch(path.to.scripts.source, ['scripts']);
  gulp.watch(path.to.fonts.source, ['fonts']);
});
