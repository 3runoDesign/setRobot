"use strict";

var gulp           = require( 'gulp' ),
    sass           = require( 'gulp-sass' ),
    clean          = require( 'gulp-clean' ),
    cssnano        = require( 'gulp-cssnano' ),
    gulpSequence   = require( 'gulp-sequence' ),
    autoprefixer   = require( 'gulp-autoprefixer' ),
    argv           = require( 'yargs' ).argv,
    RevAll         = require( 'gulp-rev-all' ),
    concat         = require( 'gulp-concat' ),
    uglify         = require( 'gulp-uglify' ),
    mainBowerFiles = require( 'main-bower-files' ),
    filter         = require( 'gulp-filter' ),
    fs             = require( 'graceful-fs' ),
    bowerrc        = JSON.parse( fs.readFileSync( './.bowerrc' ) ),
    flatten        = require( 'gulp-flatten' ),
    imagemin       = require( 'gulp-imagemin' ),
    pngcrush       = require( 'imagemin-pngcrush' ),
    livereload     = require( 'gulp-livereload' ),
    tap            = require( 'gulp-tap' );

var paths = {
      'dist'     : './assets',
      'src'      : './resources',
      'bower'    : bowerrc.directory,
      'bourbon'  : bowerrc.directory + '/bourbon/app/assets',
      'neat'     : bowerrc.directory + '/neat/app/assets',
    },

    includeSass = [
        paths.bourbon + '/stylesheets/',
        paths.neat    + '/stylesheets/',
        paths.bower   + '/helpers-scss/',
        paths.bower   + '/family.scss/source/src/',
    ];

gulp.task('clean-all', function() {
    return gulp.src( paths.dist + '/', { read: false })
    .pipe( clean() );
});


// Files SASS
// ============
gulp.task( 'sass-dev', function () {
    return gulp.src( paths.src + '/sass/main.scss' )
        .pipe( sass({
            includePaths   : includeSass,
            outputStyle    : 'expanded',
            sourceComments : true
        }))
        .pipe( autoprefixer( 'last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1' ) )
        .pipe( sass().on('error', sass.logError) )
        .pipe(gulp.dest(paths.dist + '/css'));
});

gulp.task( 'sass-prod', function () {
    return gulp.src( paths.src + '/sass/main.scss' )
        .pipe( sass({
            includePaths   : includeSass,
            outputStyle    : 'compressed',
            sourceComments : false
        }))
        .pipe( autoprefixer( 'last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1' ) )
        .pipe( sass().on('error', sass.logError) )
        .pipe(tap(function(file) {
            //:: Melhorar o comentário de debug.
            // file.contents = new Buffer(
            //     file.contents.toString().split(
            //         file.path.substr( 0, ( file.path.indexOf( '/themes/' ) + 1 ) )
            //     ).join('/')
            // );
        }))
        .pipe(gulp.dest(paths.dist + '/css'));
});

gulp.task('css-min', ['sass'], function(){
    return gulp.src(paths.dist + '/css/*.css')
        .pipe(cssnano())
        .pipe(gulp.dest(paths.dist + '/css'));
});

// Files JS
// ============
gulp.task('scripts', function() {
    return gulp.src(paths.src + '/js/**/*.js')
       .pipe(concat('main.js'))
       .pipe(gulp.dest(paths.dist + '/js'));
});

gulp.task('js-min', ['scripts'], function() {
    return gulp.src(paths.dist + '/js/*.js')
       .pipe( uglify() )
       .pipe(gulp.dest(paths.dist + '/js'));
});

// == Task Fonts == //
gulp.task('fonts', function() {
    return gulp.src([ paths.src + '/fonts/**/*.{eot,svg,ttf,woff,woff2}' ])
        .pipe( flatten() )
        .pipe( gulp.dest( paths.dist + '/fonts/' ) );
});

gulp.task( 'images', function () {
    return gulp.src(paths.src + '/img/**/*' )
      .pipe( imagemin({
          progressive : true,
          svgoPlugins : [{ removeViewBox: false }],
          use         : [ pngcrush() ]
      }))
      .pipe(  gulp.dest(paths.dist + '/img/' ) );
});


// Vendors
// ============
gulp.task('providers', function() {
    gulp.src( mainBowerFiles(), { base: bowerrc.directory } )
        .pipe( filter(['**/*.js', '!**/jquery.js'], {restore: true}) )
        .pipe( concat('vendor.js') )
        .pipe( uglify() )
        .pipe( gulp.dest( paths.dist + '/js/' ) );

    gulp.src( mainBowerFiles(), { base: bowerrc.directory } )
        .pipe( filter(['**/*.css'], {restore: true}) )
        .pipe( flatten() )
        .pipe( cssnano() )
        .pipe( concat('vendor.css') )
        .pipe( gulp.dest( paths.dist + '/css/' ) );

    gulp.src([ bowerrc.directory + '/**/*.{eot,svg,ttf,woff,woff2}' ])
        .pipe( flatten() )
        .pipe( gulp.dest( paths.dist + '/fonts/' ) );
});

// Files in production
// ============
gulp.task('rev', ['css-min', 'js-min'], function () {
    var revAll = new RevAll({dontRenameFile: [/^\/fonts/g, /^\/img/g]});
    return gulp.src([paths.dist + '/**'])
        .pipe(gulp.dest(paths.dist))
        .pipe(revAll.revision())
        .pipe(gulp.dest(paths.dist))
        .pipe(revAll.manifestFile())
        .pipe(gulp.dest(paths.dist));
});

gulp.task('w', function() {
    gulp.watch( paths.src + '/sass/**/*.scss'          , [ 'sass-dev' ]);
    gulp.watch( paths.src + '/js/**/*.js'              , [ 'scripts' ]);
    gulp.watch( paths.src + '/img/**'                  , [ 'images' ]);
    gulp.watch( paths.src + '/fonts/**'                , [ 'fonts' ]);

    livereload.listen();

    gulp.watch( '**/*.php' ).on( 'change', livereload.changed );
    gulp.watch( paths.dist + '/css/*.css' ).on( 'change' , livereload.changed );
    gulp.watch( paths.dist + '/js/*.js' ).on( 'change'   , livereload.changed );
    gulp.watch( paths.dist + '/img/**' ).on( 'change'    , livereload.changed );
    gulp.watch( paths.dist + '/fonts/**' ).on( 'change'  , livereload.changed );
});

gulp.task('assets-dev', function(callback) {
    gulpSequence('clean-all', ['sass-dev', 'scripts', 'providers', 'fonts', 'images'], callback);
});

gulp.task('assets-build', function(callback) {
    if (argv.p === true || argv.production === true ) {
        gulpSequence(['clean-all'], ['providers', 'fonts', 'images', 'rev'], callback);
    } else {
        gulpSequence('clean-all', ['sass-prod', 'scripts', 'providers', 'fonts', 'images'], callback);
    }
});

gulp.task('ab', ['assets-build']);
gulp.task('ad', ['assets-dev']);
