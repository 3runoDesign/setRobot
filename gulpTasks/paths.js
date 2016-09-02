'use strict';

var path = require('path');

var pathToThisFile = __dirname;
var root           = path.dirname( pathToThisFile );
var destination    = root + '/assets';
var resources    = root + '/resources';

var fs        = require( 'graceful-fs' );
var bowerrc   = JSON.parse( fs.readFileSync( root + '/.bowerrc' ) );
var bowerDirectory = bowerrc.directory;

module.exports = {
    to: {
        destination: destination,
        resources: resources,
        bowerDirectory: bowerDirectory,
        sass: {
            source: resources + '/sass/**/*.scss',
            main: resources + '/sass/main.scss',
            destination: destination + '/css',
            includes: [
                bowerDirectory + '/bourbon/app/assets/stylesheets/',
                bowerDirectory + '/neat/app/assets/stylesheets/',
                bowerDirectory + '/helpers-scss/',
                bowerDirectory + '/family.scss/source/src/'
            ]
        },
        scripts: {
            source: resources + '/scripts/**/*.js',
            main: resources + '/scripts/main.js',
            destination: destination + '/scripts'
        },
        images: {
            source: resources + '/images/**/*.*',
            destination: destination + '/images'
        },
        fonts: {
            source: resources +'/fonts/**/*.{eot,svg,ttf,woff,woff2}',
            vendor: bowerDirectory +'/**/*.{eot,svg,ttf,woff,woff2}',
            destination: destination + '/fonts'
        }
    }
};
