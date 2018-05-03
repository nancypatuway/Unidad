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