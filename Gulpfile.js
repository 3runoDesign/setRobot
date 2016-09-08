'use strict';

var gulp = require('gulp');
var gulpSequence = require( 'gulp-sequence' );
var requireDir = require('require-dir');
var argv = require( 'yargs' ).argv;

requireDir('./gulpTasks', { recurse: true });

// Linting JS and SASS
gulp.task('lints-all', function(callback) {
    gulpSequence('scss-lint', 'js-lint', callback);
});

// Build CSS
gulp.task('basic-sass', function(callback) {
    gulpSequence('sass', ['css-build'], callback);
});

// Build sprite
gulp.task('basic-sprite', function(callback) {
    gulpSequence('sass', 'images', 'sprite', ['css-build'], callback);
});

// Build all assets: CSS, JS, Sprite, Scripts and Fonts
gulp.task('basic-assets', function(callback) {
    gulpSequence('providers', 'sass', 'images', 'sprite', ['css-build'], 'scripts', 'fonts', callback);
});

// Build
gulp.task('build-assets', function(callback) {
    if (argv.p === true || argv.production === true ) {
        gulpSequence('clean-all', ['basic-assets'], 'css-min', 'scripts-min', 'rev', callback);
    } else {
        gulpSequence('clean-all', ['basic-assets'], 'css-min', 'scripts-min', callback);
    }
});

// Names Short Tasks
// ======

// Conexão e Watch
gulp.task('cw', function(callback) {
    gulpSequence('clean-all', ['basic-assets'], 'watch', callback);
});

// Assets Build
gulp.task('ba', ['build-assets']);

// Lints
gulp.task('la', ['lints-all']);
