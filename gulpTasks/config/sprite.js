'use strict';

var config = require('./');

module.exports = {
  source: config.sourcePath + 'assets/sprite/**/*.png',
  dest: config.buildPath + 'assets/images/',
  baseImg: config.sourcePath + 'assets/images/',
  baseScss: config.sourcePath + 'assets/sass/helper/',
  spritesmith: {
    imgName: 'sprite.png',
    cssName: '_sprite.scss',
    cssFormat: 'scss',
    imgPath: '../../assets/images/sprite.png'
  }
};
