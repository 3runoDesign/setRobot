'use strict'

var gulp = require('gulp')
var gulpSequence = require('gulp-sequence')
var requireDir = require('require-dir')

requireDir('./gulpTasks', { recurse: true })

// Names Short Tasks
// ======

// SERVE
gulp.task('cw', function (callback) {
  gulpSequence('build-assets', ['serve'], 'watch', callback)
})

// Assets Build
gulp.task('ba', ['build-assets'])
gulp.task('bs', ['basic-sprite'])
