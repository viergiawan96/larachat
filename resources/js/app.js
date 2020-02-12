require('./bootstrap');
import Vue from 'vue';
import Vuex from 'vuex';
import StoreData from './store';

window.Vue = require('vue');

const store = new Vuex.Store(StoreData);

Vue.prototype.$userId = document.querySelector("meta[name='user-id']").getAttribute('content');

Vue.component('app-chat', require('./components/appChat.vue').default);


const app = new Vue({
    store,
    el: '#app',
});
