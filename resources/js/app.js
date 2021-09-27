require('./bootstrap');
import Vue from 'vue'
Vue.component('main-menu', require('./components/menu').default);
Vue.component('posts', require('./components/posts').default);
window.axios.defaults.headers.common['X-CSRF-TOKEN'] = document.head.querySelector('meta[name="csrf-token"]').content;
var VueBase = new Vue({
    el: '#app'
})
