'use strict';

var argv = require('yargs').argv;
var buffer = require('vinyl-buffer');
var csscomb = require('gulp-csscomb');
var flatten = require('gulp-flatten');
var gulp = require('gulp');
var gulpSequence = require('gulp-sequence');
var imagemin = require('gulp-imagemin');
var merge = require('merge-stream');
var path = require('../paths.js');
var pngcrush = require('imagemin-pngcrush');
var spritesmith = require('gulp.spritesmith');

// Images
// ========

gulp.task('images', function () {
  return gulp.src([path.to.images.source, '!' + path.to.images.sprite])
    .pipe(imagemin({
      progressive: true,
      svgoPlugins: [{ removeViewBox: false }],
      use: [pngcrush()]
    }))
    .pipe(flatten())
    .pipe(gulp.dest(path.to.images.destination));
});

// Sprite
// ========

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

// Fonts
// ========

gulp.task('fonts', function () {
  return gulp.src([path.to.fonts.source])
    .pipe(flatten())
    .pipe(gulp.dest(path.to.fonts.destination));
});

gulp.task('basic-sprite', function (callback) {
  gulpSequence('sass', 'images', 'sprite', ['css-build'], callback);
});

gulp.task('basic-assets', function (callback) {
  gulpSequence('providers', 'sass-prod', 'images', 'sprite', ['css-build'], 'scripts', 'fonts', callback);
});

gulp.task('build-assets', function (callback) {
  if (argv.p === true || argv.production === true) {
    gulpSequence('clean-all', ['basic-assets'], 'css-min', 'scripts-min', 'rev', callback);
  } else {
    gulpSequence('clean-all', ['basic-assets'], callback);
  }
});
