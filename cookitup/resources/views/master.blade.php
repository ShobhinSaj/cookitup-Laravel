<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>CookItUp</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<style>
    .main_content{
        height:85vh;
        overflow: auto;
    }

</style>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-black ">
            <div class="container-fluid">
                <a class="navbar-brand fs-2" href="{{ url('/cuisines')}}">CookItUp</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                    <div class="collapse navbar-collapse justify-content-lg-end text-center pe-4" id="navbarNav">
                        <ul class="navbar-nav fs-5">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/cuisines') }}">Cuisines</a></li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/recipes') }}">Recipes</a></li>
                            @auth
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('recipes.create')}}">Create Recipe</a>
                                    @if(Auth::user()->id==1)
                                        <a class="dropdown-item" href="{{ route('cuisines.create')}}">Create Cuisine</a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Log in</a></li>
                            @endauth
                        </ul>
                        {{--            <div class="navbar-text">--}}
                        {{--                Recent Additions:<br>--}}
                        {{--            </div>--}}
                    </div>
            </div>
        </nav>
    </header>

<div class="container-fluid main_content">
    @yield('content')
{{--    <div class="row content">--}}
{{--        <div class="col-sm-10 text-left">--}}

{{--        </div>--}}
{{--    </div>--}}
</div>
<footer class="container-fluid text-center align-contents-center  bg-black text-white">
    <div class="container text-center">
        <span class="fs-4">CookItUp</span><br>
{{--        <span><a class=" text-decoration-none" href="https://www.pexels.com"><strong class="text-white">Image Source:&nbsp;</strong>www.pexels.com</a></span><br>--}}
        <span><strong>Developed by:</strong> Shobhin Thomas Saj</span>
    </div>
</footer>
</body>
</html>
<?php
