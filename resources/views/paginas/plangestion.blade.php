@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
  <title>Plan de Gestion</title>
</head>
<body>
   
  <form action="plangestion/storePlan" method="post" enctype="multipart/form-data"> 
      <div id="app">
          @include('Mensajes')


          @yield('content')
      </div>
      
     {{ csrf_field() }}
  	<h1 class="text-center">Plan de Gestión</h1>
  	<h4 class="text-center">AS-08-06-124</h4>

    <div class="container">

  <!--******************************** fila 1 ************************************-->   

      <div class="row">
          <div class='col-sm-12'>
          </div>     
      </div>

  <!--******************************** fila 2 ************************************-->   
   
      <div class="row">
        <div class='col-sm-4'>
          <label>Nombre del Proyecto o Proceso</label>
          <input type="text" class="form-control" id="txtNombProceso" placeholder="Nombre del Proyecto o Proceso" name="txtNombProceso">
        </div>

        <div class='col-sm-4'>
          <label>Fecha</label>
          <input type="text" class="form-control" id="txtFecha" placeholder="Fecha" name="txtFecha">
        </div>

        <div class='col-sm-4'>
    	    <label>Nombre del Titular Subordinado</label>
    	    <input class="form-control" id="txtNombreTitular" type="text" disabled placeholder="Nombre del Titular Subordinado" name="txtNombreTitular">
        </div>

      </div>

  <!--******************************** fila 3 ************************************-->   

      <div class="row">
        <div class='col-sm-4'>
          <label>N° Consecutivo</label>
          <input type="text" class="form-control" id="txtNConsecu" placeholder="N° Consecutivo" name="txtNConsecu" required oninvalid="this.setCustomValidity('Ingresar el número de código o ya se encuentra ingresado')" oninput="setCustomValidity('')" >
        </div>

        <div class='col-sm-4'>
          <label>Riesgo Asociado</label>
          <input type="text" class="form-control" id="txtRiesAso" placeholder="Riesgo Asociado" name="txtRiesAso" required oninvalid="this.setCustomValidity('Ingresar el Riesgo Asociado')" oninput="setCustomValidity('')" >
        </div>

        <div class='col-sm-4'>
          <label>Acciones de Mejora</label>
          <br>
          <select  class="form-control" class="selectpicker show-tick" id="cbxPeso" name="cbxaccionmejora" >
            <option value="---">---</option>
            <option value=""></option>
          </select>
          
        </div>
      </div>          

  <!--******************************** fila 4 ************************************-->

      <br>
      <div class="row">
        <div class="col-sm-12 alert alert-info">
          <h4 class="text-center">Actividades por acciones de mejora</h4>
        </div>
      </div>

  <!--******************************** fila 5 ************************************-->   

      <div class="row">
    		<div class="col-sm-3">
    			<label>Detalle</label>
    	    <input type="text" class="form-control" id="txtDetalle" placeholder="Detalle" name="txtDetalle">
  		  </div>

    		<div class="col-sm-3 text-center">
    			<label >Peso</label>
    			<br>
          <select  class="form-control" class="selectpicker show-tick" id="cbxPeso" name="cbxPeso" title="La suma de los pesos en porcentaje de cada acción de mejora debe sumar un 100%.">
    		    <option value="---">---</option>
            <option value="5">5  %</option>
            <option value="10">10 %</option>
            <option value="15">15 %</option>
            <option value="20">20 %</option>
            <option value="25">25 %</option>
            <option value="30">30 %</option>
            <option value="35">35 %</option>
            <option value="40">40 %</option>
            <option value="45">45 %</option>
            <option value="50">50 %</option>
            <option value="55">55 %</option>
            <option value="60">60 %</option>
            <option value="65">65 %</option>
            <option value="70">70 %</option>
            <option value="75">75 %</option>
            <option value="80">80 %</option>
            <option value="85">85 %</option>
            <option value="90">90 %</option>
            <option value="95">95 %</option>
            <option value="100">100 %</option>
          </select>
          <br>  
        </div>

        <div class="col-sm-3">
          <label>Responsable</label>
          <select  class="form-control" class="selectpicker show-tick" id="cbxRespon" name="cbxRespon" title="Responsable del proceso">
            <option value="---">---</option>
          </select>
        </div>

        <div class='col-sm-2'>
          <br>
          <a class="btn btn-primary" style="float:right;" href="#btnAgregarPeso" >Agregar</a>
          
        </div>
        <div class='col-sm-1'>
          <br>
          @if(!Session::has('Token'))
            <input type="hidden" name="txttoken" id="txttoken" value="">
          @else
            <input type="hidden" name="txttoken" id="txttoken" value="{!! session('Token') !!}" >
          @endif    
        </div>
      </div>
        <br>
      <div class="row">

        <table class="table table-striped table-bordered table-hover table-responsive" id="tablePlangestion2">
          <thead>
            <tr>
              <th bgcolor="#858cfc">Detalle</th>
              <th bgcolor="#858cfc">Peso</th>
              <th bgcolor="#858cfc">Responsable</th>
              <th bgcolor="#858cfc">Eliminar</th>
            </tr>
          </thead>
          <tbody align="justify" bgcolor="" valign="top">
            @foreach($Pesoxplan as $pesoplan)
              <tr>
                  <!--despues de -> se pone el nombre del id en la base-->
                <td>{{$pesoplan->detalle}}</td>
                <td>{{$pesoplan->peso}}</td>
                <td></td>
                <td><a style="color:red" data-toggle="modal" data-target="#eliminarplan1"><span class="glyphicon glyphicon-trash"></span></a></button>
                        <!-- ******************Modal *****************************-->
                    <div class="modal fade" id="eliminarplan1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-body">
                              <h3 class="text-center">Desea Eliminar la información de la fila →</h3>
                          </div>
                          <div class="modal-footer">
                            <center><button type="button" class="btn btn-danger"><a href="plangestion/delete/{{$pesoplan->id}}" title="Eliminar registro" style="color:white"><span class="glyphicon glyphicon-trash"></span></a></button>
                            
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button></center>
                          </div>
                        </div>
                      </div>

                </td>
                
              </tr>
            @endforeach

              <tr>
                <td bgcolor="#7fc3ff">Total</td>
                <td bgcolor="#7fc3ff">{{$SumPesoxplan}}</td>
              </tr>
          </tbody>
        </table> 
      </div>    
        
    

  <!--******************************** fila 6 ************************************-->   

      <br>
      <div class="row">
        <div class="col-sm-12 alert alert-info">
          <h4 class="text-center">Calendarización</h4>
        </div>
      </div>

  <!--******************************** fila 7 ************************************-->   

      <div class="row">
    		<div class="col-sm-4">
    			<label>Plazo</label>
          <input type="text" class="form-control" id="txtPlazo" placeholder="Plazo" name="txtPlazo" required oninvalid="this.setCustomValidity('Ingresar la Fecha de Inicio')" oninput="setCustomValidity('')" >
        </div>

    		<div class="col-sm-4">
    			<label for="No">Fecha de Inicio</label>
    	    <input type="text" class="form-control" id="txtFechaInicio" placeholder="Fecha de Inicio" name="txtFechaInicio" required oninvalid="this.setCustomValidity('Ingresar la Fecha de Inicio')" oninput="setCustomValidity('')" >
    		</div>

    		<div class="col-sm-4">
    			<label for="No">Fecha de Fin</label>
          <input type="text" class="form-control" id="txtFechaFin" placeholder="Fecha de Fin" name="txtFechaFin" required oninvalid="this.setCustomValidity('Ingresar la Fecha de Fin')" oninput="setCustomValidity('')" >
    		</div>
      </div>

  <!--******************************** fila 8 ************************************-->   

      <div class="row">
    		<div class="col-sm-3">
    			<label>Acciones Realizadas</label>
          <input type="text" class="form-control" id="txtAccionesReali" placeholder="Acciones Realizadas" name="txtAccionesReali" required oninvalid="this.setCustomValidity('Ingresar Acciones Realizadas')" oninput="setCustomValidity('')" >
    		</div>

    		<div class="col-sm-3">
    			<label>% Avance</label>
          <input type="text" title="El porcentaje de avance se debe reportar por actividad, utilizando la misma referencia del % de peso asignada." class="form-control" id="txtAvance" placeholder="% Avance" name="txtAvance" required oninvalid="this.setCustomValidity('Ingresar % Avance y sea número')" oninput="setCustomValidity('')" >
    		</div>

    		<div class="col-sm-3">
    			<label>Justificación</label>
          <input type="text" class="form-control" id="txtJustificacion" placeholder="Justificación" name="txtJustificacion" required oninvalid="this.setCustomValidity('Ingresar Justificación')" oninput="setCustomValidity('')" >
    		</div>

    		<div class='col-sm-3'>
          <br>
          <button type="submit" class="btn btn-primary" style="float:right;" >Agregar</button>
          <br>
          <br>
          <br>
        </div>
      </div>

  </form>
  <!--******************************** tabla ************************************-->   

      <div class="row"> 
        <table class="table table-striped table-bordered table-hover" id="tablePlangestion">

          <thead>
            <tr>
              <th>N° consecutivo</th>
              <th>Riesgo Asociado</th>
              <th>Acciones de Mejora</th>
              <th>Plazo</th>
              <th>Fecha de Inicio</th>
              <th>Fecha de Fin</th>
              <th>Acciones Realizadas</th>
              <th>% Avance</th>
              <th>Justificación</th>
              <th>Editar</th>
              <th>Borrar</th> 
            </tr>
          </thead>

          <tbody>
            <!-- relleno de la tabla -->
            <!-- PGestion variable del controlador ControllerPGestion -->
            @foreach($PGestion as $gestion)
              <tr>
                  <!--despues de -> se pone el nombre del id en la base-->
                <td>{{$gestion->codplangestion}}</td>
                <td>{{$gestion->riesgoasociado}}</td>
                <td>{{$gestion->accionmejora}}</td>
                <td>{{$gestion->plazo}}</td>
                <td>{{$gestion->finicio}}</td>
                <td>{{$gestion->ffin}}</td>
                <td>{{$gestion->accionesrealizadas}}</td>
                <td>{{$gestion->avance}}</td>
                <td>{{$gestion->justificacion}}</td>

                <td>
                  <a href="plangestion/edit/{{$gestion->id}}" title="Editar registro">
                  <span class="glyphicon glyphicon-pencil"></span>
                  </a>
                </td>
                <td><a style="color:red" data-toggle="modal" data-target="#eliminarplan2"><span class="glyphicon glyphicon-trash"></span></a></button>
                        <!-- ******************Modal *****************************-->
                    <div class="modal fade" id="eliminarplan2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-body">
                              <h3 class="text-center">Desea Eliminar la información de la fila →</h3>
                          </div>
                          <div class="modal-footer">
                            <center><button type="button" class="btn btn-danger"><a href="plangestion/deletePlan/{{$gestion->id}}" title="Eliminar registro" style="color:white"><span class="glyphicon glyphicon-trash"></span></a></button>
                            
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button></center>
                          </div>
                        </div>
                      </div>

                </td>
                
              </tr>
            @endforeach
          </tbody>
        </table>    
      </div><!--cierra la tabla-->

  </div> <!--fin countainer-->

