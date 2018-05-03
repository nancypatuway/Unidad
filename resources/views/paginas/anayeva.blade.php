@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html>
<head>
	<title>AnalisyEvaluacion</title>
</head>
<body>
<!--para ver las validaciones o sea el mensaje-->
<div id="app">
          @include('Mensajes')


          @yield('content')
      </div>
    
    <h2 class="text-center">Análisis y Evaluación de Riesgos (Negativos o Positivos)</h2>
    <h4 class="text-center">AS-08-06-124</h4>

    <div class="container">

    <!--********************************* Fila 1 *************************************-->

        <div class="row">
          <div class='col-sm-12'>
            <!-- Boton trigger modal -->
            <button style="float:right;" type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModalLong" >Significado de los Colores</button> 
              <!-- Modal -->
            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h3 class="modal-title text-center" id="exampleModalLongTitle">Aclaraciones</h3>
                    </div>
                  <div class="modal-body">
                        <big><center><b>Sigificado de los colores de Nivel de Riesgo</b><br></center></big>
                        <br>
                        <b><font color=green>█</font> Verde</b><br>  
                          Nota menor o igual a 0.05 = <b>Riesgo Bajo</b><br>
                        <b><font color=yellow>█</font> Amarillo</b><br>  
                          Nota mayor a 0.05 o menor o igual a 0.09 = <b>Riesgo Moderado</b><br>
                        <b><font color=orange>█</font> Naranja</b><br>
                          Nota mayor a 0.009 o menor o igual a 0.25 = <b>Riesgo Alto</b><br>
                        <b><font color=red>█</font> Rojo</b><br>
                          Nota mayor a 0.25 = <b>Riesgo Extremo</b> <br>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                  </div>
                </div>
            </div>     
          </div>     
        </div>

    <!--********************************** Fila 2 *************************************-->
        <br>
        <br>      
        <div class="row">
          <div class='col-md-3'>
            <label>Nombre del Proyecto o Proceso</label>
            <input class="form-control" id="txtNombreProyecto" type="text" disabled placeholder="Nombre del Proyecto o Proceso" name="txtNombreProyecto">
          </div>

          <div class='col-md-3'>
            <label>Fecha</label>
            <input class="form-control"  type="text" disabled id="Fecha" placeholder="Fecha" name="Fecha">
          </div>

          <div class="col-md-3">
            <label>Código del Riesgo</label>
            <input type="text" class="form-control" id="txtcodigoriesgo" placeholder="Código" name="txtcodigoriesgo" disabled>
          </div>

          <div class='col-sm-3'>
            <label>Nombre del Riesgo</label>
            <select class="form-control" title="La suma de los pesos en porcentaje de cada acción de mejora debe sumar un 100%." class="selectpicker show-tick" id="txtNombreRiesgo" name="txtNombreRiesgo" placeholder="Nombre">
            <option value="---">---</option>
            <option value=""></option>
            <option value=""></option>
            </select>
          </div>
            
        </div>
        </div>
        <br>

        <div class="row">
          <div class='col-sm-12'>
            <label>Detalle</label>
            <input class="form-control" type="text" name="txtdetalleporta" id="txtdetalleporta" placeholder="Detalle" disabled>
          </div>

        </div>

    <!--*********************************** Fila 3 *********************************-->
<form action="anayeva/store" method="post">
      

      {{ csrf_field() }} 
      <br>    
      <div class="row">
        <div class='col-sm-3'>
          <center><label>Tipo de Análisis</label>
          <br>
          <select  class="form-control" title="La suma de los pesos en porcentaje de cada acción de mejora debe sumar un 100%." class="selectpicker show-tick" id="cbxTipoAna" name="cbxTipoAna">
            <option value="---">---</option>
            <option value="Positivo">Positivo</option>
            <option value="Negativo">Negativo</option>
          </select>
          </center>
        </div>

        <div class='col-sm-3'>
          <label>Eventos</label>
          <input type="text"  title="Incidente o situación que podría ocurrir en un lugar específico en un intervalo de tiempo particular y que de materializarse afectaría el cumplimiento de los objetivos empresariales." class="form-control" id="txtEvento" placeholder="Eventos" name="txtEvento">
        </div>

        <div class='col-sm-2'>
          <label>Causas</label>
          <input type="text" title="Es la condición que genera el evento y que provoca incertidumbre." class="form-control" id="txtCausas" placeholder="Causas" name="txtCausas">
        </div>

        <div class='col-sm-2'>
          <label>Consecuencias</label>
          <input type="text" title=" Es el efecto que la materialización del evento podría tener sobre el cumplimiento de los objetivos expresado cualitativa o cuantitativamente, sean pérdidas, perjuicios, desventajas o ganancias." class="form-control" id="txtConsecuencias" placeholder="Consecuencias" name="txtConsecuencias">
        </div>

        <br>   	
        <div class='col-sm-2'>
          <button type="button" class="btn btn-primary text-right" style="float:right;" id="btnAgretab1">Agregar</button>  
        </div>      
      </div>  
