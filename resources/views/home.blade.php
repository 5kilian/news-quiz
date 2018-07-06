@extends('layouts.app')

@section('content')

<div v-if="pages.home">
    <home></home>
</div>

<div v-if="pages.quiz">
    <quiz-page>
    </quiz-page>
</div>


<div v-if="pages.solution">
    <solution-page>
    </solution-page>
</div>
@endsection