</body>

<!-- para el cambiar lo que muestra la tabla en español-->

<script>
        $(document).ready( function () {
          $('a[href = "#btnAgregarPeso"]').click(function() {
            det=$('#txtDetalle').val();
            peso=$('#cbxPeso').val();
        window.location.replace('plangestion/store/'+det+'/'+peso+'/session');
    });
            $('#tablePlangestion').DataTable({
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

<!--para cambiar lo que muestra el calendario a español en el input-->
<script>
      $(function () {
          $("#txtFecha").datepicker({dateFormat: 'yy-mm-dd'});
          $("#txtFechaInicio").datepicker({dateFormat: 'yy-mm-dd'});
          $("#txtFechaFin").datepicker({dateFormat: 'yy-mm-dd'});
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
<!--*************************operacion de suma de mes a la fecha inicial para retorne la fecha final-->
<script>
  $('#txtPlazo').on('change', function() {
  Calculoplazo();
});
  $('#txtFechaFin').on('change', function() {
  Calculoplazo();
});
  function Calculo(){
    $fecha = date('Y-m-j');
$nuevafecha = strtotime ( '+3 month' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
 
echo $nuevafecha;
  }


</script>
  <!--tooltip para dar info cuando se posiciona encima -->

<script>
  $(document).ready(function(){
    $('[data-toggle="tooltip" style="background-color: green"]').tooltip();   
  });
</script>

</html>
@endsection