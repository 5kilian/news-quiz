<template>
    <div class="container">
        <div class="row justify-content-center quiz-container">
            <div class="col-md-8" style="padding-left: 2em; padding-right: 2em;">
                <div class="quiz-question">
                    <span>{{ response.QuestionText }}</span>
                </div>

                <div class="quiz-answers">
                    <div class="quiz-answer" @click="submit(answer.AID)" :key="index" v-for="(answer, index) in response.Answers">
                        {{ answer.answertext }}
                    </div>
                </div>

            </div>
        </div>
        <div class="bg"></div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: 'QuizPage',
        data() {
            return {
                response: {}
            };
        },

        methods: {
            submit: function (answerID) {
                this.$router.push({path: "/solution", query: {answerID: answerID}})
            },
            demoCounterUp: function () {
                this.$store.state.demoCounter++;
            }
        },
        created() {
            const demoArray = [1, 2, 3];
            let source = "/api/v1/questions/" + demoArray[this.$store.state.demoCounter];
            axios
                // .get('/api/v1/random')
                .get(source)
                .then(response => {
                    this.response = response.data;
                    document.querySelector('body').style.backgroundImage = `url(${this.response.PicURL})`
                });
        },
        mounted() {
            this.$store.state.backButton = true;
            this.$store.state.navigation = false;
        },
        computed: {
            demoCounter() {
                return this.$store.state.demoCounter;
            },
        }
    };
</script>

<style scoped>
    .quiz-container {
        position: absolute;
        z-index: 1;
        width: 100vw;
        margin: 0;
    }

    .bg {
        background-color: black;
        opacity: 0.6;
        width: 100vw;
        height: calc(100vh - 3.8em);
        position: absolute;
        background: -moz-linear-gradient(bottom, rgba(0, 0, 0, 1) 20%, rgba(0, 0, 0, .2) 100%);
        background: -webkit-linear-gradient(bottom, rgba(0, 0, 0, 1) 20%, rgba(0, 0, 0, .2) 100%);
        background: linear-gradient(to top, rgba(0, 0, 0, 1) 20%, rgba(0, 0, 0, .2) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#a6000000', GradientType=0);
    }

    .container {
        height: 100vh;
        margin-top: -1em;
        padding: 0;
    }

    .quiz-question {
        position: relative;
        display: flex;
        flex-wrap: wrap;
        text-shadow: 0 3px 5px black;
        height: 35vh;
        margin: auto 10px auto 10px;
        border-radius: 10px;
        justify-content: center;
        align-items: center;
        color: white;
        font-family: serif;
        font-size: 1.4em;
        letter-spacing: 0.5px;
        text-align: center
    }

    .quiz-question span {
        width: auto;
        height: auto;
        /*position: absolute;*/
        /*bottom: 0;*/
    }

    .quiz-answers {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        height: 50vh;
    }

    .quiz-answer {
        flex-grow: 1;
        margin: 10px;
        box-shadow: 0 3px 5px rgba(0, 0, 0, .6);
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
        user-select: none;
        padding: 0.3em 0 0 0.5em;
        width: calc(100% * 1 / 2);
        border-radius: 10px;
        background-color: white;
        color: #2d2d2d;
        display: flex;
        justify-content: center;
        align-items: center;
        font-weight: bold;
        text-align: center;
    }

    .quiz-answer:hover {
        background-color: lightgray;
    }

    .quiz-answer:active {
        background-color: lightgray;
    }

    .quiz-answer:focus-within {
        transform: translateY(4px);
    }


</style>

