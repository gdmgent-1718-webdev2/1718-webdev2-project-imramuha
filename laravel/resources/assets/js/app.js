
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


// Get the current URL path
var path = window.location.pathname;

// Find the corresponding link and add the 'active' class
$('.nav-link').each(function () {
    var href = $(this).attr('href');
    if ("http://127.0.0.1:8000/" + path.substring(1) == href) {
        $(this).addClass('active');
    }
});

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});