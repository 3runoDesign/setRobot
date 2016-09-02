'use strict';

var gulp     = require('gulp');
var connect  = require('gulp-connect');
var flatten  = require( 'gulp-flatten' );
var imagemin = require( 'gulp-imagemin' );
var pngcrush = require( 'imagemin-pngcrush' );

var path     = require('../paths.js');


gulp.task('fonts', function() {
    return gulp.src([ path.to.fonts.source ])
        .pipe( flatten() )
        .pipe( gulp.dest( path.to.fonts.destination ) );
});

gulp.task( 'images', function () {
    return gulp.src( path.to.images.source )
      .pipe( imagemin({
          progressive : true,
          svgoPlugins : [{ removeViewBox: false }],
          use         : [ pngcrush() ]
      }))
      .pipe( gulp.dest( path.to.images.destination ));
});