</form> 
<!--********************************TABLA1 ***************************-->
      <br>
      <div class="row">
        <table class="table table-striped table-bordered table-hover table-responsive" id="Tabla1Anayeva">
          <thead>
            <tr>
              <th>Tipo de Análisis</th>
              <th>Eventos</th>
              <th>Causas</th>
              <th>Consecuencias</th>
              <th>Eliminar</th>
            </tr>
          </thead>
          <tbody align="justify" bgcolor="" valign="top">
            @foreach($TipoAnalisis as $tipoanalisis)
              <tr>
                <td>{{$tipoanalisis->tipoanalisis}}</td>
                <td>{{$tipoanalisis->eventos}}</td>
                <td>{{$tipoanalisis->causas}}</td>
                <td>{{$tipoanalisis->consecuencias}}</td>
                <td><a style="color:red" data-toggle="modal" data-target="#eliminaranayeva1" href="#eliminaranayeva1"><span class="glyphicon glyphicon-trash"></span></a>
            <!-- ******************Modal *****************************-->
                    <div class="modal fade" id="eliminaranayeva1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-body">
                              <h3 class="text-center">Desea Eliminar la información de la fila →</h3>
                          </div>
                          <div class="modal-footer">
                            <center><button type="button" class="btn btn-danger"><a href="anayeva/delete/{{$tipoanalisis->id}}" title="Eliminar registro" style="color:red"><span class="glyphicon glyphicon-trash"></span></a></button>
                            
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button></center>
                          </div>
                        </div>
                      </div>
                  </td>

              </tr>
            @endforeach
          </tbody>
      </table> 
  </div><!--cierra la tabla1--> 

    <!--************************************* Fila 4 *********************************-->

      <br>
      <div class="row">
        <div class="col-sm-12 alert alert-info">
          <h4 class="text-center">Calificación Individual</h4>
        </div>
      </div>

    <!--************************************ Fila 5 *********************************-->

    	<div class="row">
    		<div class="col-sm-2">
    			<label >Nombre del Funcionario</label>
          <br>
          <select  class="form-control" class="selectpicker show-tick" id="txtNomFuncionario" name="txtNomFuncionario" >
            <option value="---">---</option>
          </select>
    		</div>

