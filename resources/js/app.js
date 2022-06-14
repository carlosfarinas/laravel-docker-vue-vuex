require('./bootstrap');

import "@fortawesome/fontawesome-free/css/all.css";

import Vue from "vue"
import VueRouter from "vue-router";

import router from "./Router/index";
import store from "./store/index";
import App from "./App.vue";

Vue.use(VueRouter);


const app = new Vue({
    el: '#app',
    router,
    store,
    components: { App }
});


