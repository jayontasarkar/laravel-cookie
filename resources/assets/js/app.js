
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

Vue.component('list-persons', require('./components/ListPersons.vue'));
Vue.component('create-persons', require('./components/CreatePersons.vue'));
Vue.component('edit-persons', require('./components/EditPersons.vue'));

const app = new Vue({
    el: '#app'
});