<form action="anayeva/store2" method="post"> 
      {{ csrf_field() }} 

    		<div class="col-sm-2">
    			<label  title="Valor otorgado a la probabilidad a partir de criterios preestablecidos, en ausencia de medidas de control">Probabilidad</label>
    			<br>
    		  <select  class="form-control" class="selectpicker show-tick" id="cbxProbabilidad" name="cbxProbabilidad" >
    		    <option value="---">---</option>
            <option value="0.90">0.90</option>
            <option value="0.70">0.70</option>
            <option value="0.50">0.50</option>
            <option value="0.30">0.30</option>
            <option value="0.10">0.10</option>
    			</select>
    		  <br>	
    		</div>

    		<div class="col-sm-2">
    			<label title="Valor otorgado al impacto (magnitud de las consecuencias) a partir de criterios preestablecidos en ausencia de medidas de control">Impacto</label>
    		  <select  class="form-control" class="selectpicker show-tick" id="cbxImpacto" name="cbxImpacto" >
    		    <option value="---">---</option>
            <option value="0.80">0.80</option>
            <option value="0.40">0.40</option>
            <option value="0.20">0.20</option>
            <option value="0.10">0.10</option>
            <option value="0.05">0.05</option>
    			</select>
    		</div>

    		<div class='col-sm-2'>
          <label>Promedio Probabilidad</label>
          <input class="form-control" title=" Promedio simple de la probabilidad, a partir de las calificaciones individuales" id="txtPromProba" type="text" placeholder="Promedio Probabilidad" name="txtPromProba">  
        </div>

        <div class='col-sm-2'>
          <label>Promedio Impacto</label>
          <input class="form-control" id="txtPromImpa" type="text" placeholder="Promedio Impacto" name="txtPromImpa">
        </div>

        <div class='col-sm-2'>
          <label>Riesgo Inherente</label>
          <input class="form-control" title="Valor resultante de multiplicar la probabilidad por el impacto y que constituye el nivel de riesgo en ausencia de medidas de control" id="txtRiesInh" type="text" placeholder="Riesgo Inherente" name="txtRiesInh">
        </div>
        <br>
      </div>

      <div class="row">
        <div class='col-sm-4'>
        </div>
        <div class='col-sm-4'>
          <button type="button" class="btn btn-primary" style="float: right;" id="btnagregarcali">Agregar</button>
    		</div>
        <div class='col-sm-4'>
        </div>
    	</div>
</form>
      <!--************************ TABLA 2 ****************************************-->

      <div class="row">
        <table class="table" id="tableanayeva2">
          <thead >
              <tr > 
                  <th>Funcionario</th>
                  <th>Probabilidad</th> 
                  <th>Impacto</th> 
                  <th>Promedio Probabilidad</th>
                  <th>Promedio Impacto</th>
                  <th>Riesgo Inherente</th>
                  <th>Borrar</th> 
              </tr>

          </thead>
          <tbody align="justify" bgcolor="" valign="top">
              @foreach($calificaciones as $cali)
                  <tr>
                      <td></td>
                      <td>{{$cali->probablidad}}</td>
                      <td>{{$cali->impacto}}</td>
                      <td>{{$cali->promprobabilidad}}</td>
                      <td>{{$cali->promimpacto}}</td>
                      <td>{{$cali->riesgoinherente}}</td>
                      <td><a style="color:red" data-toggle="modal" data-target="#eliminaranayeva2" href="#eliminaranayeva2"><span class="glyphicon glyphicon-trash"></span></a>
                      <!-- ******************Modal *****************************-->
                              <div class="modal fade" id="eliminaranayeva2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-body">
                                        <h3 class="text-center">Desea Eliminar la información de la fila →</h3>
                                    </div>
                                    <div class="modal-footer">
                                      <center><button type="button" class="btn btn-danger"><a href="calificacion/delete/{{$cali->id}}" title="Eliminar registro" style="color:white"><span class="glyphicon glyphicon-trash"></span></a></button>
                                      
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
    <!--************************************ Fila 6 *********************************-->

      <br>
      <div class="row">
        <div class="col-sm-12 alert alert-info">
          <h4 class="text-center">Medidas Existentes</h4>
        </div>
      </div>
    <!--************************************** Fila 7 *********************************-->

