@extends ("../layout.plantilla")

@section ("cabecera")
<h1> Alta centros</h1>
@endsection

@section ("cuerpo")
<form method="post" action="/centro">
@csrf
    <table border='1.5'>
        <tr>
            <td>Nombre</td>
            <td><input type="text" name="nombre" /></td>
        <tr>
            <td>Direccion</td>
            <td><input type="text" name="direccion" /></td>
        </tr>
        <tr>
            <td colspan="2">Enviar</td>
            <td><input type="submit" name="enviar" /></td>
        </tr>
        </tbody>
    </table>
</form>
@endsection