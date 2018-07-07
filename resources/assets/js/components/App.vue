<template>
    <div>
        <main-header></main-header>
        <router-view class="content"></router-view>
        <bottom-navigation></bottom-navigation>
    </div>
</template>

<script>
    import MainHeader from './MainHeader';
    import BottomNavigation from './BottomNavigation'

    export default {
        name: 'App',
        components: { MainHeader, BottomNavigation },
        data() {
            return {

            };
        },
    };
</script>

<style scoped>
    .content {
        margin-bottom: 70px;
    }
</style>