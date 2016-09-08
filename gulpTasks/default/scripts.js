'use strict';

var concat   = require('gulp-concat');
var gulp     = require('gulp');
var path     = require('../paths.js');

gulp.task('scripts', function() {
    return gulp.src(path.to.scripts.source)
       .pipe(concat('main.js'))
       .pipe(gulp.dest(path.to.scripts.destination));
});
