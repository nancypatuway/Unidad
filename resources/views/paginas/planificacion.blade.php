@extends('layouts.app')

@section('content')
<script type="text/javascript">
  $(document).on('click', 'form button[type=submit]', function(e) {
    var isValid = $(e.target).parents('form').isValid();
    if ($("#cbxTipo option:selected").val()=="---"){
      isValid=false;
      alert(12);
    }
    if(!isValid) {
      e.preventDefault(); //prevent the default action
    }
});
</script>
  <!--para validacion-->
  <div id="app">
        @include('Mensajes')


        @yield('content')
  </div>

  <form action="planificacion/store" method="post" enctype="multipart/form-data" id="frmPlani">

     {{ csrf_field() }} <!--para que los input viajen al servidor--> 
    <div class="container">

    <h1 class="text-center">Planificación</h1>
    <h3 class="text-center">Objetivo de la valoración de Riesgo</h3>
    <div class="row">
    <p class="text-center">Identificar los riesgos empresariales relevantes que se encuentran en el proceso o proyecto que se valora y que de materializarse afectarían el cumplimiento de los objetivos del proceso o proyecto y por ende los objetivos empresariales, a fin de determinar la necesidad de establecer un Plan de Gestión de Riesgos</p>
    </div>

      <div class="row">
        <div class='col-sm-4'>
          
        </div>

        <div class='col-sm-4'>
          <center><button type="submit" class="btn btn-primary" id="btnediplani">Editar</button></center>
        </div>

        <div class='col-sm-4'>
          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalLong">Eliminar</button>
              <!-- Modal -->
            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-body">
                      <h3 class="text-center">Desea Eliminar toda la información</h3>
                  </div>
                  <div class="modal-footer">
                    <center><button type="button" class="btn btn-danger" data-dismiss="modal">Aceptar</button>
                    
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button></center>
                  </div>
                </div>
              </div>
            </div>
        </div>

      </div>

