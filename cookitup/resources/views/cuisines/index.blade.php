@extends('master')
@section('content')
    <style>
       .card-img-top:hover{
            transform: scale(1.2);
           transition: transform .2s;
        }
    </style>
    <h1 class="fs-2">All Cuisines</h1>
    <div class="fs-5 fw-medium text-danger">{{$count}} Recipe(s) and Counting!!</div>
    <div class="row">
        @if($cuisines->isNotEmpty())
        @foreach($cuisines as $cuisine)
            <div class="col-12 col-md-6 col-lg-4 mb-3 d-flex align-items-stretch justify-content-center">
                <div class=" h-100 border-2 border-black">
                    <div class=" overflow-hidden mb-1">
                    @if(isset($cuisine->file))
                        <img class="card-img-top rounded-2 object-fit-cover" style="height: 200px;width: 250px" alt="Cuisine_image" src="{{ asset('storage/' . $cuisine->file) }}" ><br>
                    @else
                        <img class="card-img-top rounded-2 object-fit-cover" style="height: 200px;width: 250px" alt="Cuisine_image" src="{{ asset('default.svg') }}" ><br>
                    @endif
                    </div>
                     <div class="card-body">
                        <h5 class="card-title mb-1 text-center fw-bold">{{$cuisine->name}}</h5>
                         <div class="d-flex justify-content-between">
                        <a href="{{ route('cuisines.show',$cuisine->id) }}" class="btn btn-outline-primary">Recipes</a>
                         @auth
                         @if(Auth::user()->id==1)
                             <form method="POST" action="{{ route('cuisines.destroy', ['cuisine' => $cuisine->id]) }}">
                                 @csrf
                                 @method('DELETE')
                                 <button class="btn btn-outline-danger" type="submit">Delete Cuisine</button>
                             </form>
                         @endif
                             @endauth
                         </div>
                    </div>
                </div>
            </div>
        @endforeach
        @else
            <h4 style="color: red">No Cuisines!</h4>
        @endif


    </div>

{{--    <ul>--}}
{{--        @foreach ($cuisines as $cuisine)--}}
{{--            <li>{{ $cuisine->name }}</li>--}}
{{--        @endforeach--}}
{{--    </ul>--}}
@endsection


