<template>
    <div id="mainNavigation">
        <div v-if="isShow" class="main-navigation-back" @click="back">
            <i class="material-icons">keyboard_arrow_left</i>
        </div>
        <div class="main-navigation-header">
            {{ title }}
        </div>
    </div>
</template>

<style scoped>
    .main-navigation-back {
        position: absolute;
        margin-top: 0.5em;
        margin-left: 0.5em;
        background-color: white;
        border-radius: 50%;
        width: 2.5em;
        height: 2.5em;
        color: #484848;
        display: flex;
        justify-content: center;
        align-items: center;
        /* text-shadow: 0 3px 5px rgba(0,0,0,.4); */
        padding-right: 0.2em;
        box-shadow: 0 3px 5px rgba(0,0,0,.4);
    }

    .main-navigation-back i {
        font-size: 2em;
    }

    .main-navigation-header {
        text-shadow: 0 3px 5px rgba(0,0,0,.4);
    }
</style>

<script>
import {bus} from '../app.js'

export default {
    name: 'MainNavigation',
    data()
    {
        return {
            title: "News-Quiz",
            isShow: false
        }
    },
    mounted() 
    {
        bus.$on('mainNavBackBtn', () => {
            this.isShow = !this.isShow
        })
    },
    methods: {
        back()
        {
            bus.$emit('changePage', 'home')
            bus.$emit('bottomNav')
            bus.$emit('mainNavBackBtn')
        }
    }
}
</script>
