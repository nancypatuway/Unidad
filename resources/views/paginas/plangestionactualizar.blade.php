@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
	<title>atualizar tabla de plangestion</title>
</head>
<body>
<form action="updatePlan/{{$PGestion->id}}" method="post" enctype="multipart/form-data"> 
     <!--para validacion-->
      <div id="app">
          @include('Mensajes')


          @yield('content')
      </div>

     {{ csrf_field() }}
     {{method_field('patch')}}
  	<h1 class="text-center">Plan de Gestión</h1>
  	<h3 class="text-center">Editar</h3>

    <div class="container">

  <!--******************************** fila 1 ************************************-->   

      <div class="row">
          <div class='col-sm-12'>
          </div>     
      </div>


  <!--******************************** fila 2 ************************************-->   

      <div class="row">
        <div class='col-sm-4'>
          <label>N° Consecutivo</label>
          <input type="text" class="form-control" id="txtNConsecu" placeholder="N° Consecutivo" name="txtNConsecu" value="{{$PGestion->codplangestion}}"  required oninvalid="this.setCustomValidity('Ingresar el número de código o ya se encuentra ingresado')" oninput="setCustomValidity('')" >
        </div>

        <div class='col-sm-4'>
          <label>Riesgo Asociado</label>
          <input type="text" class="form-control" id="txtRiesAso" placeholder="Riesgo Asociado" name="txtRiesAso" value="{{$PGestion->riesgoasociado}}" required oninvalid="this.setCustomValidity('Ingresar el Riesgo Asociado')" oninput="setCustomValidity('')" >
        </div>

        <div class='col-sm-4'>
          <label>Acciones de Mejora</label>
          <input type="text" class="form-control" id="txtAcciMejo" placeholder="Medidas de Control" name="txtAcciMejo" value="{{$PGestion->accionmejora}}" required oninvalid="this.setCustomValidity('Ingresar la Accion de Mejora')" oninput="setCustomValidity('')" >
        </div>
    </div>            
  <!--******************************** fila 3 ************************************-->

      <br>
      <div class="row">
        <div class="col-sm-12 alert alert-info">
          <h4 class="text-center">Actividades por acciones de mejora</h4>
        </div>
      </div>

  <!--******************************** fila 4 ************************************-->   

      <div class="row">
    		<div class="col-sm-9">
    			<label>Detalle</label>
    	    <input type="text" class="form-control" id="txtDetalle" placeholder="Detalle" name="txtDetalle">
  		  </div>

    		<div class="col-sm-3 text-center">
    			<label >Peso</label>
    			<br>
    		  <select  title="La suma de los pesos en porcentaje de cada acción de mejora debe sumar un 100%." class="selectpicker show-tick" id="cbxPeso" name="cbxPeso">
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
    		<script type="text/javascript">
    			$("#cbxPeso").val("{{$PGestion->peso}}");
    		</script>
      

        <div class='col-sm-2'>
          <br>
          <a class="btn btn-primary" style="float:right;" href="#btnAgregarPeso" >Agregar</a>
          
        </div>
        <div class='col-sm-1'>
          <br>
            <input type="hidden" name="txttoken" id="txttoken" value="{{$PGestion->token}}">
           
        </div>


      </div>
        <br>
      <div class="row">

        <table class="table table-striped table-bordered table-hover table-responsive" id="tablePlangestion2">
          <thead>
            <tr>
              <th>Detalle</th>
              <th>peso</th>
              <th>Eliminar</th>
            </tr>
          </thead>
          <tbody align="justify" bgcolor="" valign="top">
            @foreach($Pesoxplan as $pesoplan)
              <tr>
                  <!--despues de -> se pone el nombre del id en la base-->
                <td>{{$pesoplan->detalle}}</td>
                <td>{{$pesoplan->peso}}</td>
                <td><a href="../delete/{{$pesoplan->id}}" title="Eliminar registro" style="color:red"><span class="glyphicon glyphicon-trash"></span></a>
                </td>
                
              </tr>
            @endforeach
              <tr>
                <td>Total</td>
                <td>{{$SumPesoxplan}}</td>
              </tr>
          </tbody>
        </table> 
      </div>  


  <!--******************************** fila 5 ************************************-->   

      <br>
      <div class="row">
        <div class="col-sm-12 alert alert-info">
          <h4 class="text-center">Calendarización</h4>
        </div>
      </div>

  <!--******************************** fila 6 ************************************-->   

      <div class="row">
    		<div class="col-sm-4">
    			<label>Plazo</label>
          <input type="text" class="form-control" id="txtPlazo" placeholder="Plazo" name="txtPlazo" value="{{$PGestion->plazo}}" required oninvalid="this.setCustomValidity('Ingresar el plazo')" oninput="setCustomValidity('')" >
        </div>

    		<div class="col-sm-4">
    			<label for="No">Fecha de Inicio</label>
    	    <input type="text" class="form-control" id="txtFechaInicio" placeholder="Fecha de Inicio" name="txtFechaInicio" value="{{$PGestion->finicio}}" required oninvalid="this.setCustomValidity('Ingresar la Fecha de Inicio')" oninput="setCustomValidity('')" >
    		</div>

    		<div class="col-sm-4">
    			<label for="No">Fecha de Fin</label>
          <input type="text" class="form-control" id="txtFechaFin" placeholder="Fecha de Fin" name="txtFechaFin" value="{{$PGestion->ffin}}" required oninvalid="this.setCustomValidity('Ingresar la Fecha de Fin')" oninput="setCustomValidity('')" >
    		</div>
      </div>

  <!--******************************** fila 7 ************************************-->   

      <div class="row">
    		<div class="col-sm-3">
    			<label>Acciones Realizadas</label>
          <input type="text" class="form-control" id="txtAccionesReali" placeholder="Acciones Realizadas" name="txtAccionesReali" value="{{$PGestion->accionesrealizadas}}" required oninvalid="this.setCustomValidity('Ingresar Acciones Realizadas')" oninput="setCustomValidity('')" >
    		</div>

    		<div class="col-sm-3">
    			<label>% Avance</label>
          <input type="text" title="El porcentaje de avance se debe reportar por actividad, utilizando la misma referencia del % de peso asignada." class="form-control" id="txtAvance" placeholder="% Avance" name="txtAvance" value="{{$PGestion->avance}}" required oninvalid="this.setCustomValidity('Ingresar % Avance y sea número')" oninput="setCustomValidity('')" >
    		</div>

    		<div class="col-sm-3">
    			<label>Justificación</label>
          <input type="text" class="form-control" id="txtJustificacion" placeholder="Justificación" name="txtJustificacion" value="{{$PGestion->justificacion}}" required oninvalid="this.setCustomValidity('Ingresar Justificación')" oninput="setCustomValidity('')" >
    		</div>

    		<div class='col-sm-3'>
          <br>
          <button type="submit" id="btnActualizar" name="btnActualizar" class="btn btn-primary" style="float:right;" >Actualizar</button>
          <br>
          <br>
          <br>
        </div>
      </div>

  </form>

</body>
<!--para cambiar lo que muestra el calendario a español en el input-->
<script>
  $(document).ready( function () {
          $('a[href = "#btnAgregarPeso"]').click(function() {
            det=$('#txtDetalle').val();
            peso=$('#cbxPeso').val();
            token=$('#txttoken').val();
        window.location.replace('../store/'+det+'/'+peso+'/'+token)
    }); });
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
</html>

@endsection