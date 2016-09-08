'use strict';

var gulp           = require('gulp');
var mainBowerFiles = require('main-bower-files');
var concat         = require('gulp-concat');
var uglify         = require('gulp-uglify');
var flatten        = require('gulp-flatten');
var filter         = require('gulp-filter');
var cssnano        = require('gulp-cssnano');
var path           = require('../paths.js');

gulp.task('providers', function() {
    gulp.src(mainBowerFiles(), { base: path.to.bowerDirectory })
        .pipe(filter(['**/*.js', '!**/jquery.js'], {restore: true}))
        .pipe(concat('vendor.js'))
        .pipe(uglify())
        .pipe(gulp.dest(path.to.scripts.destination));

    gulp.src(mainBowerFiles(), { base: path.to.bowerDirectory })
        .pipe(filter(['**/*.css'], {restore: true}))
        .pipe(flatten())
        .pipe(concat('vendor.css'))
        .pipe(cssnano())
        .pipe(gulp.dest(path.to.sass.destination));

    gulp.src([ path.to.fonts.vendor ])
        .pipe(flatten())
        .pipe(gulp.dest(path.to.fonts.destination));
});
