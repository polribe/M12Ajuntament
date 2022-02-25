@extends('layouts.app')

@section('content')

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<style>
  
body {
    font-family: "Lato", sans-serif;
}

.btn-secondary{
    background-color: #B996FF;
    border-color: transparent;
    display: block;
    margin-top: 3px;
}


.main-head{
    height: 150px;
    background: #FFF;
   
}

.sidenav {
    height: 100%;
    background-color: #B996FF;
    overflow-x: hidden;
    padding-top: 20px;
}


.main {
    padding: 0px 10px;
}

@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
}

@media screen and (max-width: 450px) {
    .login-form{
        margin-top: 0%;
    }

    .register-form{
        margin-top: 10%;
    }
}

@media screen and (min-width: 768px){
    .main{
        margin-left: 40%; 
    }

    .sidenav{
        width: 40%;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
    }

    .login-form{
        margin-top: 60%;
    }

    .register-form{
        margin-top: 20%;
    }
}


.login-main-text{
    margin-top: 20%;
    padding: 60px;
    color: #fff;
}

.login-main-text h2{
    font-weight: 300;
}

.btn-black{
    background-color: #000 !important;
    color: #fff;
}

</style>
<!------ Include the above in your HEAD tag ---------->

<div class="sidenav">
         <div class="login-main-text">
            <h2>Ajuntament de <b>Reus</b><br> Welcome, {{ Auth::user()->name }}! </h2>
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">

                <!--Mira si hi ha una sessio activa-->
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <!--Mostra unes opcions concretes si el rol de l'usuari loggejat es 1-->
                @if(Auth::user()->rol_id == 1)
                    <a href="{{route('evento.create')}}"><button type="submit" class="btn btn-secondary">
                        Crea un Esdeveniment    
                    </button></a>
                    <br>
                    <br>
                    <a href="{{ route('user_table') }}"><button type="submit" class="btn btn-secondary">
                        Llistat d'Usuaris
                    </button></a>

                    <a href="{{ route('evento.table') }}"><button type="submit" class="btn btn-secondary">
                        Llistat d'Esdeveniments
                    </button></a>

                    <a href="{{ route('opinion_table') }}"><button type="submit" class="btn btn-secondary">
                        Llistat d'Opinions
                    </button></a>

                    <a href="{{ route('recinto_table') }}"><button type="submit" class="btn btn-secondary">
                        Llistat de Recintes
                    </button></a>   
                    <a href="{{route('reserva_table', Auth::user()->id)}}"><button type="submit" class="btn btn-secondary">
                        Les meves Reserves
                    </button></a>
                    <a href="{{route('welcome1')}}"><button type="submit" class="btn btn-secondary">
                        Torna a la Pàgina Principal
                    </button></a>


                @endif

                <!--Mostra unes opcions concretes si el rol de l'usuari loggejat es 2-->
                @if(Auth::user()->rol_id == 2)
                    <a href="{{route('reserva_table', Auth::user()->id)}}"><button type="submit" class="btn btn-secondary">
                        Les meves Reserves
                    </button></a>
                    <a href="{{route('welcome1')}}"><button type="submit" class="btn btn-secondary">
                        Torna a la Pàgina Principal
                    </button></a>
                    
                @endif

                <!--Mostra unes opcions concretes si el rol de l'usuari loggejat es 3-->
                @if(Auth::user()->rol_id == 3)
                    <a href="{{route('evento.create')}}"><button type="submit" class="btn btn-secondary">
                        Crea un Esdeveniment    
                    </button></a>
                    <br>
                    <br>
                    <a href="{{ route('evento.table') }}"><button type="submit" class="btn btn-secondary">
                        Llistat d'Esdeveniments
                    </button></a>
                    <a href="{{route('reserva_table')}}"><button type="submit" class="btn btn-secondary">
                        Les meves Reserves
                    </button></a>
                    <a href="{{route('welcome1')}}"><button type="submit" class="btn btn-secondary">
                        Torna a la Pàgina Principal
                    </button></a>
                    
                @endif
            </div>
         </div>
      </div>
@endsection

