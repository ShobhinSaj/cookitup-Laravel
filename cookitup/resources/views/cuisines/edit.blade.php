@extends('master')
@section('content')
    <h1>Edit Cuisine</h1>
    <form method="POST" enctype="multipart/form-data" action="{{ route('cuisines.update', ['cuisine' => $cuisine->id]) }}" class="mt-4">
        @method('PUT')
        @include('partials.cuisinesForm',
        ['buttonName'=>'Update Cuisine',
        'name'=>old('name')?: $cuisine->name])
    </form>
    @include('partials.errors')
@endsection
