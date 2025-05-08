module.exports = function(config) {
  'use strict';

  config.set({
    autoWatch: true,
    browsers:  ['Firefox'],

    files: [
      'vendor/*.js',
      'lib/*.css',
      'lib/*.js',
    ],

    frameworks: ['jasmine'],
    logLevel:   config.LOG_ERROR,
    port:       9876,
    reporters:  ['dots'],
    singleRun:  true
  });
};
