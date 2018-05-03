<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>viewall</title>
</head>
<body>
 <table class="table" id="portafolioriesgo">
            <thead >
                <tr > 
                    <th>Código</th> 
                    <th>Nombre</th> 
                    <th class="text-center">Descripción</th>
                    <th>Editar</th>
                    <th>Borrar</th> 
                </tr>

            </thead>
            <tbody align="justify" bgcolor="" valign="top">
                <!--users1´parametro q se recibe del controlador-->
                <!--variable cualquiera-->
                @foreach($users1 as $hola)
                    <tr>
                        <td>{{$hola->codportafolio}}</td>
                        <td>{{$hola->nombre}}</td>
                        <td>{{$hola->descripcion}}</td>
                        <td>
                            <input type="image" name="hola" src="{{ URL::to('/')}}/images/editar.png"  width="30px" height="30px">
                        </td>
                        <td>
                            <input type="image" name="hola" src="{{ URL::to('/')}}/images/eliminar.png"  width="30px" height="30px">
                        </td>
                    </tr>
                @endforeach

            </tbody>

            </table>
</body>
</html>