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
                <input class="form-control" placeholder="Question text" v-bind="question">
            </div>
            <div class="form-group">
                <label>Answers</label>
                <div v-for="(answer, i) in answers" v-if="i<count">
                    <input type="radio" name="rightanswer" v-bind="answers.correct" class="form-check-input">
                    <input class="form-control answer-input form-check-label" v-bind="answer.text" :placeholder="'Answer ' + increase(i)" />
                </div>
            </div>
            <i v-if="count < 4" class="category-icon material-icons" @click="moreAnswers()">
                add
            </i>
            <div class="form-group">
                <label>Resource URL</label>
                <input class="form-control" placeholder="Resource URL" v-bind="src">
            </div>
            <div class="form-group">
                <label>Picture</label>
                <input class="form-control" placeholder="Picture URL" v-bind="img">
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
                count: 2,
                answers: [
                    { text: '', correct: true },
                    { text: '', correct: false },
                    { text: '', correct: false },
                    { text: '', correct: false }
                ],
                success: false
            };
        },
        methods: {
            increase (i) { return i+1; },
            moreAnswers () { this.count++; },
            createQuestion () {
                console.log(this.answers.map(a => a.correct ? 'Y' : a.text));
                let body = {};
                body.QuestionText = this.question;
                body.answers = [];


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