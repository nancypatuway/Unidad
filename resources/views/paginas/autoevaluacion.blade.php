@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html>
<head>
	<title>Autoevaluacion</title>
</head>
<body>
	<form action="autoevaluacion/store" method="post" enctype="multipart/form-data">
		 <!--para validacion-->
	    <div id="app">
	        @include('Mensajes')


	        @yield('content')
	    </div>

		{{ csrf_field() }}
		<div class="container">
			<h1  class="text-center">Autoevaluación de Control Interno</h1>

		<!--************************************** Fila 1 *************************************-->

		    <div class="row">
		        <div class='col-sm-12'>   
		        </div>
		    </div>

		<!--************************************** Fila 2 *************************************-->	

			<div class="row">
				<div class="col-sm-3">
					<label >Nombre del Proyecto o Proceso</label>
			        <input type="text" class="form-control" id="txtnombreproceso" placeholder="Nombre del Proyecto o Proceso" name="txtnombreproceso">
				</div>

				<div class="col-sm-3">
					<label >Dependencia</label>
				    <br>
					<select  class="form-control" class="selectpicker show-tick" placeholder="Dependencia" id="cbxDependencia" name="cbxDependencia" >
				        <option value="---">---</option>
		  				<option value=""></option>
					</select>
					<br>	
				</div>

				<div class="col-sm-3">
					<label for="Fecha">Fecha</label>
				    <input type="datetime" title="Establecer la fecha dando un clic para desplegar el calendario" class="form-control" id="txtFechaInicio" placeholder="Fecha" name="txtFechaInicio">
				</div>

				<div class="col-sm-3">
					<label>Nombre del Titular Subordinado</label>
				    <input type="text" class="form-control" id="txtNombreTitular" placeholder="Nombre del Titular Subordinado" name="txtNombreTitular">
				</div>
			</div>

		<!--************************************** Fila 3 *************************************-->	

			<div class="row">
		    	<br>
		    	<br>
		    </div>

		<!--************************************** Fila 4 *************************************-->	

			<div class="row">
				<div class="col-sm-1">
					<label>No.</label>
			        <input type="text" class="form-control" id="txtconsecutivoauto" placeholder="No" name="txtconsecutivoauto" required oninvalid="this.setCustomValidity('No se ingreso número o el valor esta repetido')" oninput="setCustomValidity('')">
				</div>

				<div class="col-sm-2">
					<label>Medidas de Control</label>
			        <input type="text" title="Medidas de control que hayan sido identificadas en la actividad de evaluación del riesgo, además de los controles que se encuentran en la matriz Planificación de la Valoración de riesgo(AS-08-06-114)" class="form-control" id="txtMedidas" placeholder="Medidas de Control" name="txtMedidas" required oninvalid="this.setCustomValidity('No se ingreso la medida o dicha medida ya fue creada')" oninput="setCustomValidity('')">
				</div>

				<div class="col-sm-2">
					<label>Ponderación</label>
			        <input type="text" title=" Corresponde al grado de importancia de la medida de control dentro del proceso.  La sumatoria de todas las ponderaciones deben ser un 100%." class="form-control" id="txtPonderacion" placeholder="Ponderación" name="txtPonderacion" required oninvalid="this.setCustomValidity('No se ingreso la ponderación debe ser un valor númerico')" oninput="setCustomValidity('')">
				</div>

				<!--************************************** Select de cumplimiento *************************************-->

				<div class="col-sm-1">
					<label title=" Parámetros de calificación que se detallan en el punto 5.5) de este manual.">Cumplimiento</label>
					<br>
					<select  class="form-control" class="selectpicker show-tick" id="cbxCumplimiento" name="cbxCumplimiento" >
				        <option value="---">---</option>
		  				<option value="0.90" style="background: #ff0000; color: #ffffff;" title=" Parámetros de calificación que se detallan en el punto 5.5) de este manual.">0.90</option>
		  				<option style="background: #ff852d; color: #ffffff;" value="0.70">0.70</option>
		  				<option value="0.50" style="background: #ffee00; color: #ffffff;">0.50</option>
		  				<option value="0.30" style="background: #00ff11; color: #ffffff;">0.30</option>
		  				<option value="0.10" style="background: #00ff11; color: #ffffff;">0.10</option>
					</select>
					<br>	
				</div>
					
				<!--************************************** Select de Efectividad *************************************-->

				<div class="col-sm-1">
					<label title=" Parámetros de calificación que se detallan en el punto 5.5) de este manual.">Efectividad</label>
					<br>
					<select  class="form-control" class="selectpicker show-tick" id="cbxEfectividad" name="cbxEfectividad" >
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
		            <input class="form-control" title="Parámetros de calificación del control que se incluyen en el punto 5,6) del manual."  id="txtCalificacion" type="text"  placeholder="Calificación" name="txtCalificacion" disabled>
				</div> 

				<div class="col-sm-3">
					<label >Calificación Ponderada</label>
		            <input class="form-control" id="txtCalPonde" type="text"  placeholder="Calificación Ponderada" name="txtCalPonde" disabled>
				</div>		
			</div>

		<!--************************************** Fila 5 *************************************-->	

			<div class="row">
				<div class="col-sm-6">
					<label >Riesgos Asociados</label>
		            <input type="text" class="form-control" id="txtRiesgoAso" placeholder="Riesgos Asociados" name="txtRiesgoAso" laceholder="Ponderación" name="txtPonderacion" required oninvalid="this.setCustomValidity('No se ingreso el Riesgo Asociado')" oninput="setCustomValidity('')">
		        </div>

				<div class="col-sm-6">
					<label>Observaciones</label>
		            <input type="text" class="form-control" id="txtObservaciones" placeholder="Observaciones" name="txtObservaciones" required oninvalid="this.setCustomValidity('No se ingreso Observación')" oninput="setCustomValidity('')">
		        </div>
			</div>		
