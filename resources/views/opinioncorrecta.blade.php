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
    background-color: #06d6a0;
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

.btn-secondary{
    background-color: transparent;
    color: white;
    border-color: white;
}

.btn-black{
    background-color: #000 !important;
    color: #fff;
}

</style>
<!------ Include the above in your HEAD tag ---------->

<div class="sidenav">
         <div class="login-main-text">
            <h2>Ajuntament de <b>Reus</b><br> </b><br><br>Enhorabuena, {{Auth::user()->name}}! Acabas de dar tu <b>opinion</b> en este evento.<br><br><br></h2>
                <a href="{{route('evento.index')}}">
                    <button type="submit" class="btn btn-secondary">
                        {{ __('Volver al indice de Eventos') }}
                    </button>
                </a>
            
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
               <form method="POST" action="{{ route('evento.index') }}">
                        @csrf
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <img src="https://i.pinimg.com/originals/fa/b8/e8/fab8e88332446b7f26df4427c9cc885d.gif" alt="">
                            </div>
                        </div>
                    </form>
            </div>
         </div>
      </div>