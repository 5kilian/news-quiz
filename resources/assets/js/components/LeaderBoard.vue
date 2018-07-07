<template>
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Punkte</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(user, i) in leadership">
                <th scope="row">{{ increment(i) }}</th>
                <td>{{ user.name }}</td>
                <td>{{ user.score }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data()
        {
            return {
                leadership: [
                    { name: 'BearyBoy', score: 26 },
                    { name: 'beefster09', score: 23 },
                    { name: 'LeeFogg', score: 22 },
                    { name: 'KiranasOfRizon', score: 20 },
                    { name: 'MaggotDiggo1', score: 17 },
                    { name: 'mossywright1', score: 15 },
                    { name: 'TheCraftinator', score: 14 },
                    { name: 'pflynn12', score: 13 },
                    { name: 'deathkiller008', score: 11 },
                ]
            }
        },
        methods: {
            increment (i) { return i+1; }
        }
    }
</script>

<style>

</style>