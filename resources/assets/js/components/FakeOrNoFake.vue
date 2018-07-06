<template>
    <div id="fonf">
        <div class="fonf-bg"></div>
    </div>
</template>

<style scoped>
.fonf-bg {
    background-color: black;
    opacity: 0.6;
    width: 100vw;
    height: 100vh;
    position: absolute;
    margin-top: -1.2em;
    background: -moz-linear-gradient(bottom, rgba(0,0,0,1) 0%, rgba(0,0,0,0) 100%);
    background: -webkit-linear-gradient(bottom, rgba(0,0,0,1) 0%,rgba(0,0,0,0) 100%);
    background: linear-gradient(to top, rgba(0,0,0,1) 0%,rgba(0,0,0,0) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00000000', endColorstr='#a6000000',GradientType=0 );
}
</style>


<script>
export default {
    data()
    {
        return {

        }
    },
    mounted() 
    {
        document.querySelector('body').style.backgroundImage = 'url("/assets/merkel.jpg")'
    }
}
</script>