<!--********************************** fila 1 ***************************************--> 

      <div class="row">
        <div class='col-sm-6'>
          <label>Fecha de Inicio del ejercicio:</label>
          <input type="datetime" class="form-control" title="Establecer la fecha dando un clic para desplegar el calendario"id="txtFechaInicio" placeholder="Fecha de inicio" name="txtFechaInicio" required oninvalid="this.setCustomValidity('Ingresar una fecha valida apartir del día de hoy en adelante')" oninput="setCustomValidity('')">
        </div>

        <div class="col-sm-6">
          <label>Periodo:</label>
          <input type="text" class="form-control" title="Digitar el año. por ejemplo 2018" id="txtPeriodo" placeholder="Periodo" name="txtPeriodo" required oninvalid="this.setCustomValidity('Ingresar periodo = año, ejemplo 2018 ')" oninput="setCustomValidity('')">
        </div>
      </div>
    
  <!--********************************** fila 2 ***************************************--> 

      <div class="row">
        <div class='col-sm-4'>
          <!--tittle = para poner la info a la quiere dar una explicacion-->
          <label>Nombre del Proyecto o Proceso</label>
          <input type="text" title="Establecer un nombre para su proceso o  proyecto" class="form-control" id="txtNombreProyectoProceso" placeholder="Nombre del Proyecto o Proceso" name="txtNombreProyectoProceso" required oninvalid="this.setCustomValidity('Ingresar nombre del proceso o proyecto')" oninput="setCustomValidity('')">
        </div>
                
        <div class='col-sm-4'>
          <label>Código</label>
          <input type="text" class="form-control" id="txtcodigo" placeholder="Código" name="txtcodigo" required oninvalid="this.setCustomValidity('Ingresar el código')" oninput="setCustomValidity('')">
        </div>
                
        <div class='col-sm-4'>
          <label>Tipo</label>
          <br>
          <select  class="form-control" class="selectpicker show-tick" id="cbxTipo" name="cbxTipo" title="Proceso o Proyecto">
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
          <input type="text" class="form-control" id="txtobjetivo" placeholder="Objetivo" name="txtobjetivo" required oninvalid="this.setCustomValidity('Ingresar el objetivo')" oninput="setCustomValidity('')">
        </div>
      </div>
   
  <!--********************************** fila 4 ***************************************-->
   
      <div class="row">
        <div class='col-sm-10'>
          <label>Alineamiento con Objetivo Especifico:</label>
          <input type="text" class="form-control" id="txtAlineamientoEspe" placeholder="Alineamiento con Objetivo Especifico" name="txtAlineamientoEspe">
        </div>

        <div class='col-sm-1' style="float: left;">
          <br>
          <center><a class="btn btn-primary" id="btnmasAlineamiento" href="#btnAgregaralineamiento">+</a></center>
        </div>
        <div class='col-sm-1'>
          <br>
          @if(!Session::has('identificador'))
            <input type="hidden" name="txtidentificador" id="txtidentificador" value="">
          @else
            <input type="hidden" name="txtidentificador" id="txtidentificador" value="{!! session('identificador') !!}" >
          @endif    
        </div>
      </div>
      <br>
      <div class="row">
        <table class="table table-striped table-bordered table-hover table-responsive" id="tableplani2" bgcolor="blue">
          <thead>
            <tr>
              <th bgcolor="#b2b6f4">Alineamiento con Objetivo Especifico</th>
              <th bgcolor="#b2b6f4">Eliminar</th>
            </tr>
          </thead>
          <tbody align="justify" bgcolor="" valign="top">

            foreach($Ali as $ali)
            <tr>
              <td>{$ali->alineamientoconobjetivo}</td>
              <td>
                <!--******************MODAL************************************-->
                <a style="color:red"  data-toggle="modal" data-target="#eliminarplani"><span class="glyphicon glyphicon-trash"></span></a></button>
              <!-- Modal -->
            <div class="modal fade" id="eliminarplani" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-body">
                      <h3 class="text-center">Desea Eliminar la información</h3>
                  </div>
                  <div class="modal-footer">
                    <center><button type="button" class="btn btn-danger"><a href="planificacion/deleteAli/{$ali->id}" title="Eliminar registro" style="color:white"><span class="glyphicon glyphicon-trash"></span></a>
                    
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button></center>
                  </div>
                </div>
              </div>
            </div>
              </td>
            </tr>
            endforeach
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
          <input type="text" class="form-control" title="Condiciones que pueden afectar al proceso, proyecto o actividad." id="txtcondicionesExterno" placeholder="Condiciones del Entorno" name="txtcondicionesExterno" required oninvalid="this.setCustomValidity('Ingresar las Condiciones del Entorno Externo')" oninput="setCustomValidity('')">
        </div>

        <div class='col-sm-6'>
          <label>Condiciones del Entorno Interno:</label>
          <input type="text" title="txtCondiciones que pueden afectar al proceso, proyecto o actividad."class="form-control" id="condicionesinterno" placeholder="Condiciones del Entorno" name="txtcondicionesinterno" required oninvalid="this.setCustomValidity('Ingresar las Condiciones del Entorno Interno')" oninput="setCustomValidity('')">
        </div>
      </div>

  <!--********************************** fila 7 ***************************************-->

      <div class="row">
        <div class='col-sm-12'>
          <label>Sujetos Interesados Relacionados:</label>
          <input type="text" title=" Personas físicas o jurídicas, internas y externas a la institución, que pueden afectar o ser afectadas directamente por las decisiones y acciones institucionales (o del proceso)" class="form-control" id="txtsujetos" placeholder="Sujetos Interesados Relacionados" name="txtsujetos" required oninvalid="this.setCustomValidity('Ingresar los Sujetos Interesados Relacionados')" oninput="setCustomValidity('')">
        </div>
      </div>
    
  <!--********************************** fila 8 ***************************************-->

      <div class="row">
        <div class='col-sm-12'>
          <label>Areas o Dependencias Relacionadas:</label>
          <input type="text" class="form-control" id="txtdependencias" placeholder="Areas o Dependencias Relacionadas" name="txtdependencias" required oninvalid="this.setCustomValidity('Ingresar las Areas o Dependencias Relacionadas')" oninput="setCustomValidity('')">
        </div>
      </div>

  <!--********************************** fila 9 ***************************************-->

      <div class="row">
        <div class='col-sm-6'>
          <label>Entradas/Insumos(Proceso y Proyecto):</label>
          <input type="text" class="form-control" id="txtEntradasInsumos" placeholder="Entradas/Insumos" name="txtEntradasInsumos" required oninvalid="this.setCustomValidity('Ingresar las Entradas/Insumos(Proceso y Proyecto)')" oninput="setCustomValidity('')">
        </div>

        <div class='col-sm-6'>
          <label>Salidas/Productos(Proceso y Proyecto):</label>
          <input type="text" class="form-control" id="txtSalidasProductos" placeholder="Salidas/Productos" name="txtSalidasProductos" required oninvalid="this.setCustomValidity('Ingresar las Salidas/Productos(Proceso y Proyecto)')" oninput="setCustomValidity('')">
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
          <input type="Indicadores" class="form-control" id="txtindicadores" placeholder="Indicadores de Proceso / Proyecto" name="txtindicadores" required oninvalid="this.setCustomValidity('Ingresar los Indicadores de Proceso / Proyecto')" oninput="setCustomValidity('')">
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
          <input type="text" title="Normativa jurídica y técnica, interna o externa que afecta al proceso, proyecto o actividad"class="form-control" id="txtnormativaInterna" placeholder="Normativa Interna" name="txtnormativaInterna" required oninvalid="this.setCustomValidity('Ingresar la Normativa Interna')" oninput="setCustomValidity('')">
        </div>
       
        <div class='col-sm-6'>
          <label>Normativa Externa:</label>
          <input type="text" title="Normativa jurídica y técnica, interna o externa que afecta al proceso, proyecto o actividad"class="form-control" id="txtNormativaExterna" placeholder="Normativa Externa" name="txtNormativaExterna" required oninvalid="this.setCustomValidity('Ingresar la Normativa Externa')" oninput="setCustomValidity('')">
        </div>
      </div>
    
  <!--********************************** fila 14 ***************************************-->

      <div class="row">
        <div class='col-sm-12'>
          <label>Datos sobre evaluaciones del riesgo anteriores:</label>
          <input type="text" class="form-control" id="txtDEvaluacion" placeholder="Datos sobre evaluaciones del riesgo anteriores" name="txtDEvaluacion" required oninvalid="this.setCustomValidity('Ingresar los Datos sobre evaluaciones del riesgo anteriores')" oninput="setCustomValidity('')">
        </div>
      </div>
  <!--********************************** fila 15 ***************************************-->
      <div class="row">
        <div class="col-sm-4">
        </div>

        <div class="col-sm-4" style="margin-top: 2%" >
          <center><button type="submit" class="btn btn-primary" id="btnenviarplanif">Enviar Planificación Relizada</button></center>
        </div>

        <div class="col-sm-4"> 
        </div>
      </div>
 
