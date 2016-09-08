'use strict';

var gulp       = require('gulp');
var livereload = require('gulp-livereload');
var path       = require('../paths.js');

gulp.task('watch', function() {
    gulp.watch(path.to.sass.source, [ 'basic-sass' ]); //'sass', ['css-build']
    gulp.watch(path.to.scripts.source, [ 'scripts' ]);
    gulp.watch(path.to.fonts.source, [ 'fonts' ]);

    livereload.listen();

    gulp.watch('**/*.php').on('change', livereload.changed);
    gulp.watch(path.to.destination + '/**/*.css').on('change', livereload.changed);
    gulp.watch(path.to.destination + '/**/*.js').on('change', livereload.changed);
    gulp.watch(path.to.destination + '/**/*.{jpg,jpeg,png,svg}').on('change', livereload.changed);
    gulp.watch(path.to.destination + '/**/*.{eot,svg,ttf,woff,woff2}').on('change', livereload.changed);
});
