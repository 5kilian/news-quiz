@extends('layouts.app')

@section('content')

<div v-if="pages.home">
    <home></home>
</div>

<div v-if="pages.quiz">
    <!-- Hier Quiz Component einfügen -->
</div>

@endsection
