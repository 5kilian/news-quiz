<template>
    <div id="home">
        <div class="home-container">
            <div class="big-btn" @click="startQuiz()">Start Quiz</div>
            <div class="big-btn" @click="startQuiz()" style="margin-top: 5em;">Start Quiz v2</div>
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
        }
    }
}
</script>
