require('./bootstrap');

import Vue from 'vue';
import store from './store';
import router from './router';
import App from './components/App';

window.accessToken = store.accessToken;
window.role = store.role;

Vue.component('App', App);

const app = new Vue({
    router,
    el: '#app',
    mounted: function () {
        Metro.init();
    }
});
