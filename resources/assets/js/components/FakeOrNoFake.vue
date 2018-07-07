<template>
    <div id="fonf">
        <div class="fonf-controlls">
            <div class="fonf-controll" @click="isfalse()">
                <i class="material-icons" style="color: #c53838;">block</i>
            </div>
            <div class="fonf-controll"  @click="istrue()">
                <i class="material-icons" style="color: #186518;">done_all</i>
            </div>
        </div>
        <div class="fonf-questions">
            {{ response.QuestionText }}
        </div>
        <div class="fonf-bg"></div>
    </div>
</template>

<script>
import hammerjs from 'hammerjs'
import Axios from 'axios';

export default {
    data()
    {
        return {
            response: new Object()
        }
    },
    mounted()
    {
        Axios.get('/api/v1/questions/10')
        .then(response => {
            this.response = response.data
            document.querySelector('body').style.backgroundImage = `url(${this.response.PicURL})`
        })

        var bg = new Hammer(document.querySelector('body'), {})
        bg.on('swiperight', () => {
            this.istrue()
        });

        bg.on('swipeleft', () => {
            this.isfalse()
        });
        this.$store.state.backButton = true;
        this.$store.state.navigation = false;
    },
    methods: {
        istrue() 
        {
            this.$router.push({path: "/solution", query: {answerID: this.response.Answers[0].AID, nofake: true}})
        },
        isfalse()
        {
            this.$router.push({path: "/solution", query: {answerID: this.response.Answers[0].AID, nofake: false}})
        }
    }
}
</script>


<style scoped>

.fonf-bg {
    background-color: black;
    opacity: 0.6;
    width: 100vw;
    height: calc(100vh - 3.8em);
    position: absolute;
    margin-top: -1em;
    background: -moz-linear-gradient(bottom, rgba(0,0,0,1) 0%, rgba(0,0,0,0) 100%);
    background: -webkit-linear-gradient(bottom, rgba(0,0,0,1) 0%,rgba(0,0,0,0) 100%);
    background: linear-gradient(to top, rgba(0,0,0,1) 0%,rgba(0,0,0,0) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00000000', endColorstr='#a6000000',GradientType=0 );
}

.fonf-controlls {
    display: flex;
    justify-content: space-between;
    position: absolute;
    width: 100vw;
    padding: 1em;
    margin-top: 32vh;
    z-index: 1;
}

.fonf-controll {
    background-color: white;
    border-radius: 50%;
    width: 4em;
    height: 4em;
    box-shadow: 0 3px 5px rgba(0,0,0,.4);
    display: flex;
    justify-content: center;
    align-items: center;
}

.fonf-questions {
    color: white;
    text-shadow: 0 2px 5px rgba(0,0,0,1);
    width: 80%;
    transform: translateX(-50%);
    position: absolute;
    margin-left: 50%;
    text-align: center;
    margin-top: 17vh;
    z-index: 1;
    font-size: 1.3em;
    font-family: serif;
    letter-spacing: 0.2px;
}
</style>
