import Event from './event';

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.Event = new Event();

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('tasks', require('./components/TasksComponent.vue'));
Vue.component('task-create', require('./components/TaskCreateComponent.vue'));
Vue.component('tasks-done', require('./components/TasksDoneComponent.vue'));
Vue.component('tasks-search', require('./components/TasksSearchComponent.vue'));

const app = new Vue({
    el: '#app'
});
