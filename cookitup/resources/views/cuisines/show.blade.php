@extends('master')
@section('content')
    <h1>{{ $cuisine->title }}</h1>
    <div class="row py-4">
        <div class="col-12 col-md-6">
            @if(isset($cuisine->file))
                <div>
                    <img class="rounded-4 object-fit-cover" style="height: 400px;width: 400px" src="{{ asset('storage/' . $cuisine->file) }}" ><br>
                </div>
            @else
                <div>
                    <img class="rounded-4 object-fit-cover" style="height: 400px;width: 400px" src="{{ asset('default.svg') }}" ><br>
                </div>
            @endif
        </div>
        <div class="col-12 col-md-6 d-flex flex-column justify-content-center">
            <p class="fs-4 fw-bold">Name: {{ $cuisine->name }}</p>

                @if($cuisine->recipes->isNotEmpty())
                    <h4>Recipes:</h4>
                    <ol>
                    @foreach($cuisine->recipes as $recipe)
                        <li>
                            Name: <a href="{{ route('recipes.show',$recipe->id) }}"> {{ $recipe->title }}</a>
                            <p>Created by: {{ $recipe->user->name }}</p>
                        </li>
                    @endforeach
                    </ol>
                    @else
                    <h4 style="color: red">No Recipes Yet!</h4>
                     @endif
                    @auth()
                    <form method="GET" action="{{ route('recipes.create') }}">
                        <button class="btn btn-success" type="submit">Create Recipe</button>
                    </form>
                    @endauth
            </div>
        </div>

@endsection
