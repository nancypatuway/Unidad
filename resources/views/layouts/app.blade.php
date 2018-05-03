<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
    <!--<script src="{{ asset('plugins/jquery/js/jquery-3.3.1.js') }}"></script>
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">-->		
    <!--<script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <link href="{{ asset('plugins/datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">	-->

	<!--
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <script src="https://momentjs.com/downloads/moment-with-locales.js"></script>
  -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
      
      <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/themes/base/jquery-ui.css" />

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      
      <!--para calendario-->
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      

      <!--datatable
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>-->

      <!--referencia para las tablas-->
      <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

	 
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-inverse navbar-fixed-top">

  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ URL::to('/')}}/images/logo55.png" height="35" width="140"></a>
    </div>
    @guest
    @else
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="{{ url('/') }}" style="color:#fff">Inicio</a></li>
        <li><a href="{{ url('/portafolio') }}">Portafolio</a></li>
        <li><a href="{{ url('/planificacion') }}">Planificaci&oacute;n</a></li>
        <li><a href="{{ url('/autoevaluacion') }}">Autoevaluaci&oacute;n</a></li>
        <!--<li><a href="{{ url('/paginas/preseleccion') }}">Preselecci&oacute;n</a></li>-->
        <li><a href="{{ url('/anayeva') }}">An&aacute;lisis y Evaluaci&oacute;n del Riegos</a></li>
        <li><a href="{{ url('/plangestion') }}">Plan de Getión</a></li>
        <li><a href="{{ url('/reporte') }}">Resultados</a></li>
        <!--<li><a href="{{ url('/paginas/graficos') }}">Gr&aacute;ficos</a></li>-->
      </ul>
      @endguest
      <ul class="nav navbar-nav navbar-right">
                    
            
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">Registrar</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Salir
                                    </a></li>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </ul>
                            </li>
                        @endguest
                    </ul>
  </div>
</nav>

  
        <main class="py-4 " style="margin-top:50px; margin-bottom:50px;">
            @yield('content')
        </main>
    

    <!-- Scripts 
    <script src="{{ asset('js/app.js') }}"></script>-->

    <!--Footer-->
<div class="footer navbar-fixed-bottom">
<div id="footer">
  <footer class="page-footer font-small blue pt-4 mt-4" style="background: black;" margin-top:"95%">
    
      <!--Footer Links-->
      <div class="container-fluid text-center text-md-left">
          <div class="row">

              <!--First column-->
              <div class="col-md-6">
                <br>
              </div>
              <!--/.First column-->
              
              <!--Second column-->
              <div class="col-md-6">
              </div>
              <!--/.Second column-->
          </div>
      </div>
      <!--/.Footer Links-->
      <div class="footer-copyright py-3 text-center" >
        <font color="white">Realizado por Nancy Alvarado Sanabria Copyright: © 2018 </font>
      </div>
  </footer>
</div>
</div>
<!--/.Footer-->
</body>

</html>
