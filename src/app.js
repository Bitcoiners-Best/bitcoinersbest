import Vue from 'vue';
import App from './App.vue';
import axios from 'axios';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

const router = new VueRouter({
  routes: [
    { path: '/' }
  ],
  mode: 'history'
});

new Vue({
    router,
    el: '#app',
    render: h => h(App)
})
