<template>
    <div class="color-gradient">
        <div class="solution-header wrong" :class="{'right': showTrue, 'wrong': !showTrue}">
            <span v-if="!showTrue">Falsch</span>
            <span v-if="showTrue">Richtig</span>
        </div>

        <div class="video" v-if="mediaVideo">
            <video :src="mediaVideo" controls></video>
        </div>

        <div v-if="!mediaVideo" class="solution-image">
            <img :src="mediaPicture" alt="Bild zur news">
        </div>

        <div class="solution-text">
            <div class="solution-title">
                {{ mediaTitle }}.
            </div>
                {{ mediaText }}
            </div>

        <div class="score-board">
            <span> {{ score }}</span>
        </div>

        <div class="next-button" @click="nextQuestion()">
            Continue
        </div>
    </div>


</template>

<script>
    export default {
        name: "Solution",
        props: ['answerID', 'nofake'],
        data() {
            return {
                score: "",
                correct: false,
                isTrue: null,
                showTrue: false,
                mediaText: "",
                mediaTitle: "",
                mediaVideo: "",
                mediaPicture: ""
            }
        },
        methods: {
            demoCounterUp: function () {
                this.$store.state.demoCounter++;
            },
            next: function () {
                this.nextQuestion()
            }
        },
        mounted() {
            this.$store.state.navigation = true;
            this.$store.state.backButton = false;
            document.querySelector('body').style.backgroundImage = ''
        },
        created() {
            console.log(this.$route.query);
            let fonf;
            if(typeof this.$route.query.isTrue == "boolean")
            {
                fonf = Boolean(this.$route.query.isTrue)
            }
            axios.post("/api/v1/game/answer", {
                    AID: this.answerID,
                    isTrue: fonf
            })
            .then(response => {
                this.showTrue = response.data.Result;
                this.mediaVideo = response.data.Video;

                let text = response.data.Text.split(".");
                this.mediaTitle = text[0];

                text.shift();
                this.mediaText = text.join(".");

                this.mediaPicture = response.data.Picture
            });
        },
        computed: {
            getDemoCounter() {
                return this.$store.state.demoCounter;
            },

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
        margin: 0 auto 10em;
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
        /*width: auto;*/
        text-align: center;
        background-color: rgb(19, 92, 144);
        padding: 0 5px 0 5px;
        color: white;
        bottom: 3.95em;
        position: fixed;
        width: 100%;
        height: 5em;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .solution-header.wrong {
        /*position: absolute;*/
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
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
    }

    .solution-header.right {
        background-color: #67bb1b;
    }

    .solution-title {
        font-weight: bold;
        margin-bottom: 0.5em;
    }

    .solution-image {
        width: 100vw;
        height: 30vh;
        overflow: hidden;
        margin-top: -1.2em;
        margin-bottom: 1em;
        box-shadow: 0 3px 5px rgba(0,0,0,.4);
    }

    .solution-image img {
        width: 100%;
        transform: translateY(-50%);
        margin-top: 25%;
    }
</style>
