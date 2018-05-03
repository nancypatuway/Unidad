@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
	<title>Actualizar Autoevaluacion</title>
</head>
<body>
	<form action="update/{{$Autoeva->id}}" method="post" enctype="multipart/form-data">
			<div id="app">
	        @include('Mensajes')


	        @yield('content')
	    	</div>
			{{ csrf_field() }}
			{{method_field('patch')}}
			<div class="container">
				<h1  class="text-center">Autoevaluación de Control Interno</h1>
				<h3 class="text-center">Editar</h3>

			<!--************************************** Fila 1 *************************************-->

			    <div class="row">
			        <div class='col-sm-12'>   
			        </div>
			    </div>

			<!--************************************** Fila 2 *************************************-->	
				<br>
				<br>
				<br>
				<div class="row">
					<div class="col-sm-1">
						<label>No.</label>
				        <input type="text" class="form-control" id="txtconsecutivoauto" placeholder="No" name="txtconsecutivoauto" value="{{$Autoeva->consecutivoauto}}" required oninvalid="this.setCustomValidity('No se ingreso número o el valor esta repetido')" oninput="setCustomValidity('')">
					</div>

					<div class="col-sm-2">
						<label>Medidas de Control</label>
				        <input type="text" title="Medidas de control que hayan sido identificadas en la actividad de evaluación del riesgo, además de los controles que se encuentran en la matriz "Planificación de la Valoración de riesgo"(AS-08-06-114)" class="form-control" id="txtMedidas" placeholder="Medidas de Control" name="txtMedidas" value="{{$Autoeva->medidascontrolauto}}" required oninvalid="this.setCustomValidity('No se ingreso la medida o dicha medida ya fue creada')" oninput="setCustomValidity('')">
					</div>

					<div class="col-sm-2">
						<label>Ponderación</label>
				        <input type="text" title=" Corresponde al grado de importancia de la medida de control dentro del proceso.  La sumatoria de todas las ponderaciones deben ser un 100%." class="form-control" id="txtPonderacion" placeholder="Ponderación" name="txtPonderacion" value="{{$Autoeva->ponderacionauto}}" required oninvalid="this.setCustomValidity('No se ingreso la ponderación debe ser un valor númerico')" oninput="setCustomValidity('')">
					</div>

					

					<!--******************************** Select de cumplimiento **************************-->

					<div class="col-sm-1">
						<label title=" Parámetros de calificación que se detallan en el punto 5.5) de este manual.">Cumplimiento</label>
						<br>
					    <select class="selectpicker show-tick" id="cbxCumplimiento" name="cbxCumplimiento" value="{{$Autoeva->cumplimientoauto}}">
					        <option value="---">---</option>
			  				<option value="0.90" style="background: #ff0000; color: #ffffff;" title=" Parámetros de calificación que se detallan en el punto 5.5) de este manual.">0.90</option>
			  				<option value="0.70" style="background: #ff852d; color: #ffffff;">0.70</option>
			  				<option value="0.50" style="background: #ffee00; color: #ffffff;">0.50</option>
			  				<option value="0.30" style="background: #00ff11; color: #ffffff;">0.30</option>
			  				<option value="0.10" style="background: #00ff11; color: #ffffff;">0.10</option>
						</select>
						<br>	
					</div>
						
					<!--***************************** Select de Efectividad *******************************-->

					<div class="col-sm-1">
						<label title=" Parámetros de calificación que se detallan en el punto 5.5) de este manual." >Efectividad</label>
						<br>
					    <select class="selectpicker" id="cbxEfectividad" name="cbxEfectividad" value="{{$Autoeva->efectividadauto}}">
					       	<option value="---">---</option>
			  				<option value="0.90" style="background: #ff0000; color: #ffffff;">0.90</option>
			  				<option value="0.70" style="background: #ff852d; color: #ffffff;">0.70</option>
			  				<option value="0.50" style="background: #ffee00; color: #ffffff;">0.50</option>
			  				<option value="0.30" style="background: #00ff11; color: #ffffff;">0.30</option>
			  				<option value="0.10" style="background: #00ff11; color: #ffffff;">0.10</option>
						</select>

					</div>
						
					<div class="col-sm-2">
						<label>Calificación</label>
						<input class="form-control" type="text" name="txtCalificacion" id="txtCalificacion" placeholder="Calificación" title="Parámetros de calificación del control que se incluye en el punto5,6 del manual." value="{{$Autoeva->calificacionauto}}">
					</div>

					<div class="col-sm-3">
						<label>Calificación Ponderada</label>
			            <input class="form-control" id="txtCalPonde" type="text" placeholder="Calificación Ponderada" name="txtCalPonde" value="{{$Autoeva->calificacionponderacionauto}}">
					</div>		
				</div>

				<!--********************************** Fila 3 ******************************-->	
				<br>
				<br>
				<br>
				<div class="row">
					<div class="col-sm-6">
						<label >Riesgos Asociados</label>
			            <input type="text" class="form-control" id="txtRiesgoAso" placeholder="Riesgos Asociados" name="txtRiesgoAso" value="{{$Autoeva->riesgoasociadoauto}}" required oninvalid="this.setCustomValidity('No se ingreso el Riesgo Asociado')" oninput="setCustomValidity('')">
			        </div>

					<div class="col-sm-6">
						<label>Observaciones</label>
			            <input type="text" class="form-control" id="txtObservaciones" placeholder="Observaciones" name="txtObservaciones" value="{{$Autoeva->observacionauto}}" required oninvalid="this.setCustomValidity('No se ingreso Observación')" oninput="setCustomValidity('')">
			        </div>
				</div>	
				<!--************************************** Fila 4 ******************-->
				<!--************************************** Botones *************************************-->			
				<br>
				<div class="row">
					<div class="col-sm-4">
					</div>

					<div class="col-sm-4">	
						<center><button type="submit" class="btn btn-primary btn-md">Actualizar</button></center>
					</div>

					<div class="col-sm-4">
					</div>
				</div>	
				<br>
			</div>		
	</form>	
</body>
<script type="text/javascript">
    $("#cbxCumplimiento").val("{{$Autoeva->cumplimientoauto}}");
    $("#cbxEfectividad").val("{{$Autoeva->efectividadauto}}");
</script>
</html>
@endsection