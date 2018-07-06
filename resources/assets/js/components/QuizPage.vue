<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="quiz-question">
                    <span>{{ response.question }}</span>
                </div>

                <div class="quiz-answers">
                        <router-link :to="{name: 'Solution', params: { answerID: answer.index }}" class="quiz-answer"  @click="submit(answer.index)" v-for="answer in response.answers">
                            {{ answer.text }}
                        </router-link>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        name: "QuizPage",
        data() {
            return {
                response: {
                    question: "Wer ist Bundeskanzler/-in von Deutschland ? 🤔🤔🤔",
                    answers: {
                        answerA: {
                            text: "Theresa May",
                            index: 1
                        },
                        answerB: {
                            text: "Donald Trump",
                            index: 2
                        },
                        answerC: {
                            text: "Angelo Mertel",
                            index: 3
                        },
                        answerD: {
                            text: "Kartoffel",
                            index: 4
                        }
                    }
                },
                index: 0
            }
        },

        methods: {
            submit: function (index) {
                // console.log(index);
                this.$router.push({path: "/solution", params: {answerID: index}})

                // axios.post("localhost:2000/api/v1/questions/submit", {
                //     headers: {
                //         'Content-Type': 'application'
                //     }
                // })
            }
        },
        mounted() {
            // axios
            //     .get("localhost:2000/api/v1/questions/random")
            //     .then(response => (this.response = response))
        }
    }
</script>

<style scoped>
    .container {
        height: 100vh;
    }

    .quiz-question {
        position: relative;
        display: flex;
        flex-wrap: wrap;
        box-shadow: gray 0 3px 5px;
        height: 35vh;
        margin: auto 10px auto 10px;
        border-radius: 10px;
        text-align: center;
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
        box-shadow: gray 0 3px 5px;
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
        user-select: none;
        padding: 0.3em 0 0 0.5em;
        width: calc(100% * 1/2);
        border-radius: 10px;
    }

    .quiz-answer:hover {
        box-shadow: gray 0 5px 7px;
    }
    .quiz-answer:focus-within {
        transform: translateY(4px);
    }


</style>

