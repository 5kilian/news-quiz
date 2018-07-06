<template>
    <div id="home">
        <div class="home-container">
            <div class="big-btn" @click="startQuiz()">Start Quiz</div>
            <div class="big-btn" @click="startFakeOrNoFake()" style="margin-top: 2em;">Fake or no Fake</div>
        </div> 
    </div>
</template>

<script>
import {bus} from '../app.js'

export default {
    data() 
    {
        return {

        }
    },
    methods: {
        startQuiz()
        {
            bus.$emit('changePage', 'quiz')
            bus.$emit('bottomNav')
            bus.$emit('mainNavBackBtn')
        },
        startFakeOrNoFake()
        {
            bus.$emit('changePage', 'fakeornofake')
            bus.$emit('bottomNav')
            bus.$emit('mainNavBackBtn')
        }
    }
}
</script>
