@extends('master')
@section('content')
    <h1>{{ $recipe->title }}</h1>
    <div class="row mb-3 pb-3">
        <div class="col-12 col-md-6 text-center">
                @if(isset($recipe->file))
                    <img class="rounded-4 w-75" src="{{ asset('storage/' . $recipe->file) }}"><br>
                @else
                    <img class="rounded-4 w-75" src="{{ asset('default.svg') }}"><br>
                @endif
        </div>
        <div class="col-12 col-md-6">
            <p class="fs-5 fw-bold">Name: {{ $recipe->title }}</p>
            <p class="fs-5 fw-bold">Created by: {{ $recipe->user->name }}</p>
            <p class="fs-5 fw-bold">Cuisine: {{$recipe->cuisine->name }}</p>
            <p class="fs-5 fw-bold">Ingredients: </p>
            <ul>
                @foreach($recipe->ingredients as $ingredient)
                    <li>{{$ingredient->name}}</li>
                @endforeach
            </ul>
            <p class="fs-5 fw-bold">Instructions: {{ $recipe->instruction }}</p>
            @if(Auth::id() == $recipe->user_id || Auth::id()==1 )
                <div class="d-flex justify-content-around">
                    <a class="btn btn-outline-success" href="{{ route('recipes.edit',$recipe->id) }}">Edit Recipe</a>
                    <form method="POST" action="{{ route('recipes.destroy', ['recipe' => $recipe->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-danger" type="submit">Delete Recipe</button>
                    </form>
                </div>
            @endif
        </div>

    </div>

@endsection
