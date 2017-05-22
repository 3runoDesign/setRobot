var config = {};

var files = require('graceful-fs');
var bowerrc = JSON.parse(files.readFileSync('./.bowerrc'));

config.appPath = './';
config.sourcePath = config.appPath + 'resources/';
config.assetsPath = config.sourcePath + 'assets/';
config.nodeModules = './node_modules/';
config.buildPath = config.appPath + 'dist/';
config.manifestFile = 'assets.json';
config.proxyURL = 'setrobot.dev';
config.bowerDirectory = bowerrc.directory;

module.exports = config;