<form action="anayeva/store3" method="post"> 
      {{ csrf_field() }} 

      <div class="row">
    		<div class="col-sm-2">
    			<label>Modifican la Probabilidad</label>
    	    <input type="text" title="Son medidas de control asociadas a las causas." class="form-control" id="txtModiProba" placeholder="Modifican la Probabilidad" name="txtModiProba" >
    		</div>

    		<div class="col-sm-2">
    			<label>Modifican el Impacto</label>
    	    <input type="text" title="Son medidas que mitigan las consecuencias, en caso de que el riesgo se materializara." class="form-control" id="txtModiImpac" placeholder="Modifican el Impacto" name="txtModiImpac" >
    		</div>

    		<div class="col-sm-2">
          <center>
    			<label title="Calificación que se otorga a la posibilidad de ocurrencia de un evento, tomando en consideración las medidas existentes en la Empresa y utilizando como referencia los parámetros preestablecidos." >Probabilidad</label>
    			<br>
          <select  class="form-control" class="selectpicker show-tick" id="cbxProbabilidad2" name="cbxProbabilidad2" >
    		    <option value="---">---</option>
            <option value="0.90">0.90</option>
            <option value="0.70">0.70</option>
            <option value="0.50">0.50</option>
            <option value="0.30">0.30</option>
            <option value="0.10">0.10</option>
    			</select>
          </center>
    		  <br>	
    		</div>

    		<div class="col-sm-2">
          <center>
    			<label title=" Calificación que se otorga a las consecuencias que la ocurrencia del evento podría tener sobre el proceso o proyecto, tomando en consideración las medidas existentes en la Empresa y utilizando como referencia parámetros preestablecidos." >Impacto</label>
    			<br>
          <select  class="form-control" class="selectpicker show-tick" id="cbxImpacto2" name="cbxImpacto2" >
    		    <option value="---">---</option>
            <option value="0.80">0.80</option>
            <option value="0.40">0.40</option>
            <option value="0.20">0.20</option>
            <option value="0.10">0.10</option>
            <option value="0.05">0.05</option>
    			</select>
          </center>
    		</div>

        <div class='col-sm-2'>
          <label>Riesgo Residual</label>
          <input class="form-control" title="Es el dato que se obtiene de multiplicar los valores de probabilidad e impacto (considerando medidas existentes) y que permiten conocer el nivel de riesgo después de evaluado el control." id="txtRiesgoRes" type="text" placeholder="Riesgo Residual" name="txtRiesgoRes" >
        </div>

        <div class='col-sm-2'>
          <button type="button" class="btn btn-primary text-right" style="float:right;" id="btnAgregarMexistentes">Agregar</button>  
        </div>
      </div>	
    <br>

     
</form>
    <!--************************************* Fila 8 *********************************-->

      <div class="row">
        <div class="col-sm-12 alert alert-info">
          <h4 class="text-center">Medidas Propuestas</h4>
        </div>
      </div>

    <!--************************************* Fila 9 *********************************-->

<form action="anayeva/store4" method="post"> 
      {{ csrf_field() }} 
      <div class="row">
    		<div class="col-sm-2">
    			<label>Detalle de medidas</label>
    	    <input type="text" title="Corresponde a las acciones que se consideran apropiadas para administrar aquellos riesgos que por su nivel de criticidad así lo requieran" class="form-control" id="txtDetalles" placeholder="Detalles" name="txtDetalles">
    		</div>

    		<div class="col-sm-1">
          
    			<label title="Corresponde al resultado de la consideración de la eficiencia, efectividad y viabilidad de la medida propuesta:  ACEPTAR/RECHAZAR" >Validación</label>
         
          <select  class="form-control" class="selectpicker show-tick" id="cbxValidacion" name="cbxValidacion" >
    		    <option value="---">---</option>
            <option value="Aceptar">Aceptar</option>
            <option value="Rechazar">Rechazar</option>
    			</select>
          
    		</div>

    		<div class="col-sm-3" style="padding-left: 8% ">
    			<label title="Corresponde al nivel de riesgo que se espera alcanzar con la implantación de la medida." >Nivel de Riesgo esperado</label>
          <br> 
          <select  class="form-control" class="selectpicker show-tick" id="cbxNivelRiesgo" name="cbxNivelRiesgo" >
    		    <option value="---">---</option>
            <option style="background: #ff0000; color: #ffffff;" value="Extremo">Extremo</option>
            <option style="background: #ff852d; color: #ffffff;" value="Alto">Alto</option>
            <option style="background: #ffee00; color: #000000;" value="Moderado">Moderado</option>
            <option style="background: #00ff11; color: #ffffff;" value="Bajo">Bajo</option>
    			</select>
    		</div>

        <div class="col-sm-2">
        	<label>Observaciones</label>
        	<input type="text" class="form-control" id="txtObservac" placeholder="Observaciones" name="txtObservac">
    		</div>

        <br>
        <div class='col-sm-2'>
          <button type="button" class="btn btn-primary" id="btnagregarMprop">Agregar</button>
        </div>
        

		    <div class="col-sm-2">
          <label title=" Corresponde al número de acción del Plan de Gestión de Riesgo o número de meta POI.">Referencias</label>
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Ver Acciones</button>
        </div>

      </div>  
