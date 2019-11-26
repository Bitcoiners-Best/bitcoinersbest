import Vue from 'vue';
import BootstrapVue from 'bootstrap-vue';
import App from './App.vue';

import axios from 'axios';
import VueRouter from 'vue-router';

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import './assets/css/site.css'

import Login from "./views/Login.vue";
import Signup from "./views/Signup.vue";


import Submit from "./views/Submit.vue";
import Profile from "./views/Profile.vue";

import Podcast from "./components/resources/Podcast.vue";
import Article from "./components/resources/Article.vue";

import Faq from "./views/Faq.vue";
import Terms from "./views/Terms.vue";
import Privacy from "./views/Privacy.vue";

Vue.use(VueRouter);
Vue.use(BootstrapVue);


const router = new VueRouter({
  mode: 'history',
  routes: [
    { path: '/index/vue' },

    { path: '/login', component: Login },
    { path: '/signup', component: Signup },

    { path: '/submit', component: Submit },
    { path: '/profile/:name', component: Profile },

    { path: '/podcast', component: Podcast },
    { path: '/article', component: Article },

    { path: '/faq', component: Faq },
    { path: '/terms', component: Terms},
    { path: '/privacy', component: Privacy}
  ]
});

new Vue({
    router,
    el: '#app',
    render: h => h(App)
})
