@extends('master')

@section('content')
    <h1>Create Cuisine</h1>
    <form method="POST" enctype="multipart/form-data" action="{{action([\App\Http\Controllers\CuisineController::class, 'store'])}}" class="mt-4">
        @include('partials.cuisinesForm',
        ['buttonName'=>'Create Cuisine'])
    </form>
    @include('partials.errors')
@endsection
