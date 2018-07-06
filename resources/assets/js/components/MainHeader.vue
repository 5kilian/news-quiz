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
        margin-top: 0.55em;
        margin-left: 0.5em;
        background-color: #02559e;
        border-radius: 50%;
        width: 2.5em;
        height: 2.5em;
        color:white;
        display: flex;
        justify-content: center;
        align-items: center;
        padding-right: 0.2em;
    }

    .main-navigation-back i {
        font-size: 2em;
    }

    .main-navigation-header {
        text-shadow: 0 3px 5px rgba(0,0,0,.4);
    }
</style>

<script>
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
    },
    methods: {
        back()
        {
        }
    }
}
</script>
