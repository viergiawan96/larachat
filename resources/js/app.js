require('./bootstrap');
import Vue from 'vue';
import Vuex from 'vuex';
import StoreData from './store';
import VueFilterDateFormat from 'vue-filter-date-format';

window.Vue = require('vue');

Vue.use(VueFilterDateFormat, {
    dayOfWeekNames: [
      'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday',
      'Friday', 'Saturday'
    ],
    dayOfWeekNamesShort: [
      'Su', 'Mo', 'Tu', 'We', 'Tr', 'Fr', 'Sa'
    ],
    monthNames: [
      'January', 'February', 'March', 'April', 'May', 'June',
      'July', 'August', 'September', 'October', 'November', 'December'
    ],
    monthNamesShort: [
      'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
      'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
    ]
  });
const store = new Vuex.Store(StoreData);

Vue.prototype.$userId = document.querySelector("meta[name='user-id']").getAttribute('content');

Vue.component('app-chat', require('./components/appChat.vue').default);


const app = new Vue({
    store,
    el: '#app',
});
