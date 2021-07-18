require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';
import Vue from 'vue/dist/vue';

import App from './components/App.vue';
Vue.use(VueAxios, axios);

import IndexComponent from './components/restaurants/Index.vue';
import CreateComponent from './components/restaurants/Create.vue';
import EditComponent from './components/restaurants/Edit.vue';

const routes = [
    {
        name: 'restaurants',
        path: '/home',
        component: IndexComponent
    },
    {
        name: 'create',
        path: '/create',
        component: CreateComponent
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditComponent
    }
];

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');