</form><!--fin form -->
  <!--********************************** fila 16 ***************************************-->

 <form action="planificacion/storeEquipoval" method="post" id="frmEquipoval">
      <br>
      <div class="row">
        <div class='col-sm-6'>
          <label>Conformación del Equipo a Cargo de la Valoración:</label>
          <input class="form-control" type="text" name="txtEquipoval" id="txtEquipoval" placeholder="Equipo de Valoración">
        </div>

        <br>
        <div class="col-sm-6">
          <button type="submit" class="btn btn-primary">Agregar persona</button>
        </div>

      </div>
</form>     

  <!--**************************** tabla de equipo de valoracion ***************************************-->
  <div class="row">
        <table class="table table-striped table-bordered table-hover table-responsive" id="TablaEquipo">
          <thead>
            <tr>
              <th>Nombre de la persona que conforma el equipo de Valoración</th>
              <th>Eliminar</th>
            </tr>
          </thead>
              @foreach($Equipoval as $equipo)
            <tr>
              <td>{{$equipo->nombre}}</td>
              <td>
                <a href="planificacion/delete/{{$nombre->id}}" title="Eliminar registro" style="color:red">
                <span class="glyphicon glyphicon-trash"></span>
                </a>
              </td>
            </tr>
           @endforeach

          <tbody>
            
          </tbody>
        </table>
  </div>
  <!--********************************** fila 16 ***************************************-->


      <br>
      <br>
      <div class="row">
        <table class="table table-striped table-bordered table-hover table-responsive" id="TablaPlanificacion">
          <thead>
            <tr>
              <th>Fecha</th>
              <th>Periodo</th>
              <th>Código</th>
              <th>Tipo de Planificación</th>
              <th>Nombre</th>
              <th>Objetivo</th>
              <th>Sujetos Relacionados</th>
              <th>Areas Relacionadas</th>
              <th>Entradas</th>
              <th>Diagrama de Flujo</th>
              <th>Salida</th>
              <th>Indicadores de Proceso</th>
              <th>Normativa Interna</th>
              <th>Normativa Externa</th>
              <th>Datos de evaluaciones anteriores</th>
              <th>Editar</th>
              <th>Eliminar</th>
              <th>Realizado por</th>
              <th>Autorizado por</th>
            </tr>
          </thead>

          <tbody>
            @foreach($planificacion as $plani)
            <tr>
              <td>{{$plani->fecha}}</td>
              <td>{{$plani->periodo}}</td>
              <td>{{$plani->codplanificacion}}</td>
              <td>{{$plani->tipoplanificacion}}</td>
              <td>{{$plani->nombre}}</td>
              <td>{{$plani->objetivo}}</td>
              <td>{{$plani->sujetosrelacionados}}</td>
              <td>{{$plani->areasrelacionadas}}</td>
              <td>{{$plani->entradas}}</td>
              <td><img height="50px" width="50px" src="data:image/png;base64,{{ ($plani->diagramaflujo) }}" alt="Diagrama" />
                <!--<a href="planificacion/descargar/{{$plani->id}}" class="btn btn-success">Descargar</a>-->
              </td>
              <td>{{$plani->salida}}</td>
              <td>{{$plani->indicadoresproceso}}</td>
              <td>{{$plani->normativainterna}}</td>
              <td>{{$plani->normativaexterna}}</td>
              <td>{{$plani->evaluacionesanteriores}}</td>
              <td>
                <a href="planificacion/edit/{{$plani->id}}" title="Editar registro">
                <span class="glyphicon glyphicon-pencil"></span>
                </a>
            </td>
            <td>
              <a href="planificacion/delete/{{$plani->id}}" title="Eliminar registro" style="color:red">
              <span class="glyphicon glyphicon-trash"></span>
              </a>
            </td>
            </tr>
            @endforeach
          </tbody>
        </table>
       
      </div>
</div><!--fin container del inicio--> 
<!--calendario para que funcione en español-->
<script>
   $(document).ready( function () {
          $('a[href = "#btnAgregaralineamiento"]').click(function() {
            det=$('#txtAlineamientoEspe').val();
        window.location.replace('planificacion/storeAli/'+det+'/session');
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



@endsection