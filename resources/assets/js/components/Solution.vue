<template>
    <div class="color-gradient">
        <!--<div class="video" v-if="video != null">-->
        <!--<video src="video"></video>-->
        <!--</div>-->
        <div class="video">
            <video src="https://media.tagesschau.de/video/2018/0706/TV-20180706-1654-0101.webm.h264.mp4" autoplay
                   controls></video>
        </div>

        <h1>
            {{ answerID }}
        </h1>

        <div class="solution-result">
            <h2 v-if="correct" style="color: green">Richtig</h2>
            <h2 v-else style="color: red;">Falsch</h2>
        </div>

        <div class="score-board">
            <span> {{ score }}</span>
        </div>

        <div class="next-button">
            Continue
        </div>

    </div>


</template>

<script>
    import {bus} from "../app.js"

    export default {
        name: "Solution",
        props: ['answerID'],
        data() {
            return {
                score: null,
                correct: false,
                isTrue: null,
                response: {}
            }
        },
        mounted() {
        },
        created() {
            axios.post("localhost:2000/api/v1/questions/submit", {
                data: {
                    isTrue: this.isTrue,
                    AID: this.AID
                }.then(function(response) {
                    this.response = response;
                })
            })
        }
    }
</script>

<style scoped>
    .color-gradient {
        /*width: 100%;*/
        /*height: 100%;*/
        /*background: linear-gradient(to bottom, rgba(255, 0, 0, 1), rgba(255, 0, 0, 0.8))*/
    }

    .video {
        width: 100%;
        /*width: 30px;*/
        padding: 0 10px 0 10px;
        height: auto;
        max-height: 100%;
    }

    video {
        width: 100%;
        height: auto;
    }

    .solution-result {
        text-align: center;
    }

    .next-button {
        width: auto;
        text-align: center;
        background-color: rgba(0, 255, 0, 0.8);
        padding: 0 5px 0 5px;
        margin: 10px 30px 10px 30px;
        border-radius: 10px;
    }
</style>
