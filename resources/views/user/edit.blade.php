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
               <form class='registre' method="POST" action="{{ route('user.update', $user)}}">
                        @csrf

            <!--
                $table->id();
                $table->string('name');
                $table->string('lastname');
                $table->date('fechaNacimiento');
                $table->string('dni');
                $table->integer('codigoPostal');
                $table->string('telefono')->nullable();
                $table->foreignId('rol_id')->default(2);
                $table->string('email')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
            -->


                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" placeholder='{{$user->name}}' default='{{$user->name}}'  required autocomplete="name"  autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="lastname" class="col-md-4 col-form-label text-md-end">{{ __('Apellido/s') }}</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{$user->lastname}}" placeholder='{{$user->lastname}}' default='{{$user->lastname}}'  required autocomplete="lastname"  autofocus>

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="fechaNacimiento" class="col-md-4 col-form-label text-md-end">{{ __('Fecha Nacimiento') }}</label>

                            <div class="col-md-6">
                                <input id="fechaNacimiento" type="date" class="form-control @error('fechaNacimiento') is-invalid @enderror" name="fechaNacimiento" value="{{$user->fechaNacimiento}}" required placeholder='{{$user->fechaNacimiento}}' default='{{$user->fechaNacimiento}}' autocomplete="fechaNacimiento" autofocus>

                                @error('fechaNacimiento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="rol_id" class="col-md-4 col-form-label text-md-end">{{ __('Rol') }}</label>

                            <div class="col-md-6">

                                <select name="rol_id" id="rol_id" class="form-control">
                                    @foreach(\App\Models\Rol::all() as $rol)
                                        <option value="{{$rol->id}}">{{$rol->nombre}}</option>
                                    @endforeach
                                </select>

                                @error('rol_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo Electronico') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required placeholder='{{$user->email}}' default='{{$user->email}}' autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-secondary">
                                    {{ __('Actualizar Usuario') }}
                                </button>
                            </div>
                        </div>

                    </form>

                    <br>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <a href="{{Route('user_table')}}"><button class="btn btn-secondary">
                                {{ __('Dashboard de Recintos') }}
                            </button></a>
                        </div>
                    </div>
            </div>
         </div>
      </div>
@endsection