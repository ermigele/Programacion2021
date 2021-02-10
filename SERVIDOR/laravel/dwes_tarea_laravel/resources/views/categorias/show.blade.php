@extends("../layouts.plantilla")

@section("cabecera")
	Información de la Categoria
@endsection

@section("cuerpo")
<table border ="1">
	<tr>
		<th>Nombre</th>
		<th>Descripción</th>
	</tr>
	<tr>
		<td>{{ $categoria->nombre }}</td>
		<td align="center">{{ $categoria->descripcion }}</td>
	</tr>
</table>

@endsection 

@section("pie")
@endsection 