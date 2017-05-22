'use strict';

var browserify = require('browserify');
var es = require('event-stream');
var flatten = require('gulp-flatten');
var glob = require('glob');
var gulp = require('gulp');
var source = require('vinyl-source-stream');

var config = require('../config/scripts');

gulp.task('scripts', function (done) {
  glob(config.source, function (err, files) {
    if (err) done(err);
    var tasks = files.map(function (entry) {
      return browserify({ entries: [entry] })
        .bundle()
        .pipe(source(entry))
        .pipe(flatten())
        .pipe(gulp.dest(config.dest));
    });
    es.merge(tasks).on('end', done);
  });
});
