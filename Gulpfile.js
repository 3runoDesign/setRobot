'use strict';

var gulp         = require('gulp');
var gulpSequence = require( 'gulp-sequence' );
var requireDir   = require('require-dir');

requireDir('./gulpTasks', { recurse: true });
