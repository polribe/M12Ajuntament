<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<style>
  
body {
    font-family: "Lato", sans-serif;
}



.main-head{
    height: 150px;
    background: #FFF;
   
}

.sidenav {
    height: 100%;
    background-color:green;
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
        margin-top: 5%;
    }

    .register-form{
        margin-top: 5%;
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
        margin-top: 40%;
        margin-left: 20%;
    }

    .register-form{
        margin-top: 20%;
    }
}

.btn-primary{
  background-color: transparent;
  border-color: white;
}

.btn-primary1{
  background-color: green;
  color:white;
  border-color: white;
}

.btn-primary:hover{
  background-color: lime;
  color:black;
  border-color:white;
}

.btn-secondary{
  background-color: green;
  border-color: green;
  color:white;
}

.btn-secondary:hover{
  background-color: lime;
  color:black;
  border-color:lime;
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
            <h2>{{$evento->nombre}}</h2>
            <br>
            <p>{{$evento->descripcion}}</p>
            
            @if (Auth::guest())
              <a href="{{route('evento.index')}}"><button type="submit" class="btn btn-primary">
                Volver
              </button></a>
            @else
              <a href="{{ route('evento.reserva', $evento )}}"><button type="submit" class="btn btn-primary">
              Reservar
              </button></a>

              <a href="{{route('evento.index')}}"><button type="submit" class="btn btn-primary">
                Volver
              </button></a>
            @endif

           
                     </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">

              @if(Auth::guest())

                <h2>&nbsp Inicia sesión, Porfi...</h2>
                    <img src="https://c.tenor.com/hDW43kcPob8AAAAC/depressed-sad.gif" alt="">
                    <br>

                    &nbsp &nbsp

                    <a href="{{route('login')}}">
                      <button type="submit" class="btn btn-primary1">
                        Log In
                      </button>
                    </a>

              @else

               <form method="POST" action="{{ route('opinion.store', $evento) }}">
                        @csrf

                    <div class="row mb-3">
                            
                     
                        @csrf
                          <div class="row mb-9">
                            <label for="email" class="col-md-8">{{ __('Comenta el Evento') }}</label>

                            <div class="col-md-9">
                                
                            <div class="row mb-3">
                                <label for="evento_id" class="col-md-4 col-form-label text-md-end"></label>

                                <div class="col-md-6">
                                    <input id="evento_id" type="hidden" class="form-control @error('evento_id') is-invalid @enderror" name="evento_id" value="{{$evento->id}}" required autocomplete="evento_id" autofocus>

                                    @error('evento_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="user_id" class="col-md-4 col-form-label text-md-end"></label>

                                <div class="col-md-6">
                                    <input id="user_id" type="hidden" class="form-control @error('user_id') is-invalid @enderror" name="user_id" value="{{ Auth::user()->id }}" required autocomplete="user_id" autofocus>

                                    @error('user_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>                               
                              
                                <textarea name="contenido" id="contenido" class="form-control @error('contenido') is-invalid @enderror'" cols="40" rows="10" placeholder="Opina del Evento"></textarea>

                                <br>
                                
                                <button type="submit" class="btn btn-secondary">
                                  Enviar
                                </button>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                   
                    </div>
                </form>
              @endif
            </div>
         </div>
      </div>