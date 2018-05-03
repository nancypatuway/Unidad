@extends('layouts.app')

@section('content')

<h2 class="text-center">Resumen de la valoración de Riesgo</h2>
<h4 class="text-center">AS-08-06-124</h4>

<div class="container">

<!--************************************** Fila 1 *************************************-->  
  <div class="row">
    <div class='col-sm-8'>        
    </div>

    <div class='col-sm-4'>
    </div>
  </div>     

<!--************************************** Fila 2 *************************************-->

  <div class="row">
    <div class='col-sm-6'>
      <label for="NombreProyectoProceso">Nombre del Proyecto o Proceso</label>
      <input class="form-control" type="text" disabled id="txtNombrePro" placeholder="Nombre del Proyecto o Proceso" name="txtNombrePro">
    </div>

    <div class='col-sm-6'>
      <label for="nombreTitular">Nombre del Titular</label>
      <input class="form-control" type="text" disabled id="txtNombreUsua" placeholder="Nombre del Titular" name="txtNombreUsua">
    </div>

  </div>

<!--************************************** Fila 3 *************************************-->
  </br>
  <div class="row">
    <div class="col-sm-12 alert alert-info">
      <h4 class="text-center">Resultados del Análisis de los Riesgo</h4>
    </div>
  </div>

<!--************************************** tabla *************************************-->   

  <div class="row">
    <p></p>     
    <table class="table table-striped table-bordered table-hover" id="reportes">
      <thead>
        <tr>
          <th>Código</th>
          <th>Nombre</th>
          <th>Riesgo Inherente</th>
          <th>Riesgo Residual</th>
        </tr>
      </thead>

      <!-- footer de la tabla -->
      
      <!-- relleno de la tabla -->
      <tbody>
        <tr>
          
      </tbody>
    </table>    
  </div>

<!--************************************** Fila 4 *************************************--> 

  </br>
  <div class="row">
    <div class="col-sm-12 alert alert-info">
      <h4 class="text-center">Califición Global de la Autoevaluación de Control Interno del Proceso</h4>
      <div class="row">
    <p></p>     
    <table class="table table-striped table-bordered table-hover" id="reportesAutoEva">
      <thead>
        <tr>
          <th>Calificación</th>
          <th>Valor</th>
        </tr>
      </thead>

      <!-- relleno de la tabla -->
      <tbody>
        <tr>
          <td>inadecuado poner color</td>
          <td>10</td>
        </tr>
      </tbody>
    </table>    
  </div>
    </div>
  </div>

<!--************************************** Fila 5 *************************************-->

  </br>
  <div class="row">
    <div class="col-sm-12 alert alert-info">
      <h4 class="text-center">Plan de Gestión de Riesgos</h4>
    </div>
  </div>

<!--******************* tabla plan de gestión *******************************************-->

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
            </tr>
          </thead>
        </table>    
      </div><!--cierra la tabla-->
<!--************************************** Fila 6 *************************************-->

  </br>
  <div class="row">
    <div class="col-sm-12 alert alert-info">
      <h4 class="text-center">Observaciones a otros niveles de la Organización</h4>
    </div>
  </div>

<!--************************************** Fila 7 *************************************-->

  <div class="row">
    <div class='col-sm-12'>
        <input type="text" class="form-control" id="pwd" placeholder="Observaciones a otros niveles de la Organización" name="pwd">
      </br>
    </div>
  </div>

  <!--************************************** Fila 8 *************************************-->

  <div class="row">
    <div class='col-sm-4'>
    </div>

    <div class='col-sm-4'>
        <button type="button" class="btn btn-primary text-center" style="float: center;" id="btnEnviarObserv">Enviar Observación</button>
    </div>
  
    <div class='col-sm-4'>
    </div>

  </div>
</div> <!--fin container-->

<!--cambiar el idioma de la tabla-->
<script>
        $(document).ready( function () {
          var Planificacion = JSON.parse(('{{$Json}}').replace(/(&quot\;)/g,"\""));
          console.log(Planificacion);
          $("#txtNombrePro").val(Planificacion.nombre);
          $("#txtNombreUsua").val(Planificacion.user.name);

          $("#reportes tbody").empty();

          $.each(Planificacion.anayeva, function(i, item) {
          var newRowContent = 
            "<tr>"+
              "<td>"+
                item.portafolio_riesgo.codportafolio+
              "</td>"+
              "<td>"+
                item.portafolio_riesgo.nombre+
              "</td>"+
              "<td>"+
                item.RiesgoInherente+
              "</td>"+
              "<td>"+
                item.riesgoresidual+
              "</td>"+
              "<td>"+
            "</tr>";
            $("#reportes > tbody:last").append(newRowContent);
          });

          $("#reportesAutoEva tbody").empty();
          var valorAutoeva=0;
          var echo='';
          var color='';
          $.each(Planificacion.autoevaluacion, function(i, item) {
            valorAutoeva = valorAutoeva + parseFloat(item.calificacionponderacionauto);
          });

          if(valorAutoeva <= 0,09){
            echo="Inadecuado"; // rojo
            color='red';
          }
          if(valorAutoeva > 0,9 <= 0,27){
            echo="Debil"; //naranja
            color='orange';
          }
          if(valorAutoeva > 0,27 <= 0,45){
            echo="Limitado"; // amarillo
            color='yellow';
          }
          if(valorAutoeva> 0,45){
            echo="Fuerte"; //verde
            color='green';
          }

            var newRowContentAutoeva = 

            "<tr>"+
              "<td style='background-color:"+color+"';color:#fff>"+
                "<font color='white'>"+echo+"</font>"+
              "</td>"+
              "<td>"+
                valorAutoeva+
              "</td>"
              "<td>"+
            "</tr>";
            $("#reportesAutoEva > tbody:last").append(newRowContentAutoeva);
            

        $("#tablePlangestion tbody").empty();
        $.each(Planificacion.plangestion, function(i, item) {
          var newRowContent = 
            "<tr>"+
              "<td>"+
                item.codplangestion+
              "</td>"+
              "<td>"+
                item.riesgoasociado+
              "</td>"+
              "<td>"+
                item.accionmejora+
              "</td>"+
              "<td>"+
                item.plazo+
              "</td>"+
              "<td>"+
                item.finicio+
              "</td>"+
              "<td>"+
                item.ffin+
              "</td>"+
              "<td>"+
                item.accionesrealizadas+
              "</td>"+
              "<td>"+
                item.avance+
              "</td>"+
              "<td>"+
                item.justificacion+
              "</td>"+
            "</tr>";
            $("#tablePlangestion > tbody:last").append(newRowContent);
          });
        });
</script>
@endsection