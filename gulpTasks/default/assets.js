'use strict';

var buffer      = require('vinyl-buffer');
var concat      = require('gulp-concat');
var cssnano     = require('gulp-cssnano');
var csscomb     = require('gulp-csscomb');
var filter      = require('gulp-filter');
var flatten     = require('gulp-flatten');
var gulp        = require('gulp');
var imagemin    = require('gulp-imagemin');
var merge       = require('merge-stream');
var pngcrush    = require('imagemin-pngcrush');
var spritesmith = require('gulp.spritesmith');
var path        = require('../paths.js');

gulp.task('images', function () {
    return gulp.src([path.to.images.source, '!' + path.to.images.sprite])
        .pipe(imagemin({
            progressive : true,
            svgoPlugins : [{ removeViewBox: false }],
            use         : [ pngcrush() ]
        }))
        .pipe(flatten())
        .pipe(gulp.dest(path.to.images.destination));
});

gulp.task('sprite', function () {
    var spriteData = gulp.src(path.to.images.sprite)
        .pipe(spritesmith({
            imgName: 'sprite.png',
            cssName: 'sprite.css',
            imgPath: '../images/sprite.png'
        }));

    var imgStream = spriteData.img
        .pipe(buffer())
        .pipe(imagemin())
        .pipe(gulp.dest(path.to.images.destination));

    var cssStream = spriteData.css
        .pipe(csscomb())
        .pipe(gulp.dest('./.tmp/css'));

    return merge(imgStream, cssStream);
});


gulp.task('fonts', function() {
    return gulp.src([ path.to.fonts.source ])
        .pipe(flatten())
        .pipe(gulp.dest(path.to.fonts.destination));
});
