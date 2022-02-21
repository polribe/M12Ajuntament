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

.btn-secondary{
    background-color: orange;
    color: white;
    border-color: transparent;
}

.sidenav {
    height: 100%;
    background-color: orange;
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
        margin-top: 80%;
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
            <h2>Ajuntament de <b>Reus</b><br> Reservar</h2>
            
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
               <form method="POST" action="{{ route('reserva.store', $evento) }}">
                        @csrf

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

                        <!--<h2>{{Auth::user()->id}}</h2>-->


                        <div class="row mb-3">
                            <label for="plazas" class="col-md-4 col-form-label text-md-end">{{ __('Places') }}</label>

                            <div class="col-md-6">
                                <input id="plazas" type="number" min="1" max="5" class="form-control @error('plazas') is-invalid @enderror" name="plazas" value="{{ old('plazas') }}" required autocomplete="plazas" autofocus>

                                @error('plazas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


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

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-secondary">
                                    {{ __('Reservar') }}
                                </button>
                            </div>
                        </div>
                    </form>
            </div>
         </div>
      </div>