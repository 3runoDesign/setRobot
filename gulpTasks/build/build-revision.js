var gulp = require('gulp');
var RevAll = require( 'gulp-rev-all' );

var path   = require('../paths.js');

gulp.task('rev', function () {
    var revAll = new RevAll({dontRenameFile: [/^\/fonts/g, /^\/img/g]});
    return gulp.src([path.to.destination + '/**'])
        .pipe(gulp.dest(path.to.destination))
        .pipe(revAll.revision())
        .pipe(gulp.dest(path.to.destination))
        .pipe(revAll.manifestFile())
        .pipe(gulp.dest(path.to.destination));
});
