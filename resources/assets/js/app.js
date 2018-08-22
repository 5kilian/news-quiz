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
import SideMenu from './components/SideMenu';
import FakeOrNoFake from './components/FakeOrNoFake';
import Solution from './components/Solution';
import Category from './components/Category';
import TimeLine from './components/TimeLine';
import QuestionCreator from './components/QuestionCreator';
import ThankYou from './components/ThankYou';
import Leaderboard from './components/LeaderBoard';
import Axios from 'axios';

const routes = [
    { path: '/', component: Home },
    { path: '/home', redirect: '/' },
    { path: '/quiz', component: QuizPage },
    { path: '/news', component: TimeLine },
    { path: '/side-menu', component: SideMenu },
    { path: '/fakeornofake', component: FakeOrNoFake },
    { path: '/solution', component: Solution, props: (route) => ({ answerID: route.query.answerID }) },
    { path: '/category', component: Category },
    { path: '/admin/question', component: QuestionCreator },
    { path: '/thankyou', component: ThankYou},
    { path: '/leaderboard', component: Leaderboard}
];

const router = new VueRouter({ routes });

const store = new Vuex.Store({
    state: {
        backButton: false,
        navigation: true,
        counter: 0,
        questions: new Array(),
        rank: 0,
        points: 0
    }
});

const mix = Vue.mixin({
    methods: {
        startGame: function()
        {
            Axios.get("/api/v1/getfive")
            .then(res => {   
                this.$store.state.counter = 0 
                this.$store.state.questions = res.data
                this.nextQuestion()
            })
        },
        nextQuestion() 
        {
            if(this.$store.state.questions['Unlock_Time'] != undefined)
            {
                this.$router.push("/thankyou")
            }
            else if(this.$store.state.questions[this.$store.state.counter] == undefined)
            {
                this.$router.push("/thankyou")
            }
            else if(this.$store.state.questions[this.$store.state.counter].Answers.length > 1)
            {
                this.$router.push({ path: "/quiz", query: { 
                    response: this.$store.state.questions[this.$store.state.counter]
                }})
            }
            else
            {
                this.$router.push({ path: "/fakeornofake", query: { 
                    response: this.$store.state.questions[this.$store.state.counter]
                }})
            }

            this.$store.state.counter++
        },
        updatePoints() {
            Axios
            .get("/api/v1/points")
            .then(res => {
                this.$store.state.points = res.data
            })
        },
    }
})

const app = new Vue({
    el: '#app',
    components: { App },
    data: {},
    mounted() {
        Axios
        .get("/api/v1/rank")
        .then(res => {
            this.$store.state.rank = res.data
        })

        this.updatePoints()
    },
    store,
    router
});
