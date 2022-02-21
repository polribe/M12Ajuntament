<!DOCTYPE html>
<html lang="en, es-es">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Eventos</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top" style="background-color: wheat;">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top"><img src="assets/img/navbar-logo.png" alt="..." /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="{{route('welcome1')}}">Home</a></li>
                        
                        @if (Auth::guest())
                        <button type="btn" class="btn btn-outline-secondary me-3"><a href="{{ route('login') }}" class="text-decoration-none">Log in</a></button>
                        @else
                        <button type="btn" class="btn btn-outline-secondary me-3"><a href="{{ route('register') }}" class="text-decoration-none">My Profile</a></button>
                        @endif
                        
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Ayuntamiento de Reus</div>
            </div>
        </header>
        <!-- Portfolio Grid-->
        <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Eventos</h2>
                </div>

            <div class="text-center">
                @foreach ($eventos as $evento)

                <div class="card border-secondary bg-ligth" style="display: inline-block; width: 25rem; margin: 1vw;">
                    <img src="{{asset('storage/'.$evento->image)}}" class="card-img-top" alt="..." style="height: 398px; width: 398px;">
                    
                    <div class="card-body">
                        <h5 class="card-title"> {{ $evento->nombre }}</h5>
                        
                    </div>
                    <div>
                        <a href="{{route('evento.show', ['evento'=>$evento])}}" class="btn btn-outline-secondary mt-3 mb-1">Ver evento</a>
                    </div>
                </div>
                @endforeach
                

            </div>
           
            <br>
            @if (Route::has('login'))
       
            <div class="text-center">
            </div>

            @endif
            </div>
        </section>
    </body>
</html>