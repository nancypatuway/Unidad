@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html>
<head>
	<title>actualizar portafolio</title>
</head>
<body>
	<!--para validar-->
	<div id="app">
        @include('Mensajes')


        @yield('content')
    </div>

	<form action="update/{{$PortafolioRiesgo->id}}" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
     	{{method_field('patch')}}

     	<div class="container">
        <h1 class="text-center">Portafolio de Riesgo </h1>
        <h3 class="text-center">Editar</h3>
			<label for="codporta">Código del Portafolio</label>
			<input type="hidden" name="dfxx" value="{{$PortafolioRiesgo->codprtafolio}}">
	        <input type="text" id="codporta" name="codporta" placeholder="Código del Portafolio" class="form-control" value="{{$PortafolioRiesgo->codportafolio}}" required oninvalid="this.setCustomValidity('El código ya existe o el campo se encuentra vacío')" oninput="setCustomValidity('')" >
	        <br>
	        <input type="hidden" name="_token" value="{{csrf_token()}}">
	        <br>
	        <label for="nomporta">Nombre</label>
	        <input type="text" name="nomporta" placeholder="Nombre" class="form-control" id="nomporta" value="{{$PortafolioRiesgo->nombre}}" autocomplete="off" required oninvalid="this.setCustomValidity('No se ingreso el Nombre del Riesgo')" oninput="setCustomValidity('')" >
	        <br>
	        <label for="desporta">Descripción</label>
	        <input type="text" name="desporta" placeholder="Descripción" class="form-control" id="desporta" value="{{$PortafolioRiesgo->descripcion}}" autocomplete="off" required oninvalid="this.setCustomValidity('No se ingreso la Descripción del Riesgo')"oninput="setCustomValidity('')" >
	        <br>
	        <center><input type="submit" name="Actualizar" class="btn btn-primary" id="btnAgregarPorta"></center>
	        <br>
	       
	    </div>
                                        
    </form>


</body>
</html>

@endsection