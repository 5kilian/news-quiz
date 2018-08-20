<template>
    <div class="category-list category-width">
        <div v-for="(category, i) in categories" class="category-tile" :key="i" @click="triggerCategory(category)">
            <div class="category-name">
                {{ category.name }}
            </div>
            <div class="category-check">
                <i class="category-icon material-icons" v-if="category.selected">
                    check
                </i>
                <i class="category-icon material-icons" v-else>
                    add
                </i>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        data() {
            return {
                categories: [
                ]
            };
        },
        mounted () {
            axios.get('/categories').then(response => this.categories = response.data);
        },
        methods: {
            triggerCategory(category) {
                category.selected = !category.selected;
                if (category.selected) {
                    axios.get('/category/' + category.name + '/subscribe');
                } else {
                    axios.get('/category/' + category.name + '/unsubscribe');
                }
            }
        },
        computed: {
        }
    };
</script>

<style scoped>
    @media (max-width: 532px) {
        .category-width {
            width: 266px !important;
        }
    }

    @media (max-width: 796px) {
        .category-width {
            width: 532px;
        }
    }

    .category-list {
        flex-direction: row;
        display: flex;
        flex-wrap: wrap;
        margin-left: auto;
        margin-right: auto;
        max-width: 798px;
    }

    .category-tile {
        color: white;
        background: #004888;
        width: 256px;
        height: 256px;
        margin: 5px;
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .category-name {
        text-align: center;
        font-size: 2.5em;
    }

    .category-check {
        position: absolute;
        right: 0;
        bottom: 0;
        width: 64px;
        height: 64px;
        background-color: #1d2744;
    }

    .category-icon {
        width: 100%;
        height: 100%;
        font-size: 4rem;
    }
</style>
