<template>
    <div id="home">
        <div class="home-container">
            <div class="stats"></div>
            <router-link to="/quiz" class="big-btn">Start Quiz</router-link>
        </div> 
    </div>
</template>

<script>

export default {
    data() 
    {
        return {

        }
    }
}
</script>

<style scoped>
    .stats {
        width: 100%;
        height: 50vh;
        background-image: url(/assets/cat.png);
        background-size: cover;
        position: absolute;
    }
</style>
