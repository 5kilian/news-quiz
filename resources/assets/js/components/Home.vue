<template>
    <div id="home">
        <div class="home-container">
            <router-link to="/quiz" class="big-btn" @click="startQuiz()">Start Quiz</router-link>
            <router-link to="/quiz" class="big-btn" @click="startQuiz()" style="margin-top: 2em;">Fake or no Fake</router-link>
        </div> 
    </div>
</template>

<script>

export default {
    data() 
    {
        return {

        }
    },
    methods: {
        startQuiz()
        {

        }
    }
}
</script>
