'use strict';

var gulp = require('gulp');
var watch = require('gulp-watch');
var gulpSequence = require('gulp-sequence');

var templates = require('../config/templates');
var styles = require('../config/styles');
var scripts = require('../config/scripts');
var images = require('../config/images');
var sprite = require('../config/sprite');

gulp.task('watch', function () {
  watch(styles.base, () => { gulp.start(['styles']); });
  watch(images.source, () => { gulp.start(['images']); });
  watch(sprite.source, () => { gulp.start(['sprite']); });
  watch(scripts.base, () => { gulp.start(['scripts']); });
  watch(templates.source, () => { gulp.start(['templates:watch']); });
});

gulp.task('start', (cb) => { gulpSequence('build', ['browserSync'], 'watch', cb); });
