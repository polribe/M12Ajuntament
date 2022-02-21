<!DOCTYPE html>
<html lang="en, es-es">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Ajuntament de Reus</title>
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
                        <li class="nav-item"><a class="nav-link" href="#portfolio">Eventos</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">Sobre nosotros</a></li>
                        <li class="nav-item"><a class="nav-link" href="#team">Equipo</a></li>
                        
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

            @php
            $var = 3;
            $cont = 0;
            @endphp
            <div class="text-center">
                @foreach ($eventos as $evento)
                @if ($cont < $var)

                <div class="card border-secondary bg-ligth" style="display: inline-block; width: 25rem; margin: 1vw;">
                    <img src="{{$evento->image}}" class="card-img-top" alt="...">
                    
                    <div class="card-body">
                        <h5 class="card-title"> {{ $evento->nombre }}</h5>
                        
                    </div>
                    <div>
                        <a href="{{route('evento.show', ['evento'=>$evento])}}" class="btn btn-outline-secondary mt-3 mb-1">Ver evento</a>
                    </div>
                </div>
                
                @php
                    $cont++;
                @endphp
                @endif
                @endforeach
                
                <button type="btn" class="btn btn-outline-secondary me-3"><a href="{{ route('evento.index') }}" class="text-decoration-none">Lista de todos los eventos</a></button>
            </div>
           
            <br>
            @if (Route::has('login'))
       
            <div class="text-center">
            </div>

            @endif
            </div>
        </section>
        <!-- About-->
        <section class="page-section" id="about">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Sobre Nosotros</h2>
                </div>
                <ul class="timeline">
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/1.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>1900</h4>
                                <h4 class="subheading">Joia modernista</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">L’estil arquitectònic i decoratiu del Modernisme, propi del 1900, va marcar per sempre el paisatge urbà de Reus. L’esplendor econòmica i cultural d’aquell moment van transformar la seva arquitectura fins a convertir-la en la ciutat modernista.</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/2.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>2000</h4>
                                <h4 class="subheading">Ciutat de Gaudí</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Antoni Gaudí és el geni més universal que ha donat Reus. L’arquitecte va revolucionar el seu ofici, amb dissenys totalment trencadors i la reivindicació d’oficis tradicionals sense oblidar el pragmatisme que caracteritzava els modernistes.</p></div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/3.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>2005</h4>
                                <h4 class="subheading">L'art de comprar passejant</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Gràcies al suau clima mediterrani i a la geografia plana de la ciutat, anar de compres per Reus es converteix en una agradable passejada a l’aire lliure. Hi trobareu un eix comercial de llarga tradició integrat al centre històric, amb botigues de moda, decoració, tecnologia i un llarg etcètera, des de les cadenes més populars fins les botigues més úniques. Els mercats municipals també són una visita obligada i un punt de trobada entre les compres i la gastronomia local.</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/4.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>2000</h4>
                                <h4 class="subheading">Vermut de Reus</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">La marca Vermut de Reus és sinònim de qualitat i és coneguda molt més enllà del municipi. A les marques històriques, que encara segueixen la seva activitat productora iniciada a finals del segle XIX o principis del XX, se n’han anat sumant de noves animades per l’auge del consum de la beguda. La ciutat compta, fins i tot, amb el Museu del Vermut, un establiment de restauració amb l’exposició més gran del món dedicada al vermut.</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image">
                            <h4>
                                Sigues part
                                <br />
                                del nostre
                                <br />
                                historia!
                            </h4>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <!-- Team-->
        <section class="page-section bg-light" id="team">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Equipo</h2>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/1.jpg" alt="..." />
                            <h4>Jesus Gargallo</h4>
                            <p class="text-muted">Diseñador cutre</p>
                            <a class="btn btn-dark btn-social mx-2" href="https://mobile.twitter.com/jesus_gargallo_"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="https://es-es.facebook.com/jesus.gargallogalindo"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="https://www.instagram.com/jesus_gargallo_/"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/3.jpg" alt="..." />
                            <h4>Pol Ribe</h4>
                            <p class="text-muted">Programador</p>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="https://hi-in.facebook.com/pol.ribecanalda"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="https://www.instagram.com/polriibe/"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center"><p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p></div>
                </div>
            </div>
        </section>
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                </div>
                <!-- * * * * * * * * * * * * * * *-->
                <!-- * * SB Forms Contact Form * *-->
                <!-- * * * * * * * * * * * * * * *-->
                <!-- This form is pre-integrated with SB Forms.-->
                <!-- To make this form functional, sign up at-->
                <!-- https://startbootstrap.com/solution/contact-forms-->
                <!-- to get an API token!-->
            
            </div>
        </section>
        <!-- Footer-->
        
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>