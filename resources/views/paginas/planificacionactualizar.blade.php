@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
	<title>Actualizar Planificacion</title>
</head>
<body>
<form action="update/{{$planificacion->id}}" method="post" enctype="multipart/form-data">
    <!--para validacion-->
    <div id="app">
        @include('Mensajes')


        @yield('content')
    </div>

     {{ csrf_field() }} <!--para que los input viajen al servidor--> 
     {{method_field('patch')}}
    <div class="container">

    <h1 class="text-center">Planificación</h1>
    <h3 class="text-center">Editar</h3>
    <div class="row">
    </div>

    

<!--********************************** fila 1 ***************************************--> 

      <div class="row">
        <div class='col-sm-6'>
          <label>Fecha de Inicio:</label>
          <input type="datetime" class="form-control" title="Establecer la fecha dando un clic para desplegar el calendario"id="txtFechaInicio" placeholder="Fecha de inicio" name="txtFechaInicio" value="{{$planificacion->fecha}}" required oninvalid="this.setCustomValidity('Ingresar una fecha valida apartir del día de hoy en adelante')" oninput="setCustomValidity('')">

        <div class="col-sm-6">
          <label>Periodo:</label>
          <input type="text" class="form-control" title="Digitar el año. por ejemplo 2018" id="txtPeriodo" placeholder="Periodo" name="txtPeriodo" value="{{$planificacion->periodo}}" required oninvalid="this.setCustomValidity('Ingresar periodo = año, ejemplo 2018 ')" oninput="setCustomValidity('')">
        </div>
      </div>
    
  <!--********************************** fila 2 ***************************************--> 

      <div class="row">
        <div class='col-sm-4'>
          <!--tittle = para poner la info a la quiere dar una explicacion-->
          <label>Nombre del Proyecto o Proceso</label>
          <input type="text" title="Establecer un nombre para su proceso o  proyecto" class="form-control" id="txtNombreProyectoProceso" placeholder="Nombre del Proyecto o Proceso" name="txtNombreProyectoProceso" value="{{$planificacion->nombre}}" required oninvalid="this.setCustomValidity('Ingresar nombre del proceso o proyecto')" oninput="setCustomValidity('')">
        </div>
                
        <div class='col-sm-4'>
          <label>Código</label>
          <input type="text" class="form-control" id="txtcodigo" placeholder="Código" name="txtcodigo" value="{{$planificacion->codplanificacion}}" required oninvalid="this.setCustomValidity('Ingresar el código')" oninput="setCustomValidity('')">
        </div>
                
        <div class='col-sm-4'>
          <label>Tipo</label>
          <br>
          <select title="Proceso o Proyecto" id="cbxTipo" name="cbxTipo" value="{{$planificacion->tipoplanificacion}}">
          <option value="---">---</option>
          <option value="Proyecto">Proyecto</option>
          <option value="Proceso">Proceso</option>
          </select>
        </div>
      </div>

  <!--********************************** fila 3 ***************************************--> 

      <div class="row">
        <div class='col-sm-12'>
          <label>Objetivo:</label>
          <input type="text" class="form-control" id="txtobjetivo" placeholder="Objetivo" name="txtobjetivo" value="{{$planificacion->objetivo}}" required oninvalid="this.setCustomValidity('Ingresar el objetivo')" oninput="setCustomValidity('')">
        </div>
      </div>
   
  <!--********************************** fila 4 ***************************************-->
   
      <div class="row">
        <div class='col-sm-11'>
          <label>Alineamiento con Objetivo Especifico:</label>
          <input type="text" class="form-control" id="txtAlineamientoEspe" placeholder="Alineamiento con Objetivo Especifico" name="txtAlineamientoEspe" value="{{$planificacion->alineamiento}}">
        </div>

        <div class='col-sm-1' style="float: left;">
          <br>
          <center><a class="btn btn-primary" id="btnmasAlineamiento" href="#btnAgregaralineamiento">+</a></center>
        </div>
        <div class='col-sm-1'>
          <br>
            <input type="hidden" name="txtidentificador" id="txtidentificador" value="{{$planificacion->token}}" >
        </div>
      </div>
      <br>
      <div class="row">
        <table class="table table-striped table-bordered table-hover table-responsive" id="tableplani2">
          <thead>
            <tr>
              <th>Alineamiento con Objetivo Especifico</th>
              <th>Eliminar</th>
            </tr>
          </thead>
          <tbody align="justify" bgcolor="" valign="top">
            @foreach($Ali as $ali)
            <tr>
              <td>{{$ali->alineamientoconobjetivo}}</td>
              <td>
                <a href="../deleteAli/{{$ali->id}}" title="Eliminar registro" style="color:red"><span class="glyphicon glyphicon-trash"></span></a>
              </td>
            </tr>
            @endforeach
          </tbody>
          
        </table>        
      </div>
    
  <!--********************************** fila 5 ***************************************-->

      <div class="row">
        <div class='col-sm-12'>
          <label>Responsble del Proceso o Proyecto:</label>
          <input type="text" class="form-control" id="txtresponsable" placeholder="Responsble del Proceso o Proyecto" name="txtresponsable" required oninvalid="this.setCustomValidity('Ingresar el Responsble del Proceso o Proyecto')" oninput="setCustomValidity('')">
        </div>
      </div>

  <!--********************************** fila 6 ***************************************-->

      <div class="row">
        <div class='col-sm-6'>
          <label>Condiciones del Entorno Externo:</label>
          <input type="text" class="form-control" title="Condiciones que pueden afectar al proceso, proyecto o actividad." id="txtcondicionesExterno" placeholder="Condiciones del Entorno" name="txtcondicionesExterno" value="{{$planificacion->condicionesexterno}}" required oninvalid="this.setCustomValidity('Ingresar las Condiciones del Entorno Externo')" oninput="setCustomValidity('')">
        </div>

        <div class='col-sm-6'>
          <label>Condiciones del Entorno Interno:</label>
          <input type="text" title="txtCondiciones que pueden afectar al proceso, proyecto o actividad."class="form-control" id="condicionesinterno" placeholder="Condiciones del Entorno" name="txtcondicionesinterno" value="{{$planificacion->condicionesinterno}}" required oninvalid="this.setCustomValidity('Ingresar las Condiciones del Entorno Externo')" oninput="setCustomValidity('')">
        </div>
      </div>

  <!--********************************** fila 7 ***************************************-->

      <div class="row">
        <div class='col-sm-12'>
          <label>Sujetos Interesados Relacionados:</label>
          <input type="text" title=" Personas físicas o jurídicas, internas y externas a la institución, que pueden afectar o ser afectadas directamente por las decisiones y acciones institucionales (o del proceso)" class="form-control" id="txtsujetos" placeholder="Sujetos Interesados Relacionados" name="txtsujetos" value="{{$planificacion->sujetosrelacionados}}" required oninvalid="this.setCustomValidity('Ingresar los Sujetos Interesados Relacionados')" oninput="setCustomValidity('')">
        </div>
      </div>
    
  <!--********************************** fila 8 ***************************************-->

      <div class="row">
        <div class='col-sm-12'>
          <label>Areas o Dependencias Relacionadas:</label>
          <input type="text" class="form-control" id="txtdependencias" placeholder="Areas o Dependencias Relacionadas" name="txtdependencias" value="{{$planificacion->areasrelacionadas}}" required oninvalid="this.setCustomValidity('Ingresar las Areas o Dependencias Relacionadas')" oninput="setCustomValidity('')">
        </div>
      </div>

  <!--********************************** fila 9 ***************************************-->

      <div class="row">
        <div class='col-sm-6'>
          <label>Entradas/Insumos(Proceso y Proyecto):</label>
          <input type="text" class="form-control" id="txtEntradasInsumos" placeholder="Entradas/Insumos" name="txtEntradasInsumos" value="{{$planificacion->entradas}}" required oninvalid="this.setCustomValidity('Ingresar las Entradas/Insumos(Proceso y Proyecto)')" oninput="setCustomValidity('')">
        </div>

        <div class='col-sm-6'>
          <label>Salidas/Productos(Proceso y Proyecto):</label>
          <input type="text" class="form-control" id="txtSalidasProductos" placeholder="Salidas/Productos" name="txtSalidasProductos" value="{{$planificacion->salida}}" required oninvalid="this.setCustomValidity('Ingresar las Salidas/Productos(Proceso y Proyecto)')" oninput="setCustomValidity('')">
        </div>
      </div>

  <!--********************************** fila 10 ***************************************-->
  <!--***************************para subir documentos**********************************-->

      <div class="row">
        <div class='col-sm-12'>
          <label title=" Incluye el inicio del proceso así como el detalle de las actividades del proceso y el fin del proceso.  Debe presentarse en Diagrama de Flujo, pero en ausencia de éste deberá realizarse una descripción detallada y completa de las actividades. En el caso de los proyectos deberá anexarse el Plan de Gestión del Proyecto.">Descripción del Proceso o Proyecto / Diagrama de Flujo</label>
          <input type="file" class="form-control-file" name="txtexampleInputFile" id="txtexampleInputFile" aria-describedby="fileHelp">
          <small id="fileHelp" class="form-text text-muted">Insertar diagrama de Flujo del proceso o proyecto.</small>
          <small id="fileHelp" class="form-text text-muted">Incluye el inicio del proceso así como el detalle de las actividades y el fin del proceso. En ausencia de este diagrama deberá realizarse una descripción detallada y completa de las actividades, En el caso de los proyectos deberán anexarse el Plan de Gestión del Proyecto.</small>
        </div>
      </div> 
    
  <!--********************************** fila 11 ***************************************-->

      <div class="row">
        <div class='col-sm-12'>
          <label>Indicadores de Proceso / Proyecto:</label>
          <input type="Indicadores" class="form-control" id="txtindicadores" placeholder="Indicadores de Proceso / Proyecto" name="txtindicadores" value="{{$planificacion->indicadoresproceso}}" required oninvalid="this.setCustomValidity('Ingresar los Indicadores de Proceso / Proyecto')" oninput="setCustomValidity('')">
        </div>
      </div>
    
  <!--********************************** fila 12 ***************************************-->

      <br>
      <div class="col-sm-12 alert alert-info">
        <h3 class="text-center">Referencias</h3>
        <h5 class="text-center">Normativa Jurídica y Técnica, interna o externa que afecta al proceso, proyecto o actividad</h5>
      </div>

  <!--********************************** fila 13 ***************************************-->

      <div class="row">
        <div class='col-sm-6'>
          <label>Normativa Interna:</label>
          <input type="text" title="Normativa jurídica y técnica, interna o externa que afecta al proceso, proyecto o actividad"class="form-control" id="txtnormativaInterna" placeholder="Normativa Interna" name="txtnormativaInterna" value="{{$planificacion->normativainterna}}" required oninvalid="this.setCustomValidity('Ingresar la Normativa Interna')" oninput="setCustomValidity('')">
        </div>
       
        <div class='col-sm-6'>
          <label>Normativa Externa:</label>
          <input type="text" title="Normativa jurídica y técnica, interna o externa que afecta al proceso, proyecto o actividad"class="form-control" id="txtNormativaExterna" placeholder="Normativa Externa" name="txtNormativaExterna" value="{{$planificacion->normativaexterna}}" required oninvalid="this.setCustomValidity('Ingresar la Normativa Externa')" oninput="setCustomValidity('')">
        </div>
      </div>
    
  <!--********************************** fila 14 ***************************************-->

      <div class="row">
        <div class='col-sm-4'>
          <label>Conformación del Equipo a Cargo de la Valoración:</label>
          <input type="text" title="Titulares subordinados y otros funcionarios designados por la jefatura." class="form-control" id="txtConformación" placeholder="Conformación del Equipo a Cargo de la Valoración" name="txtConformación" required oninvalid="this.setCustomValidity('Ingresar el Conformación del Equipo a Cargo de la Valoración')" oninput="setCustomValidity('')">
        </div>

        <div class='col-sm-4'>
          <br>
          <center><button type="button" class="btn btn-primary" id="btnmasAlineamiento" title="Agregar personas que participan en la valoración">+</button></center>
        </div>
     
        <div class='col-sm-4'>
          <label>Datos sobre evaluaciones del riesgo anteriores:</label>
          <input type="text" class="form-control" id="txtDEvaluacion" placeholder="Datos sobre evaluaciones del riesgo anteriores" name="txtDEvaluacion" value="{{$planificacion->evaluacionesanteriores}}" required oninvalid="this.setCustomValidity('Ingresar los Datos sobre evaluaciones del riesgo anteriores')" oninput="setCustomValidity('')">
        </div>
      </div>

  <!--********************************** fila 15 ***************************************-->

      <div class="row">
        <div class="col-sm-4">
        </div>

        <div class="col-sm-4" style="margin-top: 2%" >
          <center><button type="submit" class="btn btn-primary" id="btnenviarplanif">Actualizar</button></center>
        </div>

        <div class="col-sm-4"> 
        </div>
      </div>
      <br>
      <br>
</form>
</body>
<!--para que muestre los valores del select de tipo (proceso o proyecto)-->
<script type="text/javascript">
    $("#cbxTipo").val("{{$planificacion->tipoplanificacion}}");
</script>

<script>
   $(document).ready( function () {
          $('a[href = "#btnAgregaralineamiento"]').click(function() {
            det=$('#txtAlineamientoEspe').val();
            ident=$('#txtidentificador').val();            
        window.location.replace('../storeAli/'+det+'/'+ident);
    });});
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

  $(document).ready(function(){
    $('[data-toggle="tooltip" style="background-color: green"]').tooltip();   
  });
</script>

</html>
@endsection