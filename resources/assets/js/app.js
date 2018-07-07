/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import Vuex from 'vuex';

import hammerjs from 'hammerjs';

Vue.use(VueRouter);
Vue.use(Vuex);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import App from './components/App';
import Home from './components/Home';
import QuizPage from './components/QuizPage';
import News from './components/News';
import SideMenu from './components/SideMenu';
import FakeOrNoFake from './components/FakeOrNoFake';
import Solution from './components/Solution';
import Category from './components/Category';

const routes = [
    { path: '/', component: Home },
    { path: '/home', redirect: '/' },
    { path: '/quiz', component: QuizPage },
    { path: '/news', component: News },
    { path: '/side-menu', component: SideMenu },
    { path: '/fakeornofake', component: FakeOrNoFake },
    { path: '/solution', component: Solution, props: (route) => ({ answerID: route.query.answerID }) },
    { path: '/category', component: Category }
];

const router = new VueRouter({ routes });

const store = new Vuex.Store({
    state: {
        backButton: false,
        navigation: true
    }
});

const app = new Vue({
    el: '#app',
    components: { App },
    data: {},
    mounted() {

    },
    methods: {},
    store,
    router
});
