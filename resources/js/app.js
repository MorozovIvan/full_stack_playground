
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue';
import { TableComponent, TableColumn } from 'vue-table-component';
// import VueRouter from 'vue-router'
//
// Vue.use(VueRouter);

Vue.component('table-component', TableComponent);
Vue.component('table-column', TableColumn);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('list', require('./components/ListComponent.vue'));
Vue.component('file-upload', require('./components/Form/FileUploadComponent.vue'));
Vue.component('project-select', require('./components/Form/ProjectSelectComponent.vue'));



const app = new Vue({
    el:"#app",
    data: {
        //
    }
});
