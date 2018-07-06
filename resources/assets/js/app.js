
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import hammerjs from 'hammerjs'

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('main-header', require('./components/MainHeader.vue'));
Vue.component('bottom-nav', require('./components/ButtomNavigation.vue'));
Vue.component('side-menu', require('./components/SideMenu.vue'));
Vue.component('home', require('./components/Home.vue'));
Vue.component('quiz-page', require('./components/QuizPage.vue'));
Vue.component('fakeornofake-page', require('./components/FakeOrNoFake.vue'));

export const bus = new Vue()

const app = new Vue({
    el: '#app',
    data: {
        pages: {
            home: true,
            quiz: false,
            fakeornofake: false
        },
        bottomNav: true
    },
    mounted() {
        bus.$on('changePage', page => {
            this.changePage(page)
        })

        bus.$on('bottomNav', () => {
            this.bottomNav = !this.bottomNav
        })
    },
    methods: {
        changePage(page)
        {
            Object.entries(this.pages).forEach(([key, value]) => {
                key == page ? this.pages[key] = true : this.pages[key] = false
            })
        }
    }
});
