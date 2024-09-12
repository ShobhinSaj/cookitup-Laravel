@extends('master')
@section('content')
    <h1>Edit Recipe</h1>
    <form method="POST" enctype="multipart/form-data" action="{{ route('recipes.update', ['recipe' => $recipe->id]) }}" class="mt-4">

        @method('PUT')
        @include('partials.recipesForm',
        ['buttonName'=>'Update Recipe',
        'title'=>old('title') ?: $recipe->title,
        'instruction'=>old('instruction') ?: $recipe->instruction,
        'fileUpdate'=>false])
    </form>
    @include('partials.errors')
@endsection

