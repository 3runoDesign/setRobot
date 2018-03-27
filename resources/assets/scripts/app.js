import Vue from 'vue';

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import './bootstrap';

import ExampleComponent from './components/Example.vue';

Vue.component('my-teste', ExampleComponent);

const app = new Vue({
    el: '#app'
});
