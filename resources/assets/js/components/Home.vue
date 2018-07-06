<template>
    <div id="home">
        <div class="home-container">
            <div class="big-btn" @click="startQuiz()">Start Quiz</div>
            <div class="big-btn" @click="startQuiz()" style="margin-top: 2em;">Fake or no Fake</div>
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
        }
    }
}
</script>
