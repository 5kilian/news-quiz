<template>
    <div id="home">
        <div class="home-container">
            <div class="stats"></div>

            <div class="leaderboard">
                <router-link to="/LeaderBoard" class="loaderboard-text">Du bist auf Rang {{ $store.state.rang }}</router-link>
            </div>

            <div @click="startGame()" class="big-btn">Start Quiz</div>
        </div>
    </div>
</template>

<script>

export default {
    data() 
    {
        return {
            rang: 1
        }
    }
}
</script>

<style scoped>
    .home-container {
        width: 80%;
        transform: translateX(-50%);
        margin-left: 50%;
        margin-top: 2em;
        display: flex;
        flex-direction: column;
    }
    .stats {
        background-image: url(/assets/cat.png);
        background-size: cover;
        position: relative;
        height: 23em;
        width: 21em;
        margin: 0 auto;
        background-position: center;
    }

    @media screen and (max-width: 23em)
    {
        .stats {
            width: 100% !important;
            height: 19em;
        }
    }
    .leaderboard {
        width: 100%;
        text-align: center;
        box-shadow: 0 3px 5px rgba(0, 0, 0, 0.3);
        border-radius: 10px;
        border: 1px #004888;
        margin: 15px 0;
        padding: 10px 0;
    }
    .loaderboard-text {
        color: #004888;

    }
    .big-btn {
        width: 100%;
        height: 5em;
        background-color: #004888;
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        box-shadow: 0 3px 5px rgba(0, 0, 0, 0.3);
        border-radius: 10px;
        position: relative;
    }

    .big-btn:active {
        background-color: #0367bf;
    }
</style>
