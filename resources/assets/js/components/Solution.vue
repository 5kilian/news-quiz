<template>
    <div class="color-gradient">
        <div class="solution-header wrong">
            Falsch
        </div>
        <!--<div class="video" v-if="video != null">-->
        <!--<video src="video"></video>-->
        <!--</div>-->
        <div class="video">
            <video src="https://media.tagesschau.de/video/2018/0706/TV-20180706-1654-0101.webm.h264.mp4"
                   controls></video>
        </div>

        <h1>
            {{ answerID }}
        </h1>

        <div class="solution-text">
            <div style="font-weight: bold; margin-bottom: 0.5em;">
                Keine Strohhalme, keine Teller und kein Besteck mehr aus Kunststoff - die EU-Pläne zum Plastikverbot sind ambitioniert.
                Doch die Umsetzung könnte sich schwierig gestalten.</div>
            Schätzungsweise 37 Kilogramm Plastikmüll verursacht allein jeder Deutsche jedes Jahr. EU-weit ist der Müllberg gut 26 Millionen Tonnen schwer. Und ein nicht geringer Teil davon landet in der Umwelt, vor allem in den Meeren in Form gigantischer Müllstrudel von sogenanntem Mikroplastik. Die Folgen für Fische und Vögel, aber letztlich auch für den Menschen seien verheerend, betont EU-Kommissionsvize Frans Timmermans.
        </div>

        <!-- <div class="solution-result">
            <h2 v-if="correct" style="color: green">Richtig</h2>
            <h2 v-else style="color: #e83535;">Falsch</h2>
        </div> -->

        <div class="score-board">
            <span> {{ score }}</span>
        </div>

        <router-link to="/" class="next-button">
            Continue
        </router-link>

    </div>


</template>

<script>
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
            function setGradient() {
                document.querySelector('body').style.background = 'linear-gradient(to bottom, rgba(255, 0, 0, 1), rgba(255, 0, 0, 0.8)';
            }

            this.$store.state.navigation = true;
            this.$store.state.backButton = false;
            document.querySelector('body').style.backgroundImage = ''
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
    .bg {
        background-color: black;
        opacity: 0.6;
        width: 100vw;
        height: 100vh;
        position: absolute;
        margin-top: -1.2em;
        background: -moz-linear-gradient(bottom, rgba(0,0,0,1) 0%, rgba(0,0,0,0) 100%);
        background: -webkit-linear-gradient(bottom, rgba(0,0,0,1) 0%,rgba(0,0,0,0) 100%);
        background: linear-gradient(to top, rgba(0,0,0,1) 0%,rgba(0,0,0,0) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00000000', endColorstr='#a6000000',GradientType=0 );
    }

    .solution-text {
        width: 80%;
        margin: 0 auto;
        margin-bottom: 10em;
    }

    .color-gradient {
        /*width: 100%;*/
        /*height: 100%;*/
        /*background: linear-gradient(to bottom, rgba(255, 0, 0, 1), rgba(255, 0, 0, 0.8))*/
    }

    .video {
        width: 100%;
        /*width: 30px;*/
        /* padding: 0 10px 0 10px; */
        height: auto;
        max-height: 100%;
        margin-top: -1.2em;
    }

    video {
        width: 100%;
        height: auto;
        box-shadow: 0 3px 5px rgba(0, 0, 0, 0.3);
    }

    .solution-result {
        text-align: center;
    }

    .next-button {
        width: auto;
        text-align: center;
        background-color: rgb(19, 92, 144);
        padding: 0 5px 0 5px;
        color: white;
        bottom: 4em;
        position: fixed;
        width: 100%;
        height: 5em;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .solution-header.wrong {
        position: absolute;
        top: 0;
        height: 3.7em;
        background-color: #bb1b1b;
        width: 100%;
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 1;
        position: fixed;
        text-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
    }

    .solution-header.right {
        background-color: #67bb1b;
    }
</style>
