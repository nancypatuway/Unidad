@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"> -->
</head>
<body>
    <!--para validacion-->
    <div id="app">
        @include('Mensajes')


        @yield('content')
    </div>
    <div class="container">
        <h1 class="text-center">Portafolio de Riesgo</h1>
        <p class="text-center">Diccionario de riesgos en el cual se presenta una descripción detallada de cada uno de los riesgos que están asociados a cada componente de la estructura.</p> 

<!--******************************** fila 1 ************************************-->    

        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                        <br>
                        <!-- Boton trigger modal -->
                        <center><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">Agregar</button></center>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h3 class="modal-title text-center" id="exampleModalLongTitle">Ingresar Datos</h3>
                              </div>
                              <div class="modal-body">
                                <div class="form-group">

                                    <form action="portafolio/store" method="post" enctype="multipart/form-data">
                                        

                                        <label for="codporta">Código del Portafolio</label>
                                        <input type="text" id="codporta" name="codporta" placeholder="Código del Portafolio" class="form-control" value="" autocomplete="off" required oninvalid="this.setCustomValidity('El código ya existe o el campo se encuentra vacío')" oninput="setCustomValidity('')" >
                                        
                                        <br>
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <br>
                                        <label for="nomporta">Nombre</label>
                                        <input type="text" name="nomporta" placeholder="Nombre" class="form-control" id="nomporta" value="" autocomplete="off" required oninvalid="this.setCustomValidity('No se ingreso el Nombre del Riesgo')" oninput="setCustomValidity('')" >
                                        
                                        <br>
                                        <label for="desporta">Descripción</label>
                                        <input type="text" name="desporta" placeholder="Descripción" class="form-control" id="desporta" value="" autocomplete="off" required oninvalid="this.setCustomValidity('No se ingreso la Descripción del Riesgo')"oninput="setCustomValidity('')" >
                                        
                                        <br>
                                        <center><input type="submit" name="Agregar" class="btn btn-primary" id="btnAgregarPorta"></center>
                                    </form>

                                  </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                              </div>
                            </div>
                          </div>
                        </div>
            </div>

            <div class="col-md-4">
            </div>

        </div>

        <table class="table" id="tablePortafolioriesgo">
            <thead >
                <tr > 
                    <th>Código</th> 
                    <th>Nombre</th> 
                    <th>Descripción</th>
                    <th>Editar</th>
                    <th>Borrar</th> 
                </tr>

            </thead>
            <tbody align="justify" bgcolor="" valign="top">
                <!--users1´parametro q se recibe del controlador-->
                <!--variable cualquiera-->
                @foreach($PortafolioRiesgo as $hola)
                    <tr>
                        <td>{{$hola->codportafolio}}</td>
                        <td>{{$hola->nombre}}</td>
                        <td>{{$hola->descripcion}}</td>
                        <td>
                            <a href="portafolio/edit/{{$hola->id}}" title="Editar registro"><span class="glyphicon glyphicon-pencil"></span>
                            </a>
                        </td>
                            <td><a style="color:red" data-toggle="modal" data-target="#eliminarporta" href="#eliminarporta"><span class="glyphicon glyphicon-trash"></span></a>
                        <!-- ******************Modal *****************************-->
                                <div class="modal fade" id="eliminarporta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-body">
                                          <h3 class="text-center">Desea Eliminar la información de la fila →</h3>
                                      </div>
                                      <div class="modal-footer">
                                        <center><button type="button" class="btn btn-danger"><a href="portafolio/delete/{{$hola->id}}" title="Eliminar registro" style="color:white"><span class="glyphicon glyphicon-trash"></span></a></button>
                                        
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
    
    
</body>

<!-- para el cambiar lo que muestra la tabla en español-->

<script>
        $(document).ready( function () {
            $('#tablePortafolioriesgo').DataTable({
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
                        "last": "Ultimo    ",
                        "next": "   Siguiente    ",
                        "previous": " Anterior   "
                    }
                }
            });
        });
</script>
<!--llenar la tabla -->

<script>
    $(document).ready( function () {
            //portafolioriesgo = es el id de la tabla
    $('#tablePortafolioriesgo').DataTable();
    });    
</script>  
<!--para cambiar el mensaje de validacion-->


</html>
@endsection