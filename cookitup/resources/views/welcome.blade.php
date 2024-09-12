<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CookItUp-Welcome</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <style>
        *{ font-family: 'Figtree', sans-serif;
        }

        body{background: url('{{ asset("wlcme_bg.jpg") }}') no-repeat center center;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;}
        .row{
            padding: 5vh 5%;
            height: 85vh;
        }

        .intro_cntainer{
            background: rgba( 168, 160, 160, 0.7 );
            box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
            backdrop-filter: blur( 9.5px );
            -webkit-backdrop-filter: blur( 9.5px );
            border-radius: 10px;
            border: 1px solid rgba( 255, 255, 255, 0.18 );
        }
        .main_content{
            height:85vh;
            overflow: auto;
        }
    </style>
    <body>
    <header>
        <nav class="navbar  navbar-expand-lg navbar-dark bg-black ">
            <div class="container-fluid">
                <a class="navbar-brand fs-2" href="{{url('/')}}">CookItUp</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-lg-end text-center pe-4" id="navbarNav">
                    @if (Route::has('login'))
                        <ul class="navbar-nav">
                            @auth
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/cuisines') }}">Home</a></li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Log in</a></li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}" >Register</a></li>
                                @endif
                            @endauth
                        </ul>
                    @endif
                </div>
            </div>
        </nav>
        </header>
    <div class="container-fluid main_content">
        <div class="row">
            <div class="col-12 col-md-6 intro_cntainer">
                <div class="intro_banner">
                    <h1>Delicious Recipes...a click away!</h1>
                    <main>
                        <p class="fs-5 fw-bold">Our curated collection celebrates the diversity of flavors found across continents. Dive
                            into the aromatic spices of Indian curries, savor the delicate pastries of French patisseries,
                            and experience the umami-packed wonders of Japanese ramen bowls.<br>LogIn/Register Today..</p>
                        <div class="d-flex  flex-md-row">
                            <a class="btn btn-dark text-white mx-2" href="{{ route('login') }}">Log In</a>
                            <a class="btn btn-dark text-white" href="{{ route('register') }}">Register</a>
                        </div>
                        <p class="fs-5 fw-bold">What awaits you:</p>
                        <ul class="fs-6 fw-bold">
                            <li> Each recipe comes with a backstory, a glimpse into the heart of the dish. Learn why a
                                humble bowl of pasta can evoke memories of a sun-kissed Italian vineyard or how a
                                fragrant bowl of pho connects generations in Vietnam.</li>
                            <li>Cuisines from all over the world so that you never miss a recipe no matter where its from!</li>
                            <li>Create and share your own recipes for the world to try</li>
                        </ul>
                    </main>
                </div>
            </div>
        </div>
    </div>
       <footer class="container-fluid text-center align-contents-center  bg-black text-white">
           <div class="container text-center">
               <span class="fs-4">CookItUp</span><br>
               <span><strong>Developed by:</strong> Shobhin Thomas Saj</span>
           </div>
       </footer>
    </body>
</html>
