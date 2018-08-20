<template>
    <div class="container creator">
        <div v-if="success" class="alert alert-success">
            Success
        </div>
        <h1>
            Create Question
        </h1>
        <form>
            <div class="form-group">
                <label>Question text</label>
                <input class="form-control" placeholder="Question text" v-model="question">
            </div>
            <section class="form-group">
                <label>Answers</label>
                <div v-for="(answer, i) in answers" v-if="i<count" :key="i">
                    <input type="radio" v-model="radio" :value="i" class="form-check-input">
                    <input class="form-control answer-input form-check-label" v-model="answer.text" :placeholder="'Answer ' + increase(i)" />
                </div>
            </section>
            <i v-if="count < 4" class="category-icon material-icons" @click="moreAnswers()">
                add
            </i>
            <div class="form-group">
                <label>Category</label>
                <select class="form-control" placeholder="Category" v-model="categoryselection">
                    <option v-for="(category, i) in categories" :value="category.name" :key="i">{{ category.name }}</option>
                </select>
            </div>
            <div class="form-group">
                <label>Resource Text</label>
                <input class="form-control" placeholder="Resource Text" v-model="srctext">
            </div>
            <div class="form-group">
                <label>Resource URL</label>
                <input class="form-control" placeholder="Resource URL" v-model="src">
            </div>
            <div class="form-group">
                <label>Picture</label>
                <input class="form-control" placeholder="Picture URL" v-model="img">
            </div>

            <button class="btn btn-primary" @click="createQuestion()">Submit</button>
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                question: '',
                src: '',
                img: '',
                srctext: '',
                video: '',
                categories: [],
                categoryselection: '',
                count: 2,
                radio: 0,
                answers: [
                    { text: '', correct: false },
                    { text: '', correct: false },
                    { text: '', correct: false },
                    { text: '', correct: false }
                ],
                success: false,
            };
        },
        mounted () {
            axios.get('/categories').then(response => this.categories = response.data);
        },
        methods: {
            increase (i) { return i+1; },
            moreAnswers () { this.count++; },
            createQuestion () {
                let body = {};
                body.QuestionText = this.question;
                this.answers[this.radio].correct = true;
                body.answers = this.answers;
                body.img = this.img;
                body.src = this.src;
                body.video = this.video;
                body.srctext = this.srctext;
                body.category = this.categoryselection;

                axios.post('/api/v1/question/create', JSON.stringify(body));
            }
        },
    };
</script>

<style scoped>
    .creator {

    }
    .answer-input {
        margin-top: 8px;
    }
</style>
