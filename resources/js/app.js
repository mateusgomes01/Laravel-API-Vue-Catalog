require('./bootstrap');

window.Vue = require('vue');

Vue.component('front-page', require('./components/Front.vue').default);
Vue.component('installs-page', require('./components/Installs.vue').default);

const app = new Vue({
    el: '#app',
});
