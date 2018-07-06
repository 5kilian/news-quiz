<template>
    <div>
        <main-header></main-header>
        <router-view></router-view>
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