</form>	
<!--************************************** Fila 6 *************************************-->
<!--************************************** Botones *************************************-->			
	<br>
	<div class="row">
		<div class="col-sm-4">
		</div>

		<div class="col-sm-4">	
			<center><button type="submit" class="btn btn-primary btn-md">Agregar</button></center>
		</div>

		<div class="col-sm-4">
		</div>
	</div>

<!--************************************** Fila 7 *************************************-->
	<div class="row">
		<br>

  		<table class="table table-striped table-bordered table-hover" id="tableAutoevaluacion">
    		<thead>
		      <tr>
		        <th>No.</th>
		        <th>Medidas de control</th>
		        <th>Ponderación</th>
		        <th>Cumplimiento</th>
		        <th>Efectividad</th>
		        <th>Calificación</th>
		        <th>Calificación Ponderada</th>
		        <th>Riesgos Asociados</th>
		        <th>Observaciones</th>
		        <th>Editar</th>
                <th>Borrar</th> 
		      </tr>
    		</thead>
    		<tbody align="justify" bgcolor="" valign="top">
		        <!--users1´parametro q se recibe del controlador-->
                <!--variable cualquiera-->
                @foreach($Autoeva as $auto)
                    <tr>
                        <td>{{$auto->consecutivoauto}}</td>
                        <td>{{$auto->medidascontrolauto}}</td>
                        <td>{{$auto->ponderacionauto}}</td>
                        <td>{{$auto->cumplimientoauto}}</td>
                        <td>{{$auto->efectividadauto}}</td>
                        <td>{{$auto->calificacionauto}}</td>
                        <td>{{$auto->calificacionponderacionauto}}</td>
                        <td>{{$auto->riesgoasociadoauto}}</td>
                        <td>{{$auto->observacionauto}}</td>

                        <td>
                            <a href="autoevaluacion/edit/{{$auto->id}}" title="Editar registro">
                            <span class="glyphicon glyphicon-pencil"></span>
                            </a>
                        </td>
                        <td><a style="color:red" data-toggle="modal" data-target="#eliminarauto" href="#eliminarauto"><span class="glyphicon glyphicon-trash"></span></a></span></button>
              					<!-- ******************Modal *****************************-->
				            <div class="modal fade" id="eliminarauto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
				              <div class="modal-dialog" role="document">
				                <div class="modal-content">
				                  <div class="modal-body">
				                      <h3 class="text-center">Desea Eliminar la información de la fila →</h3>
				                  </div>
				                  <div class="modal-footer">
				                    <center><button type="button" class="btn btn-danger"><a href="autoevaluacion/delete/{{$auto->id}}" title="Eliminar registro" style="color:white">
                            <span class="glyphicon glyphicon-trash"></span>
                            </a></button>
				                    
				                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button></center>
				                  </div>
				                </div>
				              </div>
                            
                        </td>
                    </tr>
                @endforeach
    		</tbody>
  		</table>     
	</div>
	<br>
	<br>

</div> <!--fin del container-->		



</body>

<!--para cambiar lo que muestra el calendario a español en el input-->
<script>
      $(function () {
          $("#txtFechaInicio").datepicker({dateFormat: 'yy-mm-dd'});
         $.datepicker.regional["es"] =
              {
              monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
              monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
              dayNames: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sábado'],
              dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
              dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá']
              }
         $.datepicker.setDefaults($.datepicker.regional["es"]);
 
      });
  </script>

<!--para cambiar la información que muestra la tabla a español-->

<script>
        $(document).ready( function () {
            $('#tableAutoevaluacion').DataTable({
                language: {
                    "lengthMenu": "Mostrar _MENU_ Registros",
                    "emptyTable": "No hay información",
                    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Registros",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "   Siguiente",
                        "previous": " Anterior   "
                    }
                }
            });
        });
</script>

<!--tooltip para dar info cuando se posiciona encima -->

<script>
  $(document).ready(function(){
    $('[data-toggle="tooltip" style= "background-color: green"]').tooltip();   
  });
</script>
<!--para hacer el calculo de ponderacion cumplimiento y efectividad-->
<script>
	$('#txtPonderacion').on('change', function() {
  Calculo();
});
	$('#cbxCumplimiento').on('change', function() {
  Calculo();
});
	$('#cbxEfectividad').on('change', function() {
  Calculo();
});
	function Calculo(){
		valPon=$('#txtPonderacion').val();
		valCump=$('#cbxCumplimiento').val();
		valEfec=$('#cbxEfectividad').val();
		valCali=parseFloat(valCump)*parseFloat(valEfec);
		valCaliPon=parseFloat(valPon)*parseFloat(valCali);
		if (isNaN(valCali)){
			valCali=0;
		}
		if (isNaN(valCaliPon)){
			valCaliPon=0;
		}
		$('#txtCalificacion').val(valCali);
		$('#txtCalPonde').val(valCaliPon);
	}
	$('#txtPonderacion').keyup(function(e)
                                {
  if (/\D/g.test(this.value))
  {
    // Filter non-digits from input value.
    this.value = this.value.replace(/\D/g, '');
  }
});
</script>
</html>

@endsection