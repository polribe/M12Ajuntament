@extends('layouts.app')

@section('content')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<style>
  
body {
    font-family: "Lato", sans-serif;
}

.registre{
    color:grey;
}

.btn-secondary{
    background-color: #083D77;
    border-color: transparent;
}

.main-head{
    height: 150px;
    background: #FFF;
   
}

.sidenav {
    height: 100%;
    background-color: #083D77;
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
        margin-top: 10%;
    }

    .register-form{
        margin-top: 0%;
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
        margin-top: 15%;
    }

    .register-form{
        margin-top: 0%;
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
            <h2>Ajuntament de <b>Reus</b><br> Editar Recinto </h2>
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
               <form class='registre' method="POST" action="{{ route('recinto.update', $recinto)}}">
                        @csrf

                        <div class="row mb-3">
                            <label for="nombre" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{$recinto->nombre}}" placeholder='{{$recinto->nombre}}' default='{{$recinto->nombre}}'  required autocomplete="nombre"  autofocus>

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="fecha" class="col-md-4 col-form-label text-md-end">{{ __('Direccion') }}</label>

                            <div class="col-md-6">
                                <input id="direccion" type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" value="{{$recinto->direccion}}" required placeholder='{{$recinto->direccion}}' default='{{$recinto->direccion}}' autocomplete="direccion" autofocus>

                                @error('direccion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="superficie" class="col-md-4 col-form-label text-md-end">{{ __('Superficie') }}</label>

                            <div class="col-md-6">
                                <input id="superficie" type="number" step="0.00" class="form-control @error('superficie') is-invalid @enderror" name="superficie" value="{{$recinto->superficie}}" placeholder='{{$recinto->superficie}}'  autocomplete="superficie" default='{{$recinto->superficie}}' autofocus>

                                @error('superficie')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-secondary">
                                    {{ __('Actualizar Recinto') }}
                                </button>
                            </div>
                        </div>

                    </form>

                    <br>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <a href="{{route('evento.table')}}"><button class="btn btn-secondary">
                                {{ __('Dashboard de Recintos') }}
                            </button></a>
                        </div>
                    </div>
            </div>
         </div>
      </div>
@endsection