</form>

 <!--************************ TABLA 3  medidas propuestas ****************************************-->

      <div class="row">
        <table class="table" id="tableanayeva4">
          <thead>
              <tr > 
                  <th>Detalle de Medida</th>
                  <th>Validación</th> 
                  <th>Nivel de Riesgo Esperado</th> 
                  <th>Observaciones</th>
                  <th>Borrar</th> 
              </tr>
          </thead>
          <tbody align="justify" bgcolor="" valign="top">
              @foreach($Mpropuestas as $mprop)
                  <tr>
                      <td>{{$mprop->probablidad}}</td>
                      <td>{{$mprop->impacto}}</td>
                      <td>{{$mprop->promprobabilidad}}</td>
                      <td>{{$mprop->promimpacto}}</td>
                      <td><a style="color:red" data-toggle="modal" data-target="#eliminaranayeva4" href="#eliminaranayeva4"><span class="glyphicon glyphicon-trash"></span></a>
                      <!-- ******************Modal *****************************-->
                              <div class="modal fade" id="eliminaranayeva4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-body">
                                        <h3 class="text-center">Desea Eliminar la información de la fila →</h3>
                                    </div>
                                    <div class="modal-footer">
                                      <center><button type="button" class="btn btn-danger"><a href="anayeva/delete/{{$mprop->id}}" title="Eliminar registro" style="color:white"><span class="glyphicon glyphicon-trash"></span></a></button>
                                      
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
<br>
<br>

    <!--******************************** tabla anayeva*********************************-->

  <div class="row">
    <table class="table table-striped table-bordered table-hover table-responsive" id="TablaAnayeva1">
      <thead>
        <tr>
          <th>Código</th>
          <th>Nombre</th>
          <th>Eventos</th>
          <th>Causas</th>
          <th>Consecuencias</th>
          <th>Promedio Probabilidad</th>
          <th>Promedio Impacto</th>
          <th>Riesgo Inherente</th>
          <th>Mod.Probabilida</th>
          <th>Mod.Impacto</th>
          <th>Probabilida</th>
          <th>Impacto</th>
          <th>Riesgo Residual</th>
          <th>Detalle</th>
          <th>Validación</th>
          <th>Nivel de Riesgo</th>
          <th>Observaciones</th>
          <th>Editar</th>
          <th>Eliminar</th>
        </tr>
      </thead>
      <tbody align="justify" bgcolor="" valign="top">

      </tbody>
  </table> 
  </div><!--cierra la tabla-->   

</div><!--cerrar el container-->

</body>

<!-- para el cambiar lo que muestra la tabla en español-->

