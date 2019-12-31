import Vue from 'vue';
import BootstrapVue from 'bootstrap-vue';
import App from './App.vue';

import store from './store'

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
import Book from "./components/resources/Book.vue";
import Thread from "./components/resources/Thread.vue";
import Episode from "./components/resources/Episode.vue";

//import Resource from "./views/Resource.vue";

import Faq from "./views/Faq.vue";
import Terms from "./views/Terms.vue";
import Privacy from "./views/Privacy.vue";

Vue.use(VueRouter);
Vue.use(BootstrapVue);

Vue.config.devtools = true;
Vue.config.productionTip = false;

const router = new VueRouter({
  mode: 'history',
  linkExactActiveClass: 'active',
  routes: [
    { path: '/', name: 'index', component: Article },

    { path: '/login', name: 'login', component: Login },
    { path: '/signup', name: 'signup', component: Signup },

    { path: '/submit', name: 'submit', component: Submit },
    { path: '/profile/:name', name: 'profile', component: Profile },

    { path: '/podcast', name: 'podcast', component: Podcast },
    { path: '/article', name: 'article', component: Article },
    { path: '/book', name: 'book', component: Book },
    { path: '/thread', name: 'thread', component: Thread },
    { path: '/episode', name: 'episode', component: Episode },

    //{ path: '/:id/:title', name: 'resource', component: Resource, props: true },

    { path: '/faq', name: 'faq', component: Faq },
    { path: '/terms', name: 'terms', component: Terms},
    { path: '/privacy', name: 'privacy', component: Privacy}
  ]
});



new Vue({
    store,
    router,
    el: '#app',
    render: h => h(App)
})
