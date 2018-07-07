<template>
    <div id="bottomNavigation" v-if="navigation">
        <router-link to="/category" class="material-icons">pages</router-link>
        <router-link to="/poll">
            <div class="bottom-navigation-stats">5</div>
            <i class="material-icons">poll</i>
        </router-link>
        <router-link to="/home" class="material-icons">home</router-link>
    </div>
</template>

<script>
export default {
    data()
    {
        return {

        }
    },
    computed: {
        navigation () { return this.$store.state.navigation }
    }
}
</script>

<style>
    #bottomNavigation {
        z-index: 100;
        position: fixed;
        bottom: 0;
        width: 100%;
        height: 4em;
        background-color: #1d2744;
        display: flex;
        align-items: center;
        color: white;
        justify-content: space-evenly;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
    }

    .bottom-navigation-stats {
        position: absolute;
        margin-top: -0.2em;
        margin-left: 1.5em;
        box-shadow: 0 3px 5px rgba(0,0,0,0.5);
        padding: 0 0.2em;
        border-radius: 5px;
        background-color: white;
        color: #232323;
        font-size: 0.8em;
    }

    #bottomNavigation i {

    }
</style>