<script>
        $(document).ready( function () {
            $('#TablaAnayeva').DataTable({
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

<!--Para llenar la primera tabla Tipo de Analisis con ajax-->
<script>
  var json="";
  $(document).ready(function(){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
      url: 'anayeva/ObtenerInfo',
      type: 'POST',
      data: {_token: CSRF_TOKEN},
      dataType: 'JSON',
      success: function (data) {
        json=data;
        console.log(json);
        if(json.Planificacion != null){
          $('#txtNombreProyecto').val(json.Planificacion.nombre);
          $('#Fecha').val(json.Planificacion.fecha);
        }
        $('#txtNombreRiesgo').empty();
        $('#txtNombreRiesgo').append($('<option>', {
          value: '---',
          text: '---'
        }));
        $.each(json.PortafolioRiesgo, function(i, item) {
          console.log(item.codportafolio);
          $('#txtNombreRiesgo').append($('<option>', {
              value: item.id,
              text: item.nombre
          }));
        });
      }
    });

    $('[data-toggle="tooltip" ]').tooltip();   
  });

  $('#txtNombreRiesgo').on('change', function() {
    $.each(json.PortafolioRiesgo, function(i, item) {
      if (item.id == $('#txtNombreRiesgo').val() ){
        $('#txtcodigoriesgo').val(item.codportafolio);
        $('#txtdetalleporta').val(item.descripcion);
      }
      if ($('#txtNombreRiesgo').val() == "---"){
        $('#txtcodigoriesgo').val("");
        $('#txtdetalleporta').val("");
      }
    });
  });

  $('#btnAgretab1').on("click",function(){
    if($("#txtNombreRiesgo").val()=='---'){
      alert("Seleccione un riesgo");
      return false;
    }
    if($("#cbxTipoAna").val()=='---'){
      alert("Seleccione tipo de analisis");
      return false;
    }
    if($("#txtEvento").val()==''){
      alert("Ingrese un evento");
      return false;
    }
    if($("#txtCausas").val()==''){
      alert("Ingrese una causa");
      return false;
    }
    if($("#txtConsecuencias").val()==''){
      alert("Ingrese una Consecuencia");
      return false;
    }
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
      url: 'anayeva/store',
      type: 'POST',
      data: {
        _token: CSRF_TOKEN,
        cbxPortafolio: $("#txtNombreRiesgo").val(),
        cbxTipoAna: $("#cbxTipoAna").val(),
        txtEvento: $("#txtEvento").val(),
        txtCausas: $("#txtCausas").val(),
        txtConsecuencias: $("#txtConsecuencias").val(),
      },
      dataType: 'JSON',
      success: function (data) {
        alert(1);
        console.log(data);
        try{
          //jsonResult = JSON.parse(data);
          $("#Tabla1Anayeva tbody").empty();
          $.each(data, function(i, item) {
            console.log(item.tipoanalisis);
            console.log(item.eventos);
            console.log(item.eventos);
            console.log(item.causas);
            console.log(item.consecuencias);
            var newRowContent = 
            "<tr>"+
              "<td>"+
                item.tipoanalisis+
              "</td>"+
              "<td>"+
                item.eventos+
              "</td>"+
              "<td>"+
                item.causas+
              "</td>"+
              "<td>"+
                item.consecuencias+
              "</td>"+
              "<td>"+
                "<a style='color:red' data-toggle='modal' data-target='#eliminaranayeva1' href='#eliminaranayeva1'><span class='glyphicon glyphicon-trash'></span></a>"+
                "<div class='modal fade' id='eliminaranayeva1' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>"+
                      "<div class='modal-dialog' role='document'>"+
                        "<div class='modal-content'>"+
                          "<div class='modal-body'>"+
                              "<h3 class='text-center'>Desea Eliminar la información de la fila →</h3>"+
                          "</div>"+
                          "<div class='modal-footer'>"+
                            "<center><button type='button' class='btn btn-danger'><a href='anayeva/delete/"+item.id+"' title='Eliminar registro' style='color:red'><span class='glyphicon glyphicon-trash'></span></a></button>"+
                            
                            "<button type='button' class='btn btn-primary' data-dismiss='modal'>Cancelar</button></center>"+
                          "</div>"+
                        "</div>"+
                      "</div>"+
                    "</div>"+
              "</td>"+
            "</tr>";
            $("#Tabla1Anayeva > tbody:last").append(newRowContent);
          });
        }catch(e){
          console.log(e);
        }
      }
    });
  });

</script>

<!--Scrip para llenar con ajax la 2da tabla calificación **********************************-->

<script>
 $('#btnagregarcali').on("click",function(){
    if($("#cbxProbabilidad").val()=='---'){
      alert("Seleccione la Probabilidad");
      return false;
    }
    if($("#cbxImpacto").val()=='---'){
      alert("Ingrese Impacto");
      return false;
    }
    if($("#txtPromProba").val()=='---'){
      alert("Ingrese el promedio de la probabilidad");
      return false;
    }
    if($("#txtPromImpa").val()==''){
      alert("Ingrese el promedio del Impacto");
      return false;
    }

    
    if($("#txtRiesInh").val()==''){
      alert("Ingrese el riesgo Inherente");
      return false;
    }
    
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
      url: 'anayeva/store2',
      type: 'POST',
      data: {
        _token: CSRF_TOKEN,
        cbxPortafolio: $("#txtNombreRiesgo").val(),
        cbxProbabilidad: $("#cbxProbabilidad").val(),
        cbxImpacto: $("#cbxImpacto").val(),
        txtPromProba: $("#txtPromProba").val(),
        txtPromImpa: $("#txtPromImpa").val(),
        txtRiesInh: $("#txtRiesInh").val(),
      },
      dataType: 'JSON',
      success: function (data) {
        console.log(data);
      
      try{
          //jsonResult = JSON.parse(data);
          $("#tableanayeva2 tbody").empty();
          $.each(data, function(i, item) {
            console.log(item.probablidad);
            console.log(item.impacto);
            console.log(item.promprobabilidad);
            console.log(item.promimpacto);
            console.log(item.riesgoinherente);
            var newRowContent = 
            "<tr>"+
              "<td>"+
                item.probablidad+
              "</td>"+
              "<td>"+
                item.impacto+
              "</td>"+
              "<td>"+
                item.promprobabilidad+
              "</td>"+
              "<td>"+
                item.promimpacto+
              "</td>"+
              "<td>"+
                item.riesgoinherente+
              "</td>"+
            "</tr>";
            $("#tableanayeva2 > tbody:last").append(newRowContent);
          });
        }catch(e){
          console.log(e);
      }
    }
    });
  });

