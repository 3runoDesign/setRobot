'use strict';

var gulp = require('gulp');
var imagemin = require('gulp-imagemin');
var svgSprite = require('gulp-svg-sprite');

var config = require('../config/svgSprite');

gulp.task('svg:sprite', function () {
  return gulp.src(config.source)
    .pipe(svgSprite({
      hape: {
        spacing: {
          padding: 5
        }
      },
      mode: {
        css: {
          dest: './',
          layout: 'vertical',
          sprite: config.dest,
          bust: false,
          render: {
            scss: {
              dest: '_css/src/_sprite.scss',
              template: '_build/tpl/sprite-template.scss'
            }
          }
        }
      },
      variables: {
        mapname: 'icons'
      }
    }))
    .pipe(gulp.dest(config.dest));
});
