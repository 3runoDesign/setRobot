// Require bootstrapped js
require('./bootstrap');

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});

$('body').append('<p>Added from jQuery</p>');