</script>

<!--tabla3 medidas existentes-->

<script>
 $('#btnAgregarMexistentes').on("click",function(){

    if($("#txtModiProba").val()==''){
      alert("Ingrese lo que modifica la Probabilidad");
      return false;
    }
    if($("#txtModiImpac").val()==''){
      alert("Ingrese lo que modifica el impacto");
      return false;
    }
    if($("#cbxProbabilidad2").val()=='---'){
      alert("Ingrese la probabilidad");
      return false;
    }
    if($("#cbxImpacto2").val()==''){
      alert("Ingrese el impacto");
      return false;
    }

    
    if($("#txtRiesgoRes").val()==''){
      alert("Ingrese el riesgo Residual");
      return false;
    }
    
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
      url: 'anayeva/store3',
      type: 'POST',
      data: {
        _token: CSRF_TOKEN,
        cbxPortafolio: $("#txtNombreRiesgo").val(),
        txtModiProba: $("#txtModiProba").val(),
        txtModiImpac: $("#txtModiImpac").val(),
        cbxProbabilidad2: $("#cbxProbabilidad2").val(),
        cbxImpacto2: $("#cbxImpacto2").val(),
        txtRiesgoRes: $("#txtRiesgoRes").val(),
      },
      dataType: 'JSON',
      success: function (data) {
        console.log(data);
       
      }
    });
  });

</script>

<!--tabla4 medidas propuestas-->

<script>
 $('#btnagregarMprop').on("click",function(){
  
    if($("#txtDetalles").val()==''){
      alert("Ingrese el detalle de las medidas");
      return false;
    }
    if($("#cbxValidacion").val()=='---'){
      alert("Ingrese la validación");
      return false;
    }
    if($("#cbxNivelRiesgo").val()=='---'){
      alert("Ingrese el nivel de riesgo");
      return false;
    }
    if($("#txtObservac").val()==''){
      alert("Ingrese la Observación");
      return false;
    }

    
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
      url: 'anayeva/store4',
      type: 'POST',
      data: {
        _token: CSRF_TOKEN,
        cbxPortafolio: $("#txtNombreRiesgo").val(),
        txtDetalles: $("#txtDetalles").val(),
        cbxValidacion: $("#cbxValidacion").val(),
        cbxNivelRiesgo: $("#cbxNivelRiesgo").val(),
        txtObservac: $("#txtObservac").val(),
      },
      dataType: 'JSON',
      success: function (data) {
        console.log($("#txtNombreRiesgo").val());
        console.log(data);
       
      try{
          //jsonResult = JSON.parse(data);
          $("#tableanayeva4 tbody").empty();
          $.each(data, function(i, item) {
            console.log(item.detalle);
            console.log(item.validacion);
            console.log(item.nivelriesgo);
            console.log(item.observaciones);
            var newRowContent = 
            "<tr>"+
              "<td>"+
                item.detalle+
              "</td>"+
              "<td>"+
                item.validacion+
              "</td>"+
              "<td>"+
                item.nivelriesgo+
              "</td>"+
              "<td>"+
                item.observaciones+
              "</td>"+
            "</tr>";
            $("#tableanayeva4 > tbody:last").append(newRowContent);
          });
        }catch(e){
          console.log(e);
        }
      }
    });
  });

</script>
</html>

@endsection