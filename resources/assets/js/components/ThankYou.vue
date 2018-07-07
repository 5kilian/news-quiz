<template>
    <div class="thankyou">
        <div class="thankyou-text">
            Du hast alle Quizze durchgespielt. <br>In ein paar Stunden gibt es wieder neue. Bis gleich!
        </div>
        <div class="thankyou-cat"></div>
    </div>
</template>

<script>
    export default {
        name: "ThankYou",
        mounted() {
            document.querySelector('body').style.backgroundImage = ''
            this.$store.state.backButton = false;
            this.$store.state.navigation = true;

            this.$store.state.demoCounter = 0;
        }
    }
</script>

<style scoped>
.thankyou-text {
    font-size: 1.7em;
    text-align: center;
    /* margin-top: -0.7em; */
    width: 80%;
    -webkit-transform: translateX(-50%);
    transform: translateX(-50%);
    margin-left: 50%;
    position: absolute;
    z-index: 1;
}

.thankyou-cat {
    background-image: url('/assets/cat.png');
    height: 50vh;
    position: absolute;
    width: 100vw;
    background-size: cover;
    background-repeat: no-repeat;
    bottom: 4em;
}
</style>
