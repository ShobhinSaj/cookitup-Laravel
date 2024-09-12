@extends('master')
@section('content')
    <h1 class="fs-2 text-center">All Recipes</h1>
    <div class="row">
        @if($recipes->isNotEmpty())
        @foreach($recipes as $recipe)
            <div class="col-12 col-md-6 col-lg-4 mb-3 d-flex align-items-stretch justify-content-center">
                <div class="card h-100 border-2 border-black">
                    @if(isset($recipe->file))
                        <img class="card-img-top object-fit-cover" style="height: 200px;width: 250px" alt="Recipe_image" src="{{ asset('storage/' . $recipe->file) }}" ><br>
                    @else

                        <img class="card-img-top object-fit-cover" style="height: 200px; width: 250px" alt="Recipe_image_default" src="{{ asset('default.svg') }}" ><br>
                    @endif
                    <div class="card-body text-center bg-black text-white">
                        <h5 class="card-title">{{$recipe->title}}</h5>
                        <div class="text-center">
                            <a href="{{ route('recipes.show',$recipe->id) }}" class="btn btn-primary">View Recipe</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @else
            <h4 style="color: red" class="text-center">Oops, No Recipes Yet!</h4>
            @auth()
                <form class="text-center" method="GET" action="{{ route('recipes.create') }}">
                    <button class="btn btn-success" type="submit">Create Recipe</button>
                </form>
            @endauth
        @endif


    </div>
@endsection


