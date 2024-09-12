@extends('master')

@section('content')
    <h1>Create Recipe</h1>
    <form method="POST" enctype="multipart/form-data" action="{{action([\App\Http\Controllers\RecipeController::class, 'store'])}}" class="mt-4">
        @include('partials.recipesForm',
        ['buttonName'=>'Create Recipe',
       'fileUpdate'=>true])
    </form>
    @include('partials.errors')
@endsection
