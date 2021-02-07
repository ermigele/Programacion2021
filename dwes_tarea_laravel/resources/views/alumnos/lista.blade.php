@extends("../layouts.plantilla")

@section("cabecera")
	Listado de Alumnos
@endsection

@section("cuerpo")
<table border ="1">
	<tr>
		<th>Nombre</th>
		<th>Apellidos</th>
		<th>Acciones</th>
	</tr>


	@foreach ($alumnos as $a)
	<tr>
		<td>{{ $a->nombre }}</td>
		<td>{{ $a->apellidos }}</td>
		<td align="center">
			<a href="{{ route('alumnos.edit', $a->id)}}">Editar</a> - 
			<a href="{{ route('alumnos.show', $a->id)}}">Mostrar</a> -
			<a href="{{ action('AlumnosController@borrar', $a->id) }}" role="button" >Borrar</a>
		</td>
	
	</tr>
	@endforeach
	<tr>
		<td colspan="3" align="center"><a href="{{ route('alumnos.create')}}">Nuevo Alumno</a></td>
	</tr>
</table>

@endsection 

@section("pie")
@endsection 