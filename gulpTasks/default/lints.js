'use strict';

var gulp     = require('gulp');
var scsslint = require('gulp-scss-lint');
var eslint   = require('gulp-eslint');
var path     = require('../paths.js');
var error    = require('../error-handler.js');

gulp.task('scss-lint', function() {
    return gulp.src(path.to.sass.source)
        .pipe(scsslint({ config: './.scss-lint.yml' }))
        .on('error', error.handler);
});

gulp.task('js-lint', function() {
    return gulp.src(path.to.scripts.source)
        .pipe(eslint())
        .pipe(eslint.format());
});
