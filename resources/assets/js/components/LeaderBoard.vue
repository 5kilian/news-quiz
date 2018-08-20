<template>
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Rang</th>
                <th scope="col">Name</th>
                <th scope="col">Punkte</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(user, i) in leadership" :key="i"> 
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
                leadership: new Array({name: "", score: ""})
            }
        },
        methods: {
            increment (i) { return i+1; }
        },
        mounted() {
            axios.get('/api/v1/leaderboard')
            .then(r => {
                this.leadership = r.data
            })
        }
    }
</script>

<style>

</style>