import Vue from 'vue';
import VueRouter from 'vue-router';
import Axios from 'axios';
import Echo from 'laravel-echo'
import Moment from 'moment';
import SmoothScroll from 'smoothscroll-polyfill';
import Bus from './helpers/EventBus.js';
import Helpers from './helpers/Helpers.js';
import NProgress from 'nprogress';

SmoothScroll.polyfill();

window.Vue = Vue;
window.moment = Moment;
window.Bus = Bus;
window.Helpers = Helpers;

NProgress.configure({easing: 'ease', speed: 200})
window.NProgress = NProgress;

Vue.use(VueRouter);

window.axios = Axios;
window.axios.defaults.headers.common = {
  'X-Requested-With': 'XMLHttpRequest',
  'X-CSRF-TOKEN': document.querySelector('[name="csrf-token"]').getAttribute('content'),
};

window.Echo = new Echo({
  broadcaster: 'pusher',
  key: 'c04a67b0a399919b8481'
});
