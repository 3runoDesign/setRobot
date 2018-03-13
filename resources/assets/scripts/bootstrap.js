// Import IE polyfill for Vue
import "babel-polyfill";

// jQuery import
const $ = global.jQuery;
window.$ = $;

/**
 * We'll load Lodash, a modern JavaScript utility library delivering modularity, performance & extras.
 * Lodash makes JavaScript easier by taking the hassle out of working with arrays, numbers, objects, strings, etc.
 * Lodash’s modular methods are great for: Iterating variables, Manipulating & testing values, Creating composite functions.
 */
window._ = require('lodash');

/**
 * Vue is a modern JavaScript library for building interactive web interfaces
 * using reactive data binding and reusable components. Vue's API is clean
 * and simple, leaving you to focus on building your next great project.
 */
window.Vue = require('vue');
