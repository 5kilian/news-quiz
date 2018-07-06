<template>
    <div id="bottomNavigation">
        <router-link to="pages" class="material-icons">pages</router-link>
        <router-link to="/poll">
            <div class="bottom-navigation-stats">100</div>
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
    }
}
</script>
