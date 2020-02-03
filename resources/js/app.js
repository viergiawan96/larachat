
require('./bootstrap');

window.Vue = require('vue');

Vue.component('app-chat', require('./components/appChat.vue').default);

const app = new Vue({
    el: '#app',
});
